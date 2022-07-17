<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Report extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_report');
        return $query->result();
    }

    function getNama($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_user');
        return $query->row();
    }

    function getTotal()
    {
        $this->db->select('*');
        $this->db->from('tb_report');
        $this->db->where('jenis', 'cair');

        $totalCair =  $this->db->count_all_results();

        $this->db->select('*');
        $this->db->from('tb_report');
        $this->db->where('jenis', 'kering');

        $totalKering =  $this->db->count_all_results();

        $this->db->select_sum('value');
        $this->db->where('jenis', 'cair');
        $result = $this->db->get('tb_report')->row();
        $totalValueCair = $result->value;


        $this->db->select_sum('value');
        $this->db->where('jenis', 'kering');
        $result = $this->db->get('tb_report')->row();
        $totalValueKering = $result->value;

        $dataTotal = array("totalCair" => $totalCair, "totalKering" => $totalKering, "totalValueCair" => $totalValueCair, "totalValueKering" => $totalValueKering);

        return $dataTotal;
    }
}
