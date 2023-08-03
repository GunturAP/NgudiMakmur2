<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Mod_auth');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Page ';
            $this->load->view('login/header', $data);
            $this->load->view('login/login');
            $this->load->view('login/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //user ada
        if ($user) {
            //user active
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $datalgn = [];
                    if ($user['role_id'] == 1) {
                        $datalgn['email1'] = $data['email'];
                        $this->session->set_userdata($datalgn);
                        redirect('Superadmin');
                    } else if ($user['role_id'] == 2) {

                        $email2 = $data['email'];
                        $datalgn['email2'] = $data['email'];
                        $this->session->set_userdata($datalgn);
                        redirect('Admin');
                    } else  if ($user['role_id'] == 3) {
                        $email3 = $data['email'];
                        $datalgn['email3'] = $data['email'];
                        $this->session->set_userdata($datalgn);
                        redirect('Customer');
                    } else  if ($user['role_id'] == 4) {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Akun Anda Di  Blokir !!! <br>
                        Karena Terindikasi Melanggar Syarat dan Ketentuan Dari Kelompok Tani Ngudi Makmur 2  </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Password Salah !!! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert"> Email Belum di Aktivasi ! </div>');
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Email Belum Terdaftar ! </div>');
            redirect('auth');
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Terdaftar !'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama !!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Daftar';
            $this->load->view('login/header', $data);
            $this->load->view('login/sign');
            $this->load->view('login/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_telephone' => '-',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 0,
                'date_created' => date('Y-m-d H:i:s'),
                'foto' => 'default.jpg',
            ];
            //token aktivasi
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time()

            ];

            $this->Mod_auth->insertuser($data);
            $this->Mod_auth->insertuser_token($user_token);

            $this->_sendemail($token, 'verify');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">  Silahkan Cek Email Untuk Aktivasi Akun Anda </div>');
            redirect('auth');
        }
    }
    private function _sendemail($token, $type)
    {
        $this->load->library('email');
        $this->email->from('taningudimakmur2@gmail.com', 'Ngudi Makmur');

        if ($type == 'verify') {
            $this->email->to($this->input->post('email'));
            $this->email->subject('Verifikasi Akun Anda');
            $this->email->message('Klik Link Ini Mengaktifkan Akun Anda  :  <a href="' . base_url() . 'auth/verify?email=' .
                $this->input->post('email') . '&token=' . urlencode($token) . '"> Aktivasi Akun</a>');
        } elseif ($type == 'forgot') {
            $this->email->to($this->input->post('email'));
            $this->email->subject('Reset Kata Sandi');
            $this->email->message('Klik Link Ini Untuk Reset Password  :  <a href="' . base_url() . 'auth/resetpassword?email=' .
                $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Kata Sandi</a>');
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

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Aktivasi Email ' .  $email . ' Berhasil, Silahkan Login  </div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Aktivasi Akun Gagal!! Token Kadaluarsa  </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Aktivasi Akun Gagal!! Token Salah  </div>');
                var_dump($user_token);
                die;
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Aktivasi Akun Gagal!! Email Salah  </div>');
            redirect('auth');
        }
    }

    public function forgot()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Reset Kata Sandi ';
            $this->load->view('login/header', $data);
            $this->load->view('login/forgot');
            $this->load->view('login/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendemail($token, 'forgot');
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Cek Email Anda Untuk Reset Password !!  </div>');
                redirect('auth/forgot');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Email Belum Terdaftar Atau Belum Aktif  </div>');
                redirect('auth/forgot');
            }
            //$this->_login();
        }
    }
    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->gantipassword();
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Reset Kata Sandi Gagal!! Token Kadaluarsa  </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Reset Kata Sandi Gagal!! Token Salah  </div>');
                var_dump($user_token);
                die;
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Reset Kata Sandi Gagal!! Email Salah  </div>');
            redirect('auth');
        }
    }

    public function gantipassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama !!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Reset Kata Sandi ';
            $this->load->view('login/header', $data);
            $this->load->view('login/ubah_katasandi');
            $this->load->view('login/footer');
        } else {
            $pasword = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $pasword);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Kata Sandi ' .  $email . ' Berhasil Di Ganti, Silahkan Login  </div>');
            redirect('auth');
        }
    }


    public function logout($data)
    {
        $this->session->unset_userdata($data);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Akun Anda Berhasil Keluar   </div>');
        redirect('auth');
    }
    public function sk()
    {
        $this->load->view('guest/header');
        $this->load->view('login/syaratdanketentuan');
        $this->load->view('guest/footer');
    }
}