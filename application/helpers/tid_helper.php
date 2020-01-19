<?php

function cek_login()
{
  $tid = get_instance();  //instan ci baru ($tid), untuk mengambil fitur session yang ada di CI
    if(!$tid->session->userdata('email')){
      redirect('auth');
    } else {
      $role_id = $tid->session->userdata('role_id');
      $menu = $tid->uri->segment(1);

      $queryMenu = $tid->db->get_where('user_menu', ['menu' => $menu])->row_array
      ();

      $menu_id= $queryMenu['id'];

      $userAccess = $tid->db->get_where('user_access_menu', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
        ]);

      if($userAccess->num_rows() < 1){
        redirect('auth/blocked');
      }


    }
}
  // Dilarang Mengedit codingan ini
  // Kecuali Tim Techno Ice Dev

  function check_akses($role_id, $menu_id)
  {
    $tid = get_instance();

    $tid->db->where('role_id', $role_id);
    $tid->db->where('menu_id', $menu_id);
    $result = $tid->db->get('user_access_menu');

    if($result->num_rows() > 0){
      return "checked='checked'";
    }
  }

?>