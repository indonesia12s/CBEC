<form method="post" action="<?= site_url('presensi/simpan') ?>">
  <input type="hidden" name="id_jadwal" value="<?= $jadwal->id ?>">
  <div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required value="<?= date('Y-m-d') ?>">
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama Siswa</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($siswa as $s): ?>
      <tr>
        <td>
          <?= $s->nama ?>
          <input type="hidden" name="id_siswa[]" value="<?= $s->id ?>">
        </td>
        <td>
          <select name="status[]" class="form-control" required>
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alpha">Alpha</option>
          </select>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <button type="submit" class="btn btn-success">💾 Simpan Presensi</button>
</form>
