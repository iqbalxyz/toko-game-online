<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getAllGame()
	{
		return $this->db->get('produk')->result_array();
	}

	public function getAllBanner()
	{
		return $this->db->get('spanduk')->result_array();
	}

	public function getGameById($id)
	{
		return $this->db->get_where('produk', ['id' => $id])->row_array();
	}

}

/* End of file Home_model.php */
