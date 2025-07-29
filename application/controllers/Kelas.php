<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Kelas_model');
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('auth');
    }
  }

  public function index() {
    $data['title'] = 'Data Kelas';
    $data['kelas'] = $this->Kelas_model->get_all();
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('kelas/index', $data);
    $this->load->view('layouts/footer');
  }

  public function tambah() {
    $this->load->view('layouts/header', ['title' => 'Tambah Kelas']);
    $this->load->view('layouts/sidebar');
    $this->load->view('kelas/tambah');
    $this->load->view('layouts/footer');
  }

  public function simpan() {
    $data = ['nama_kelas' => $this->input->post('nama_kelas')];
    $this->Kelas_model->insert($data);
    redirect('kelas');
  }

  public function edit($id) {
    $data['kelas'] = $this->Kelas_model->get_by_id($id);
    $this->load->view('layouts/header', ['title' => 'Edit Kelas']);
    $this->load->view('layouts/sidebar');
    $this->load->view('kelas/edit', $data);
    $this->load->view('layouts/footer');
  }

  public function update($id) {
    $data = ['nama_kelas' => $this->input->post('nama_kelas')];
    $this->Kelas_model->update($id, $data);
    redirect('kelas');
  }

  public function hapus($id) {
    $this->Kelas_model->delete($id);
    redirect('kelas');
  }
}
