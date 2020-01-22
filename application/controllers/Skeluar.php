<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('skeluar');
        $this->load->view('templates/footer', $data);
    }
    public function insert_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');
        $n_barang = $this->input->post('n_barnag');
        $kuantitas = $this->input->post('kuantitas');

        $barang = array(
            'kd_barang' => $kode_barang,
            'n_barang' => $n_barang,
            'kuantitas' => $kuantitas
        );
        $this->barang->insert($barang);
    }
    public function edit_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');
        $n_barang = $this->input->post('n_barnag');
        $kuantitas = $this->input->post('kuantitas');

        $barang = array(
            'n_barang' => $n_barang,
            'kuantitas' => $kuantitas
        );
        $this->barang->update($barang, $kode_barang);
    }
    public function delete_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');

        $this->barang->delete($kode_barang);
    }
    public function info_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');

        $barang = $this->barang->view($kode_barang);
    }
}
