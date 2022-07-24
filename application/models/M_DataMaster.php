<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_DataMaster extends CI_Model
{

	public function admin_list_all()
	{

		$this->db->select('*');
		$q = $this->db->get('tb_user')->result();
		return $q;
	}






	public function get_data_admin($id)
	{
		$q = $this->db->select('*')->from('tb_user')->where('id', $id)->limit(1)->get();
		if ($q->num_rows() < 1) {
			redirect(base_url('/data_master/admin'));
		}
		return $q->row();
	}


	public function admin_update($id_user, $username, $nip, $namalengkap, $password, $type, $avatar)
	{
		$role = 0;
		if ($type == 'admin') {
			$role = 1;
		} else {
			$role = 2;
		}

		$d_t_d = array(
			'id' => $id_user,
			'username' => $username,
			'nip' => $nip,
			'nama' => $namalengkap,
			'id_role' => $role
		);

		if (!empty($password)) {
			$d_t_d['password'] = md5($password);
		}
		if (!empty($avatar)) {
			$d_t_d['avatar'] = $avatar;
		}
		$this->db->where('id', $id_user)->update('tb_user', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data admin berhasil diubah');
	}


	public function admin_delete($id)
	{
		$this->db->delete('tb_user', array('id' => $id));
	}



	public function admin_add_new(
		$username,
		$nip,
		$namalengkap,
		$password,
		$type,
		$avatar = 0
	) {
		$role = 0;
		if ($type == 'admin') {
			$role = 1;
		} else {
			$role = 2;
		}
		$d_t_d = array(
			'username' => $username,
			'nip' => $nip,
			'nama' => $namalengkap,
			'password' => md5($password),
			'id_role' => $role,
			'avatar' => $avatar
		);
		if (empty($avatar)) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_user', $d_t_d);
		$this->session->set_flashdata('msg_alert', $type . ' baru berhasil ditambahkan');
	}
}

/* End of file M_DataMaster.php */
/* Location: ./application/models/M_DataMaster.php */