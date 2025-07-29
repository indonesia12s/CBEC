<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0">📅 Jadwal Mengajar Saya</h5>
    </div>
    <div class="card-body">
      <?php if (!empty($jadwal)) : ?>
        <div class="table-responsive">
          <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
              <tr class="text-center">
                <th>No</th>
                <th>Program Kursus</th>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruang</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($jadwal as $j): ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td><?= $j->nama_program ?></td>
                  <td><?= $j->nama_kelas ?></td>
                  <td><?= $j->hari ?></td>
                  <td class="text-center">
                    <?= date('H:i', strtotime($j->jam_mulai)) ?> - 
                    <?= date('H:i', strtotime($j->jam_selesai)) ?>
                  </td>
                  <td class="text-center"><?= $j->ruang ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="alert alert-info text-center mb-0">
          Belum ada jadwal mengajar yang ditugaskan.
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
