<?php

class Pendaftar_model extends CI_Model
{
    public function getAllPendaftar()
    {
        return $this->db->get('pendaftar')->result_array();
    }
    public function tambahDataPendaftar($data, $pendaftar)
    {
        $this->db->insert($pendaftar, $data);
    }
    public function hapusDataPendaftar($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('pendaftar', ['id' => $id]);
    }
    public function getPendaftarById($id)
    {
        return $this->db->get_where('pendaftar', ['id' => $id])->row_array();
    }
    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
