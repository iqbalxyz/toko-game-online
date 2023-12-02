<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model {

	public function getCart($id)
	{
		$this->db->select('keranjang.id, keranjang.subtotal,
		produk.judul, produk.gambar, produk.harga');
		$this->db->from('keranjang');
		$this->db->join('produk', 'keranjang.id_produk = produk.id');
		$this->db->where('keranjang.id_user', $id);
		return $this->db->get()->result_array();
	}

	public function total($id) 
	{
		$this->db->select_sum('subtotal');
		$this->db->from('keranjang');
		$this->db->where('id_user', $id);
		return $this->db->get()->row()->subtotal;;
	}

	public function insertOrder($data) 
	{
		$this->db->insert('pesanan', $data);
		return $this->db->insert_id();
	}

	public function getCartByIdUser($id) 
	{
		return $this->db->get_where('keranjang', ['id_user' => $id])->result_array();
	}

	public function insertOrdersDetail($data) 
	{
		$this->db->insert('detail_pesanan', $data);
	}

	public function deleteCart($id)
	{
		$this->db->delete('keranjang',['id_user' => $id]);
	}

}

/* End of file Checkout.php */
