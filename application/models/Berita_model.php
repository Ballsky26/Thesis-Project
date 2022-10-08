<?php

class Berita_model extends CI_Model
{
    public function getAllBerita()
    {
        return $this->db->get('berita')->result_array();
    }
    public function tambahDataBerita($data, $berita)
    {
        $this->db->insert($berita, $data);
    }
    public function hapusDataBerita($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('berita');
    }
    public function getBeritaById($id)
    {
        return $this->db->get_where('berita', ['id' => $id])->row_array();
    }
}
