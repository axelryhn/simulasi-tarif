<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuspegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Statuspegawai');
    }

    public function index()
    {

        $queryAllStatuspegawai = $this->M_Statuspegawai->getData();
        $DATA = array('queryAllSts' => $queryAllStatuspegawai);
        $data = generate_page('Status Pegawai', 'Statuspegawai/index', 'Admin');

        $data['content'] = $this->load->view('partial/Statuspegawai/Statuspegawai',  $DATA, true);
        $this->load->view('V_Statuspegawai', $data);
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
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */