<h4>Data Kelas</h4>
<a href="<?= site_url('kelas/tambah') ?>" class="btn btn-primary btn-sm mb-3">Tambah Kelas</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Kelas</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($kelas as $k): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $k->nama_kelas ?></td>
      <td>
        <a href="<?= site_url('kelas/edit/'.$k->id) ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="<?= site_url('kelas/hapus/'.$k->id) ?>" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
