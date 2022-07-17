<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	private $m_auth;

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Auth');
		$this->m_auth = $this->M_Auth;
	}

	public function index()
	{
		is_login(function () {
			redirect(base_url('dashboard'));
		});
		isnt_login(function () {
			redirect(base_url('auth/login'));
		});
	}

	public function login()
	{
		is_login(function () {
			redirect(base_url('dashboard'));
		});
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nip = $this->security->xss_clean($this->input->post('nip'));
			$password = $this->security->xss_clean($this->input->post('password'));
			// validasi
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if (!$this->form_validation->run()) {
				$this->session->set_flashdata('msg_alert', 'Masukkan nipp dan password');
				redirect(base_url('auth/login'));
			}
			// lakukan login
			$this->m_auth->doLogin($nip, $password);
		} else {
			$this->load->view('V_Auth');
		}
	}


	public function logout()
	{
		isnt_login(function () {
			redirect(base_url('auth/login'));
		});
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/Auth.php */