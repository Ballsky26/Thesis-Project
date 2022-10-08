<?php

class Daftar_Pelatihan_model extends CI_Model
{
    public function getAllDaftarPelatihan($pemilik_id = 0)
    {
        $where = "";

        if ($pemilik_id != 0) {
            $where .= " AND pp.pemilik_id = $pemilik_id ";
        }

        $sql = "SELECT p.nama_pemilik, pp.id_peserta, pp.status, pp.tanggal_daftar, j.nama_kegiatan, j.tanggal_mulai, j.pemateri FROM `peserta_pelatihan` pp INNER JOIN jadwal j ON pp.jadwal_id = j.id INNER JOIN pemilik p ON pp.pemilik_id = p.id WHERE 0 = 0 $where;";

        return $this->db->query($sql)->result_array();
    }
    public function getDaftarPesertaById($id_peserta)
    {
        $sql = "SELECT j.nama_kegiatan, p.nama_pemilik,  pp.tanggal_daftar, pp.status,  pp.id_peserta FROM `peserta_pelatihan` pp INNER JOIN jadwal j ON pp.jadwal_id = j.id INNER JOIN pemilik p ON pp.pemilik_id = p.id WHERE pp.id_peserta = $id_peserta;";
        return $this->db->query($sql)->row_array();
    }
    public function cetak_kartu($id_peserta)
    {
        $sql = "SELECT j.nama_kegiatan, p.nama_pemilik, p.foto_profil,  pp.tanggal_daftar, pp.status,  pp.id_peserta FROM `peserta_pelatihan` pp INNER JOIN jadwal j ON pp.jadwal_id = j.id INNER JOIN pemilik p ON pp.pemilik_id = p.id WHERE pp.id_peserta = $id_peserta;";
        return $this->db->query($sql)->row_array();
    }
    public function tambahDataDaftarPelatihan($data, $peserta_pelatihan)
    {
        $this->db->insert($peserta_pelatihan, $data);
    }

    public function hapusDaftarPelatihan($id_peserta)
    {
        // $this->db->where('id', $id);
        $this->db->delete('peserta_pelatihan', ['id_peserta' => $id_peserta]);
    }


    public function DaftarPelatihan()
    {
        $this->db->select('*');
        $this->db->form('peserta_pelatihan');
        $this->db->join('peserta_pelatihan', 'pemilik.pemilik_id = jadwal.jadwal_id');
        return $this->db->get('');
    }

    public function join($table, $tbljoin, $join)
    {
        $this->db->join($tbljoin, $join);
        return $this->db->get($table);
    }

    public function add_pendaftar($data)
    {
        $this->db->insert('peserta_pelatihan', $data);
    }

    public function cek_pendaftar($data)
    {
        return $this->db->get_where('peserta_pelatihan', [
            'jadwal_id' => $data['jadwal_id'],
            'pemilik_id' => $data['pemilik_id'],
        ])->num_rows();
    }
    // public function tambah()
    // {
    //     $this->db->trans_start();

    //     $peserta_pelatihan = [
    //         'tanggal_daftar' => $this->input->post('tanggal_daftar', true)
    //     ];

    //     $this->db->insert('peserta_pelatihan', $peserta_pelatihan);
    //     $last_id = $this->db->insert_id();

    //     $pemilik = [
    //         'id_peserta' => $last_id,
    //         'nik' =>  $this->input->post('nik', true),
    //         'nama_pemilik' =>   $this->input->post('nama_pemilik', true),
    //         'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
    //         'tempat_lahir' =>  $this->input->post('tempat_lahir', true),
    //         'tanggal_lahir' =>  $this->input->post('tanggal_lahir', true),
    //         'alamat' => $this->input->post('alamat', true),
    //         'nomor_telpon' =>  $this->input->post('nomor_telpon', true)
    //     ];

    //     $this->db->insert('pemilik', $pemilik);

    //     $jadwal = [
    //         'id_peserta' => $last_id,
    //         'nama_kegiatan' =>  $this->input->post('nama_kegiatan', true),
    //         'tanggal_mulai' =>   $this->input->post('tanggal_mulai', true),
    //         'waktu' => $this->input->post('waktu', true),
    //         'pemateri' =>  $this->input->post('pemateri', true),

    //     ];

    //     $this->db->insert('jadwal', $jadwal);
    //     $this->db->trans_complete();

    //     if ($this->db->trans_status() == false) {
    //         echo 'Gagal';
    //     } else {
    //         echo 'Berhasil';
    //     }
    // }
}
