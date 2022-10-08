<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(APPPATH . 'controllers/Base_controller.php');
class Admin extends Base_controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pelatihan_model');
        $this->load->model('Pemilik_model');
        $this->load->model('Berita_model');
        $this->load->model('Staff_model');
        $this->load->model('Pesan_model');
        $this->load->model('Pendaftar_model');
        $this->load->model('Daftar_Pelatihan_model');
        $this->load->library('form_validation');
    }
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];

        $data['staff2'] = $this->Staff_model->getAllStaff();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function myprofile()
    {
        $data['title'] = 'My Profile';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Lengkap Belum diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
            'required' => 'Tempat Lahir Belum diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
            'required' => 'Tanggal Lahir Belum diisi!'
        ]);
        $this->form_validation->set_rules('bio', 'Bio', 'required', [
            'required' => 'Bio Belum diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email belum diisi!',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('nik', 'Nik', 'required', [
            'required' => 'Nik Belum diisi!'
        ]);
        $this->form_validation->set_rules('nomor_telpon', 'Nomor Telpon', 'required', [
            'required' => 'Nomor Telpon Belum diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Belum diisi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/myprofile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $bio = $this->input->post('bio');
            $nik = $this->input->post('nik');
            $nomor_telpon = $this->input->post('nomor_telpon');
            $alamat = $this->input->post('alamat');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $nomor_telpon = $this->input->post('nomor_telpon');
            $upload_image = $_FILES['foto'];
            if ($upload_image) {
                $config['upload_path']          = './assets/login/img/staff/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/login/img/staff/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('bio', $bio);
            $this->db->set('nik', $nik);
            $this->db->set('nomor_telpon', $nomor_telpon);
            $this->db->set('alamat', $alamat);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tanggal_lahir', $tanggal_lahir);
            $this->db->set('nomor_telpon', $nomor_telpon);
            $this->db->where('email', $email);
            $this->db->update('staff');

            $this->session->set_flashdata('flash', 'Diubah');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                <div class="alert-title">Success</div>
            Data berhasil diubah
                </div>'
            );
            redirect('admin/myprofile');
        }
    }
    public function edit_password()
    {
        $data['title'] = 'Ganti Password';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
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
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['staff']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <div class="alert-title">Password Salah</div>
                 Password Lama Salah
                    </div>'
                );
                redirect('admin/edit_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                            <div class="alert-title">Password tidak sama</div>
                         Password Baru tidak sama dengan password lama
                            </div>'
                    );
                    redirect('admin/edit_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('staff');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <div class="alert-title">Success</div>
                    Password berhasil diubah
                        </div>'
                    );
                    redirect('admin/edit_password');
                }
            }
        }
    }
    public function pelatihan()
    {
        $data['pelatihan'] = $this->Pelatihan_model->getAllPelatihan();
        $data['title'] = 'Agenda Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_pelatihan()
    {
        $data['title'] = 'Form Tambah Jadwal Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required', [
            'required' => 'Nama Kegiatan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required', [
            'required' => 'Tanggal Mulai tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pemateri', 'Nama Pemateri', 'required', [
            'required' => 'Nama Pemateri tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tempat', 'Nama Tempat', 'required', [
            'required' => 'Nama Tempat Pelatihan tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambah_pelatihan', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $waktu = $this->input->post('waktu');
            $pemateri = $this->input->post('pemateri');
            $status = $this->input->post('status');
            $tempat = $this->input->post('tempat');
            $materi_pelatihan = $_FILES['materi_pelatihan'];
            if ($materi_pelatihan = '') {
            } else {
                $config['upload_path']          = './assets/login/img/materi_pelatihan';
                $config['allowed_types']        = 'doc|docx|pdf';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('materi_pelatihan')) {
                    echo $this->upload->display_errors();
                } else {
                    $materi_pelatihan = $this->upload->data('file_name');
                }
            }
            $profil_pemateri = $_FILES['profil_pemateri'];
            if ($profil_pemateri = '') {
            } else {
                $config['upload_path']          = './assets/login/img/jadwal/profil_pemateri';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('profil_pemateri')) {
                    echo $this->upload->display_errors();
                } else {
                    $profil_pemateri = $this->upload->data('file_name');
                }
            }
            $data = array(
                'nama_kegiatan' => $nama_kegiatan,
                'tanggal_mulai' => $tanggal_mulai,
                'waktu' => $waktu,
                'pemateri' => $pemateri,
                'status' => $status,
                'tempat' => $tempat,
                'materi_pelatihan' => $materi_pelatihan,
                'profil_pemateri' => $profil_pemateri
            );

            $this->Pelatihan_model->tambahDataPelatihan($data, 'jadwal');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pelatihan');
        }
    }
    public function hapus_pelatihan($id)
    {
        $this->Pelatihan_model->hapusDataPelatihan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pelatihan');
    }
    public function detail_pelatihan($id)
    {
        $data['title'] = 'Detail Jadwal Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jadwal'] = $this->Pelatihan_model->getPelatihanById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detail_pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function edit_pelatihan($id)
    {
        $data['title'] = 'Form Edit Jadwal Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['jadwal'] = $this->Pelatihan_model->getPelatihanById($id);
        $data['status'] = ['Buka', 'Tutup'];
        $data['waktu'] = ['08.00-08.45', '08.45-09.30', '09.30-09.45', '09.45-10.30', '10.30-11.15'];

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required', [
            'required' => 'Nama Kegiatan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required', [
            'required' => 'Tanggal Mulai tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pemateri', 'Nama Pemateri', 'required', [
            'required' => 'Nama Pemateri tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tempat', 'Nama Tempat', 'required', [
            'required' => 'Nama Tempat Pelatihan tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_pelatihan', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_kegiatan = $this->input->post('nama_kegiatan', true);
            $tanggal_mulai = $this->input->post('tanggal_mulai', true);
            $waktu = $this->input->post('waktu', true);
            $pemateri = $this->input->post('pemateri', true);
            $status = $this->input->post('status', true);
            $tempat = $this->input->post('tempat', true);
            $materi_pelatihan = $_FILES['materi_pelatihan'];
            if ($materi_pelatihan == '') {
            } else {
                $config['upload_path']          = './assets/login/img/materi_pelatihan';
                $config['allowed_types']        = 'doc|docx|pdf';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('materi_pelatihan')) {
                    $old_image = $data['jadwal']['materi_pelatihan'];
                    if ($old_image != '') {
                        unlink(FCPATH . './assets/login/img/materi_pelatihan' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('materi_pelatihan', $new_image);
                } else {
                    $materi_pelatihan = $this->upload->data('file_name');
                }
            }
            $profil_pemateri = $_FILES['profil_pemateri'];
            if ($profil_pemateri == '') {
            } else {
                $config['upload_path']          = './assets/login/img/jadwal/profil_pemateri';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('profil_pemateri')) {
                    $old_image = $data['jadwal']['profil_pemateri'];
                    if ($old_image != '') {
                        unlink(FCPATH . './assets/login/img/jadwal/profil_pemateri' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('profil_pemateri', $new_image);
                } else {
                    $profil_pemateri = $this->upload->data('file_name');
                }
            }
            $this->db->set('nama_kegiatan', $nama_kegiatan);
            $this->db->set('tanggal_mulai', $tanggal_mulai);
            $this->db->set('waktu', $waktu);
            $this->db->set('pemateri', $pemateri);
            $this->db->set('status', $status);
            $this->db->set('tempat', $tempat);
            $this->db->where('id', $id);
            $this->db->update('jadwal');
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/pelatihan');
        }
    }
    public function export_pdf_pelatihan()
    {
        $mpdf = new \Mpdf\Mpdf();
        $jadwal = $this->Pelatihan_model->getAllPelatihan();
        $data = $this->load->view('admin/export_pdf_pelatihan', ['jadwalpelatihan' => $jadwal], TRUE);
        $mpdf->setFooter('{PAGENO}');
        $mpdf->AddPage('');
        $mpdf->WriteHTML($data);
        $mpdf->WriteHTML('<page type="NEXT-ODD" pagenumstyle="1" />');
        $mpdf->output('Data Jadwal Pelatihan.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function export_excel_pelatihan()
    {
        $data['title'] = 'Jadwal Pelatihan';
        $data['jadwal'] = $this->Pelatihan_model->getAllPelatihan();
        $this->load->view('admin/export_excel_pelatihan', $data);
    }
    public function pemilik_tenant()
    {
        $data['title'] = 'Data Tenant';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pemilik'] = $this->Pemilik_model->getallPemilik();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pemilik_tenant', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_pemilik()
    {
        $data['title'] = 'Form Tambah Data Tenant';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
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
        $this->form_validation->set_rules('profil_usaha', 'Profil Usaha', 'required', [
            'required' => 'Profil Usaha Belum diisi!'
        ]);
        $this->form_validation->set_rules('tentang_usaha', 'Tentang Usaha', 'required', [
            'required' => 'Tentang Usaha Belum diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Belum diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
            'required' => 'Tanggal Lahir Belum diisi!'
        ]);
        $this->form_validation->set_rules('nomor_telpon', 'Nomor Telpon', 'required|numeric', [
            'required' => 'Nomor Telpon Belum diisi!',
            'numeric' => 'Hanya boleh menulis angka!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pemilik.email]', [
            'required' => 'Email Belum diisi!',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password Belum diisi!',
            'matches' => 'Password tidak boleh kosong',
            'min_length' => 'Password terlalu sedikit'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambah_pemilik', $data);
            $this->load->view('templates/footer');
        } else {
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
            if ($foto_profil = '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_profil')) {
                    echo $this->upload->display_errors();
                } else {
                    $foto_profil = $this->upload->data('file_name');
                }
            }
            $foto_ktp = $_FILES['foto_ktp'];
            if ($foto_ktp = '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_ktp')) {
                    echo $this->upload->display_errors();
                } else {
                    $foto_ktp = $this->upload->data('file_name');
                }
            }
            $foto_produk = $_FILES['foto_produk'];
            if ($foto_produk = '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_produk')) {
                    echo $this->upload->display_errors();
                } else {
                    $foto_produk = $this->upload->data('file_name');
                }
            }
            $foto_produk2 = $_FILES['foto_produk2'];
            if ($foto_produk2 = '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_produk2')) {
                    echo $this->upload->display_errors();
                } else {
                    $foto_produk2 = $this->upload->data('file_name');
                }
            }
            $foto_produk3 = $_FILES['foto_produk3'];
            if ($foto_produk3 = '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_produk3')) {
                    echo $this->upload->display_errors();
                } else {
                    $foto_produk3 = $this->upload->data('file_name');
                }
            }
            $foto_produk4 = $_FILES['foto_produk4'];
            if ($foto_produk4 = '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_produk4')) {
                    echo $this->upload->display_errors();
                } else {
                    $foto_produk4 = $this->upload->data('file_name');
                }
            }
            $foto_produk5 = $_FILES['foto_produk5'];
            if ($foto_produk5 = '') {
            } else {
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_produk5')) {
                    echo $this->upload->display_errors();
                } else {
                    $foto_produk5 = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_produk' => $nama_produk,
                'tagline_produk' => $tagline_produk,
                'deskripsi_produk' => $deskripsi_produk,
                'nik' => $nik,
                'nama_pemilik' => $nama_pemilik,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'nomor_telpon' => $nomor_telpon,
                'email' => $email,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => '1',
                'role_id' => '3',
                'profil_usaha' => $profil_usaha,
                'tentang_usaha' => $tentang_usaha,
                'foto_profil' => $foto_profil,
                'foto_ktp' => $foto_ktp,
                'foto_produk' => $foto_produk,
                'foto_produk2' => $foto_produk2,
                'foto_produk3' => $foto_produk3,
                'foto_produk4' => $foto_produk4,
                'foto_produk5' => $foto_produk5
            );

            $this->Pemilik_model->tambahDataPemilik($data, 'pemilik');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pemilik_tenant');
        }
    }
    public function hapus_pemilik($id)
    {
        $this->Pemilik_model->hapusDataPemilik($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pemilik_tenant');
    }
    public function detail_pemilik($id)
    {
        $data['title'] = 'Detail Pemilik Tenant';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pemilik'] = $this->Pemilik_model->getPemilikById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detail_pemilik', $data);
        $this->load->view('templates/footer');
    }
    public function edit_pemilik($id)
    {
        $data['title'] = 'Form Edit Data Tenant';
        $data['pemilik'] = $this->Pemilik_model->getPemilikById($id);
        $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['staff'] = $this->db->get_where('staff', ['email' =>
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
        $this->form_validation->set_rules('profil_usaha', 'Profil Usaha', 'required', [
            'required' => 'Profil Usaha Belum diisi!'
        ]);
        $this->form_validation->set_rules('tentang_usaha', 'Tentang Usaha', 'required', [
            'required' => 'Tentang Usaha Belum diisi!'
        ]);
        $this->form_validation->set_rules('nomor_telpon', 'Nomor Telpon', 'required|numeric', [
            'required' => 'Nomor Telpon Belum diisi!',
            'numeric' => 'Hanya boleh menulis angka!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Belum diisi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_pemilik', $data);
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
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_profil')) {
                    $old_image = $data['pemilik']['foto_profil'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar' . $old_image);
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
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_ktp')) {
                    $old_image = $data['pemilik']['foto_ktp'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar' . $old_image);
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
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk')) {
                    $old_image = $data['pemilik']['foto_produk'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar' . $old_image);
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
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk2')) {
                    $old_image = $data['pemilik']['foto_produk2'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar' . $old_image);
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
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk3')) {
                    $old_image = $data['pemilik']['foto_produk3'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar' . $old_image);
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
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk4')) {
                    $old_image = $data['pemilik']['foto_produk4'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar' . $old_image);
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
                $config['upload_path']          = './assets/login/img/gambar';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_produk5')) {
                    $old_image = $data['pemilik']['foto_produk5'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/gambar' . $old_image);
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
            redirect('admin/pemilik_tenant');
        }
    }
    public function export_pdf_pemilik()
    {
        $mpdf = new \Mpdf\Mpdf();
        $pemilik = $this->Pemilik_model->getAllPemilik();

        $data = $this->load->view('admin/export_pdf_pemilik', ['pemilikukmtenant' => $pemilik], TRUE);

        $mpdf->setFooter('{PAGENO}');
        $mpdf->AddPage('1');
        $mpdf->WriteHTML($data);
        $mpdf->WriteHTML('<page type="NEXT-ODD" pagenumstyle="1" />');

        $mpdf->output('Data Pemilik Tenant.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function export_excel_pemilik()
    {
        $data['title'] = 'Data Pemilik UKM Tenant';
        $data['pemilik'] = $this->Pemilik_model->getAllPemilik();
        $this->load->view('admin/export_excel_pemilik', $data);
    }
    public function berita()
    {
        $data['title'] = 'Berita';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/berita', $data);
        $this->load->view('templates/footer');;
    }
    public function tambah_berita()
    {
        $data['title'] = 'Form Tambah Berita';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'Judul Belum diisi!'
        ]);
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required', [
            'required' => 'Isi Berita Belum diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambah_berita', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul', true);
            $kategori = $this->input->post('kategori', true);
            $isi_berita = $this->input->post('isi_berita', true);
            $gambar = $_FILES['gambar'];
            if ($gambar = '') {
            } else {
                $config['upload_path']          = './assets/login/img/berita';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gambar')) {
                    echo $this->upload->display_errors();
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = array(
                'judul' => $judul,
                'kategori' => $kategori,
                'tanggal_terbit' => time(),
                'isi_berita' => $isi_berita,
                'gambar' => $gambar,
            );
            $this->Berita_model->tambahDataBerita($data, 'berita');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/berita');
        }
    }
    public function detail_berita($id)
    {
        $data['title'] = 'Detail Berita';
        $data['berita'] = $this->Berita_model->getBeritaById($id);
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detail_berita', $data);
        $this->load->view('templates/footer');
    }
    public function hapus_berita($id)
    {
        $this->Berita_model->hapusDataBerita($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            <div class="alert-title">Success</div>
              Data Berhasil Dihapus
            </div>'
        );
        redirect('admin/berita');
    }
    public function edit_berita($id)
    {
        $data['title'] = 'Form Edit Berita';
        $data['berita'] = $this->Berita_model->getBeritaById($id);
        $data['kategori'] = ['Pengumuman', 'Berita'];
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'Judul Belum diisi!'
        ]);
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required', [
            'required' => 'Isi Berita Belum diisi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_berita', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul');
            $kategori = $this->input->post('kategori');
            $isi_berita = $this->input->post('isi_berita');
            $gambar = $_FILES['gambar'];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['upload_path'] = './assets/login/img/berita/';

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {

                    $old_image = $data['berita']['gambar'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/berita/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $this->upload->display_errors();
                }
            }

            $this->db->set('judul', $judul);
            $this->db->set('kategori', $kategori);
            $this->db->set('isi_berita', $isi_berita);
            $this->db->where('id', $id);
            $this->db->update('berita');
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/berita');
        }
    }
    public function pendaftar_tenant()
    {
        $data['title'] = 'Pendaftar Tenant';
        $data['pendaftar'] = $this->Pendaftar_model->getAllPendaftar();
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pendaftar_tenant', $data);
        $this->load->view('templates/footer');
    }
    public function hapus_pendaftar_tenant($id)
    {
        $this->Pendaftar_model->hapusDataPendaftar($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            <div class="alert-title">Success</div>
              Data Berhasil Dihapus
            </div>'
        );
        redirect('admin/pendaftar_tenant');
    }
    public function edit_pendaftar_tenant($id)
    {
        $data['title'] = 'Validasi Pendaftar Tenant';
        $data['pendaftar'] = $this->Pendaftar_model->getPendaftarById($id);
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        $data['status'] = ['Diproses', 'Ditolak', 'Diterima'];
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required', [
            'required' => 'Nama Pemilik Belum diisi!'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_pendaftar_tenant', $data);
            $this->load->view('templates/footer');
        } else {
            // $id = $this->input->post('id');
            $status = $this->input->post('status');
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('pendaftar');
            if ($status == 'Diterima') {
                $nik = $this->input->post('nik');
                $nama_pemilik = $this->input->post('nama_pemilik');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $status = $this->input->post('status');
                $alamat = $this->input->post('alamat');
                $email = $this->input->post('email');
                $nomor_telpon = $this->input->post('nomor_telpon');
                $tanggal_lahir = $this->input->post('tanggal_lahir');
                $nama_produk = $this->input->post('nama_produk');
                $tagline_produk = $this->input->post('tagline_produk');
                $deskripsi_produk = $this->input->post('deskripsi_produk');
                $password = $this->input->post('password');
                $foto_profil = $this->input->post('foto_profil');
                $foto_ktp = $this->input->post('foto_ktp');
                $foto_produk = $this->input->post('foto_produk');


                $data = array(
                    'nik' => $nik,
                    'nama_pemilik' => $nama_pemilik,
                    'nomor_telpon' => $nomor_telpon,
                    'email' => $email,
                    'role_id' => '3',
                    'tanggal_lahir' => $tanggal_lahir,
                    'is_active' => 1,
                    'jenis_kelamin' => $jenis_kelamin,
                    'nama_produk' => $nama_produk,
                    'alamat' => $alamat,
                    'tagline_produk' => $tagline_produk,
                    'deskripsi_produk' => $deskripsi_produk,
                    'password' => $password,
                    'foto_profil' => $foto_profil,
                    'foto_ktp' => $foto_ktp,
                    'foto_produk' => $foto_produk,
                );
                $this->Pendaftar_model->tambah_data($data, 'pemilik');
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('admin/pemilik_tenant');
            }
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/pendaftar_tenant');
        }
    }
    public function detail_pendaftar_tenant($id)
    {
        $data['title'] = 'Detail Pendaftar Tenant';
        $data['pendaftar'] = $this->Pendaftar_model->getPendaftarById($id);
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detail_pendaftar_tenant', $data);
        $this->load->view('templates/footer');
    }
    public function pendaftar_pelatihan()
    {
        $data['title'] = 'Pendaftar Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['peserta_pelatihan'] = $this->Daftar_Pelatihan_model->getAllDaftarPelatihan();
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pendaftar_pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function edit_pendaftar_pelatihan($id_peserta)
    {
        $data['title'] = 'Validasi Pendaftar Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['peserta_pelatihan'] = $this->Daftar_Pelatihan_model->getDaftarPesertaById($id_peserta);

        $data['status'] = ['Proses', 'Acc', 'Tolak'];

        $data['nama_kegiatan'] = [
            'Pelatihan Pembuatan Ikan Asap', 'Pelatihan Produk Makanan',
            'Pelatihan Pengemasan Produk', 'Pelatihan Pengurusan Produk', 'Pelatihan Olahan Ikan Mentah'
        ];

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required', [
            'required' => 'Nama Kegiatan Belum diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit_pendaftar_pelatihan', $data);
            $this->load->view('templates/footer');
        } else {
            $status = $this->input->post('status');

            $this->db->set('status', $status);
            $this->db->where('id_peserta', $id_peserta);
            $this->db->update('peserta_pelatihan');
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/pendaftar_pelatihan');
        }
    }
    public function hapus_pendaftar_pelatihan($id_peserta)
    {
        $this->Daftar_Pelatihan_model->hapusDaftarPelatihan($id_peserta);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pendaftar_pelatihan');
    }
    public function pesan()
    {
        $data['title'] = 'Pesan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pesan'] = $this->Pesan_model->tampil_pesan();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pesan', $data);
        $this->load->view('templates/footer');;
    }
    public function hapus_pesan($id)
    {
        $this->Pesan_model->hapus_pesan($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            <div class="alert-title">Success</div>
              Data Berhasil Dihapus
            </div>'
        );
        redirect('admin/pesan');
    }
    public function detail_pesan($id)
    {
        $data['title'] = 'Detail Pesan';
        $data['pesan'] = $this->Pesan_model->getpesanbyid($id);
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detail_pesan', $data);
        $this->load->view('templates/footer');
    }
}
