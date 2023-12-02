<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Myorder extends CI_Controller {

	private $id;
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('myorder_model', 'myorder');
	}
	
	public function index()
	{
		$data['title']	= 'My Order';
		$data['page']	= 'pages/myorder/index';
		$data['orders']= $this->myorder->getMyOrders($this->session->userdata('id'));
		$this->load->view('layouts/app', $data);
	}

	public function detail($invoice) 
	{
		$data['title']				= 'My Order';
		$data['page']				= 'pages/myorder/detail';
		$data['order']				= $this->myorder->getMyOrderDetail($this->session->userdata('id'), $invoice);
		$this->load->view('layouts/app', $data);
	}

	public function confirm($invoice)
	{
		$this->form_validation->set_rules('id_pesanan', 'Id Pesanan', 'required',[
			'required' => 'Id pesanan diperlukan.',
		]);
		$this->form_validation->set_rules('nama_akun', 'Acount name', 'required',[
			'required' => 'Nama akun diperlukan.',
		]);
		$this->form_validation->set_rules('nomor_akun', 'Account number', 'required|numeric',[
			'required' => 'Nomor akun diperlukan.',
			'numerin'	=> 'Harus berupa angka.'
		]);
		$this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric',[
			'required' => 'Nominal diperlukan.',
			'numeric'	=> 'Harus berupa angka.'
		]);

		// Jika sudah ada data terkirim
		if($this->input->post(null)){
			var_dump(validation_errors());
			// Jika data salah
			if($this->form_validation->run() == false){
				$data['title']	= 'Payment Confirm';
				$data['page']	= 'pages/myorder/confirm';
				$data['pesanan'] = $this->myorder->getMyOrderDetail($this->session->userdata('id'), $invoice);
				$this->load->view('layouts/app', $data);

			// Jika validasi benar
			}else{
				$data = [
					'id_pesanan'			=> $this->input->post('id_pesanan'),
					'nama_akun'		=> $this->input->post('nama_akun'),
					'nomor_akun'	=> $this->input->post('nomor_akun'),
					'nominal'			=> $this->input->post('nominal'),
					'note'				=> $this->input->post('note'),
				];

				var_dump(validation_errors());
	
				if(!empty($_FILES['gambar']['name'])){
					$upload = $this->myorder->uploadProofPayment();	
					$data['gambar'] = $upload;
				}
	
				$this->myorder->insertPaymentConfirm($data);
				$this->myorder->updateStatus($data['id_pesanan']);
				$this->session->set_flashdata('success', 'Data berhasil disimpan !.');
	
				redirect(base_url('myorder'));
			}
		// Jika belum ada data terkirim / pertama kali halaman di load
		}else {
			$data['title']	= 'Payment Confirm';
			$data['page']	= 'pages/myorder/confirm';
			$data['pesanan'] = $this->myorder->getMyOrderDetail($this->session->userdata('id'), $invoice);
			$this->load->view('layouts/app', $data);
		}

	}

}

/* End of file Myorder.php */
