<h4>Edit Program Kursus</h4>
<form method="post" action="<?= site_url('program/update/'.$program->id) ?>">
  <div class="mb-3">
    <label>Nama Program</label>
    <input type="text" name="nama_program" class="form-control" value="<?= $program->nama_program ?>" required>
  </div>
  <button class="btn btn-primary">Update</button>
  <a href="<?= site_url('program') ?>" class="btn btn-secondary">Kembali</a>
</form>
