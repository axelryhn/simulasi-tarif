<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Inbox extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_inbox');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_inbox', $data);
        $this->session->set_flashdata('msg_alert', 'Data Inbox berhasil dikirim');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_inbox');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_inbox', $data);
        $this->session->set_flashdata('msg_alert', 'Data Inbox berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_inbox');
        $this->session->set_flashdata('msg_alert', 'Data Inbox berhasil dihapus');
    }
}

/* End of file M_Mahasiswa.php */
/* Location: ./application/models/M_Mahasiswa.php */