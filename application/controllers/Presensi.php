<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('pengajar_logged_in')) {
      redirect('auth');
    }
    $this->load->model('Presensi_model');
    $this->load->model('Jadwal_model');
    $this->load->model('Siswa_model');
  }

  public function input($id_jadwal) {
    $this->load->model('Jadwal_model');
    $this->load->model('Presensi_model');
  
    $jadwal = $this->Jadwal_model->get_by_id($id_jadwal);
    $tanggal_hari_ini = date('Y-m-d');
  
    // Cek apakah sudah ada presensi untuk jadwal dan tanggal ini
    $sudah_presensi = $this->Presensi_model->cek_presensi_hari_ini($id_jadwal, $tanggal_hari_ini);
  
    if ($sudah_presensi) {
      // Redirect ke halaman lihat presensi
      redirect('presensi/lihat/' . $id_jadwal);
    } else {
      // Lanjut ke input form
      $siswa = $this->Siswa_model->get_by_kelas($jadwal->id_kelas);
      $data = [
        'jadwal' => $jadwal,
        'siswa' => $siswa,
        'title' => 'Input Presensi'
      ];
      $this->load->view('layouts/header_pengajar', $data);
      $this->load->view('presensi/input', $data);
    }
  }
  

  public function simpan() {
    $id_jadwal = $this->input->post('id_jadwal');
    $tanggal = $this->input->post('tanggal');
    $siswa_id = $this->input->post('id_siswa');
    $status = $this->input->post('status');

    foreach ($siswa_id as $i => $id) {
      $this->Presensi_model->insert([
        'id_jadwal' => $id_jadwal,
        'id_siswa' => $id,
        'tanggal' => $tanggal,
        'status' => $status[$i]
      ]);
    }

    $this->session->set_flashdata('success', 'Presensi berhasil disimpan!');
    redirect('pengajar/dashboard');
  }
  public function dashboard() {
    // Pastikan user pengajar sudah login
    if (!$this->session->userdata('pengajar_logged_in')) {
      redirect('auth');
    }
  
    $this->load->model('Jadwal_model');
    $this->load->model('Presensi_model');
  
    $id_pengajar = $this->session->userdata('id_pengajar');
    $jadwal = $this->Jadwal_model->get_by_pengajar($id_pengajar);
  
    // Tambahkan status presensi hari ini
    foreach ($jadwal as &$j) {
      $j->presensi_ada = $this->Presensi_model->cek_presensi_jadwal($j->id, date('Y-m-d'));
    }
  
    $data['title'] = 'Dashboard Pengajar';
    $data['jadwal'] = $jadwal;
  
    $this->load->view('layouts/header_pengajar', $data);
    $this->load->view('pengajar/dashboard', $data);
    $this->load->view('layouts/footer');
  }
  public function lihat($id_jadwal) {
    $tanggal = date('Y-m-d');
    $data['presensi'] = $this->Presensi_model->get_by_jadwal_and_tanggal($id_jadwal, $tanggal);
    $data['title'] = 'Lihat Presensi';
  
    $this->load->view('layouts/header_pengajar', $data);
    $this->load->view('presensi/lihat', $data);
  }
  
  public function edit($id_jadwal) {
    $tanggal = date('Y-m-d');
  
    // Ambil data jadwal lengkap (dengan nama_program dan nama_kelas)
    $jadwal = $this->Jadwal_model->get_detail_by_id($id_jadwal); // 👈 Buat fungsi ini di model
    
    // Ambil presensi hari ini
    $presensi = $this->Presensi_model->get_by_jadwal_and_tanggal($id_jadwal, $tanggal);
  
    $data['jadwal'] = $jadwal;
    $data['presensi'] = $presensi;
    $data['title'] = 'Edit Presensi';
  
    $this->load->view('layouts/header_pengajar', $data);
    $this->load->view('presensi/edit', $data);
    $this->load->view('layouts/footer');
  }
  
  
  public function update() {
    $id_jadwal = $this->input->post('id_jadwal');
    $tanggal = $this->input->post('tanggal');
    $id_presensi = $this->input->post('id_presensi');
    $status = $this->input->post('status');
  
    foreach ($id_presensi as $i => $id) {
      $this->Presensi_model->update($id, ['status' => $status[$i]]);
    }
  
    $this->session->set_flashdata('success', 'Presensi berhasil diperbarui!');
    redirect('pengajar/dashboard');
  }
  public function rekap() {
    if (!$this->session->userdata('pengajar_logged_in')) {
      redirect('auth');
    }
  
    $this->load->model('Kelas_model');
    $this->load->model('Presensi_model');
  
    $kelas_id = $this->input->get('kelas');
    $bulan = $this->input->get('bulan');
  
    $rekap = [];
    if ($kelas_id && $bulan) {
      $rekap = $this->Presensi_model->rekap_presensi($kelas_id, $bulan);
    }
  
    $data = [
      'title' => 'Rekap Presensi',
      'kelas_list' => $this->Kelas_model->get_all(),
      'rekap' => $rekap,
      'selected_kelas' => $kelas_id,
      'selected_bulan' => $bulan
    ];
  
    $this->load->view('layouts/header_pengajar', $data);
    $this->load->view('presensi/rekap', $data);
    $this->load->view('layouts/footer');
  }
  
  
  
  public function export_excel() {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=rekap_presensi.xls");
  
    $kelas_id = $this->input->get('kelas');
    $bulan = $this->input->get('bulan');
  
    $this->load->model('Presensi_model');
    $data['rekap'] = $this->Presensi_model->rekap_presensi($kelas_id, $bulan);
    $data['bulan'] = $bulan;
  
    $this->load->view('presensi/export_excel', $data);
  }
  public function siswa_presensi() {
    if (!$this->session->userdata('siswa_logged_in')) {
        redirect('auth');
    }

    $this->load->model('Presensi_model');

    $id_siswa = $this->session->userdata('id_siswa');
    $data['presensi'] = $this->Presensi_model->get_by_siswa($id_siswa);
    $data['title'] = 'Presensi Saya';

    $this->load->view('layouts/header_siswa', $data);
    $this->load->view('presensi/siswa_presensi', $data);
    $this->load->view('layouts/footer');
}

}
