<h4>Data Pengajar</h4>
<a href="<?= site_url('pengajar/tambah') ?>" class="btn btn-primary btn-sm mb-3">Tambah Pengajar</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>No HP</th>
      <th>Pendidikan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($pengajar as $p): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $p->nama ?></td>
      <td><?= $p->email ?></td>
      <td><?= $p->no_hp ?></td>
      <td><?= $p->pendidikan ?></td>
      <td>
  <a href="<?= site_url('pengajar/detail/'.$p->id) ?>" class="btn btn-info btn-sm">Detail</a>
  <a href="<?= site_url('pengajar/edit/'.$p->id) ?>" class="btn btn-warning btn-sm">Edit</a>
  <a href="<?= site_url('pengajar/hapus/'.$p->id) ?>" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
</td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
