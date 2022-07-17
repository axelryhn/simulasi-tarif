<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Report');
        isnt_login(function () {
            redirect(base_url('auth/login'));
        });
    }

    public function index()
    {
        switch ($this->session->userdata('user_type')) {
            case '1':
                $user = "Admin";
                break;
            case '2':
                $user = "Pegawai";
                break;
        }
        $data = generate_page('Report', 'Report/index', $user);
        $DATA = array('queryAllRpt' => $this->M_Report->getData());
        $data['title_page'] = 'Report';
        $data['content'] = $this->load->view('partial/Report/Report', $DATA, true);
        $data['controller'] = $this;
        $this->load->view('V_Report', $data);

        // print_r($data);
    }

    public function getNama($id)
    {
        $user = $this->M_Report->getNama($id);
        return $user->nama;
    }


    public function getTotal()
    {
        return  $this->M_Report->getTotal();
    }
}

	

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */