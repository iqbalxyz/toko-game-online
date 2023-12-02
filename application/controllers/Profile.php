<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('profile_model', 'profile');
	}
	
	public function index()
	{
		$id 					= $this->session->userdata('id');
		$data['title'] 	= 'Profile';
		$data['page'] 		= 'pages/profile/index';
		$data['profile']	= $this->profile->getProfile($id);
		$this->load->view('layouts/app', $data); 
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Name', 'required',[
			'required' => 'Name is required.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
			'required' 		=> 'Email diperlukan.',
			'valid_email'	 => 'Email tak valid.'
		]);

		if($this->form_validation->run() == FALSE){
			$id 					= $this->session->userdata('id');
			$data['title'] 	= 'Profile';
			$data['page'] 		= 'pages/profile/index';
			$data['profile']	= $this->profile->getProfile($id);
			$this->load->view('layouts/app', $data); 
		}else{
			$id = $this->session->userdata('id');

			$data = [
				'nama'	=> $this->input->post('nama'),
				'email' 	=> $this->input->post('email')
			];

			$this->profile->updateProfile($id, $data);
			$this->session->set_flashdata('success', 'Biodata berhasil diupdate. Mohon login ulang untuk mengupdate profil.');

			redirect(base_url('profile'));
		}
	}

	public function password()
	{
		$this->form_validation->set_rules('password', 'New password', 'required',[
			'required' => 'Password baru diperlukan.',
		]);
		$this->form_validation->set_rules('password2', 'Password confirmation', 'required|trim|matches[password]',[
			'required' => 'Konfirmasi diperlukan.',
			'matches'  => 'Konfirmasi password tak sesuai.'
		]);

		if($this->form_validation->run() == FALSE){
			$data['title']		= 'Change Password';
			$data['page'] 		= 'pages/profile/password';

			$this->load->view('layouts/app', $data);
		}else{
			$id = $this->session->userdata('id');
			$data = [
				'password' => hashEncrypt($this->input->post('password')),
			];

			$this->profile->updatePassword($id, $data);
			$this->session->set_flashdata('success', 'Password berhasil di update.');

			redirect(base_url('profile/password'));
		}
	}

}

/* End of file Profile.php */
