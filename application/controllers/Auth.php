<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  // public function __construction()
  // {
  //   parent::__construction();
  //   $this->load->library('form_validation'); 
  // }

	public function index()
	{
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if($this->form_validation->run() == false){
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
    if($user){
      $data['title'] = 'Kelola Toko / Cafe';
       //Kalau usernya aktip
       if($user['is_active'] == 1){
          //cek password
          if(password_verify($password, $user['password'])){
            $data = [
              'email' => $user['email'],
              'role_id' => $user['role_id'],
            ];
            $this->session->set_userdata($data);
            if($user['role_id'] == 1){
              redirect('HalamanUtama');
            }else {
              redirect('User');
            }
           
          }else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Password Salah!
            </div>');
          redirect('auth');
          }

       }else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Email ini belum aktif
      </div>');
        redirect('auth');
       }
    }else{
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Email Belum terdaftar!
    </div>');
      redirect('auth');
    }
  }



  
  public function registrasi()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',
    [
      'is_unique' => 'Email Ini udah kedaptar, gak bisa dipake 2 kali'
    ]
    );
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',
      [
      'matches' => 'Kayanya password kamu gak sama!',
      'min_length'=> 'Passwor Kamu Pendek kaya punya kamu',
      ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == false){
      $data['title'] = 'Kasir TID Registreasi';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registrasi');
      $this->load->view('templates/auth_footer');
    } else {
      $data = [
          'nama' => htmlspecialchars($this->input->post('nama', true)),
          'email' => htmlspecialchars($this->input->post('email', true)),
          'gambar' => 'default.jpg',
          'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
          'role_id' => 2,
          'is_active' => 1,
          'date_created' => time()
      ];

      //Hak Cipta Techno Ice Developer Team///
      //Tidak diperbolehkan mengganti code///
      //Kecuali Team Dari Techno Ice Dev///

      $this->db->insert('user', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Yeeyyy! Kamu berhasil Daftar, Coba Login
    </div>');
      redirect('auth');
    }
    
  }

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


}
