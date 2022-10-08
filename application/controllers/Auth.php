<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin/dashboard');
        } elseif ($this->session->userdata('role_id') == 3) {
            redirect('pemilik/dashboard');
        } elseif ($this->session->userdata('role_id') == 4) {
            redirect('pendaftar/dashboard');
        } elseif ($this->session->userdata('role_id') == 5) {
            redirect('ketua/dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Email tidak Valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $staff = $this->db->get_where('staff', ['email' => $email])->row_array();
        $pemilik = $this->db->get_where('pemilik', ['email' => $email])->row_array();
        $pendaftar = $this->db->get_where('pendaftar', ['email' => $email])->row_array();
?>
        <script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
        <style>
            body {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 1.124em;
                font-weight: normal;
            }
        </style>

        <body></body>
        <?php
        //jika usernya ada
        if ($staff) {
            //jika usernya aktif
            if ($staff['is_active'] == 1) {
                //cek password
                if (password_verify($password, $staff['password'])) {
                    $data = [
                        'email' => $staff['email'],
                        'role_id' => $staff['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($staff['role_id'] == 1) {
                        redirect('admin/dashboard');
                    } else {
                        redirect('ketua/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktifkan</div>');
                redirect('auth');
            }
        } else if ($pemilik) {
            //jika usernya aktif
            if ($pemilik['is_active'] == 1) {
                //cek password
                if (password_verify($password, $pemilik['password'])) {
                    $data = [
                        'email' => $pemilik['email'],
                        'role_id' => $pemilik['role_id'],
                        'pemilik_id' => $pemilik['id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($pemilik['role_id'] == 3) {
                        redirect('pemilik/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktifkan</div>');
                redirect('auth');
            }
        } else if ($pendaftar) {
            //jika usernya aktif
            if ($pendaftar['is_active'] == 1) {
                //cek password
                if (password_verify($password, $pendaftar['password'])) {
                    $data = [
                        'email' => $pendaftar['email'],
                        'role_id' => $pendaftar['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($pendaftar['role_id'] == 4) {
                        redirect('pendaftar/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktifkan</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
            redirect('auth');
        }
    }
    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('pendaftar');
        }
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|numeric', [
            'required' => 'NIK belum diisi!',
            'numeric' => 'Hanya boleh menulis angka!'
        ]);
        $this->form_validation->set_rules('nama_pemilik', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama Lengkap belum diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pendaftar.email]', [
            'required' => 'Email belum diisi!',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password belum diisi!',
            'matches' => 'Password harus sama',
            'min_length' => 'Password terlalu sedikit'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama_pemilik' => htmlspecialchars($this->input->post('nama_pemilik', true)),
                'email' => htmlspecialchars($email),
                'foto_profil' => 'pendaftar.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 4,
                'is_active' => 0,
                'tanggal_daftar' => time()
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time(),
            ];

            $this->db->insert('pendaftar', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Dibuat, Silahkan Aktivasi akun terlebih dahulu</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ballskyteam22@gmail.com',
            'smtp_pass' => 'ubpkpdteuxxxcsaz',
            'smtp_port' => 465,
            'mailtype' =>  'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('ballskyteam22@gmail.com', 'Technopark Perikanan Kota Pekalongan');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik ini untuk Aktivasi akun : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
        } else if ($type == 'lupa_password') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik ini untuk Reset password akun Anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $pendaftar = $this->db->get_where('pendaftar', ['email' => $email])->row_array();
        if ($pendaftar) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('pendaftar');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' telah diaktifkan, silahkan login</div>');
                    redirect('auth');
                } else {

                    $this->db->delete('pendaftar', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Gagal di aktivasi, Token Expired</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Gagal di aktivasi, Token Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Gagal di aktivasi, Email Salah</div>');
            redirect('auth');
        }
    }

    public function lupa_password()
    {
        $data['title'] = 'Lupa Password';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email Belum Diisi!',
            'valid_email' => 'Email tidak Valid'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/lupa_password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $pendaftar = $this->db->get_where('pendaftar', ['email' => $email, 'is_active' => 1])->row_array();

            if ($pendaftar) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'lupa_password');

                $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Silahkan cek Email anda untuk Mereset Password</div>');
                redirect('auth/lupa_password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum aktif</div>');
                redirect('auth/lupa_password');
            }
        }
    }
    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $pendaftar = $this->db->get_where('pendaftar', ['email' => $email])->row_array();

        if ($pendaftar) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ganti_password();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Gagal reset password! Token Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Gagal reset password! Email Salah</div>');
            redirect('auth');
        }
    }
    public function ganti_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $data['title'] = 'Ganti Password';

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password Baru belum diisi',
            'min_length' => 'Password minimal 3 Karakter',
            'matches' => 'Password harus sama'
        ]);
        $this->form_validation->set_rules('password2', 'Ulangi Password Baru', 'required|trim|min_length[3]|matches[password1]', [
            'required' => 'Password Baru belum diisi',
            'min_length' => 'Password minimal 3 Karakter',
            'matches' => 'Password harus sama'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/ganti_password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            );
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('pendaftar');

            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Password berhasil di ubah</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        ?>
        <script src="<?= base_url(''); ?>assets/login/js/sweetalert2.all.min.js"></script>
        <style>
            body {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 1.124em;
                font-weight: normal;
            }
        </style>

        <body></body>
        <?php
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Logout',
                showConfirmButton: false,
                timer: 1500
            }).then((result) => {
                window.location = '<?= site_url('auth') ?>';
            })
        </script>
<?php
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
    public function edit_password()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
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
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/footer');
            $this->load->view('auth/edit_password', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <div class="alert-title">Password Salah</div>
                 Password Lama Salah
                    </div>'
                );
                redirect('auth/edit_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                            <div class="alert-title">Password tidak sama</div>
                         Password Baru tidak sama dengan password lama
                            </div>'
                    );
                    redirect('auth/edit_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <div class="alert-title">Success</div>
                    Password berhasil diubah
                        </div>'
                    );
                    redirect('auth/edit_password');
                }
            }
        }
    }
    public function myprofile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/footer');
        $this->load->view('auth/myprofile', $data);
    }
}
