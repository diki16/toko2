<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('smasuk');
		$this->load->view('templates/footer', $data);
		
	}
    
}
