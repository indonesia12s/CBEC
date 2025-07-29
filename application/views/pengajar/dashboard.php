<h4>📅 Jadwal Mengajar Saya</h4>

<?php if (empty($jadwal)) : ?>
  <div class="alert alert-warning">Belum ada jadwal yang tersedia.</div>
<?php else : ?>
  <tr>
  <td colspan="7" class="text-end">
    <a href="<?= site_url('presensi/rekap') ?>" class="btn btn-outline-dark">
      📊 Lihat Rekap Presensi
    </a>
  </td>
</tr>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-success text-center">
        <tr>
          <th>Hari</th>
          <th>Jam</th>
          <th>Program</th>
          <th>Kelas</th>
          <th>Ruang</th>
          <th>Aksi</th>
          <th>Status Presensi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($jadwal as $j): ?>
        <tr>
          <td><?= $j->hari ?></td>
          <td><?= date('H:i', strtotime($j->jam_mulai)) ?> - <?= date('H:i', strtotime($j->jam_selesai)) ?></td>
          <td><?= $j->program_kursus ?? $j->nama_program ?? '-' ?></td>
          <td><?= $j->nama_kelas ?? '-' ?></td>
          <td><?= $j->ruang ?></td>
          <td class="text-center">
            <?php if (!empty($j->presensi_ada)): ?>
              <a href="<?= site_url('presensi/lihat/' . $j->id) ?>" class="btn btn-sm btn-success mb-1">👁 Lihat</a>
              <a href="<?= site_url('presensi/edit/' . $j->id) ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
            <?php else: ?>
              <a href="<?= site_url('presensi/input/' . $j->id) ?>" class="btn btn-sm btn-primary">📋 Input</a>
            <?php endif; ?>
          </td>
          <td class="text-center">
            <?php if (!empty($j->presensi_ada)): ?>
              <span class="badge bg-success">✅ Sudah</span>
            <?php else: ?>
              <span class="badge bg-danger">❌ Belum</span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>
