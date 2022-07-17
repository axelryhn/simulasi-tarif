<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Ebook extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_ebook');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_ebook', $data);
        $this->session->set_flashdata('msg_alert', 'Data ebook berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_ebook');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_ebook', $data);
        $this->session->set_flashdata('msg_alert', 'Data ebook berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_ebook');
        $this->session->set_flashdata('msg_alert', 'Data ebook berhasil dihapus');
    }
}
