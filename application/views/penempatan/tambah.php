<h4>Form Penempatan Siswa ke Kelas</h4>
<form method="post" action="<?= site_url('penempatan/simpan') ?>">
  <div class="mb-2">
    <label>Nama Siswa</label>
    <select name="id_siswa" class="form-control" required>
      <option value="">-- Pilih Siswa --</option>
      <?php foreach ($siswa as $s): ?>
        <option value="<?= $s->id ?>"><?= $s->nama ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-2">
    <label>Kelas</label>
    <select name="id_kelas" class="form-control" required>
      <option value="">-- Pilih Kelas --</option>
      <?php foreach ($kelas as $k): ?>
        <option value="<?= $k->id ?>"><?= $k->nama_kelas ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-2">
    <label>Tahun Ajaran</label>
    <input type="text" name="tahun_ajaran" class="form-control" placeholder="2024/2025" required>
  </div>
  <button class="btn btn-success">Simpan</button>
  <a href="<?= site_url('penempatan') ?>" class="btn btn-secondary">Kembali</a>
</form>
