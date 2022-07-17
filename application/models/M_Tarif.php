<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Tarif extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_regulasi');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_regulasi', $data);
        $this->session->set_flashdata('msg_alert', 'Data regulasi berhasil ditambah');
    }

    function insertReport($data)
    {
        $this->db->insert('tb_report', $data);
        $this->session->set_flashdata('msg_alert', 'Data regulasi berhasil ditambah');
    }


    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_regulasi');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_regulasi', $data);
        $this->session->set_flashdata('msg_alert', 'Data regulasi berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_regulasi');
        $this->session->set_flashdata('msg_alert', 'Data regulasi berhasil dihapus');
    }
}
