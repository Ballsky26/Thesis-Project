<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pendaftar_model');
        $this->load->library('form_validation');
    }
    public function dashboard()
    {
        $data['title'] = 'Dashboard Pendaftar';
        $data['pendaftar'] = $this->db->get_where('pendaftar', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('pendaftar/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendaftar/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['pendaftar'] = $this->db->get_where('pendaftar', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', [
            'required' => 'Nama Produk Belum diisi!'
        ]);
        $this->form_validation->set_rules('tagline_produk', 'Tagline Produk', 'required', [
            'required' => 'Tagline Produk Belum diisi!'
        ]);
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required', [
            'required' => 'Deskripsi Produk Belum diisi!'
        ]);
        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required|numeric', [
            'required' => 'Nik Belum diisi!',
            'numeric' => 'Hanya boleh menulis angka!'
        ]);
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required', [
            'required' => 'Nama Pemilik Belum diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
            'required' => 'Tanggal Lahir Belum diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Belum diisi!'
        ]);
        $this->form_validation->set_rules('nomor_telpon', 'Nomor Telpon', 'required|numeric', [
            'required' => 'Nomor Telpon Belum diisi!',
            'numeric' => 'Hanya boleh menulis angka!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pendaftar/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pendaftar/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {

            $id = $this->input->post('id');
            $nik = $this->input->post('nik');
            $nama_pemilik = $this->input->post('nama_pemilik');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $nomor_telpon = $this->input->post('nomor_telpon');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $nama_produk = $this->input->post('nama_produk');
            $tagline_produk = $this->input->post('tagline_produk');
            $deskripsi_produk = $this->input->post('deskripsi_produk');

            $foto_profil = $_FILES['foto_profil'];
            if ($foto_profil == '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_profil')) {
                    $old_image = $data['pendaftar']['foto_profil'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_profil', $new_image);
                } else {
                    $foto_profil = $this->upload->data('file_name');
                }
            }
            $foto_ktp = $_FILES['foto_ktp'];
            if ($foto_ktp == '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_ktp')) {
                    $old_image = $data['pendaftar']['foto_ktp'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/pendaftar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_ktp', $new_image);
                } else {
                    $foto_ktp = $this->upload->data('file_name');
                }
            }
            $foto_produk = $_FILES['foto_produk'];
            if ($foto_produk == '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk')) {
                    $old_image = $data['pendaftar']['foto_produk'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/pendaftar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_produk', $new_image);
                } else {
                    $foto_produk = $this->upload->data('file_name');
                }
            }
            $this->db->set('nik', $nik);
            $this->db->set('nama_pemilik', $nama_pemilik);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->set('alamat', $alamat);
            $this->db->set('nomor_telpon', $nomor_telpon);
            $this->db->set('tanggal_lahir', $tanggal_lahir);
            $this->db->set('nama_produk', $nama_produk);
            $this->db->set('tagline_produk', $tagline_produk);
            $this->db->set('deskripsi_produk', $deskripsi_produk);
            $this->db->where('email', $email);
            $this->db->where('id', $id);
            $this->db->update('pendaftar');
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pendaftar/dashboard');
        }
    }

    public function edit_password()
    {
        $data['title'] = 'Edit Password';
        $data['pendaftar'] = $this->db->get_where('pendaftar', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim', [
            'required' => 'Password Lama belum diisi!'
        ]);
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]', [
            'required' => 'Password Baru belum diisi',
            'min_length' => 'Password minimal 3 Karakter',
            'matches' => 'Password harus sama'
        ]);
        $this->form_validation->set_rules('new_password2', 'Ulangi Password Baru', 'required|trim|min_length[3]|matches[new_password1]', [
            'required' => 'Password Baru belum diisi',
            'min_length' => 'Password minimal 3 Karakter',
            'matches' => 'Password harus sama'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pendaftar/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pendaftar/edit_password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['pendaftar']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <div class="alert-title">Password Salah</div>
                 Password Lama Salah
                    </div>'
                );
                redirect('pendaftar/edit_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                            <div class="alert-title">Password tidak sama</div>
                         Password Baru tidak sama dengan password lama
                            </div>'
                    );
                    redirect('pendaftar/edit_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('pendaftar');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <div class="alert-title">Success</div>
                    Password berhasil diubah
                        </div>'
                    );
                    redirect('pendaftar/edit_password');
                }
            }
        }
    }
}
