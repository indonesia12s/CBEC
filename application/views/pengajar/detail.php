<h4>Detail Data Pengajar</h4>
<div class="row mt-3">
  <div class="col-md-4">
    <?php if ($pengajar->foto): ?>
      <img src="<?= base_url('uploads/pengajar/'.$pengajar->foto) ?>" class="img-thumbnail" width="100%">
    <?php else: ?>
      <img src="https://via.placeholder.com/300x400?text=Tidak+Ada+Foto" class="img-thumbnail" width="100%">
    <?php endif; ?>
  </div>
  <div class="col-md-8">
    <table class="table table-bordered">
      <tr><th>Nama</th><td><?= $pengajar->nama ?></td></tr>
      <tr><th>Tempat, Tanggal Lahir</th><td><?= $pengajar->tempat_lahir ?>, <?= date('d-m-Y', strtotime($pengajar->tanggal_lahir)) ?></td></tr>
      <tr><th>Jenis Kelamin</th><td><?= $pengajar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td></tr>
      <tr><th>Agama</th><td><?= $pengajar->agama ?></td></tr>
      <tr><th>Alamat</th><td><?= $pengajar->alamat ?></td></tr>
      <tr><th>No HP</th><td><?= $pengajar->no_hp ?></td></tr>
      <tr><th>Email</th><td><?= $pengajar->email ?></td></tr>
      <tr><th>Pendidikan</th><td><?= $pengajar->pendidikan ?></td></tr>
      <tr><th>Pengalaman</th><td><?= $pengajar->pengalaman ?></td></tr>
    </table>
    <a href="<?= site_url('pengajar') ?>" class="btn btn-secondary">Kembali</a>
  </div>
</div>
