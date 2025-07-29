<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

  public function get_all() {
    $this->db->select('jadwal.*, 
                       program_kursus.nama_program, 
                       kelas.nama_kelas, 
                       pengajar.nama as nama_pengajar');
    $this->db->from('jadwal');
    $this->db->join('program_kursus', 'jadwal.id_program = program_kursus.id', 'left');
    $this->db->join('kelas', 'jadwal.id_kelas = kelas.id', 'left');
    $this->db->join('pengajar', 'jadwal.id_pengajar = pengajar.id', 'left');
    return $this->db->get()->result();
  }
  
  public function insert($data) {
    $this->db->insert('jadwal', $data);
  }

  public function get_by_pengajar($id_pengajar) {
    $this->db->select('jadwal.*, kelas.nama_kelas, program_kursus.nama_program as program_kursus');
    $this->db->from('jadwal');
    $this->db->join('kelas', 'jadwal.id_kelas = kelas.id', 'left');
    $this->db->join('program_kursus', 'jadwal.id_program = program_kursus.id', 'left');
    $this->db->where('jadwal.id_pengajar', $id_pengajar);
    return $this->db->get()->result();
  }
  
  

  // contoh: get_by_kelas
  public function get_by_kelas($id_kelas) {
    $this->db->select('jadwal.*, 
                       kelas.nama_kelas, 
                       program_kursus.nama_program as nama_program, 
                       pengajar.nama as nama_pengajar');
    $this->db->from('jadwal');
    $this->db->join('kelas', 'jadwal.id_kelas = kelas.id', 'left');
    $this->db->join('pengajar', 'jadwal.id_pengajar = pengajar.id', 'left');
    $this->db->join('program_kursus', 'jadwal.id_program = program_kursus.id', 'left');
    $this->db->where('jadwal.id_kelas', $id_kelas);
    return $this->db->get()->result();
  }
  
  
  public function get_detail_by_id($id) {
    $this->db->select('jadwal.*, program_kursus.nama_program, kelas.nama_kelas');
    $this->db->from('jadwal');
    $this->db->join('program_kursus', 'jadwal.id_program = program_kursus.id', 'left');
    $this->db->join('kelas', 'jadwal.id_kelas = kelas.id', 'left');
    $this->db->where('jadwal.id', $id);
    return $this->db->get()->row(); // Mengembalikan 1 baris
  }
  
  public function hapus($id) {
    $this->db->where('id', $id);
    return $this->db->delete('jadwal');
}


  

  public function delete($id) {
    $this->db->delete('jadwal', ['id' => $id]);
  }

  public function get_by_id($id) {
    return $this->db->get_where('jadwal', ['id' => $id])->row();
  }
  
  public function update($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('jadwal', $data);
  }

  public function get_filtered($id_program = null, $id_pengajar = null) {
    $this->db->select('jadwal.*, program_kursus.nama_program, kelas.nama_kelas, pengajar.nama as nama_pengajar');
    $this->db->from('jadwal');
    $this->db->join('program_kursus', 'jadwal.id_program = program_kursus.id', 'left');
    $this->db->join('kelas', 'jadwal.id_kelas = kelas.id', 'left');
    $this->db->join('pengajar', 'jadwal.id_pengajar = pengajar.id', 'left');
  
    if (!empty($id_program)) {
      $this->db->where('jadwal.id_program', $id_program);
    }
  
    if (!empty($id_pengajar)) {
      $this->db->where('jadwal.id_pengajar', $id_pengajar);
    }
  
    return $this->db->get()->result();
  }
  
  public function get_jadwal_by_siswa($id_siswa) {
    $this->db->select('jadwal.*, program_kursus.nama_program, pengajar.nama as nama_pengajar, kelas.nama_kelas');
    $this->db->from('siswa_kelas');
    $this->db->join('jadwal', 'jadwal.id_kelas = siswa_kelas.id_kelas');
    $this->db->join('program_kursus', 'jadwal.id_program = program_kursus.id', 'left');
    $this->db->join('pengajar', 'jadwal.id_pengajar = pengajar.id', 'left');
    $this->db->join('kelas', 'jadwal.id_kelas = kelas.id', 'left');
    $this->db->where('siswa_kelas.id_siswa', $id_siswa);
    $this->db->group_by('jadwal.id'); // hindari duplikat
    return $this->db->get()->result();
}


}
