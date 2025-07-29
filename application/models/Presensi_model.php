<?php
class Presensi_model extends CI_Model {

  public function insert($data) {
    $this->db->insert('presensi', $data);
  }

  public function get_by_jadwal($id_jadwal) {
    return $this->db->get_where('presensi', ['id_jadwal' => $id_jadwal])->result();
  }

  public function cek_presensi_jadwal($id_jadwal, $tanggal) {
    $this->db->where('id_jadwal', $id_jadwal);
    $this->db->where('tanggal', $tanggal);
    $query = $this->db->get('presensi');
    return $query->num_rows() > 0;
}

  public function cek_presensi_hari_ini($id_jadwal, $tanggal) {
    $this->db->where('id_jadwal', $id_jadwal);
    $this->db->where('tanggal', $tanggal);
    $query = $this->db->get('presensi');
    return $query->num_rows() > 0;
  }
  public function get_by_jadwal_and_tanggal($id_jadwal, $tanggal) {
    $this->db->select('presensi.*, siswa.nama as nama_siswa');
    $this->db->from('presensi');
    $this->db->join('siswa', 'presensi.id_siswa = siswa.id', 'left');
    $this->db->where('presensi.id_jadwal', $id_jadwal);
    $this->db->where('presensi.tanggal', $tanggal);
    return $this->db->get()->result();
  }
  
  
  
  public function update($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('presensi', $data);
  }
  
  public function rekap_by_siswa($id_siswa) {
    $this->db->select('status, COUNT(*) as total');
    $this->db->where('id_siswa', $id_siswa);
    $this->db->group_by('status');
    return $this->db->get('presensi')->result();
  }
  
  public function rekap_all_siswa() {
    $this->db->select('siswa.nama as nama_siswa, siswa.nisn, presensi.status, COUNT(*) as total');
    $this->db->from('presensi');
    $this->db->join('siswa', 'siswa.id = presensi.id_siswa');
    $this->db->group_by(['presensi.id_siswa', 'presensi.status']);
    return $this->db->get()->result();
  }
  public function rekap_per_siswa($id_siswa, $bulan = null, $tahun = null) {
    // Ambil data status presensi + jumlah masing-masing status
    $this->db->select('presensi.status, COUNT(*) as total, siswa.nama as nama_siswa, kelas.nama_kelas');
    $this->db->from('presensi');
    $this->db->join('siswa', 'presensi.id_siswa = siswa.id', 'left');
    $this->db->join('jadwal', 'presensi.id_jadwal = jadwal.id', 'left');
    $this->db->join('kelas', 'jadwal.id_kelas = kelas.id', 'left');
    $this->db->where('presensi.id_siswa', $id_siswa);

    if ($bulan && $tahun) {
        $this->db->where('MONTH(presensi.tanggal)', $bulan);
        $this->db->where('YEAR(presensi.tanggal)', $tahun);
    }

    $this->db->group_by('presensi.status');
    return $this->db->get()->result();
}


  public function rekap_per_kelas($id_kelas, $bulan = null, $tahun = null) {
    $this->db->select('siswa.nama as nama_siswa, siswa.nisn, presensi.status, COUNT(*) as total');
    $this->db->from('presensi');
    $this->db->join('siswa', 'siswa.id = presensi.id_siswa');
    $this->db->join('jadwal', 'presensi.id_jadwal = jadwal.id');
    $this->db->where('jadwal.id_kelas', $id_kelas);

    if ($bulan && $tahun) {
      $this->db->where('MONTH(presensi.tanggal)', $bulan);
      $this->db->where('YEAR(presensi.tanggal)', $tahun);
    }

    $this->db->group_by(['presensi.id_siswa', 'presensi.status']);
    return $this->db->get()->result();
  }

  public function rekap_bulanan($bulan, $tahun) {
    $this->db->select('siswa.nama as nama_siswa, siswa.nisn, presensi.status, COUNT(*) as total');
    $this->db->from('presensi');
    $this->db->join('siswa', 'siswa.id = presensi.id_siswa');
    $this->db->where('MONTH(presensi.tanggal)', $bulan);
    $this->db->where('YEAR(presensi.tanggal)', $tahun);
    $this->db->group_by(['presensi.id_siswa', 'presensi.status']);
    return $this->db->get()->result();
  }
  public function rekap_presensi($kelas_id, $bulan) {
    $this->db->select("
        siswa.id,
        siswa.nama as nama_siswa,
        SUM(CASE WHEN presensi.status = 'Hadir' THEN 1 ELSE 0 END) as hadir,
        SUM(CASE WHEN presensi.status = 'Izin' THEN 1 ELSE 0 END) as izin,
        SUM(CASE WHEN presensi.status = 'Sakit' THEN 1 ELSE 0 END) as sakit,
        SUM(CASE WHEN presensi.status = 'Alpha' THEN 1 ELSE 0 END) as alpha
    ");
    $this->db->from('presensi');
    $this->db->join('siswa', 'siswa.id = presensi.id_siswa');
    $this->db->join('jadwal', 'presensi.id_jadwal = jadwal.id');
    $this->db->where('jadwal.id_kelas', $kelas_id);
    $this->db->like('presensi.tanggal', $bulan); // '2025-07'
    $this->db->group_by('siswa.id');
    return $this->db->get()->result();
  }
  public function get_by_siswa($id_siswa) {
    $this->db->select('presensi.*, kelas.nama_kelas, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai');
    $this->db->from('presensi');
    $this->db->join('jadwal', 'presensi.id_jadwal = jadwal.id');
    $this->db->join('kelas', 'jadwal.id_kelas = kelas.id');
    $this->db->where('presensi.id_siswa', $id_siswa);
    $this->db->order_by('presensi.tanggal', 'DESC');
    return $this->db->get()->result();
}

public function get_presensi_siswa($id_siswa) {
  $this->db->select('presensi.*, kelas.nama_kelas');
  $this->db->from('presensi');
  $this->db->join('jadwal', 'presensi.id_jadwal = jadwal.id');
  $this->db->join('kelas', 'jadwal.id_kelas = kelas.id');
  $this->db->where('presensi.id_siswa', $id_siswa);
  $this->db->order_by('presensi.tanggal', 'DESC');
  return $this->db->get()->result();
}
public function statistik_presensi_siswa($id_siswa) {
  $this->db->select('status, COUNT(*) as total');
  $this->db->from('presensi');
  $this->db->where('id_siswa', $id_siswa);
  $this->db->group_by('status');
  $result = $this->db->get()->result();

  // Siapkan hasil default
  $statistik = [
    'Hadir' => 0,
    'Izin' => 0,
    'Sakit' => 0,
    'Alpha' => 0,
  ];

  foreach ($result as $row) {
    $status = ucfirst(strtolower($row->status));
    if (isset($statistik[$status])) {
      $statistik[$status] = $row->total;
    }
  }

  return $statistik;
}
public function hapus_by_jadwal($id_jadwal)
{
    $this->db->where('id_jadwal', $id_jadwal);
    $this->db->delete('presensi');
}
public function hapus($id)
{
    $this->db->where('id', $id);
    $this->db->delete('jadwal');
}

}
