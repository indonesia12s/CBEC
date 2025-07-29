<div class="container mt-3">
  <h4><?= $title ?></h4>

  <form method="get" action="<?= site_url('jadwal/per_kelas') ?>" class="row g-2 mb-3">
    <div class="col-md-6">
      <label>Pilih Kelas</label>
      <select name="id_kelas" class="form-control" required>
        <option value="">-- Pilih Kelas --</option>
        <?php foreach ($kelas as $k): ?>
          <option value="<?= $k->id ?>" <?= $this->input->get('id_kelas') == $k->id ? 'selected' : '' ?>>
            <?= $k->nama_kelas ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-3 align-self-end">
      <button type="submit" class="btn btn-primary">Lihat Jadwal</button>
    </div>
  </form>
  <?php if (!empty($jadwal)): ?>
  <a href="<?= site_url('jadwal/cetak_kelas?id_kelas=' . $this->input->get('id_kelas')) ?>" target="_blank" class="btn btn-outline-dark mb-3">
    🖨 Cetak Jadwal
  </a>
<?php endif; ?>

  <?php if (!empty($jadwal)): ?>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
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
        <td><?= isset($j->nama_program) ? $j->nama_program : '-' ?></td> <!-- FIX INI -->
    <td><?= $j->nama_pengajar ?></td>
    <td><?= $j->hari ?></td>
    <td><?= date('H:i', strtotime($j->jam_mulai)) ?> - <?= date('H:i', strtotime($j->jam_selesai)) ?></td>
    <td><?= $j->ruang ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php elseif($this->input->get('id_kelas')): ?>
    <div class="alert alert-warning">Tidak ada jadwal untuk kelas ini.</div>
  <?php endif; ?>
</div>
