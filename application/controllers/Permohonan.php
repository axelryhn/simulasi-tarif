<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{

    // private $m_strukturorganisasi;

    function __construct()
    {
        parent::__construct();
        isnt_login(function () {
            redirect(base_url('auth/login'));
        });
        // $this->load->model('M_StrukturOrganisasi');
        // $this->m_strukturorganisasi = $this->M_StrukturOrganisasi;
    }

    public function index()
    {
        $data = generate_page('Permohonan', 'Permohonan/index', 'Pegawai');

        $data_content['title_page'] = 'Permohonan';
        $data['content'] = $this->load->view('partial/Permohonan/Permohonan', $data_content, true);
        $this->load->view('V_Permohonan', $data);
    }

    public function permohonan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id', TRUE);
            $nama      = $this->input->post('nama', TRUE);
            $status      = $this->input->post('status', TRUE);
            $keterangan  = $this->input->post('keterangan', TRUE);

            $data = array(
                'id'            => $id,
                'nama'          => $nama,
                'status'          => $status,
                'keterangan'    => $keterangan
            );
            $this->M_Permohonan->insert('tb_permohonan', $data);
            $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Ditambahkan');
            redirect(base_url('partial/Permohonan/Permohonan'));
        } else {
            $data = $this->M_Permohonan->select('tb_permohonan');
            $this->load->view('partial/Permohonan/Permohonan', $data);
        }
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */