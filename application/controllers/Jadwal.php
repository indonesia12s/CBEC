<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Jadwal_model');
    $this->load->model('Pengajar_model');
    $this->load->model('Kelas_model');
    $this->load->model('Program_model');

    if (!$this->session->userdata('admin_logged_in')) {
      redirect('auth');
    }
  }

  public function index() {
    $this->load->model('Program_model');
    $this->load->model('Pengajar_model');
  
    $program_id = $this->input->get('id_program');
    $pengajar_id = $this->input->get('id_pengajar');
  
    $data['title'] = 'Jadwal Kelas';
    $data['program'] = $this->Program_model->get_all();
    $data['pengajar'] = $this->Pengajar_model->get_all();
    $data['jadwal'] = $this->Jadwal_model->get_filtered($program_id, $pengajar_id);
  
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('jadwal/index', $data);
    $this->load->view('layouts/footer');
  }
  
  

  public function tambah() {
    $data['kelas'] = $this->Kelas_model->get_all();
    $data['pengajar'] = $this->Pengajar_model->get_all();
    $data['program'] = $this->Program_model->get_all();
    $data['title'] = 'Tambah Jadwal';
  
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('jadwal/tambah', $data);
    $this->load->view('layouts/footer');
  }
  

  public function simpan() {
    $data = [
      'id_kelas' => $this->input->post('id_kelas'),
      'id_pengajar' => $this->input->post('id_pengajar'),
      'id_program' => $this->input->post('id_program'), // ganti dari 'program_kursus'
      'hari' => $this->input->post('hari'),
      'jam_mulai' => $this->input->post('jam_mulai'),
      'jam_selesai' => $this->input->post('jam_selesai'),
      'ruang' => $this->input->post('ruang'),
    ];
    $this->Jadwal_model->insert($data);
    redirect('jadwal');
  }
  

  public function hapus($id)
{
    // Hapus presensi yang berkaitan terlebih dahulu
    $this->load->model('Presensi_model');
    $this->Presensi_model->hapus_by_jadwal($id);

    // Baru hapus jadwal
    $this->load->model('Jadwal_model');
    $this->Jadwal_model->hapus($id);

    $this->session->set_flashdata('success', 'Jadwal berhasil dihapus.');
    redirect('jadwal');
}


  public function update($id) {
    $data = [
      'id_program' => $this->input->post('id_program'),
      'id_kelas' => $this->input->post('id_kelas'),
      'id_pengajar' => $this->input->post('id_pengajar'),
      'hari' => $this->input->post('hari'),
      'jam_mulai' => $this->input->post('jam_mulai'),
      'jam_selesai' => $this->input->post('jam_selesai'),
      'ruang' => $this->input->post('ruang'),
    ];
    $this->Jadwal_model->update($id, $data);
    redirect('jadwal');
  }
  
  public function per_kelas() {
    $this->load->model('Kelas_model');
  
    $kelas_id = $this->input->get('id_kelas');
    $data['kelas'] = $this->Kelas_model->get_all();
    $data['title'] = 'Jadwal per Kelas';
    $data['jadwal'] = $kelas_id ? $this->Jadwal_model->get_by_kelas($kelas_id) : [];
  
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('jadwal/per_kelas', $data);
    $this->load->view('layouts/footer');
  }
  
  
  public function cetak_kelas() {
    $id_kelas = $this->input->get('id_kelas');
    $this->load->model('Kelas_model');
  
    $data['jadwal'] = $this->Jadwal_model->get_by_kelas($id_kelas);
    $data['kelas'] = $this->Kelas_model->get_by_id($id_kelas);
    $data['title'] = 'Cetak Jadwal Kelas';
  
    $this->load->view('jadwal/cetak_kelas', $data);
  }
  public function edit($id) {
    $this->load->model('Jadwal_model');
    $data['jadwal'] = $this->Jadwal_model->get_by_id($id);
    $data['kelas'] = $this->db->get('kelas')->result(); // misal untuk pilihan kelas
    $data['program'] = $this->db->get('program_kursus')->result(); // jika butuh
    $data['title'] = 'Edit Jadwal';

    $this->load->view('layouts/header_admin', $data); 
    $this->load->view('jadwal/edit', $data);
    $this->load->view('layouts/footer');
}

}
