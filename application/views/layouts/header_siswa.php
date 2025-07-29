<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Dashboard Siswa' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .navbar-brand { font-weight: bold; }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('siswa/dashboard') ?>">LKP Citra Bangsa</a>

    <!-- Toggle button untuk responsive mode -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu utama -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link<?= $this->uri->segment(2) == 'presensi' ? ' active' : '' ?>" 
             href="<?= site_url('siswa/presensi') ?>">Presensi Saya</a>
        </li>
        <!-- Tambahkan item menu lain di sini jika perlu -->
      </ul>

      <!-- Profil dan Logout -->
      <div class="d-flex align-items-center">
        <span class="text-white me-2">👤 <?= $this->session->userdata('nama_siswa') ?></span>
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalProfilSiswa">
          <img src="<?= base_url(
            $this->session->userdata('foto_siswa') 
              ? 'uploads/siswa/' . $this->session->userdata('foto_siswa') 
              : 'assets/img/default-user.png'
          ) ?>" 
          class="rounded-circle" width="36" height="36"
          style="object-fit: cover; border: 2px solid #fff;">
        </a>
        <a href="<?= site_url('auth/logout') ?>" class="btn btn-light btn-sm ms-3">Logout</a>
      </div>
    </div>
  </div>
</nav>


<!-- MODAL PROFIL -->
<div class="modal fade" id="modalProfilSiswa" tabindex="-1" aria-labelledby="modalProfilSiswaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalProfilSiswaLabel">Profil Saya</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="<?= base_url('uploads/siswa/' . $this->session->userdata('foto_siswa')) ?>" 
             width="100" class="rounded-circle mb-3" style="object-fit: cover; border: 2px solid #ddd;">
        <p><strong>Nama:</strong> <?= $this->session->userdata('nama_siswa') ?? '-' ?></p>
        <p><strong>NISN:</strong> <?= $this->session->userdata('nisn_siswa') ?? '-' ?></p>
        <p><strong>Email:</strong> <?= $this->session->userdata('email_siswa') ?? '-' ?></p>
        <p><strong>No HP:</strong> <?= $this->session->userdata('no_hp_siswa') ?? '-' ?></p>
        <p><strong>Alamat:</strong> <?= $this->session->userdata('alamat_siswa') ?? '-' ?></p>
      </div>
    </div>
  </div>
</div>

<!-- Konten Utama -->
<div class="container mt-4">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
