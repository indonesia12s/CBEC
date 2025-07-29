<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <style>
    body { font-family: Arial, sans-serif; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    h2 { text-align: center; }
    @media print {
      .no-print { display: none; }
    }
  </style>
</head>
<body>

  <h2>Jadwal Kelas <?= $kelas->nama_kelas ?></h2>

  <table>
    <thead>
      <tr>
        <th>Program</th>
        <th>Pengajar</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Ruang</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($jadwal as $j): ?>
      <tr>
        <td><?= $j->nama_program ?></td>
        <td><?= $j->nama_pengajar ?></td>
        <td><?= $j->hari ?></td>
        <td><?= date('H:i', strtotime($j->jam_mulai)) ?> - <?= date('H:i', strtotime($j->jam_selesai)) ?></td>
        <td><?= $j->ruang ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="no-print" style="margin-top:20px;">
    <button onclick="window.print()">🖨 Print</button>
  </div>
</body>
</html>
