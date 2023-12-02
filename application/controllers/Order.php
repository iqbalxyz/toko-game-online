<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('order_model', 'order');
	}
	
	public function index()
	{
		$data['title']	= 'Orders';
		$data['page']	= 'pages/order/index';
		$data['pesanan']= $this->order->getOrders();
		$this->load->view('layouts/app', $data);
	}

	public function detail($id)
	{
		$data['title']				= 'Order Detail';
		$data['page']				= 'pages/order/detail';
		$data['pesanan'] 			= $this->order->getOrderDetailById($id);
		$data['detail_pesanan'] 	= $this->order->getOrderDetail($id);

		if($data['pesanan']['status'] != 'menunggu') {
			$data['konfirmasi_pesanan'] = $this->order->getOrderConfirm($data['pesanan']['id']);
		}
		$this->load->view('layouts/app', $data);
	}

	public function update($id)
	{
		$data['status'] = $this->input->post('status');
		$this->order->updateStatus($id, $data);
		$this->session->set_flashdata('success', 'Data berhasil di update.');

		redirect(base_url("order/detail/$id"));
	}

}

/* End of file Order.php */
