<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ebook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Ebook');
    }

    public function index()
    {

        $queryAllEbook = $this->M_Ebook->getData();
        $DATA = array('queryAllEbk' => $queryAllEbook);
        $data = generate_page('Ebook', 'Ebook/index', 'Admin');

        $data['content'] = $this->load->view('partial/Ebook/Admin',  $DATA, true);
        $this->load->view('V_Ebook', $data);
    }

    public function indexpegawai()
    {

        $queryAllEbook = $this->M_Ebook->getData();
        $DATA = array('queryAllEbk' => $queryAllEbook);
        $data = generate_page('Ebook', 'Ebook/index', 'Pegawai');

        $data['content'] = $this->load->view('partial/Ebook/Pegawai',  $DATA, true);
        $this->load->view('V_Ebook', $data);
    }

    public function halaman_tambah()
    {
        $this->load->view('partial/Ebook/Admin');
    }

    public function halaman_edit($id)
    {
        $queryEbookDetail = $this->M_Ebook->getDataDetail($id);
        $DATA = array('queryEbkDetail' => $queryEbookDetail);
        $data = generate_page('Ebook', 'Ebook/halaman_edit', 'Admin');
        $data['content'] = $this->load->view('partial/Ebook/Admin_Edit',  $DATA, true);
        $this->load->view('V_Ebook', $data);
    }

    public function fungsiTambah()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $tahun = $this->input->post('tahun');
        $kategori = $this->input->post('kategori');
        $file = '';

        // file
        if ($this->security->xss_clean($_FILES["file"]) && $_FILES['file']['name']) {
            $config['upload_path']          = './uploads/ebook/';
            $config['allowed_types']        = 'pdf|xlsx|doc|docx';
            $config['max_size']             = 20000;
            $config['file_name']            = ($_FILES["file"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file') && !empty($_FILES['file']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Ebook/fungsiTambah/' . $judul . '/' . $id));
            } else {
                $file = $this->upload->data()['file_name'];
            }
        }


        $ArrInsert = array(
            'judul' => $judul,
            'tahun' => $tahun,
            'kategori' => $kategori,
            'file' => $file
        );

        $this->M_Ebook->insertData($ArrInsert);
        $this->session->set_flashdata('msg_alert', 'Data Ebook berhasil ditambah');
        redirect(base_url('Ebook/index'));
    }

    public function fungsiEdit()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $tahun = $this->input->post('tahun');
        $kategori = $this->input->post('kategori');
        $file = '';

        // file
        if ($this->security->xss_clean($_FILES["file"]) && $_FILES['file']['name']) {
            $config['upload_path']          = './uploads/ebook/';
            $config['allowed_types']        = 'pdf|xlsx|doc|docx';
            $config['max_size']             = 20000;
            $config['file_name']            = ($_FILES["file"]['name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file') && !empty($_FILES['file']['name'])) {
                $this->session->set_flashdata('msg_alert', $this->upload->display_errors());
                redirect(base_url('Realisasi/fungsiEdit/' . $judul . '/' . $id));
            } else {
                $file = $this->upload->data()['file_name'];
            }
        }


        $ArrUpdate = array(
            'judul' => $judul,
            'tahun' => $tahun,
            'kategori' => $kategori,
            'file' => $file
        );

        $this->M_Ebook->updateData($id, $ArrUpdate);
        $this->session->set_flashdata('msg_alert', 'Data Ebook berhasil diubah');
        redirect(base_url('Ebook/index'));
    }

    public function fungsiDelete($id)
    {
        $this->M_Ebook->deleteData($id);
        $this->session->set_flashdata('msg_alert', 'Data Ebook berhasil dihapus');
        redirect(base_url('Ebook/index'));
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */