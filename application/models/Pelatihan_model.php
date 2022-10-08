<?php

class Pelatihan_model extends CI_Model
{

    public function getAllPelatihan()
    {
        return $this->db->get('jadwal')->result_array();
    }
    public function tambahDataPelatihan($data, $jadwal)
    {
        $this->db->insert($jadwal, $data);
    }
    public function hapusDataPelatihan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwal');
    }
    public function getPelatihanById($id)
    {
        return $this->db->get_where('jadwal', ['id' => $id])->row_array();
    }
}
