<div class="container-fluid">
  <h3 class="mb-4">Dashboard</h3>
  <div class="row">
    <div class="col-md-3 mb-4">
      <div class="card bg-primary text-white shadow">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h5>Jumlah Siswa</h5>
            <h3><?= $jumlah_siswa ?></h3>
          </div>
          <i class="bi bi-people-fill" style="font-size: 2.5rem;"></i>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card bg-success text-white shadow">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h5>Jumlah Pengajar</h5>
            <h3><?= $jumlah_pengajar ?></h3>
          </div>
          <i class="bi bi-person-fill" style="font-size: 2.5rem;"></i>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card bg-warning text-dark shadow">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h5>Jumlah Kelas</h5>
            <h3><?= $jumlah_kelas ?></h3>
          </div>
          <i class="bi bi-door-open" style="font-size: 2.5rem;"></i>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card bg-info text-white shadow">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h5>Program Kursus</h5>
            <h3><?= $jumlah_program ?></h3>
          </div>
          <i class="bi bi-book" style="font-size: 2.5rem;"></i>
        </div>
      </div>
    </div>
  </div>
</div>
