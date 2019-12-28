<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HalamanUtama extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	//cek_login();
	// }

	public function index()
	{
		$data['title'] = 'Kelola Toko / Cafe';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/halaman_utama');
		$this->load->view('templates/footer', $data);
		
	}
    public function test_index()
    {
        echo "Index Php nya ilang";
		}
		
		public function role()
		{
			$data['title'] = 'Role';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$data['role'] = $this->db->get('user_role')->result_array();

			$this->load->view('templates/header', $data);
			$this->load->view('/role');
			$this->load->view('templates/footer', $data);
			
		}
			// public function test_index()
			// {
			// 		echo "Index Php nya ilang";
			// }
}
