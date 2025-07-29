<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_siswa extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('siswa_logged_in')) {
      redirect('auth');
    }
    $this->load->model('Siswa_model');
    $this->load->model('Jadwal_model');
  }

  public function index() {
    $siswa_id = $this->session->userdata('siswa_id');
    $siswa = $this->Siswa_model->get_by_id($siswa_id);
    $data['jadwal'] = $this->Jadwal_model->get_by_kelas($siswa->id_kelas);
    $data['title'] = 'Jadwal Saya';

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar_siswa');
    $this->load->view('jadwal/jadwal_siswa', $data);
    $this->load->view('layouts/footer');
  }
}
