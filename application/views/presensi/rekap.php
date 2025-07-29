<div class="container mt-4">
  <h4>📊 Rekap Presensi</h4>

  <form method="get" action="<?= site_url('presensi/rekap') ?>" class="row g-3 mb-4">
    <div class="col-md-4">
      <label for="kelas">Pilih Kelas</label>
      <select name="kelas" id="kelas" class="form-select">
        <option value="">-- Semua Kelas --</option>
        <?php foreach ($kelas_list as $k): ?>
          <option value="<?= $k->id ?>" <?= $selected_kelas == $k->id ? 'selected' : '' ?>>
            <?= $k->nama_kelas ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-4">
      <label for="bulan">Bulan</label>
      <input type="month" name="bulan" id="bulan" class="form-control" value="<?= $selected_bulan ?>">
    </div>
    <div class="col-md-4 d-flex align-items-end">
      <button type="submit" class="btn btn-primary w-100">🔍 Tampilkan</button>
    </div>
  </form>

  <?php if (!empty($rekap)) : ?>
  <div class="mb-3">
    
    <a href="<?= site_url('presensi/export_excel?kelas=' . $selected_kelas . '&bulan=' . $selected_bulan) ?>" class="btn btn-success">
      📥 Export Excel
    </a>
  </div>
<?php endif; ?>


  <?php if (!empty($rekap)): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-secondary">
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
          <td><?= $row->nama_siswa ?? '-' ?></td>

            <td><?= $row->hadir ?></td>
            <td><?= $row->izin ?></td>
            <td><?= $row->sakit ?></td>
            <td><?= $row->alpha ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info">Silakan pilih kelas dan bulan untuk menampilkan rekap presensi.</div>
  <?php endif; ?>
</div>
