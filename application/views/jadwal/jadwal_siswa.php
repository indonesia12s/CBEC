<div class="container mt-4">
  <h4 class="mb-4">📚 Jadwal Kelas Saya</h4>

  <?php if (!empty($jadwal)) : ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover shadow-sm">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Program Kursus</th>
            <th>Pengajar</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Ruang</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($jadwal as $j): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $j->nama_program ?></td>
              <td><?= $j->nama_pengajar ?></td>
              <td><?= $j->hari ?></td>
              <td><?= date('H:i', strtotime($j->jam_mulai)) ?> - <?= date('H:i', strtotime($j->jam_selesai)) ?></td>
              <td><?= $j->ruang ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info">Tidak ada jadwal yang ditemukan.</div>
  <?php endif; ?>
</div>
