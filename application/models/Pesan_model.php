<?php
class Pesan_model extends CI_Model
{
	//pesan
	public function tampil_pesan()
	{
		return $this->db->get('pesan')->result_array();
	}
	public function hapus_pesan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pesan');
	}
	public function getpesanbyid($id)
	{
		return $this->db->get_where('pesan', ['id' => $id])->row_array();
	}
	public function kirim_pesan($data, $pesan)
	{
		$this->db->insert($pesan, $data);
	}
}
