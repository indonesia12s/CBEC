<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('auth');
    }
    $this->load->model('Program_model');
  }

  public function index() {
    $data['title'] = 'Program Kursus';
    $data['program'] = $this->Program_model->get_all();
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('program/index', $data);
    $this->load->view('layouts/footer');
  }

  public function tambah() {
    $this->load->view('layouts/header', ['title' => 'Tambah Program']);
    $this->load->view('layouts/sidebar');
    $this->load->view('program/tambah');
    $this->load->view('layouts/footer');
  }

  public function simpan() {
    $data = ['nama_program' => $this->input->post('nama_program')];
    $this->Program_model->insert($data);
    redirect('program');
  }

  public function edit($id) {
    $data['program'] = $this->Program_model->get_by_id($id);
    $this->load->view('layouts/header', ['title' => 'Edit Program']);
    $this->load->view('layouts/sidebar');
    $this->load->view('program/edit', $data);
    $this->load->view('layouts/footer');
  }

  public function update($id) {
    $data = ['nama_program' => $this->input->post('nama_program')];
    $this->Program_model->update($id, $data);
    redirect('program');
  }

  public function hapus($id) {
    $this->Program_model->delete($id);
    redirect('program');
  }
}
