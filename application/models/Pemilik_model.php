<?php

class Pemilik_model extends CI_Model
{
    public function getAllPemilik()
    {
        return $this->db->get('pemilik')->result_array();
    }
    public function tambahDataPemilik($data, $pemilik)
    {
        $this->db->insert($pemilik, $data);
    }
    public function hapusDataPemilik($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('pemilik', ['id' => $id]);
    }
    public function getPemilikById($id)
    {
        return $this->db->get_where('pemilik', ['id' => $id])->row_array();
    }

    public function join($peserta_pelatihan, $tbljoin, $join)
    {
        $this->db->join($tbljoin, $join);
        return $this->db->get($peserta_pelatihan);
    }
}
