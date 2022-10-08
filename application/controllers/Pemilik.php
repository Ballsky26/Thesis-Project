<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(APPPATH . 'controllers/Base_controller.php');
class Pemilik extends Base_controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pelatihan_model');
        $this->load->model('Pemilik_model');
        $this->load->model('Staff_model');
        $this->load->model('Daftar_Pelatihan_model');
        $this->load->library('form_validation');
    }
    public function dashboard()
    {
        $data['title'] = 'Dashboard Pemilik';
        $data['pemilik'] = $this->db->get_where('pemilik', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('pemilik/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pemilik/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        // $data['pemilik'] = $this->Pemilik_model->getPemilikById($id);
        $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['pemilik'] = $this->db->get_where('pemilik', ['email' =>
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
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Belum diisi!',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pemilik/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pemilik/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $nama_produk = $this->input->post('nama_produk');
            $tagline_produk = $this->input->post('tagline_produk');
            $deskripsi_produk = $this->input->post('deskripsi_produk');
            $nik = $this->input->post('nik');
            $nama_pemilik = $this->input->post('nama_pemilik');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat = $this->input->post('alamat');
            $nomor_telpon = $this->input->post('nomor_telpon');
            $email = $this->input->post('email');
            $profil_usaha = $this->input->post('profil_usaha');
            $tentang_usaha = $this->input->post('tentang_usaha');
            $foto_profil = $_FILES['foto_profil'];
            if ($foto_profil == '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_profil')) {
                    $old_image = $data['pemilik']['foto_profil'];
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
                    $old_image = $data['pemilik']['foto_ktp'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar/' . $old_image);
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
                    $old_image = $data['pemilik']['foto_produk'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_produk', $new_image);
                } else {
                    $foto_produk = $this->upload->data('file_name');
                }
            }
            $foto_produk2 = $_FILES['foto_produk2'];
            if ($foto_produk2 == '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk2')) {
                    $old_image = $data['pemilik']['foto_produk2'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_produk2', $new_image);
                } else {
                    $foto_produk2 = $this->upload->data('file_name');
                }
            }
            $foto_produk3 = $_FILES['foto_produk3'];
            if ($foto_produk3 == '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk3')) {
                    $old_image = $data['pemilik']['foto_produk3'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_produk3', $new_image);
                } else {
                    $foto_produk3 = $this->upload->data('file_name');
                }
            }
            $foto_produk4 = $_FILES['foto_produk4'];
            if ($foto_produk4 == '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk4')) {
                    $old_image = $data['pemilik']['foto_produk4'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_produk4', $new_image);
                } else {
                    $foto_produk4 = $this->upload->data('file_name');
                }
            }
            $foto_produk5 = $_FILES['foto_produk5'];
            if ($foto_produk5 == '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk5')) {
                    $old_image = $data['pemilik']['foto_produk5'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_produk5', $new_image);
                } else {
                    $foto_produk5 = $this->upload->data('file_name');
                }
            }
            $this->db->set('nama_produk', $nama_produk);
            $this->db->set('tagline_produk', $tagline_produk);
            $this->db->set('deskripsi_produk', $deskripsi_produk);
            $this->db->set('nik', $nik);
            $this->db->set('nama_pemilik', $nama_pemilik);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->set('tanggal_lahir', $tanggal_lahir);
            $this->db->set('alamat', $alamat);
            $this->db->set('nomor_telpon', $nomor_telpon);
            $this->db->set('email', $email);
            $this->db->set('profil_usaha', $profil_usaha);
            $this->db->set('tentang_usaha', $tentang_usaha);
            $this->db->where('id', $id);
            $this->db->update('pemilik');
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pemilik/dashboard');
        }
    }
    public function edit_password()
    {
        $data['title'] = 'Edit Password';
        $data['pemilik'] = $this->db->get_where('pemilik', ['email' =>
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
            $this->load->view('pemilik/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pemilik/edit_password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['pemilik']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <div class="alert-title">Password Salah</div>
                 Password Lama Salah
                    </div>'
                );
                redirect('pemilik/edit_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                            <div class="alert-title">Password tidak sama</div>
                         Password Baru tidak sama dengan password lama
                            </div>'
                    );
                    redirect('pemilik/edit_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('pemilik');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <div class="alert-title">Success</div>
                    Password berhasil diubah
                        </div>'
                    );
                    redirect('pemilik/edit_password');
                }
            }
        }
    }
    public function agenda_pelatihan()
    {
        $data['title'] = 'Agenda Pelatihan';
        $data['pelatihan'] = $this->Pelatihan_model->getAllPelatihan();

        $data['pemilik'] = $this->db->get_where('pemilik', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('pemilik/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pemilik/agenda_pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function detail_agenda_pelatihan($id)
    {
        $this->form_validation->set_rules('jadwal_id', 'Pilih Jadwal', 'required', [
            'required' => 'Pilih jadwal',
        ]);

        $pemilik_id = $this->input->post('pemilik_id');

        $data_submit = [
            'jadwal_id' => $id,
            'pemilik_id' => $pemilik_id,
            'status' => 'Proses',
            'tanggal_daftar' => date("Y-m-d H:i:s"),
        ];

        // cek apakah pemilik sudah mendaftar pelatihan ini
        $cek = $this->Daftar_Pelatihan_model->cek_pendaftar($data_submit);

        if ($this->form_validation->run() == FALSE || $cek > 0) {

            $data['title'] = 'Detail Jadwal Pelatihan';
            $data['pemilik_id'] = $this->session->userdata('pemilik_id');
            $data['jadwal_id'] = $id;
            $data['pemilik'] = $this->db->get_where('pemilik', ['email' =>
            $this->session->userdata('email')])->row_array();
            //pisah
            if ($cek > 0) {
                $data['pesan_error'] = "Peserta sudah mendaftar pelatihan tersebut";
            }

            $data['jadwal'] = $this->Pelatihan_model->getPelatihanById($id);

            $this->load->view('templates/header', $data);
            $this->load->view('pemilik/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pemilik/detail_agenda_pelatihan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Daftar_Pelatihan_model->add_pendaftar($data_submit);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            return redirect(base_url() . 'pemilik/daftar_pelatihan');
        }
    }

    public function cetak_kartu($id_peserta)
    {
        $mpdf = new \Mpdf\Mpdf();

        $peserta_pelatihan = $this->Daftar_Pelatihan_model->cetak_kartu($id_peserta);

        $data_cetak = [
            'title' => 'Cetak Kartu Peserta',
            'peserta_pelatihan' => $peserta_pelatihan,
        ];
        // $data['bulan_indo'] = $this->bulan_indo;
        $data = $this->load->view('pemilik/cetak_kartu', $data_cetak, TRUE);

        $mpdf->WriteHTML($data);
        $mpdf->output('Kartu Peserta.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function daftar_pelatihan()
    {
        $data['title'] = 'Daftar Pelatihan';
        $data['pemilik'] = $this->db->get_where('pemilik', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['peserta_pelatihan'] = $this->Daftar_Pelatihan_model->getAllDaftarPelatihan($this->session->userdata('pemilik_id'));

        $this->load->view('templates/header', $data);
        $this->load->view('pemilik/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pemilik/daftar_pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function hapus_daftar_pelatihan($id_peserta)
    {
        $this->Daftar_Pelatihan_model->hapusDaftarPelatihan($id_peserta);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pemilik/daftar_pelatihan');
    }
}
