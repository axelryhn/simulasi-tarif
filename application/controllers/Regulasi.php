<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regulasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Regulasi');
    }

    public function index()
    {

        $queryAllRegulasi = $this->M_Regulasi->getData();
        $DATA = array('queryAllRgl' => $queryAllRegulasi);
        $data = generate_page('Regulasi', 'Regulasi/index', 'Admin');

        $data['content'] = $this->load->view('partial/Regulasi/Regulasi',  $DATA, true);
        $this->load->view('V_Regulasi', $data);
    }




    public function halaman_tambah()
    {
        $this->load->view('partial/Regulasi/Regulasi');
    }

    public function halaman_edit($id)
    {
        $queryRegulasiDetail = $this->M_Regulasi->getDataDetail($id);
        $DATA = array('queryRglDetail' => $queryRegulasiDetail);
        $data = generate_page('Regulasi', 'Regulasi/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Regulasi/Regulasi_Edit',  $DATA, true);
        $this->load->view('V_Regulasi', $data);
    }

    public function fungsiTambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kering', 'Kering', 'required');
        $this->form_validation->set_rules('cair', 'Cair', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');



        $nama = $this->input->post('nama');
        $kering = $this->input->post('kering');
        $cair = $this->input->post('cair');
        $keterangan = $this->input->post('keterangan');

        $ArrInsert = array(
            'nama' => $nama,
            'kering' => $kering,
            'cair' => $cair,
            'keterangan' => $keterangan
        );
        if ($this->form_validation->run()) {
            $this->M_Regulasi->insertData($ArrInsert);
            $this->session->set_flashdata('msg_alert', 'Regulasi berhasil ditambah');
            redirect(base_url('Regulasi/index'));
        } else {
            $this->session->set_flashdata('msg_alert', 'Data Tidak Lengkap');
            redirect(base_url('Regulasi/index'));
        }
    }

    public function fungsiEdit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kering = $this->input->post('kering');
        $cair = $this->input->post('cair');
        $keterangan = $this->input->post('keterangan');

        $ArrUpdate = array(
            'nama' => $nama,
            'kering' => $kering,
            'cair' => $cair,
            'keterangan' => $keterangan
        );

        $this->M_Regulasi->updateData($id, $ArrUpdate);
        $this->session->set_flashdata('msg_alert', 'Regulasi berhasil diubah');
        redirect(base_url('Regulasi/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Regulasi->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Regulasi berhasil dihapus');
        redirect(base_url('Regulasi/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */