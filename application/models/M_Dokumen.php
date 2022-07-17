<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dokumen extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_dokumen');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_dokumen', $data);
        $this->session->set_flashdata('msg_alert', 'Data dokumen berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_dokumen');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_dokumen', $data);
        $this->session->set_flashdata('msg_alert', 'Data dokumen berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_dokumen');
        $this->session->set_flashdata('msg_alert', 'Data dokumen berhasil dihapus');
    }
}
