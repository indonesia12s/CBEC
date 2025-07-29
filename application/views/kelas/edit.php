<h4>Edit Kelas</h4>
<form method="post" action="<?= site_url('kelas/update/'.$kelas->id) ?>">
  <div class="mb-3">
    <label>Nama Kelas</label>
    <input type="text" name="nama_kelas" value="<?= $kelas->nama_kelas ?>" class="form-control" required>
  </div>
  <button class="btn btn-primary">Update</button>
  <a href="<?= site_url('kelas') ?>" class="btn btn-secondary">Kembali</a>
</form>
