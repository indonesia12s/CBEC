<div class="sidebar">
  <div class="p-3 border-bottom">
    <h5><i class="bi bi-person-circle me-2"></i><?= $this->session->userdata('nama_siswa') ?></h5>
    <small>Siswa</small>
  </div>
  <a href="<?= site_url('siswa/dashboard') ?>"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a>
  <a href="<?= site_url('auth/logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
</div>
<div class="content">
  <nav class="navbar navbar-expand navbar-dark mb-4">
    <div class="container-fluid">
      <span class="navbar-brand"><?= $title ?></span>
    </div>
  </nav>
