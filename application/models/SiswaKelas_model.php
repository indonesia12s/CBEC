<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaKelas_model extends CI_Model {

  public function get_all() {
    $this->db->select('siswa_kelas.*, siswa.nama as nama_siswa, kelas.nama_kelas');
    $this->db->from('siswa_kelas');
    $this->db->join('siswa', 'siswa.id = siswa_kelas.id_siswa');
    $this->db->join('kelas', 'kelas.id = siswa_kelas.id_kelas');
    return $this->db->get()->result();
  }

  public function insert($data) {
    $this->db->insert('siswa_kelas', $data);
  }

  public function delete($id) {
    $this->db->delete('siswa_kelas', ['id' => $id]);
  }

  public function get_by_siswa($id_siswa) {
    $this->db->from('siswa_kelas');
    $this->db->where('id_siswa', $id_siswa);
    return $this->db->get()->row(); // Ambil satu data (karena 1 siswa hanya punya 1 kelas)
  }
  
  public function get_all_kelas_by_siswa($id_siswa) {
    $this->db->select('penempatan_siswa.*, kelas.nama_kelas');
    $this->db->from('penempatan_siswa');
    $this->db->join('kelas', 'kelas.id = penempatan_siswa.id_kelas');
    $this->db->where('penempatan_siswa.id_siswa', $id_siswa);
    return $this->db->get()->result();
}

}
