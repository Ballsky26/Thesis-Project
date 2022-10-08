<?php
defined('BASEPATH') or exit('No direct script access allowed');

require(APPPATH . 'controllers/Base_controller.php');

class Ketua extends Base_controller
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
        $data['staff2'] = $this->Staff_model->getAllStaff();
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/dashboard', $data);
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
            $this->load->view('ketua/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ketua/myprofile', $data);
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
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/login/img/staff/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
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
            redirect('ketua/myprofile');
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
            $this->load->view('ketua/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ketua/edit_password', $data);
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
                redirect('ketua/edit_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                            <div class="alert-title">Password tidak sama</div>
                         Password Baru tidak sama dengan password lama
                            </div>'
                    );
                    redirect('ketua/edit_password');
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
                    redirect('ketua/edit_password');
                }
            }
        }
    }
    public function data_staff()
    {
        $data['data_staff'] = $this->Staff_model->getAllStaff();
        $data['title'] = 'Data Staff';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/data_staff', $data);
        $this->load->view('templates/footer');
    }
    public function hapus_staff($id)
    {
        $this->Staff_model->hapusDataStaff($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success">
            <div class="alert-title">Success</div>
              Data Berhasil Dihapus
            </div>'
        );
        redirect('ketua/data_staff');
    }
    public function tambah_staff()
    {
        $data['title'] = 'Form Tambah Data Staff';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required|numeric', [
            'required' => 'Nik Belum diisi!',
            'numeric' => 'Hanya boleh menulis angka!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Lengkap Belum diisi!'
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
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
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
            $this->load->view('ketua/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ketua/tambah_staff', $data);
            $this->load->view('templates/footer');
        } else {
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat = $this->input->post('alamat');
            $nomor_telpon = $this->input->post('nomor_telpon');
            $posisi = $this->input->post('posisi');
            $email = $this->input->post('email');
            $foto = $_FILES['foto'];
            if ($foto = '') {
            } else {
                $config['upload_path']          = './assets/login/img/staff';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    echo $this->upload->display_errors();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik' => $nik,
                'nama' => $nama,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'nomor_telpon' => $nomor_telpon,
                'posisi' => $posisi,
                'email' => $email,
                'foto' => $foto,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => '1',
                'date_created' => time()

            );

            $this->Staff_model->tambahDataStaff($data, 'staff');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                <div class="alert-title">Success</div>
                  Data Berhasil Ditambahkan
                </div>'
            );
            redirect('ketua/data_staff');
        }
    }
    public function edit_staff($id)
    {
        $data['title'] = 'Form Edit Data Staff';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['staff2'] = $this->Staff_model->getStaffById($id);

        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required|numeric', [
            'required' => 'Nik Belum diisi!',
            'numeric' => 'Hanya boleh menulis angka!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Lengkap Belum diisi!'
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
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email Belum diisi!',
            'is_unique' => 'Email sudah terdaftar'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('ketua/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ketua/edit_staff', $data);
            $this->load->view('templates/footer');
        } else {
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $alamat = $this->input->post('alamat');
            $nomor_telpon = $this->input->post('nomor_telpon');
            $posisi = $this->input->post('posisi');
            $email = $this->input->post('email');
            $foto = $_FILES['foto'];
            if ($foto == '') {
            } else {
                $config['upload_path']          = './assets/login/img/staff/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $old_image = $data['staff']['foto'];
                    if ($old_image != '') {
                        unlink(FCPATH . 'assets/login/img/staff/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
            $this->db->set('nik', $nik);
            $this->db->set('nama', $nama);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tanggal_lahir', $tanggal_lahir);
            $this->db->set('alamat', $alamat);
            $this->db->set('nomor_telpon', $nomor_telpon);
            $this->db->set('posisi', $posisi);
            $this->db->set('email', $email);
            $this->db->where('id', $id);
            $this->db->update('staff');
            $this->session->set_flashdata('flash', 'Diubah');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                <div class="alert-title">Success</div>
                  Data Berhasil Diubah
                </div>'
            );
            redirect('ketua/data_staff');
        }
    }
    public function detail_staff($id)
    {
        $data['title'] = 'Detail Staff';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['staff2'] = $this->Staff_model->getStaffById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/detail_staff', $data);
        $this->load->view('templates/footer');
    }
    public function pelatihan()
    {
        $data['pelatihan'] = $this->Pelatihan_model->getAllPelatihan();
        $data['title'] = 'Agenda Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function detail_pelatihan($id)
    {
        $data['title'] = 'Detail Jadwal Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jadwal'] = $this->Pelatihan_model->getPelatihanById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/detail_pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function export_pdf_pelatihan()
    {
        $mpdf = new \Mpdf\Mpdf();
        $jadwal = $this->Pelatihan_model->getAllPelatihan();
        $data = $this->load->view('ketua/export_pdf_pelatihan', ['jadwalpelatihan' => $jadwal], TRUE);
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
        $this->load->view('ketua/export_excel_pelatihan', $data);
    }
    public function pemilik_tenant()
    {
        $data['title'] = 'Data Tenant';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pemilik'] = $this->Pemilik_model->getallPemilik();

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/pemilik_tenant', $data);
        $this->load->view('templates/footer');
    }
    public function detail_pemilik($id)
    {
        $data['title'] = 'Detail Pemilik Tenant';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pemilik'] = $this->Pemilik_model->getPemilikById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/detail_pemilik', $data);
        $this->load->view('templates/footer');
    }
    public function export_pdf_pemilik()
    {
        $mpdf = new \Mpdf\Mpdf();
        $pemilik = $this->Pemilik_model->getAllPemilik();
        $data = $this->load->view('ketua/export_pdf_pemilik', ['pemilikukmtenant' => $pemilik], TRUE);
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
        $this->load->view('ketua/export_excel_pemilik', $data);
    }
    public function berita()
    {
        $data['title'] = 'Berita';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bulan_indo'] = $this->bulan_indo;
        $data['berita'] = $this->Berita_model->getAllBerita();

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/berita', $data);
        $this->load->view('templates/footer');;
    }
    public function detail_berita($id)
    {
        $data['title'] = 'Detail Berita';
        $data['berita'] = $this->Berita_model->getBeritaById($id);
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bulan_indo'] = $this->bulan_indo;

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/detail_berita', $data);
        $this->load->view('templates/footer');
    }
    public function pendaftar_tenant()
    {
        $data['title'] = 'Pendaftar Tenant';
        $data['pendaftar'] = $this->Pendaftar_model->getAllPendaftar();
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/pendaftar_tenant', $data);
        $this->load->view('templates/footer');
    }
    public function detail_pendaftar_tenant($id)
    {
        $data['title'] = 'Detail Pendaftar Tenant';
        $data['pendaftar'] = $this->Pendaftar_model->getPendaftarById($id);
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/detail_pendaftar_tenant', $data);
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
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/pendaftar_pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function detail_pendaftar_pelatihan($id_peserta)
    {
        $data['title'] = 'Validasi Pendaftar Pelatihan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['peserta_pelatihan'] = $this->Daftar_Pelatihan_model->getDaftarPesertaById($id_peserta);
        $data['status'] = ['Proses', 'Acc', 'Tolak'];
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/detail_pendaftar_pelatihan', $data);
        $this->load->view('templates/footer');
    }
    public function pesan()
    {
        $data['title'] = 'Pesan';
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pesan'] = $this->Pesan_model->tampil_pesan();
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/pesan', $data);
        $this->load->view('templates/footer');;
    }
    public function detail_pesan($id)
    {
        $data['title'] = 'Detail Pesan';
        $data['pesan'] = $this->Pesan_model->getpesanbyid($id);
        $data['staff'] = $this->db->get_where('staff', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bulan_indo'] = $this->bulan_indo;
        $this->load->view('templates/header', $data);
        $this->load->view('ketua/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ketua/detail_pesan', $data);
        $this->load->view('templates/footer');
    }
}
