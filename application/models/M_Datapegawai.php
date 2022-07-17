<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Datapegawai extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_datapegawai');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_datapegawai', $data);
        $this->session->set_flashdata('msg_alert', 'Data Pegawai berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_datapegawai');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_datapegawai', $data);
        $this->session->set_flashdata('msg_alert', 'Data Pegawai berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_datapegawai');
        $this->session->set_flashdata('msg_alert', 'Data Pegawai berhasil dihapus');
    }
}
