<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	private $m_dashboard;

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard');
		$this->m_dashboard = $this->M_Dashboard;
		isnt_login(function () {
			redirect(base_url('auth/login'));
		});
	}

	public function index()
	{
		switch ($this->session->userdata('user_type')) {
			case '1':
				$data = generate_page('Dashboard', 'dashboard', 'Admin');


				// $data_content['total_datapegawai'] = $this->m_dashboard->total_pegawai();
				// $data_content['total_organik_pelindo'] = $this->m_dashboard->pegawai_total_organik_pelindo();
				// $data_content['total_organik_ptp'] = $this->m_dashboard->pegawai_total_organik_ptp();
				// $data_content['total_organik_tno'] = $this->m_dashboard->pegawai_total_tno();
				// $data_content['total_organik_pkwt'] = $this->m_dashboard->pegawai_total_pkwt();

				$data['graph'] = $this->m_dashboard->graph_cabang();

				$data['graph_status'] = $this->m_dashboard->graph_status();
				$data['content'] = $this->load->view('partial/Dashboard/Admin', $data, true);
				$this->load->view('V_Dashboard', $data);
				break;

			case '2':
				$data = generate_page('Dashboard', 'dashboard', 'Pegawai');

				// $data_content['total_datapegawai'] = $this->m_dashboard->total_pegawai();
				// $data_content['total_organik_pelindo'] = $this->m_dashboard->pegawai_total_organik_pelindo();
				// $data_content['total_organik_ptp'] = $this->m_dashboard->pegawai_total_organik_ptp();
				// $data_content['total_organik_tno'] = $this->m_dashboard->pegawai_total_tno();
				// $data_content['total_organik_pkwt'] = $this->m_dashboard->pegawai_total_pkwt();

				$data['content'] = $this->load->view('partial/Dashboard/Pegawai', $data, true);
				$this->load->view('V_Dashboard', $data);
				break;

			default:
				# code...
				break;
		}
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */