<h4>Tambah Data Siswa</h4>
<form method="post" action="<?= site_url('siswa/simpan') ?>" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <div class="mb-2"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
      <div class="mb-2"><label>NISN</label><input type="text" name="nisn" class="form-control" required></div>
      <div class="mb-2"><label>NIK</label><input type="text" name="nik" class="form-control"></div>
      <div class="mb-2"><label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
          <option value="">Pilih</option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>
      <div class="mb-2"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control"></div>
      <div class="mb-2"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control"></div>
      <div class="mb-2"><label>Alamat</label><textarea name="alamat" class="form-control"></textarea></div>
    </div>
    <div class="col-md-6">
      <div class="mb-2"><label>No. HP</label><input type="text" name="no_hp" class="form-control"></div>
      <div class="mb-2"><label>Email</label><input type="email" name="email" class="form-control"></div>
      <div class="mb-2"><label>Pendidikan Terakhir</label><input type="text" name="pendidikan" class="form-control"></div>
      <div class="mb-2"><label>Password</label><input type="password" name="password" class="form-control" required></div>
      <div class="mb-2"><label>Foto</label><input type="file" name="foto" class="form-control"></div>
    </div>
  </div>
  <button class="btn btn-success mt-3">Simpan</button>
  <a href="<?= site_url('siswa') ?>" class="btn btn-secondary mt-3">Kembali</a>
</form>
