<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_admin extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function orang(){
        $query = $this->db->get('orang');
        return $query->result_array();
    }
    function tambah($data){
       $this->db->insert('orang', $data);
       return TRUE;
    }
}
