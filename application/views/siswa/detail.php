<h4>Detail Data Siswa</h4>
<div class="row mt-3">
  <div class="col-md-4">
    <?php if ($siswa->foto): ?>
      <img src="<?= base_url('uploads/siswa/'.$siswa->foto) ?>" class="img-thumbnail" width="100%">
    <?php else: ?>
      <img src="https://via.placeholder.com/300x400?text=Tidak+Ada+Foto" class="img-thumbnail" width="100%">
    <?php endif; ?>
  </div>
  <div class="col-md-8">
    <table class="table table-bordered">
      <tr><th>Nama</th><td><?= $siswa->nama ?></td></tr>
      <tr><th>NISN / NIK</th><td><?= $siswa->nisn ?> / <?= $siswa->nik ?></td></tr>
      <tr><th>Jenis Kelamin</th><td><?= $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td></tr>
      <tr><th>Tempat, Tanggal Lahir</th><td><?= $siswa->tempat_lahir ?>, <?= date('d-m-Y', strtotime($siswa->tanggal_lahir)) ?></td></tr>
      <tr><th>Alamat</th><td><?= $siswa->alamat ?></td></tr>
      <tr><th>No HP</th><td><?= $siswa->no_hp ?></td></tr>
      <tr><th>Email</th><td><?= $siswa->email ?></td></tr>
      <tr><th>Pendidikan</th><td><?= $siswa->pendidikan ?></td></tr>
    </table>
    <a href="<?= site_url('siswa') ?>" class="btn btn-secondary">Kembali</a>
  </div>
</div>
