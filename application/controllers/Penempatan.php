<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penempatan extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('SiswaKelas_model');
    $this->load->model('Siswa_model');
    $this->load->model('Kelas_model');
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('auth');
    }
  }

  public function index() {
    $data['title'] = 'Penempatan Siswa ke Kelas';
    $data['penempatan'] = $this->SiswaKelas_model->get_all();
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('penempatan/index', $data);
    $this->load->view('layouts/footer');
  }

  public function tambah() {
    $data['siswa'] = $this->Siswa_model->get_all();
    $data['kelas'] = $this->Kelas_model->get_all();
    $this->load->view('layouts/header', ['title' => 'Tambah Penempatan']);
    $this->load->view('layouts/sidebar');
    $this->load->view('penempatan/tambah', $data);
    $this->load->view('layouts/footer');
  }

  public function simpan() {
    $data = [
      'id_siswa' => $this->input->post('id_siswa'),
      'id_kelas' => $this->input->post('id_kelas'),
      'tahun_ajaran' => $this->input->post('tahun_ajaran')
    ];
    $this->SiswaKelas_model->insert($data);
    redirect('penempatan');
  }

  public function hapus($id) {
    $this->SiswaKelas_model->delete($id);
    redirect('penempatan');
  }
}
