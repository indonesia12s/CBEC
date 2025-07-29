<div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
  <!-- Logo dan Nama -->
  <div class="text-center mb-4">
    <img src="<?= base_url('assets/images/logo-lkp.png') ?>" alt="Logo LKP" style="width: 100px; height: auto;">
    <h6 class="mt-2">LKP Citra Bangsa Education Center</h6>
  </div>
  
  <ul class="nav flex-column">
    <li class="nav-item mb-2">
      <a href="<?= site_url('admin/dashboard') ?>" class="nav-link text-white">
        <i class="bi bi-house-door"></i> Dashboard
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= site_url('pengajar') ?>" class="nav-link text-white">
        <i class="bi bi-person-fill"></i> Data Pengajar
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= site_url('siswa') ?>" class="nav-link text-white">
        <i class="bi bi-people-fill"></i> Data Siswa
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= site_url('program') ?>" class="nav-link text-white">
        <i class="bi bi-book"></i> Program Kursus
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?= site_url('jadwal') ?>" class="nav-link text-white">
        <i class="bi bi-calendar-event"></i> Jadwal Kelas
      </a>
    </li>
    <li class="nav-item mt-4">
      <a href="<?= site_url('auth/logout') ?>" class="nav-link text-white">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </li>
  </ul>
</div>
<div class="p-4 flex-grow-1">
