<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (
      !$this->session->userdata('admin_logged_in') &&
      !$this->session->userdata('pengajar_logged_in')
    ) {
      redirect('auth');
    }
    
    $this->load->model('Pengajar_model');
  }

  public function index() {
    $data['title'] = 'Data Pengajar';
    $data['pengajar'] = $this->Pengajar_model->get_all();
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('pengajar/index', $data);
    $this->load->view('layouts/footer');
  }

  public function tambah() {
    $this->load->view('layouts/header', ['title' => 'Tambah Pengajar']);
    $this->load->view('layouts/sidebar');
    $this->load->view('pengajar/tambah');
    $this->load->view('layouts/footer');
  }

  public function simpan() {
    $config['upload_path'] = './uploads/pengajar/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size'] = 2048;
    $this->load->library('upload', $config);
  
    $foto = '';
    if ($this->upload->do_upload('foto')) {
      $foto = $this->upload->data('file_name');
    }
  
    $data = [
      'nama' => $this->input->post('nama'),
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password')),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'agama' => $this->input->post('agama'),
      'alamat' => $this->input->post('alamat'),
      'no_hp' => $this->input->post('no_hp'),
      'email' => $this->input->post('email'),
      'pendidikan' => $this->input->post('pendidikan'),
      'pengalaman' => $this->input->post('pengalaman'),
      'foto' => $foto
    ];
  
    $this->Pengajar_model->insert($data);
    redirect('pengajar');
  }
  
  
  public function edit($id) {
    $data['pengajar'] = $this->Pengajar_model->get_by_id($id);
    $this->load->view('layouts/header', ['title' => 'Edit Pengajar']);
    $this->load->view('layouts/sidebar');
    $this->load->view('pengajar/edit', $data);
    $this->load->view('layouts/footer');
  }

  public function update($id) {
    $config['upload_path'] = './uploads/pengajar/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size'] = 2048;
    $this->load->library('upload', $config);
  
    $pengajar = $this->Pengajar_model->get_by_id($id);
    $foto = $pengajar->foto;
  
    if ($this->upload->do_upload('foto')) {
      // hapus foto lama jika ada
      if ($foto && file_exists('./uploads/pengajar/' . $foto)) {
        unlink('./uploads/pengajar/' . $foto);
      }
      $foto = $this->upload->data('file_name');
    }
  
    $data = [
      'nama' => $this->input->post('nama'),
      'username' => $this->input->post('username'),
      'alamat' => $this->input->post('alamat'),
      'no_hp' => $this->input->post('no_hp'),
      'email' => $this->input->post('email'),
      'foto' => $foto
    ];
  
    if ($this->input->post('password')) {
      $data['password'] = md5($this->input->post('password'));
    }
  
    $this->Pengajar_model->update($id, $data);
    redirect('pengajar');
  }

  public function detail($id) {
    $data['pengajar'] = $this->Pengajar_model->get_by_id($id);
    $this->load->view('layouts/header', ['title' => 'Detail Pengajar']);
    $this->load->view('layouts/sidebar');
    $this->load->view('pengajar/detail', $data);
    $this->load->view('layouts/footer');
  }
  
  public function dashboard() {
    if (!$this->session->userdata('pengajar_logged_in')) {
      redirect('auth');
    }
  
    $id_pengajar = $this->session->userdata('id_pengajar');
    $this->load->model('Jadwal_model');
    $this->load->model('Presensi_model');
  
    $jadwal = $this->Jadwal_model->get_by_pengajar($id_pengajar);
  
    // Tambahkan status presensi hari ini ke setiap jadwal
    foreach ($jadwal as &$j) {
      $j->presensi_ada = $this->Presensi_model->cek_presensi_jadwal($j->id, date('Y-m-d'));
    }
  
    $data = [
      'title' => 'Dashboard Pengajar',
      'jadwal' => $jadwal
    ];
  
    $this->load->view('layouts/header_pengajar', $data);
    $this->load->view('pengajar/dashboard', $data);
    $this->load->view('layouts/footer');
  }
  public function hapus($id) {
    $this->load->model('Pengajar_model');
    $this->Pengajar_model->hapus($id);
    $this->session->set_flashdata('success', 'Data pengajar berhasil dihapus!');
    redirect('pengajar');
}

  
  
  
}
