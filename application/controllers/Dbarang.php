<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dbarang extends CI_Controller
{

    // public function __construct()
    // {
    // 	parent::__construct();
    // 	cek_login();
    // }

    public function index()
    {
        $data['title'] = 'Stok Barang';
        $this->load->model('barang');
        $barang = $this->barang->all_barang();
        $data = array('barang' => $barang);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('dbarang', $data);
        $this->load->view('templates/footer', $data);
    }
    public function insert_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');
        $n_barang = $this->input->post('n_barang');
        $harga = $this->input->post('harga');
        $kuantitas = $this->input->post('kuantitas');

        $barang = array(
            'kd_barang' => $kode_barang,
            'n_barang' => $n_barang,
            'harga' => $harga,
            'kuantitas' => $kuantitas
        );
        $this->barang->insert($barang);
        redirect('/dbarang');
    }
    public function edit_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');
        $n_barang = $this->input->post('n_barang');
        $harga = $this->input->post('harga');
        $kuantitas = $this->input->post('kuantitas');

        $barang = array(
            'n_barang' => $n_barang,
            'harga' => $harga,
            'kuantitas' => $kuantitas
        );
        $this->barang->update($barang, $kode_barang);
        redirect('/dbarang');
    }
    public function delete_barang($kode_barang)
    {
        $this->load->model('barang');


        $this->barang->delete($kode_barang);
        redirect('/dbarang');
    }
    public function info_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');

        $barang = $this->barang->view($kode_barang);
        echo json_encode($barang);
    }
}
