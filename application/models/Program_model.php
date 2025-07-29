<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_model extends CI_Model {

  public function get_all() {
    return $this->db->get('program_kursus')->result();
  }

  public function get_by_id($id) {
    return $this->db->get_where('program_kursus', ['id' => $id])->row();
  }

  public function insert($data) {
    return $this->db->insert('program_kursus', $data);
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update('program_kursus', $data);
  }

  public function delete($id) {
    return $this->db->where('id', $id)->delete('program_kursus');
  }
}
