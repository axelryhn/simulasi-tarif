<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Cabang extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_cabang');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_cabang', $data);
        $this->session->set_flashdata('msg_alert', 'Data Cabang berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_cabang');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_cabang', $data);
        $this->session->set_flashdata('msg_alert', 'Data Cabang berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_cabang');
        $this->session->set_flashdata('msg_alert', 'Data Cabang berhasil dihapus');
    }
}
