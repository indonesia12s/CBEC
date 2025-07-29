<h4>Edit Pengajar</h4>
<form method="post" action="<?= site_url('pengajar/update/'.$pengajar->id) ?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" value="<?= $pengajar->nama ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Username</label>
    <input type="text" name="username" value="<?= $pengajar->username ?>" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Password (Kosongkan jika tidak diganti)</label>
    <input type="password" name="password" class="form-control">
  </div>
  <div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control"><?= $pengajar->alamat ?></textarea>
  </div>
  <div class="mb-3">
    <label>No. HP</label>
    <input type="text" name="no_hp" value="<?= $pengajar->no_hp ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="<?= $pengajar->email ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label>Foto Sekarang</label><br>
    <?php if ($pengajar->foto): ?>
      <img src="<?= base_url('uploads/pengajar/'.$pengajar->foto) ?>" width="80"><br>
    <?php else: ?>
      <span class="text-muted">Belum ada foto</span><br>
    <?php endif; ?>
  </div>
  <div class="mb-3">
    <label>Ganti Foto (Opsional)</label>
    <input type="file" name="foto" class="form-control">
  </div>
  <button class="btn btn-primary">Update</button>
  <a href="<?= site_url('pengajar') ?>" class="btn btn-secondary">Kembali</a>
</form>
