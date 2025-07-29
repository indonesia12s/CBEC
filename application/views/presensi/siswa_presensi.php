<div class="container mt-4">
  <h4>📅 Presensi Saya</h4>

  <?php if (empty($presensi)) : ?>
    <div class="alert alert-info">Belum ada data presensi.</div>
  <?php else : ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-primary">
          <tr>
            <th>Tanggal</th>
            <th>Program</th>
            <th>Kelas</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($presensi as $p): ?>
            <tr>
              <td><?= date('d M Y', strtotime($p->tanggal)) ?></td>
              <td><?= $p->hari ?>, <?= date('H:i', strtotime($p->jam_mulai)) ?> - <?= date('H:i', strtotime($p->jam_selesai)) ?></td>

              <td><?= $p->nama_kelas ?? '-' ?></td>
              <td>
                <?php
                  $status = strtolower($p->status);
                  if ($status == 'hadir') echo '<span class="badge bg-success">Hadir</span>';
                  elseif ($status == 'izin') echo '<span class="badge bg-warning text-dark">Izin</span>';
                  elseif ($status == 'sakit') echo '<span class="badge bg-info text-dark">Sakit</span>';
                  else echo '<span class="badge bg-danger">Alpha</span>';
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
