<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function getProductById($id) 
	{
		return $this->db->get_where('produk', ['id' => $id])->row_array();
	}

	public function addToCart($data) 
	{
		$this->db->insert('keranjang', $data);
	}

	public function showCart($id) {
		$this->db->select('keranjang.*, produk.judul, produk.harga, produk.gambar');
		$this->db->from('keranjang');
		$this->db->join('produk', 'keranjang.id_produk = produk.id');
		$this->db->where('keranjang.id_user', $id);
		return $this->db->get()->result_array();
	}

	public function deleteCart($id) 
	{
		$this->db->delete('keranjang', ['id' => $id]);
		return $this->db->affected_rows();
	}

}

/* End of file Cart_model.php */
