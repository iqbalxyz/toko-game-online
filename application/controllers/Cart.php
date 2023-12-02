<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('cart_model', 'cart');
	}

	public function index()
	{
		$id 					= $this->session->userdata('id');
		$data['title'] 	= 'Your Cart';
		$data['produk']	= $this->cart->showCart($id);
		$data['page'] 		= 'pages/cart/index';
		$this->load->view('layouts/app', $data);
	}
	
	public function add()
	{
		$product_id = $this->input->post('id_produk');
		$product 	= $this->cart->getProductById($product_id);

		$data = [
			'id_user'  	 => $this->session->userdata('id'),
			'id_produk' => $product_id,
			'subtotal'   => $product['harga']
		];
	
		$this->cart->addToCart($data);
		$this->session->set_flashdata('success', 'Berhasil ditambahkan ke keranjang.');
		redirect(base_url('home/detail/' . $product_id));
	}

	public function delete($id) 
	{		
		$this->cart->deleteCart($id);
		$this->session->set_flashdata('success', 'Berhasil dihapus dari keranjang.');
		redirect(base_url('cart'));
	}

}

/* End of file Cart.php */
