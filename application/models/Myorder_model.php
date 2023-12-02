<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Myorder_model extends CI_Model {

	public function getMyOrders($id) 
	{
		return $this->db->get_where('pesanan', ['id_user' => $id])->result_array();
	}

	public function getMyOrderDetail($id, $invoice) 
	{
		$this->db->where('id_user', $id);
		$this->db->where('faktur', $invoice);
		return $this->db->get('pesanan')->row_array();
	}

	public function uploadProofPayment() {
		$config = [
			'upload_path'     => './images/payments',
			'encrypt_name'    => TRUE,
			'allowed_types'   => 'jpg|jpeg|png|JPG|PNG|JPEG',
			'max_size'        => 3000,
			'max_width'       => 0,
			'max_height'      => 0,
			'overwrite'       => TRUE,
			'file_ext_tolower'=> TRUE
		];

		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('gambar')){
			return $this->upload->data('file_name');
		}else{
			$this->session->set_flashdata('image_error', 'Uploaded file types are not permitted or the file is too large.');
			return false;
		}
	}
	
	public function insertPaymentConfirm($data) {
		$this->db->insert('konfirmasi_pesanan', $data);
	}

	public function updateStatus($id){
		$this->db->update('pesanan', ['status' => 'dibayar'], ['id' => $id]);
	}
	
	// public function insertBuktiTransfer($data, $invoice) {
	// 	$this->db->update('pemesanan', $data, ['invoice' => $invoice]);
	// }


}

/* End of file Myorder_model.php */
