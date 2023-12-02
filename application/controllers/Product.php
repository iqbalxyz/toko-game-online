<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_admin();
		$this->load->model('product_model', 'product');
	}
	
	public function index()
	{
		$data['judul']		= 'Products';
		$data['produk']	= $this->product->getAllProduct();
		$data['page']		= 'pages/product/index';

		$this->load->view('layouts/app', $data);
	}

	public function add() {
    	$this->load->library('form_validation');
    
    	$this->form_validation->set_rules('judul', 'Game name', 'required',[
			'required' => 'Judul wajib diisi.',
		]);
		$this->form_validation->set_rules('harga', 'Price', 'required|numeric',[
			'required' => 'Harga wajib diisi.',
			'numeric'  => 'Berupa angka.'
		]);
		$this->form_validation->set_rules('deskripsi', 'Description', 'required',[
			'required' => 'Deskripsi diwajibkan.',
		]);
		$this->form_validation->set_rules('requirements', 'System requriements', 'required',[
			'required' => 'System requriements harus diisi.',
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Add Game';
			$data['page'] = 'pages/product/add';
			$this->load->view('layouts/app', $data);
		} else {
			$image_path = $this->product->uploadImage();
			
			if ($image_path) {
				$data = [
					'judul'         => $this->input->post('judul'),
					'harga'         => $this->input->post('harga'),
					'edisi'         => $this->input->post('edisi'),
					'deskripsi'     => $this->input->post('deskripsi'),
					'requirements'  => $this->input->post('requirements'),
					'gambar'        => $image_path,
				];
			
				// Insert $data into the database
				$this->product->insertProduct($data);

				redirect(base_url('product'));
			} else {
				$this->session->set_flashdata('image_error', 'Gagal upload gambar, Periksa tipe dan ukuran.');
            	redirect(base_url('product/add'));
			}
		}
	}


	public function edit($id) {
		$this->form_validation->set_rules('judul', 'Game name', 'required', [
			'required' => 'Judul wajib diisi.',
		]);
		$this->form_validation->set_rules('harga', 'Price', 'required|numeric', [
			'required' => 'Harga wajib diisi.',
			'numeric'  => 'Berupa angka.'
		]);
		$this->form_validation->set_rules('deskripsi', 'Description', 'required', [
			'required' => 'Deskripsi wajib diisi.',
		]);
		$this->form_validation->set_rules('requirements', 'System requriements', 'required', [
			'required' => 'System requriements wajib diisi.',
		]);
	
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Update Game';
			$data['page'] = 'pages/product/edit';
			$data['produk'] = $this->product->getProduct($id);
			$this->load->view('layouts/app', $data);
		} else {
			$id = $this->input->post('id');
			$data = [
				'judul'         => $this->input->post('judul'),
				'harga'         => $this->input->post('harga'),
				'edisi'         => $this->input->post('edisi'),
				'deskripsi'     => $this->input->post('deskripsi'),
				'requirements'  => $this->input->post('requirements'),
			];
	
			// Check if a new image is uploaded
			if (!empty($_FILES['gambar']['name'])) {
				$image_path = $this->product->uploadImage();
	
				if ($image_path) {
					// Remove the existing image file
					$productImage = $this->product->getProduct($id);
	
					if (file_exists('images/game/' . $productImage['gambar']) && $productImage['gambar']) {
						unlink('images/game/' . $productImage['gambar']);
					}
	
					// Update the image path in the data array
					$data['gambar'] = $image_path;
				} else {
					// Handle image upload failure
					$this->session->set_flashdata('image_error', 'Gagal upload gambar, Periksa tipe dan ukuran.');
					redirect(base_url('product/edit/' . $id));
				}
			}
	
			$this->product->updateProduct($id, $data);
			$this->session->set_flashdata('success', 'Game berhasil ditambahkan.');
	
			redirect(base_url('product'));
		}
	}	
	

	public function delete($id) {
		$produk = $this->product->getProduct(($id));
		unlink('images/game/' . $produk['gambar']);
		$this->product->deleteProduct($id);
		$this->session->set_flashdata('success', 'Game berhasil dihapus.');

		redirect(base_url('product'));
	}

}

/* End of file Product.php */
