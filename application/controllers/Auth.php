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

    if ($this->session->userdata('email')) {
      redirect('user');
    }

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'TID Login Page';
      $this->load->view('templates/auth_header');
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      //validasi sukses
      $this->_login();
    }
  }

  private function _login()
  {
    $data['title'] = 'Kelola Toko / Cafe';
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //kalo ada user
    if ($user) {
      $data['title'] = 'Kelola Toko / Cafe';
      //Kalau usernya aktip
      if ($user['is_active'] == 1) {
        //cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'],
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('HalamanUtama');
          } else {
            redirect('User');
          }
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Password Salah!
            </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Email ini belum aktif
      </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Email Belum terdaftar!
    </div>');
      redirect('auth');
    }
  }


  //buat daftar akunnya cok
  public function registrasi()
  {

    if ($this->session->userdata('email')) {
      redirect('user');
    }

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|trim|valid_email|is_unique[user.email]',
      [
        'is_unique' => 'Email Ini udah kedaptar, gak bisa dipake 2 kali'
      ]
    );
    $this->form_validation->set_rules(
      'password1',
      'Password',
      'required|trim|min_length[3]|matches[password2]',
      [
        'matches' => 'Kayanya password kamu gak sama!',
        'min_length' => 'Passwor Kamu Pendek kaya punya kamu',
      ]
    );
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Kasir TID Registreasi';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registrasi');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($email),
        'gambar' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time()
      ];

      //Hak Cipta Techno Ice Developer Team///
      //Tidak diperbolehkan mengganti code///
      //Kecuali Team Dari Techno Ice Dev///



      //menyiapkan token
      $token = base64_encode(random_bytes(32)); //base64 untuk mengconfert token aneh menjadi yang bisa dibaca db
      $user_token = [
        'email' => $email,
        'token' => $token,
        'data_created' => time()
      ];

      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token); //massukin token

      $this->_sendEmail($token, 'verifikasi'); //mengirim pada _sendEmail , token dan verifikasi


      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Yeeyyy! Kamu berhasil Daftar, Segera Aktifasi
    </div>');
      redirect('auth'); //kalau sukses daftar maka munculkan notif ini
    }
  }

  // author rizky fajar anugrah rizkyfaajaranugrah2@gmail.com

  //Istilah SMTP Simple Mail Transfer Protocol 
  private function _sendEmail($token, $type)
  {
    // $config = [
    //   'protocol' => 'smtp',
    //   'smtp_host' => 'ssl://smtp.googlemail.com',
    //   'smtp_user' => 'icetech.official@gmail.com',
    //   'smtp_pass' => 'passwordnyaicedevcobawe',
    //   'smtp_port' => 465,
    //   'mailtype' => 'html',
    //   'charset' => 'utf-8',
    //   'newline' => "\r\n"
    // ];

    $this->load->library('email');

    $config = array();
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
    $config['smtp_user'] = 'icetech.official@gmail.com'; //emil pengirim verifikasinya
    $config['smtp_pass'] = 'passwordnyaicedevcobawe'; //password
    $config['smtp_port'] = 465; //port
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';
    $this->email->initialize($config);

    $this->email->set_newline("\r\n");

    $this->load->library('email', $config);

    $this->email->from('icetech.official@gmail.com', 'Techno Ice Developer');
    $this->email->to($this->input->post('email'));

    if ($type == 'verifikasi') {
      $this->email->subject('Verifikasi Akun');
      $this->email->message('Klik link ini untuk verifikasi akun kamu : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a>');
    } else if ($type == 'lupa') {
      $this->email->subject('Reset Password');
      $this->email->message('Klik link ini untuk reset password akun kamu : <a href="' . base_url() . 'auth/lupapasswords?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }
    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    };
  }

  //fungsi verifikasi
  public function verifikasi()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        if (time()->user_token['date_created'] < (60 * 60 * 24)) {  //Kalau udah daftar terus selama 24jam gak di aktifasi, email bakal dihapus(kadaluarsa)

          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          ' . $email . ' Telah Aktif! Silahkan Login.
          </div>');
          redirect('auth'); //kalau udah aktif munculin notif ini redirect ke auth(login) 
        } else {
          //kalau token lebih dari 24jam proses hapus nya disini
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Aktifasi akun kamu gagal ! Token Kadaluarsa.
      </div>');
          redirect('auth');
        }
      } else { //jika token gak ada/ salah
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Aktifasi akun kamu gagal ! Token Salah.
      </div>');
        redirect('auth');
      }
    } else { //Jika email yang didftar enggak sesuai
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Aktifasi akun kamu gagal ! Email salah.
    </div>');
      redirect('auth');
    }
  }

  //fungsi logout 
  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Kamu Telah Keluar !
  </div>');
    redirect('auth');
  }

  public function blocked()
  {
    $this->load->view('auth/blocked');
  }


  public function lupapassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {

      $data['title'] = 'Lupa Password';
      $this->load->view('templates/auth_header');
      $this->load->view('auth/lupa-password');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          // 'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token); //query buildernya ci
        $this->_sendEmail($token, 'lupa');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Periksa Email kamu untuk reset email kamu </div>');
        redirect('auth/lupapassword');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Email Kamu Belum terdaftar, Atau Aktifkan! </div>');
        redirect('auth/lupapassword');
      }
    }
  }

  public function lupaPasswords()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
        $this->session->set_userdata('lupa_password', 'email');
        $this->changePassword();
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Reset Pasword gagal, Token salah! </div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Reset Pasword gagal, Email salah! </div>');
      redirect('auth');
    }
  }

  public function changePassword()
  {
    // if(!$this->session->userdata('reset_email')){
    //   redirect('auth');
    // }

    $this->form_validation->set_rules('passwoerd1', 'Password', 'trim|required|min_length[3]|mathches[password2]');
    $this->form_validation->set_rules('passwoerd2', 'Password', 'trim|required|min_length[3]|mathches[password1]');
    if($this->form_validation->run() == false ){
      $data['title'] = 'Ganti Password';
      $this->load->view('templates/auth_header');
      $this->load->view('auth/ganti-password');
      $this->load->view('templates/auth_footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->unset_userdata('reset_email');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Password Telah diganti, Silahkan login </div>');
      redirect('auth');
    }
    
  }
}
