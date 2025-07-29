<h4>Daftar Program Kursus</h4>
<a href="<?= site_url('program/tambah') ?>" class="btn btn-primary mb-2">+ Tambah Program</a>
<table class="table table-bordered">
  <thead>
    <tr><th>No</th><th>Nama Program</th><th>Aksi</th></tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($program as $p): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->nama_program ?></td>
        <td>
          <a href="<?= site_url('program/edit/'.$p->id) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= site_url('program/hapus/'.$p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
