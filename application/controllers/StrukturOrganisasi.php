<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StrukturOrganisasi extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		isnt_login(function () {
			redirect(base_url('auth/login'));
		});
		// $this->load->model('M_StrukturOrganisasi');
		// $this->m_strukturorganisasi = $this->M_StrukturOrganisasi;
	}

	public function index()
	{
		$data = generate_page('Struktur Organisasi', 'StrukturOrganisasi/index', 'Pegawai');

		$data_content['title_page'] = 'Struktur Organisasi';
		$data['content'] = $this->load->view('partial/StrukturOrganisasi/Pegawai1', $data_content, true);
		$this->load->view('V_Struktur_Organisasi', $data);
	}
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */