<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Tarif');
		isnt_login(function () {
			redirect(base_url('auth/login'));
		});
	}

	public function index()
	{
		$data = generate_page('Tarif', 'Tarif/index', 'Pegawai');
		$DATA = array('queryAllRgl' => $this->M_Tarif->getData());
		$data['title_page'] = 'Tarif';
		$data['content'] = $this->load->view('partial/Tarif/Pegawai', $DATA, true);
		$data['controller'] = $this;
		$this->load->view('V_Tarif', $data);

		// print_r($data);
	}

	public function simpanReport($jenis, $value, $aktivitas)
	{

		$dateCurent =  date("Y-m-d H:i:s");
		$ArrInsert = array(
			'jenis' => $jenis,
			'timestamp' => $dateCurent,
			'value' => $value,
			'aktivitas' => $aktivitas,
			'id_user' => $this->session->userdata('user_id')
		);
		$this->M_Tarif->insertReport($ArrInsert);
	}
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */