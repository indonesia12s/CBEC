<div class="container mt-4">
  <h4>📊 Statistik Presensi</h4>

  <div class="row">
    <div class="col-md-3">
      <div class="card border-success mb-3">
        <div class="card-body text-success">
          <h5 class="card-title">✅ Hadir</h5>
          <p class="card-text fs-4"><?= $statistik['Hadir'] ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-warning mb-3">
        <div class="card-body text-warning">
          <h5 class="card-title">⚠️ Izin</h5>
          <p class="card-text fs-4"><?= $statistik['Izin'] ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-info mb-3">
        <div class="card-body text-info">
          <h5 class="card-title">🤒 Sakit</h5>
          <p class="card-text fs-4"><?= $statistik['Sakit'] ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-danger mb-3">
        <div class="card-body text-danger">
          <h5 class="card-title">❌ Alpha</h5>
          <p class="card-text fs-4"><?= $statistik['Alpha'] ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-4">
  <h4>📚 Jadwal Kelas Saya</h4>

  <?php if (empty($jadwal)) : ?>
    <div class="alert alert-warning text-center">Belum ada jadwal tersedia.</div>
  <?php else : ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-primary text-center">
          <tr>
            <th>Hari</th>
            <th>Jam</th>
            <th>Program</th>
            <th>Pengajar</th>
            <th>Ruang</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($jadwal as $j): ?>
<tr>
  <td><?= $j->hari ?></td>
  <td><?= date('H:i', strtotime($j->jam_mulai)) ?> - <?= date('H:i', strtotime($j->jam_selesai)) ?></td>
  <td><?= $j->nama_program ?? '-' ?></td>
  <td><?= $j->nama_pengajar ?? '-' ?></td>
  <td><?= $j->ruang ?></td>
</tr>
<?php endforeach; ?>

        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
