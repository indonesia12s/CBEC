<h4>Edit Data Siswa</h4>
<form method="post" action="<?= site_url('siswa/update/'.$siswa->id) ?>" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <div class="mb-2"><label>Nama</label><input type="text" name="nama" value="<?= $siswa->nama ?>" class="form-control"></div>
      <div class="mb-2"><label>NISN</label><input type="text" name="nisn" value="<?= $siswa->nisn ?>" class="form-control"></div>
      <div class="mb-2"><label>NIK</label><input type="text" name="nik" value="<?= $siswa->nik ?>" class="form-control"></div>
      <div class="mb-2"><label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
          <option value="L" <?= $siswa->jenis_kelamin == 'L' ? 'selected' : '' ?>>Laki-laki</option>
          <option value="P" <?= $siswa->jenis_kelamin == 'P' ? 'selected' : '' ?>>Perempuan</option>
        </select>
      </div>
      <div class="mb-2"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" value="<?= $siswa->tempat_lahir ?>" class="form-control"></div>
      <div class="mb-2"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="<?= $siswa->tanggal_lahir ?>" class="form-control"></div>
      <div class="mb-2"><label>Alamat</label><textarea name="alamat" class="form-control"><?= $siswa->alamat ?></textarea></div>
    </div>
    <div class="col-md-6">
      <div class="mb-2"><label>No HP</label><input type="text" name="no_hp" value="<?= $siswa->no_hp ?>" class="form-control"></div>
      <div class="mb-2"><label>Email</label><input type="email" name="email" value="<?= $siswa->email ?>" class="form-control"></div>
      <div class="mb-2"><label>Pendidikan</label><input type="text" name="pendidikan" value="<?= $siswa->pendidikan ?>" class="form-control"></div>
      <div class="mb-2"><label>Password (Kosongkan jika tidak diganti)</label><input type="password" name="password" class="form-control"></div>
      <div class="mb-2">
        <label>Foto Saat Ini</label><br>
        <?php if ($siswa->foto): ?>
          <img src="<?= base_url('uploads/siswa/'.$siswa->foto) ?>" width="100">
        <?php else: ?>
          <span class="text-muted">Belum ada foto</span>
        <?php endif; ?>
      </div>
      <div class="mb-2"><label>Ganti Foto (opsional)</label><input type="file" name="foto" class="form-control"></div>
    </div>
  </div>
  <button class="btn btn-primary mt-3">Update</button>
  <a href="<?= site_url('siswa') ?>" class="btn btn-secondary mt-3">Kembali</a>
</form>
