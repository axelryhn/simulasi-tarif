<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Datapegawai');
    }

    public function index()
    {

        $queryAllDatapegawai = $this->M_Datapegawai->getData();
        $DATA = array('queryAllPgw' => $queryAllDatapegawai);
        $data = generate_page('Datapegawai', 'Datapegawai/index', 'Admin');

        $data['content'] = $this->load->view('partial/Datapegawai/Pegawai',  $DATA, true);
        $this->load->view('V_Datapegawai', $data);
    }

    public function halaman_tambah()
    {
        $this->load->view('partial/Datapegawai/Pegawai');
    }

    public function halaman_edit($id)
    {
        $queryDatapegawaiDetail = $this->M_Datapegawai->getDataDetail($id);
        $DATA = array('queryPgwDetail' => $queryDatapegawaiDetail);
        $data = generate_page('Datapegawai', 'Datapegawai/halaman_edit', 'Pegawai');
        $data['content'] = $this->load->view('partial/Datapegawai/Pegawai_Edit',  $DATA, true);
        $this->load->view('V_Datapegawai', $data);
    }

    public function fungsiTambah()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $umur = $this->input->post('umur');
        $kelas = $this->input->post('kelas');
        $kategori = $this->input->post('kategori');
        $unit_kerja = $this->input->post('unit_kerja');
        $jabatan = $this->input->post('jabatan');
        $cabang = $this->input->post('cabang');
        $status_pegawai = $this->input->post('status_pegawai');
        $dokumen = '';


        // dokumen
        if ($this->security->xss_clean($_FILES["dokumen"]) && $_FILES['dokumen']['name']) {
            $config['upload_path']          = './uploads/dokumen/';
            $config['allowed_types']        = 'pdf|xlsx|doc|docx';
            $config['max_size']             = 200000;
            $config['file_name']            = ($_FILES["dokumen"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen') && !empty($_FILES['dokumen']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Datapegawai/fungsiTambah/' . $nip . '/' . $id));
            } else {
                $dokumen = $this->upload->data()['file_name'];
            }
        }

        $ArrInsert = array(
            'nip' => $nip,
            'nama' => $nama,
            'umur' => $umur,
            'kelas' => $kelas,
            'kategori' => $kategori,
            'unit_kerja' => $unit_kerja,
            'jabatan' => $jabatan,
            'cabang' => $cabang,
            'status_pegawai' => $status_pegawai,
            // 'avatar' => $avatar,
            'dokumen' => $dokumen
        );

        $this->M_Datapegawai->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Pegawai berhasil ditambah');
        redirect(base_url('Datapegawai/index'));
    }


    public function fungsiEdit()
    {

        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $umur = $this->input->post('umur');
        $kelas = $this->input->post('kelas');
        $kategori = $this->input->post('kategori');
        $unit_kerja = $this->input->post('unit_kerja');
        $jabatan = $this->input->post('jabatan');
        $cabang = $this->input->post('cabang');
        $status_pegawai = $this->input->post('status_pegawai');
        $dokumen = '';

        // dokumen
        if ($this->security->xss_clean($_FILES["dokumen"]) && $_FILES['dokumen']['name']) {
            $config['upload_path']          = './uploads/cv/';
            $config['allowed_types']        = 'pdf|xlsx|doc|docx';
            $config['max_size']             = 200000;
            $config['file_name']            = ($_FILES["dokumen"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('dokumen') && !empty($_FILES['dokumen']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Datapegawai/fungsiTambah/' . $nip . '/' . $id));
            } else {
                $dokumen = $this->upload->data()['file_name'];
            }
        }


        $ArrUpdate = array(
            'nip' => $nip,
            'nama' => $nama,
            'umur' => $umur,
            'kelas' => $kelas,
            'kategori' => $kategori,
            'unit_kerja' => $unit_kerja,
            'jabatan' => $jabatan,
            'cabang' => $cabang,
            'status_pegawai' => $status_pegawai,
            // 'avatar' => $avatar,
            'dokumen' => $dokumen
        );

        $this->M_Datapegawai->updateData($id, $ArrUpdate);
        $this->session->set_flashdata('msg_alert', 'Data Pegawai berhasil diubah');
        redirect(base_url('Datapegawai/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Datapegawai->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Pegawai berhasil dihapus');
        redirect(base_url('Datapegawai/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */