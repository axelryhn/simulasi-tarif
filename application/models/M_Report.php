<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Report extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_report');
        return $query->result();
    }
}
