<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('auth');
    }
  }

  public function dashboard() {
    $data['title'] = 'Dashboard Admin';
    $data['jumlah_siswa'] = $this->db->count_all('siswa');
    $data['jumlah_pengajar'] = $this->db->count_all('pengajar');
    $data['jumlah_kelas'] = $this->db->count_all('kelas');
    $data['jumlah_program'] = $this->db->count_all('program_kursus');
  
    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('layouts/footer');
  }
  
}
