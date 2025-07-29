<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

  public function get_all() {
    return $this->db->get('siswa')->result();
  }

  public function insert($data) {
    $this->db->insert('siswa', $data);
  }

  public function get_by_id($id) {
    return $this->db->get_where('siswa', ['id' => $id])->row();
  }

  public function update($id, $data) {
    $this->db->where('id', $id)->update('siswa', $data);
  }

  public function delete($id) {
    $this->db->delete('siswa', ['id' => $id]);
  }

  public function cek_login($username, $password) {
    $this->db->where('nisn', $username); // asumsi siswa login pakai NISN
    $this->db->where('password', $password);
    return $this->db->get('siswa')->row();
  }
  
  public function get_by_kelas($id_kelas) {
    $this->db->select('siswa.*');
    $this->db->from('siswa');
    $this->db->join('siswa_kelas', 'siswa.id = siswa_kelas.id_siswa');
    $this->db->where('siswa_kelas.id_kelas', $id_kelas);
    return $this->db->get()->result();
  }
  public function getJadwalSiswa($id_siswa) {
    return $this->db->query("
        SELECT jk.*, p.nama_program, k.nama_kelas, pg.nama_pengajar
        FROM jadwal_kelas jk
        JOIN kelas k ON jk.id_kelas = k.id
        JOIN program_kursus p ON k.id_program = p.id
        JOIN pengajar pg ON jk.id_pengajar = pg.id
        JOIN siswa_kelas sk ON sk.id_kelas = k.id
        WHERE sk.id_siswa = '$id_siswa'
    ")->result();
}

public function getPresensiSiswa($id_siswa) {
    return $this->db->query("
        SELECT pr.*, jk.hari, jk.jam, pg.nama_pengajar
        FROM presensi pr
        JOIN jadwal_kelas jk ON pr.id_jadwal = jk.id
        JOIN pengajar pg ON jk.id_pengajar = pg.id
        WHERE pr.id_siswa = '$id_siswa'
    ")->result();
}

}
