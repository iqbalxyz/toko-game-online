<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model', 'register');
	}

	public function index()
	{
		$data['title']	= 'Register';
		$data['page']	= 'pages/auth/register';

		$this->load->view('layouts/app', $data);
	}

	public function register()
	{
		
		$this->form_validation->set_rules('nama', 'Name', 'required',[
			'required'		=> 'Nama wajib diisi',
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required'		=> 'Email wajib diisi',
			'valid_email'	=> 'Email tak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim',[
			'required'		=> 'Password diperlukan'
		]);
		$this->form_validation->set_rules('password2', 'Password confirmation', 'required|trim|matches[password]',[
			'required'		=> 'Password confirmation diperlukan',
			'matches'		=> 'Password confirmation tak sama'
		]);

		if($this->form_validation->run() == false) {
			$this->index();
		}else{
			$data = [
				'nama'		=> $this->input->post('nama'),
				'email'		=> $this->input->post('email'),
				'password'	=> hashEncrypt($this->input->post('password')),
				'role'		=> 2,
			];

			$this->register->register($data);
			$this->session->set_flashdata('success', 'Berhasil daftar, mohon login.');

			redirect(base_url('login'));
		}
	}


}

/* End of file Register.php */
