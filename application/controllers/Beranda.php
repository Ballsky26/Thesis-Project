<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelatihan_model');
        $this->load->model('Pemilik_model');
        $this->load->model('Berita_model');
        $this->load->model('Staff_model');
        $this->load->model('Daftar_Pelatihan_model');
        $this->load->model('Pesan_model');
        $this->load->model('Pendaftar_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $config['total_rows'] = $this->db->count_all_results();
        $data['title'] = 'Technopark Perikanan Kota Pekalongan';
        $data['total_rows'] = $config['total_rows'];
        $data['pemilik'] = $this->Pemilik_model->getAllPemilik();
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['staff2'] = $this->Staff_model->getAllStaff();
        $data['pelatihan'] = $this->Pelatihan_model->getAllPelatihan();

        $this->load->view('templates/home_header', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/home_footer');
    }
    public function Auth()
    {
        $this->load->view('auth/login');
    }
    public function detail_berita($id)
    {
        $data['title'] = 'Detail Berita';
        $data['berita'] = $this->Berita_model->getBeritaById($id);
        $this->load->view('beranda/home_header', $data);
        $this->load->view('beranda/detail_berita', $data);
        $this->load->view('beranda/home_footer');
    }
    public function kirim_pesan()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor_telpon = $this->input->post('nomor_telpon');
        $alamat = $this->input->post('alamat');
        $isi_pesan = $this->input->post('isi_pesan');

        $data = array(
            'email' => $email,
            'nama' => $nama,
            'nomor_telpon' => $nomor_telpon,
            'alamat' => $alamat,
            'isi_pesan' => $isi_pesan,
            'tanggal_kirim' => time()
        );
        $this->Pesan_model->kirim_pesan($data, 'pesan');
        $this->session->set_flashdata('flashhome', 'dikirim');
        redirect('beranda');
    }
    public function ukm_tenant()
    {
        $data['title'] = 'Pemilik UKM Tenant';
        $data['pemilik'] = $this->Pemilik_model->getallPemilik();

        $this->load->view('beranda/home_header', $data);
        $this->load->view('beranda/ukm_tenant', $data);
        $this->load->view('beranda/home_footer');
    }
    public function staff()
    {
        $data['title'] = 'Staff Pengelola Technopark Perikanan Kota Pekalongan';
        $data['staff2'] = $this->Staff_model->getAllStaff();

        $this->load->view('beranda/home_header', $data);
        $this->load->view('beranda/staff', $data);
        $this->load->view('beranda/home_footer');
    }
    public function detail_pemilik($id)
    {
        $data['title'] = 'Detail Pemilik UKM Tenant';
        $data['pemilik'] = $this->Pemilik_model->getPemilikById($id);
        $this->load->view('beranda/home_header', $data);
        $this->load->view('beranda/detail_pemilik', $data);
        $this->load->view('beranda/home_footer');
    }
    public function jadwal_pelatihan()
    {
        $data['title'] = 'Jadwal Pelatihan';
        $data['pelatihan'] = $this->Pelatihan_model->getAllPelatihan();

        $this->load->view('beranda/home_header', $data);
        $this->load->view('beranda/jadwal_pelatihan', $data);
        $this->load->view('beranda/home_footer');
    }
    public function detail_jadwal_pelatihan($id)
    {
        $data['title'] = 'Detail Jadwal Pelatihan';
        $data['jadwal'] = $this->Pelatihan_model->getPelatihanById($id);
        $this->load->view('beranda/home_header', $data);
        $this->load->view('beranda/detail_jadwal_pelatihan', $data);
        $this->load->view('beranda/home_footer');
    }
}
