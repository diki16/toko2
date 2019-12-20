<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbarang extends CI_Controller {

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
        $this->load->model('barang');
        $barang = $this->barang->all_barang();
        $data = array('barang'=>$barang);
		$this->load->view('dbarang',$data);
	}
    public function insert_barang()
    {
        $this->load->model('barang');
        $kode_barang = $this->input->post('kode_barang');
        $n_barang = $this->input->post('n_barang');
        $harga = $this->input->post('harga');
        $kuantitas = $this->input->post('kuantitas');
        
        $barang = array('kd_barang'=>$kode_barang,
                        'n_barang'=>$n_barang,
                        'harga'=>$harga,
                        'kuantitas'=>$kuantitas);
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
        
        $barang = array('n_barang'=>$n_barang,
                        'harga'=>$harga,
                        'kuantitas'=>$kuantitas);
        $this->barang->update($barang,$kode_barang);
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
