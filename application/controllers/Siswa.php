<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

  public function __construct() {
    parent::__construct();

    // Cek apakah admin atau siswa sudah login
    if (!$this->session->userdata('admin_logged_in') && !$this->session->userdata('siswa_logged_in')) {
      redirect('auth');
    }

    $this->load->model('Siswa_model');
  }

  public function index() {
    $data['title'] = 'Data Siswa';
    $data['siswa'] = $this->Siswa_model->get_all();

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('siswa/index', $data);
    $this->load->view('layouts/footer');
  }

  public function tambah() {
    $data['title'] = 'Tambah Siswa';
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('siswa/tambah');
    $this->load->view('layouts/footer');
  }

  public function simpan() {
    $config['upload_path']   = './uploads/siswa/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    $foto = '';
    if ($this->upload->do_upload('foto')) {
      $foto = $this->upload->data('file_name');
    }

    $data = [
      'nama'           => $this->input->post('nama'),
      'nisn'           => $this->input->post('nisn'),
      'nik'            => $this->input->post('nik'),
      'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
      'tempat_lahir'   => $this->input->post('tempat_lahir'),
      'tanggal_lahir'  => $this->input->post('tanggal_lahir'),
      'alamat'         => $this->input->post('alamat'),
      'no_hp'          => $this->input->post('no_hp'),
      'email'          => $this->input->post('email'),
      'pendidikan'     => $this->input->post('pendidikan'),
      'foto'           => $foto,
      'password'       => md5($this->input->post('password'))
    ];

    $this->Siswa_model->insert($data);
    redirect('siswa');
  }

  public function edit($id) {
    $siswa = $this->Siswa_model->get_by_id($id);
    if (!$siswa) {
      show_404();
    }

    $data['title'] = 'Edit Siswa';
    $data['siswa'] = $siswa;
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('siswa/edit', $data);
    $this->load->view('layouts/footer');
  }

  public function update($id) {
    $siswa = $this->Siswa_model->get_by_id($id);
    if (!$siswa) {
      show_404();
    }

    $config['upload_path']   = './uploads/siswa/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    $foto = $siswa->foto;

    if ($this->upload->do_upload('foto')) {
      if ($foto && file_exists('./uploads/siswa/' . $foto)) {
        unlink('./uploads/siswa/' . $foto);
      }
      $foto = $this->upload->data('file_name');
    }

    $data = [
      'nama'           => $this->input->post('nama'),
      'nisn'           => $this->input->post('nisn'),
      'nik'            => $this->input->post('nik'),
      'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
      'tempat_lahir'   => $this->input->post('tempat_lahir'),
      'tanggal_lahir'  => $this->input->post('tanggal_lahir'),
      'alamat'         => $this->input->post('alamat'),
      'no_hp'          => $this->input->post('no_hp'),
      'email'          => $this->input->post('email'),
      'pendidikan'     => $this->input->post('pendidikan'),
      'foto'           => $foto
    ];

    if ($this->input->post('password')) {
      $data['password'] = md5($this->input->post('password'));
    }

    $this->Siswa_model->update($id, $data);
    redirect('siswa');
  }

  public function hapus($id) {
    $siswa = $this->Siswa_model->get_by_id($id);
    if ($siswa && $siswa->foto && file_exists('./uploads/siswa/' . $siswa->foto)) {
      unlink('./uploads/siswa/' . $siswa->foto);
    }
    $this->Siswa_model->delete($id);
    redirect('siswa');
  }

  public function detail($id) {
    $siswa = $this->Siswa_model->get_by_id($id);
    if (!$siswa) {
      show_404();
    }

    $data['title'] = 'Detail Siswa';
    $data['siswa'] = $siswa;

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('siswa/detail', $data);
    $this->load->view('layouts/footer');
  }

  public function dashboard() {
    // Cek login siswa
    if (!$this->session->userdata('siswa_logged_in')) {
      redirect('auth');
    }

    $id_siswa = $this->session->userdata('id_siswa');

    $this->load->model('SiswaKelas_model');
    $this->load->model('Jadwal_model');
    $this->load->model('Presensi_model');

    $jadwal = $this->Jadwal_model->get_jadwal_by_siswa($id_siswa);
    $statistik = $this->Presensi_model->statistik_presensi_siswa($id_siswa);

    $data = [
      'title'     => 'Dashboard Siswa',
      'jadwal'    => $jadwal,
      'statistik' => $statistik
    ];

    $this->load->view('layouts/header_siswa', $data);
    $this->load->view('siswa/dashboard', $data);
    $this->load->view('layouts/footer');
  }

  public function jadwal() {
    if (!$this->session->userdata('siswa_logged_in')) {
      redirect('auth');
    }

    $id_siswa = $this->session->userdata('id_siswa');
    $data['jadwal'] = $this->Siswa_model->getJadwalSiswa($id_siswa);
    $this->load->view('siswa/jadwal', $data);
  }

  public function presensi() {
    if (!$this->session->userdata('siswa_logged_in')) {
      redirect('auth');
    }

    $id_siswa = $this->session->userdata('id_siswa');
    $data['presensi'] = $this->Siswa_model->getPresensiSiswa($id_siswa);
    $this->load->view('siswa/presensi', $data);
  }
}
