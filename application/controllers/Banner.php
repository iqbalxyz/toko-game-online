<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_admin();
		$this->load->model('banner_model', 'banner');
	}
	
	public function index()
	{
		$data['title'] 	= 'Banner';
		$data['spanduk']	= $this->banner->getBanners();
		$data['page'] 		= 'pages/banner/index';
		$this->load->view('layouts/app', $data);
	}

	public function add() {
		$this->form_validation->set_rules('judul', 'Head banner', 'required', [
			'required' => 'Judul Spanduk Wajib di Isi.',
		]);
		$this->form_validation->set_rules('konten', 'Content banner', 'required', [
			'required' => 'Konten Spanduk Wajib di Isi.',
		]);
		$this->form_validation->set_rules('warna_text', 'Text banner', 'required', [
			'required' => 'Warna Text Wajib di Isi.',
		]);

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Add Banner';
			$data['page'] = 'pages/banner/add';
			$data['games'] = $this->banner->getAllGame();
			$this->load->view('layouts/app', $data);
		} else {
			$image_path = $this->banner->uploadImage();

			if ($image_path) {
				$data = [
					'id_produk'	 => $this->input->post('id_produk'),
					'judul'      => $this->input->post('judul'),
					'konten'     => $this->input->post('konten'),
					'warna_text' => $this->input->post('warna_text'),
					'gambar'     => $image_path,
				];

				// Insert $data into the database
				$this->banner->insertBanner($data);

				redirect(base_url('banner'));
			} else {

				$this->session->set_flashdata('image_error', 'Gagal upload gambar. Periksa tipe dan ukuran gambar.');
				redirect(base_url('banner/add'));
			}
		}
	}

	public function edit($id) {
		$this->form_validation->set_rules('judul', 'Head banner', 'required', [
			'required' => 'Judul Spanduk Wajib di Isi.',
		]);
		$this->form_validation->set_rules('konten', 'Content banner', 'required', [
			'required' => 'Konten Spanduk Wajib di Isi.',
		]);
		$this->form_validation->set_rules('warna_text', 'Text banner', 'required', [
			'required' => 'Warna Text Wajib di Isi.',
		]);
	
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Update Banner';
			$data['page'] = 'pages/banner/edit';
			$data['games']		= 	$this->banner->getAllGame();
			$data['spanduk'] = $this->banner->getBannerById($id);
			$this->load->view('layouts/app', $data);
		} else {
			$id = $this->input->post('id');
			$data = [
				'id_produk'		=> $this->input->post('id_produk'),
				'judul'         => $this->input->post('judul'),
				'konten'        => $this->input->post('konten'),
				'warna_text'    => $this->input->post('warna_text')
			];
	
			// Check if a new image is uploaded
			if (!empty($_FILES['gambar']['name'])) {
				$image_path = $this->banner->uploadImage();
	
				if ($image_path) {
					// Remove the existing image file
					$banner = $this->banner->getBannerById($id);
	
					if (file_exists('images/game/' . $banner['gambar']) && $banner['gambar']) {
						unlink('images/game/' . $banner['gambar']);
					}
	
					// Update the image path in the data array
					$data['gambar'] = $image_path;
				} else {
					// Handle image upload failure
					$this->session->set_flashdata('image_error', 'Gagal upload gambar. Periksa tipe dan ukuran gambar.');
					redirect(base_url('banner/edit/' . $id));
				}
			}
	
			$this->banner->updateBanner($id, $data);
			$this->session->set_flashdata('success', 'Spanduk berhasil di update.');
	
			redirect(base_url('banner'));
		}
	}	

	public function delete($id) {
		$banner = $this->banner->getBannerById(($id));
		unlink('images/banner/' . $banner['gambar']);
		$this->banner->deleteBanner($id);
		$this->session->set_flashdata('success', 'Spanduk berhasil di update.');

		redirect(base_url('banner'));
	}

}

/* End of file Banner.php */
