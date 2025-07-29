<h4>Tambah Kelas</h4>
<form method="post" action="<?= site_url('kelas/simpan') ?>">
  <div class="mb-3">
    <label>Nama Kelas</label>
    <input type="text" name="nama_kelas" class="form-control" required>
  </div>
  <button class="btn btn-success">Simpan</button>
  <a href="<?= site_url('kelas') ?>" class="btn btn-secondary">Kembali</a>
</form>
