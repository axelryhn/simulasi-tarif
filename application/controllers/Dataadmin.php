<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_DataMaster');
        $this->m_datamaster = $this->M_DataMaster;
    }

    public function index()
    {

        $data = generate_page('Data Master Admin', 'data_master/admin', 'Admin');

        $data_content['title_page'] = 'Data Master Admin';
        $data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Read', $data_content, true);
        $this->load->view('V_DataMaster_Admin', $data);
    }

    public function halaman_tambah()
    {
        $this->load->view('partial/Statuspegawai/Statuspegawai');
    }

    public function halaman_edit($id)
    {
        $queryStatuspegawaiDetail = $this->M_Statuspegawai->getDataDetail($id);
        $DATA = array('queryStsDetail' => $queryStatuspegawaiDetail);
        $data = generate_page('Status Pegawai', 'Statuspegawai/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Statuspegawai/Statuspegawai_Edit',  $DATA, true);
        $this->load->view('V_Statuspegawai', $data);
    }

    public function fungsiTambah()
    {

        $status = $this->input->post('status');
        $total = $this->input->post('total');




        $ArrInsert = array(

            'status' => $status,
            'total' => $total

        );

        $this->M_Statuspegawai->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Status Pegawai berhasil ditambah');
        redirect(base_url('Statuspegawai/index'));
    }


    public function fungsiEdit()
    {

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $total = $this->input->post('total');


        $ArrUpdate = array(
            'status' => $status,
            'total' => $total
        );

        $this->M_Statuspegawai->updateData($id, $ArrUpdate);
        $this->session->set_flashdata('msg_alert', 'Data Status pegawai berhasil diubah');
        redirect(base_url('Statuspegawai/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Statuspegawai->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Status pegawai berhasil dihapus');
        redirect(base_url('Statuspegawai/index'));
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
                $value->id_role = ($value->id_role == '1') ? "Admin" : "Client";
                $value->avatar = '<img src="' . uploads_url('avatar/' . $value->avatar) . '" alt="image" />';
                $i++;
            }
            return array('data' => $new_arr);
        });
    }


    public function edit()
    {
        $id = $this->uri->segment('4');
        $name = "admin";
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
                $config['file_name']            = md5(time() . '_' . $_FILES["avatar"]['name']);

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
                redirect(base_url('Dataadmin/edit/' . $id));
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
            redirect(base_url('Dataadmin'));
        }


        $data = generate_page('Edit Data Master Admin', 'Dataadmin/edit/admin/' . $id, 'Admin');

        $data_content['title_page'] = 'Edit Data Master Admin';
        $data_content['data_admin'] = $this->m_datamaster->get_data_admin($id);
        $data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Edit', $data_content, true);
        $this->load->view('V_DataMaster_Admin', $data);
    }

    public function delete()
    {
        $id = $this->uri->segment('3');
        $this->m_datamaster->admin_delete($id);
        $this->session->set_flashdata('msg_alert', 'Akun admin berhasil dihapus');
        redirect(base_url('Dataadmin/'));
    }

    public function add_new()
    {
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
                $config['file_name']            = md5(time() . '_' . $_FILES["avatar"]['name']);

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
                redirect(base_url('Dataadmin/add_new/'));
            }
            $this->m_datamaster->admin_add_new(
                $username,
                $nip,
                $namalengkap,
                $password,
                $type,
                $avatar
            );
            redirect(base_url('Dataadmin/'));
        }
        $data = generate_page('Entry Data Master Admin', 'data_master/add_new/admin', 'Admin');

        $data_content['title_page'] = 'Entry Data Master Admin';
        $data['content'] = $this->load->view('partial/DataMasterAdmin/V_Admin_DataMasterAdmin_Create', $data_content, true);
        $this->load->view('V_DataMaster_Admin', $data);
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */