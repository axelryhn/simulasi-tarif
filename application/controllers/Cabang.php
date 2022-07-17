<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Cabang');
    }

    public function index()
    {

        $queryAllCabang = $this->M_Cabang->getData();
        $DATA = array('queryAllCbg' => $queryAllCabang);
        $data = generate_page('Cabang', 'Cabang/index', 'Admin');

        $data['content'] = $this->load->view('partial/Cabang/Cabang',  $DATA, true);
        $this->load->view('V_Cabang', $data);
    }

    public function halaman_tambah()
    {
        $this->load->view('partial/Cabang/Cabang');
    }

    public function halaman_edit($id)
    {
        $queryCabangDetail = $this->M_Cabang->getDataDetail($id);
        $DATA = array('queryCbgDetail' => $queryCabangDetail);
        $data = generate_page('Cabang', 'Cabang/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Cabang/Cabang_Edit',  $DATA, true);
        $this->load->view('V_Cabang', $data);
    }

    public function fungsiTambah()
    {

        $cabang = $this->input->post('cabang');
        
        $jumlah = $this->input->post('jumlah');




        $ArrInsert = array(

            'cabang' => $cabang,
            'jumlah' => $jumlah

        );

        $this->M_Cabang->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Cabang berhasil ditambah');
        redirect(base_url('Cabang/index'));
    }


    public function fungsiEdit()
    {

        $id = $this->input->post('id');
        $cabang = $this->input->post('cabang');
        $jumlah = $this->input->post('jumlah');





        $ArrUpdate = array(
            'cabang' => $cabang,
            'jumlah' => $jumlah
        );

        $this->M_Cabang->updateData($id, $ArrUpdate);
        $this->session->set_flashdata('msg_alert', 'Data Cabang berhasil diubah');
        redirect(base_url('Cabang/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Cabang->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Cabang berhasil dihapus');
        redirect(base_url('Cabang/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */