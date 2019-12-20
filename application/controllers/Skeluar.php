<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skeluar extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('skeluar');
	}
    public function insert_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');
        $n_barang = $this->input->post('n_barnag');
        $kuantitas = $this->input->post('kuantitas');
        
        $barang = array('kd_barang'=>$kode_barang,
                        'n_barang'=>$n_barang,
                        'kuantitas'=>$kuantitas);
        $this->barang->insert($barang);
        
    }
    public function edit_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');
        $n_barang = $this->input->post('n_barnag');
        $kuantitas = $this->input->post('kuantitas');
        
        $barang = array('n_barang'=>$n_barang,
                        'kuantitas'=>$kuantitas);
        $this->barang->update($barang,$kode_barang);
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
