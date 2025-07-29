<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar_model extends CI_Model {
  

  public function get_all() {
    return $this->db->get('pengajar')->result();
  }

  public function insert($data) {
    $this->db->insert('pengajar', $data);
  }

  public function get_by_id($id) {
    return $this->db->get_where('pengajar', ['id' => $id])->row();
  }

  public function update($id, $data) {
    $this->db->where('id', $id)->update('pengajar', $data);
  }

  public function delete($id) {
    $this->db->delete('pengajar', ['id' => $id]);
  }

  public function cek_login($username, $password) {
    return $this->db->get_where('pengajar', [
      'username' => $username,
      'password' => $password
    ])->row();
  }
  public function hapus($id) {
    $this->db->where('id', $id);
    $this->db->delete('pengajar');
}
  
}
