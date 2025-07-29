<div class="container mt-4">
  <h4>✏️ Edit Presensi</h4>
  <p><strong>Program:</strong> <?= $jadwal->nama_program ?> | <strong>Kelas:</strong> <?= $jadwal->nama_kelas ?> | <strong>Tanggal:</strong> <?= date('d M Y') ?></p>

  <form action="<?= site_url('presensi/update') ?>" method="post">
    <input type="hidden" name="id_jadwal" value="<?= $jadwal->id ?>">
    <input type="hidden" name="tanggal" value="<?= date('Y-m-d') ?>">

    <table class="table table-bordered table-striped mt-3">
      <thead class="table-primary">
        <tr>
          <th>Nama Siswa</th>
          <th>Status Presensi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($presensi as $row): ?>
          <tr>
          <td>
  <?= $row->nama_siswa ?? '-' ?>
  <input type="hidden" name="id_presensi[]" value="<?= $row->id ?>">
</td>

            <td>
              <select name="status[]" class="form-select" required>
                <option value="Hadir" <?= $row->status == 'Hadir' ? 'selected' : '' ?>>Hadir</option>
                <option value="Izin" <?= $row->status == 'Izin' ? 'selected' : '' ?>>Izin</option>
                <option value="Sakit" <?= $row->status == 'Sakit' ? 'selected' : '' ?>>Sakit</option>
                <option value="Alpha" <?= $row->status == 'Alpha' ? 'selected' : '' ?>>Alpha</option>
              </select>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
    <a href="<?= site_url('pengajar/dashboard') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>
