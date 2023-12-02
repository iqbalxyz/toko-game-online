<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function getOrders() 
	{
		return $this->db->get('pesanan')->result_array();
	}

	public function getOrderDetailById($id) 
	{
		return $this->db->get_where('pesanan', ['id' => $id])->row_array();
	}

	public function getOrderDetail($id) 
	{
		$this->db->select('detail_pesanan.id_pesanan, detail_pesanan.id_produk, detail_pesanan.subtotal, produk.judul, produk.gambar, produk.harga');
		$this->db->from('detail_pesanan');
		$this->db->join('produk', 'detail_pesanan.id_produk = produk.id');
		$this->db->where('detail_pesanan.id_pesanan', $id);
		return $this->db->get()->result_array();
	}

	public function getOrderConfirm($id) 
	{
		return $this->db->get_where('konfirmasi_pesanan', ['id_pesanan' => $id])->row_array();
	}

	public function updateStatus($id, $data)
	{
		$this->db->update('pesanan', $data, ['id' => $id]);
	}

}

/* End of file Order_model.php */
