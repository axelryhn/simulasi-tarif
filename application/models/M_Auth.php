<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{

	// private function loginAdmin($nip, $password)
	// {
	// 	$q = $this->db->select('*')->where(array('nip' => $nip, 'password' => md5($password)))->get('tb_admin');
	// 	return $q;
	// }

	// private function loginPegawai($nip, $password)
	// {
	// 	$q = $this->db->select('*')->where(array('nip' => $nip, 'password' => md5($password)))->get('tb_pegawai');
	// 	return $q;
	// }

	private function loginUser($nip, $password)
	{
		$q = $this->db->select('*')->where(array('nip' => $nip, 'password' => md5($password)))->get('tb_user');
		return $q;
	}

	public function doLogin($nip, $password)
	{


		$cek_login_user = $this->loginUser($nip, $password);
		if ($cek_login_user->num_rows()) {
			$d = $cek_login_user->row();
			$this->session->set_userdata('is_logged_in', 'login');
			$this->session->set_userdata('user_type', $d->id_role);
			$this->session->set_userdata('user_id', $d->id);
			$this->session->set_userdata('user_name', $d->nama);
			$this->session->set_userdata('user_nip', $d->nip);
			$this->session->set_userdata('user_username', $d->username);
			$this->session->set_userdata('user_avatar', uploads_url('avatar/' . $d->avatar));

			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('msg_alert', 'Email/password anda salah');
			redirect(base_url('auth/login'));
		}



		// $cek_login_admin = $this->loginAdmin($nip, $password);
		// $cek_login_pegawai = $this->loginPegawai($nip, $password);

		// if ($cek_login_admin->num_rows()) {
		// 	$d = $cek_login_admin->row();
		// 	$this->session->set_userdata('is_logged_in', 'login');
		// 	$this->session->set_userdata('user_type', $d->type);
		// 	$this->session->set_userdata('user_id', $d->id_user);
		// 	$this->session->set_userdata('user_name', $d->namalengkap);
		// 	$this->session->set_userdata('user_email', $d->nip);
		// 	$this->session->set_userdata('user_username', $d->username);
		// 	$this->session->set_userdata('user_avatar', uploads_url('avatar/' . $d->avatar));

		// 	redirect(base_url('dashboard'));
		// } else if ($cek_login_pegawai->num_rows()) {
		// 	$d = $cek_login_pegawai->row();
		// 	$this->session->set_userdata('is_logged_in', 'login');
		// 	$this->session->set_userdata('user_type', 'pegawai');
		// 	$this->session->set_userdata('user_id', $d->id);
		// 	$this->session->set_userdata('user_name', $d->nama);
		// 	$this->session->set_userdata('user_unit', $d->unit_kerja);
		// 	$this->session->set_userdata('user_status', $d->status_pegawai);
		// 	$this->session->set_userdata('user_avatar', uploads_url('avatar/' . $d->avatar));

		// 	redirect(base_url('dashboard'));
		// } else {
		// 	$this->session->set_flashdata('msg_alert', 'Email/password anda salah');
		// 	redirect(base_url('auth/login'));
		// }
	}

	public function doResetPassword($email)
	{
		$cek_email = $this->db->select('*')->where('email', $email)->get('tb_admin');
		if (!$cek_email->num_rows()) {
			$this->session->set_flashdata('msg_alert', 'Email tidak terdaftar');
			redirect(base_url('auth/lost_password'));
		} else {
			$this->session->set_flashdata('msg_alert', 'Password berhasil dikirim ke email');
			redirect(base_url('auth/lost_password'));
		}
	}
}

/* End of file auth.php */
/* Location: ./application/models/M_Auth.php */