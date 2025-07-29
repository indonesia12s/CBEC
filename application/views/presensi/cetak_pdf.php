<h4>Rekap Presensi Bulan <?= $bulan ?></h4>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Nama Siswa</th>
      <th>Hadir</th>
      <th>Izin</th>
      <th>Sakit</th>
      <th>Alpha</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rekap as $row): ?>
    <tr>
      <td><?= $row->nama_siswa ?></td>
      <td><?= $row->hadir ?></td>
      <td><?= $row->izin ?></td>
      <td><?= $row->sakit ?></td>
      <td><?= $row->alpha ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
