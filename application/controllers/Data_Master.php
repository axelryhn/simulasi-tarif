<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Master extends CI_Controller
{

	private $m_datamaster;

	function __construct()
	{
		parent::__construct();
		isnt_admin(function () {
			redirect(base_url('auth/login'));
		});
		$this->load->model('M_DataMaster');
		$this->load->model('M_Statuspegawai');
		$this->m_datamaster = $this->M_DataMaster;
	}

	public function index()
	{
		redirect(base_url('dashboard'));
	}

	public function admin()
	{
		$data = generate_page('Data Master Admin', 'data_master/admin', 'Admin');

		$data_content['title_page'] = 'Data Master Admin';
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);


		// $queryAllStatuspegawai = $this->M_Statuspegawai->getData();
		// $DATA = array('queryAllSts' => $queryAllStatuspegawai);
		// $data = generate_page('Status Pegawai', 'Statuspegawai/index', 'Admin');

		// $data['content'] = $this->load->view('partial/Statuspegawai/Statuspegawai',  $DATA, true);
		// $this->load->view('V_Statuspegawai', $data);
	}

	public function admin_ajax()
	{
		json_dump(function () {
			$result = $this->m_datamaster->admin_list_all();
			$new_arr = array();
			$i = 1;
			foreach ($result as $key => $value) {
				$value->no = $i;
				$new_arr[] = $value;
				$value->avatar = '<img src="' . uploads_url('avatar/' . $value->avatar) . '" alt="image" />';
				$i++;
			}
			return array('data' => $new_arr);
		});
	}





	public function pegawai()
	{
		$data = generate_page('Data Akun Pegawai', 'data_master/pegawai', 'Admin');

		$data_content['title_page'] = 'Data Akun Pegawai';
		$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Read', $data_content, true);
		$this->load->view('V_DataMaster_Admin', $data);
	}

	public function pegawai_ajax()
	{
		json_dump(function () {
			$result = $this->m_datamaster->pegawai_list_all();
			$new_arr = array();
			$i = 1;
			foreach ($result as $key => $value) {
				$value->no = $i;
				$new_arr[] = $value;
				$value->tanggal_lahir = date_format(date_create($value->tanggal_lahir), 'd/m/Y');
				$value->avatar = '<img src="' . uploads_url('avatar/' . $value->avatar) . '" alt="image" />';
				$i++;
			}
			return array('data' => $new_arr);
		});
	}



	public function delete()
	{
		if (empty($this->uri->segment('3'))) {
			redirect(base_url('/dashboard'));
		}

		if (empty($this->uri->segment('4'))) {
			redirect(base_url('/dashboard'));
		}

		$name = $this->uri->segment('3');
		$id = $this->uri->segment('4');

		switch ($name) {
			case 'admin':
				$this->m_datamaster->admin_delete($id);
				$this->session->set_flashdata('msg_alert', 'Akun admin berhasil dihapus');
				redirect(base_url('data_master/admin'));
				break;

			case 'pegawai':
				$this->m_datamaster->pegawai_delete($id);
				$this->session->set_flashdata('msg_alert', 'Data pegawai berhasil dihapus');
				redirect(base_url('data_master/pegawai'));
				break;


			default:
				redirect(base_url());
				break;
		}
	}

	public function edit()
	{
		// if (empty($this->uri->segment('3'))) {
		// 	redirect(base_url());
		// }

		// if (empty($this->uri->segment('4'))) {
		// 	redirect(base_url());
		// }

		$name = $this->uri->segment('3');
		$id = $this->uri->segment('4');

		switch ($name) {

			case 'pegawai':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$id = $this->security->xss_clean($this->input->post('id'));
					$nama = $this->security->xss_clean($this->input->post('nama'));
					$nip = $this->security->xss_clean($this->input->post('nip'));
					$tanggal_lahir = $this->security->xss_clean($this->input->post('tanggal_lahir'));
					$jenis_kelamin = $this->security->xss_clean($this->input->post('jenis_kelamin'));
					$unit_kerja = $this->security->xss_clean($this->input->post('unit_kerja'));
					$status_pegawai = $this->security->xss_clean($this->input->post('status_pegawai'));
					$password = $this->security->xss_clean($this->input->post('password'));
					$id_user = $this->security->xss_clean($this->input->post('id_user'));
					$avatar = '';
					// avatar
					if ($this->security->xss_clean($_FILES["avatar"]) && $_FILES['avatar']['name']) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect(base_url('data_master/edit/' . $name . '/' . $id));
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}

					// validasi
					$this->form_validation->set_rules('id', 'ID User', 'required');
					$this->form_validation->set_rules('nama', 'Nama', 'required');
					$this->form_validation->set_rules('nip', 'NIP', 'required');
					$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
					$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
					$this->form_validation->set_rules('unit_kerja', ' Unit Kerja', 'required');
					$this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required');
					$this->form_validation->set_rules('password', 'Password', '');
					$this->form_validation->set_rules('id_user', 'ID User', 'required');

					if (!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('data_master/edit/' . $name . '/' . $id));
					}
					// to-do
					$this->m_datamaster->pegawai_update(
						$id,
						$nama,
						$nip,
						$tanggal_lahir,
						$jenis_kelamin,
						$unit_kerja,
						$status_pegawai,
						$password,
						$id_user,
						$avatar
					);
					redirect(base_url('data_master/pegawai'));
				}
				$data = generate_page('Edit Data Master Pegawai', 'data_master/edit/' . $name . '/' . $id, 'Admin');


				$data_content['title_page'] = 'Edit Data Master Pegawai';
				$data_content['data_pegawai'] = $this->m_datamaster->get_data_pegawai($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'admin':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_user = $this->security->xss_clean($this->input->post('id_user'));
					$username = $this->security->xss_clean($this->input->post('username'));
					$nip = $this->security->xss_clean($this->input->post('nip'));
					$namalengkap = $this->security->xss_clean($this->input->post('namalengkap'));
					$password = $this->security->xss_clean($this->input->post('password'));
					$type = $this->security->xss_clean($this->input->post('type'));
					$avatar = '';
					// avatar
					if ($this->security->xss_clean($_FILES["avatar"]) && $_FILES['avatar']['name']) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect(base_url('data_master/edit/' . $name . '/' . $id));
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('id_user', 'id_user', 'required');
					$this->form_validation->set_rules('username', 'Username', 'required');
					$this->form_validation->set_rules('nip', 'Nip', 'required');
					$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
					$this->form_validation->set_rules('password', 'Password', '');
					$this->form_validation->set_rules('type', 'Type', 'required');

					if (!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('data_master/edit/' . $name . '/' . $id));
					}
					$this->m_datamaster->admin_update(
						$id_user,
						$username,
						$nip,
						$namalengkap,
						$password,
						$type,
						$avatar
					);
					redirect(base_url('data_master/' . $name));
				}

				$data = generate_page('Edit Data Master Admin', 'data_master/edit/' . $name . '/' . $id, 'Admin');

				$data_content['title_page'] = 'Edit Data Master Admin';
				$data_content['data_admin'] = $this->m_datamaster->get_data_admin($id);
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Edit', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
		}
	}

	public function add_new()
	{

		if (empty($this->uri->segment('3'))) {
			redirect(base_url());
		}

		$name = $this->uri->segment('3');

		switch ($name) {

			case 'admin':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$username = $this->security->xss_clean($this->input->post('username'));
					$nip = $this->security->xss_clean($this->input->post('nip'));
					$namalengkap = $this->security->xss_clean($this->input->post('namalengkap'));
					$password = $this->security->xss_clean($this->input->post('password'));
					$type = $this->security->xss_clean($this->input->post('type'));
					$avatar = '';
					// avatar
					if ($this->security->xss_clean($_FILES["avatar"]) && $_FILES['avatar']['name']) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect(base_url('data_master/edit/' . $name . '/' . $id));
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('username', 'Username', 'required');
					$this->form_validation->set_rules('nip', 'Nip', 'required');
					$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('type', 'Type', 'required');
					if (!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('data_master/add_new/' . $name));
					}
					$this->m_datamaster->admin_add_new(
						$username,
						$nip,
						$namalengkap,
						$password,
						$type,
						$avatar
					);
					redirect(base_url('data_master/' . $name));
				}
				$data = generate_page('Entry Data Master Admin', 'data_master/add_new/admin', 'Admin');

				$data_content['title_page'] = 'Entry Data Master Admin';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
			case 'pegawai':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama = $this->security->xss_clean($this->input->post('nama'));
					$nip = $this->security->xss_clean($this->input->post('nip'));
					$tanggal_lahir = $this->security->xss_clean($this->input->post('tanggal_lahir'));
					$jenis_kelamin = $this->security->xss_clean($this->input->post('jenis_kelamin'));
					$unit_kerja = $this->security->xss_clean($this->input->post('unit_kerja'));
					$status_pegawai = $this->security->xss_clean($this->input->post('status_pegawai'));
					$password = $this->security->xss_clean($this->input->post('password'));
					$id_user = $this->security->xss_clean($this->input->post('id_user'));
					$avatar = '';
					// avatar
					if ($this->security->xss_clean($_FILES["avatar"]) && $_FILES['avatar']['name']) {
						$config['upload_path']          = './uploads/avatar/';
						$config['allowed_types']        = 'jpg|jpeg|png';
						$config['max_size']             = 2000;
						$config['file_name']			= md5(time() . '_' . $_FILES["avatar"]['name']);

						$this->load->library('upload', $config);

						if (!$this->upload->do_upload('avatar') && !empty($_FILES['avatar']['name'])) {
							$this->session->set_flashdata('msg_alert', $this->upload->display_errors());
							redirect(base_url('data_master/edit/' . $name . '/' . $id));
						} else {
							$avatar = $this->upload->data()['file_name'];
						}
					}
					// validasi
					$this->form_validation->set_rules('nama', 'Nama', 'required');
					$this->form_validation->set_rules('nip', 'NIP', 'required');
					$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
					$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
					$this->form_validation->set_rules('unit_kerja', ' Unit Kerja', 'required');
					$this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required');

					$this->form_validation->set_rules('password', 'Password', 'required');
					$this->form_validation->set_rules('id_user', 'ID User', 'required');


					if (!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', validation_errors());
						redirect(base_url('data_master/add_new/' . $name));
					}
					// to-do
					$this->m_datamaster->pegawai_add_new(
						$nama,
						$nip,
						$tanggal_lahir,
						$jenis_kelamin,
						$unit_kerja,
						$status_pegawai,
						$password,
						$id_user,
						$avatar
					);
					redirect(base_url('data_master/' . $name));
				}
				$data = generate_page('Entry Data Master Pegawai', 'data_master/add_new/pegawai', 'Admin');


				$data_content['title_page'] = 'Entry Data Master Pegawai';
				$data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterPegawai_Create', $data_content, true);
				$this->load->view('V_DataMaster_Admin', $data);
				break;
		}
	}
}

/* End of file Data_Master.php */
/* Location: ./application/controllers/Data_Master.php */