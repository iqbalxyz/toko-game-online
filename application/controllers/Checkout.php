<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('checkout_model', 'checkout');
	}
	
	public function index()
	{
		$id 					= $this->session->userdata('id');   
		$data['title']		= 'Checkout';
		$data['page']		= 'pages/checkout/index';
		$data['cart']		= $this->checkout->getCart($id);
		$this->load->view('layouts/app',$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nama', 'Name', 'required',[
			'required' => 'Name wajib diisi.',
		]);
		$this->form_validation->set_rules('alamat', 'Address', 'required',[
			'required' => 'Alamat wajib diisi.',
		]);
		$this->form_validation->set_rules('telepon', 'Phone', 'required|numeric',[
			'required' => 'Telepon wajib diisi.',
			'numeric'  => 'Telepon harus berupa angka.'
		]);

		if($this->form_validation->run() != false) {
			$total = $this->checkout->total($this->session->userdata('id'));

			$data = [
				'id_user'	=> $this->session->userdata('id'),
				'tanggal'		=> date('Y-m-d'),
				'faktur'	=> $this->session->userdata('id') . date('YmdHis'),
				'total'		=> $total,
				'nama'		=> $this->input->post('nama'),
				'alamat'	=> $this->input->post('alamat'),
				'telepon'		=> $this->input->post('telepon'),
				'status'		=> 'menunggu',
			];

			// Masukkan data ke table orders
			if($order = $this->checkout->insertOrder($data)){
				$cart = $this->checkout->getCartByIdUser($this->session->userdata('id'));
				foreach($cart as $c) {
					$c['id_pesanan'] = $order;
					unset($c['id'], $c['id_user']);
					$this->checkout->insertOrdersDetail($c);
				}

				// Hapus data pada keranjang
				$this->checkout->deleteCart($this->session->userdata('id'));

				$this->session->set_flashdata('success', 'Data berhasil disimpan.');

				$data['title'] 	= 'Checkout Success';
				$data['content']	= $data;
				$data['page']		= 'pages/checkout/success';

				$this->load->view('layouts/app', $data);
			}
		}else{
			$data['title']		= 'Checkout';
			$data['page']		= 'pages/checkout/index';
			$data['cart']		= $this->checkout->getCart($this->session->userdata('id'));
			$this->load->view('layouts/app',$data);
		}
	}

}

/* End of file Checkout.php */
