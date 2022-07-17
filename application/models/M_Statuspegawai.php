<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Statuspegawai extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_statuspegawai');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_statuspegawai', $data);
        $this->session->set_flashdata('msg_alert', 'Data Status Pegawai berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_statuspegawai');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_statuspegawai', $data);
        $this->session->set_flashdata('msg_alert', 'Data Status Pegawai berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_statuspegawai');
        $this->session->set_flashdata('msg_alert', 'Data Status Pegawai berhasil dihapus');
    }
}
