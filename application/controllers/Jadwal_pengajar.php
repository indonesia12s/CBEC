<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_pengajar extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('pengajar_logged_in')) {
      redirect('auth');
    }
    $this->load->model('Jadwal_model');
  }

  public function index() {
    $pengajar_id = $this->session->userdata('pengajar_id');
    $data['jadwal'] = $this->Jadwal_model->get_by_pengajar($pengajar_id);
    $data['title'] = 'Jadwal Mengajar Saya';

    $this->load->view('layouts/header', $data);
    $this->load->view('layouts/sidebar_pengajar');
    $this->load->view('jadwal/jadwal_pengajar', $data);
    $this->load->view('layouts/footer');
  }
}
