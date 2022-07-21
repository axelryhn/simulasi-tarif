<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dashboard extends CI_Model
{

	public function total_admin()
	{
		$q = $this->db->query('SELECT COUNT(*) FROM tb_admin');
		return $q->row_array()['COUNT(*)'];
	}








	public function graph()
	{
		$data = $this->db->query("SELECT * from tb_cabang");
		return $data->result();
	}

	// public function total_pegawai()
	// {
	// 	$q = $this->db->query('SELECT COUNT(*) FROM tb_datapegawai');
	// 	return $q->row_array()['COUNT(*)'];
	// }

	// public function pegawai_total_organik_pelindo()
	// {
	// 	$q = $this->db->query("SELECT ( SELECT COUNT(*) FROM tb_pegawai WHERE status_pegawai='Organik Pelindo' ) AS TOTAL");
	// 	return $q->row_array()['TOTAL'];
	// }

	// public function pegawai_total_tno()
	// {
	// 	$q = $this->db->query("SELECT ( SELECT COUNT(*) FROM tb_pegawai WHERE status_pegawai='TNO' ) AS TOTAL");
	// 	return $q->row_array()['TOTAL'];
	// }

	// public function pegawai_total_pkwt()
	// {
	// 	$q = $this->db->query("SELECT ( SELECT COUNT(*) FROM tb_pegawai WHERE status_pegawai='PKWT' ) AS TOTAL");
	// 	return $q->row_array()['TOTAL'];
	// }

	// public function pegawai_total_organik_ptp()
	// {
	// 	$q = $this->db->query("SELECT ( SELECT COUNT(*) FROM tb_pegawai WHERE status_pegawai='Organi PTP' ) AS TOTAL");
	// 	return $q->row_array()['TOTAL'];
	// }

	//Grafik Cabang
	public function graph_cabang()
	{
		$data = $this->db->query("SELECT * from tb_cabang");
		return $data->result();
	}

	//Grafik Status pegawai
	public function graph_status()
	{
		$data = $this->db->query("SELECT * from tb_statuspegawai");
		return $data->result();
	}
}

/* End of file M_Dashboard.php */
/* Location: ./application/models/M_Dashboard.php */