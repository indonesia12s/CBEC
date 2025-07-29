<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Dashboard Pengajar' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .navbar-brand { font-weight: bold; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('pengajar/dashboard') ?>">LKP Citra Bangsa</a>
    <div class="ms-auto d-flex align-items-center">
      <span class="text-white me-2">👨‍🏫 <?= $this->session->userdata('nama_pengajar') ?></span>
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalProfilPengajar">
        <?php if ($this->session->userdata('foto_pengajar')): ?>
          <img src="<?= base_url('uploads/pengajar/' . $this->session->userdata('foto_pengajar')) ?>" 
               class="rounded-circle" width="36" height="36"
               style="object-fit: cover; border: 2px solid #fff;">
        <?php else: ?>
          <img src="<?= base_url('assets/img/default-user.png') ?>" 
               class="rounded-circle" width="36" height="36"
               style="object-fit: cover; border: 2px solid #fff;">
        <?php endif; ?>
      </a>
      <a href="<?= site_url('auth/logout') ?>" class="btn btn-light btn-sm ms-3">Logout</a>
    </div>
  </div>
</nav>

<!-- Modal Data Diri Pengajar -->
<div class="modal fade" id="modalProfilPengajar" tabindex="-1" aria-labelledby="modalProfilPengajarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalProfilPengajarLabel">Profil Pengajar</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="<?= base_url('uploads/pengajar/' . $this->session->userdata('foto_pengajar')) ?>" 
             width="100" class="rounded-circle mb-3" style="object-fit: cover;">
        <p><strong>Nama:</strong> <?= $this->session->userdata('nama_pengajar') ?></p>
        <p><strong>Email:</strong> <?= $this->session->userdata('email_pengajar') ?></p>
        <p><strong>No HP:</strong> <?= $this->session->userdata('no_hp_pengajar') ?></p>
        <p><strong>Alamat:</strong> <?= $this->session->userdata('alamat_pengajar') ?></p>
      </div>
    </div>
  </div>
</div>


<!-- Konten Jadwal -->
<div class="container mt-4">
  


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
