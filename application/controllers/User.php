<?php

//dilarang mengedit/ mengcopy kodingan ini
//Hak Cipta (C) Techno Ice Developer Team
//kecuali tim Developer &dibolehkan TID

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		//cek_login();
	}

	public function index()
	{
		$data['title'] = 'Profil';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('templates/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit()
	{
		$data['title'] = 'Ubah Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');

			//cek jika ada gambar yang akan diaplut
			$upload_gambar = $_FILES['gambar'];

			if ($upload_gambar) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/prifile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$gambar_lama = $data['user']['gambar'];
					if ($gambar_lama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/prifile/' . $gambar_lama);
					}

					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('gambar', $gambar_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Profil kamu berhasil diubah
			</div>');
			redirect('user');

			// $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
			// redirect('user');
		}
	}
	public function editPassword()
	{
		$data['title'] = 'Edit Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('password_sekarang', 'Password Saat Ini', 'required|trim');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru2]'); //untuk ngecek di password_baru2
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password_baru1]'); //untuk menegcek apakah sama di password_baru1 jika tidak munculkan error

		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('user/editpassword', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$password_sekarang = $this->input->post('password_sekarang');
			$password_baru = $this->input->post('password_baru1');
			if(!password_verify($password_sekarang, $data['user']['password'])){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Tidak Bisa mengganti Password!
			</div>');
			redirect('user/editpassword');
			}else {
				if ($password_sekarang == $password_baru){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Password Baru enggak boleh sama dengan sebelumnya!
				</div>');
				redirect('user/editpassword');
				} else {
					// kalo password sudah betul (C)Techon Ice Developer Team
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Password Diubah!
				</div>');
				redirect('user/editpassword');
				}
			}
		}

	}
}
