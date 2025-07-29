<div class="container mt-4">
  <h4><?= $title ?></h4>

  <?php if (empty($presensi)) : ?>
    <div class="alert alert-warning">Belum ada data presensi untuk hari ini.</div>
  <?php else : ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-success">
          <tr>
            <th>Nama Siswa</th>
            <th>Status</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($presensi as $row): ?>
          <tr>
          <td><?= $row->nama_siswa ?? '-' ?></td>

          <td>
  <?php
    $status = strtolower($row->status); // normalisasi ke huruf kecil
    if ($status == 'hadir') echo '<span class="badge bg-success">Hadir</span>';
    elseif ($status == 'izin') echo '<span class="badge bg-warning text-dark">Izin</span>';
    elseif ($status == 'sakit') echo '<span class="badge bg-info text-dark">Sakit</span>';
    else echo '<span class="badge bg-danger">Alpha</span>';
  ?>
</td>

            <td><?= $row->keterangan ?? '-' ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>

  <a href="<?= site_url('pengajar/dashboard') ?>" class="btn btn-secondary mt-3">⬅ Kembali</a>
</div>
