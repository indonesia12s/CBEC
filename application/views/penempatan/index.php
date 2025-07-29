<h4>Penempatan Siswa ke Kelas</h4>
<a href="<?= site_url('penempatan/tambah') ?>" class="btn btn-primary btn-sm mb-3">Tambah Penempatan</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Siswa</th>
      <th>Kelas</th>
      <th>Tahun Ajaran</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($penempatan as $p): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $p->nama_siswa ?></td>
      <td><?= $p->nama_kelas ?></td>
      <td><?= $p->tahun_ajaran ?></td>
      <td>
        <a href="<?= site_url('penempatan/hapus/'.$p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
