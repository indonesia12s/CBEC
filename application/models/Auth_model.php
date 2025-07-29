<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

  public function cek_admin($username, $password) {
    return $this->db->get_where('admin', [
      'username' => $username,
      'password' => $password
    ])->row();
  }
}
