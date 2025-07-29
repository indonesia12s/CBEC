<h4>Data Siswa</h4>
<a href="<?= site_url('siswa/tambah') ?>" class="btn btn-primary btn-sm mb-3">Tambah Siswa</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>NISN</th>
      <th>No HP</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($siswa as $s): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $s->nama ?></td>
      <td><?= $s->nisn ?></td>
      <td><?= $s->no_hp ?></td>
      <td><?= $s->email ?></td>
      <td>
        <a href="<?= site_url('siswa/detail/'.$s->id) ?>" class="btn btn-info btn-sm">Detail</a>
        <a href="<?= site_url('siswa/edit/'.$s->id) ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="<?= site_url('siswa/hapus/'.$s->id) ?>" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
