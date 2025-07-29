<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Admin_model');
    $this->load->model('Siswa_model');
    $this->load->model('Pengajar_model');
  }

  public function index() {
    $this->load->view('login_form'); // Form login view
  }

  public function login() {
    $username = $this->input->post('username');
    $password = md5($this->input->post('password')); // md5 untuk kecocokan
    $role     = $this->input->post('role');

    if ($role == 'admin') {
      $admin = $this->Admin_model->cek_login($username, $password);
      if ($admin) {
        $this->session->set_userdata([
          'admin_logged_in' => true,
          'admin_username'  => $admin->username
        ]);
        redirect('admin/dashboard');
      }

    } elseif ($role == 'pengajar') {
      $pengajar = $this->Pengajar_model->cek_login($username, $password);
      if ($pengajar) {
        $this->session->set_userdata([
          'pengajar_logged_in' => true,
          'id_pengajar'        => $pengajar->id,
          'nama_pengajar'      => $pengajar->nama,
          'email_pengajar'     => $pengajar->email,
          'no_hp_pengajar'     => $pengajar->no_hp,
          'alamat_pengajar'    => $pengajar->alamat,
          'foto_pengajar'      => $pengajar->foto
        ]);
        redirect('pengajar/dashboard');
      }

    } elseif ($role == 'siswa') {
      $siswa = $this->Siswa_model->cek_login($username, $password);
      if ($siswa) {
        $this->session->set_userdata([
          'siswa_logged_in' => true,
          'id_siswa'        => $siswa->id,
          'nama_siswa'      => $siswa->nama,
          'nisn_siswa'      => $siswa->nisn,
          'email_siswa'     => $siswa->email,
          'no_hp_siswa'     => $siswa->no_hp,
          'alamat_siswa'    => $siswa->alamat,
          'foto_siswa'      => $siswa->foto
        ]);
        redirect('siswa/dashboard');
      }
    }

    // Jika login gagal
    $this->session->set_flashdata('error', 'Username atau password salah');
    redirect('auth');
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('auth');
  }
}
