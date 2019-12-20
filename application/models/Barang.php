<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Model {

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
	public function all_barang()
    {
        $this->db->select("*");
        $this->db->from("barang");
        $data = $this->db->get()->result();
        return $data;
    }
    public function insert($barang)
    {
        $this->db->insert('barang',$barang);
        return 1;
    }
    public function update($barang,$kd_barang)
    {
        $this->db->where('kd_barang',$kd_barang);
        $this->db->update('barang',$barang);
        return 1;
    }
    public function delete($kd_barang)
    {
        $this->db->where('kd_barang',$kd_barang);
        $this->db->delete('barang');
        return 1;
    }
    public function view($kode_barang)
    {
        
        $this->db->select("*");
        $this->db->from("barang");
        $this->db->where("kd_barang",'kode');
        $data = $this->db->get()->row();
        return $data;
    }
    
}
