<div class="bg-dark text-white p-3">
  <h5>Hai, <?= $this->session->userdata('nama_pengajar') ?></h5>
  <a href="<?= site_url('pengajar/dashboard') ?>" class="d-block text-white mb-2">📆 Jadwal Mengajar</a>
  <a href="<?= site_url('auth/logout') ?>" class="d-block text-danger">🔓 Logout</a>
  <li class="nav-item">
  <a class="nav-link" href="<?= site_url('jadwal_pengajar') ?>">🗓 Jadwal Mengajar</a>
</li>
</div>
