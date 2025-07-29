<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

  public function get_all() {
    return $this->db->get('kelas')->result();
  }

  public function get_by_id($id) {
    return $this->db->get_where('kelas', ['id' => $id])->row();
  }

  public function insert($data) {
    $this->db->insert('kelas', $data);
  }

  public function update($id, $data) {
    $this->db->where('id', $id)->update('kelas', $data);
  }

  public function delete($id) {
    $this->db->delete('kelas', ['id' => $id]);
  }
}
