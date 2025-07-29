<h4>Tambah Program Kursus</h4>
<form method="post" action="<?= site_url('program/simpan') ?>">
  <div class="mb-3">
    <label>Nama Program</label>
    <input type="text" name="nama_program" class="form-control" required>
  </div>
  <button class="btn btn-success">Simpan</button>
  <a href="<?= site_url('program') ?>" class="btn btn-secondary">Kembali</a>
</form>
