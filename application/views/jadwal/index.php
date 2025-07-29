<div class="container mt-4">
  <h4><?= $title ?></h4>

  <!-- Tombol Aksi -->
  <div class="d-flex justify-content-between mb-3">
    <a href="<?= site_url('jadwal/tambah') ?>" class="btn btn-primary">➕ Tambah Jadwal</a>

    <div class="d-flex gap-2">
      <a href="<?= site_url('penempatan') ?>" class="btn btn-outline-info">
        <i class="bi bi-person-lines-fill"></i> Penempatan Siswa
      </a>
      <a href="<?= site_url('kelas') ?>" class="btn btn-outline-secondary">
        <i class="bi bi-door-open"></i> Data Kelas
      </a>
      <a href="<?= site_url('jadwal/per_kelas') ?>" class="btn btn-outline-success">
        🗓 Jadwal per Kelas
      </a>
    </div>
  </div>

  <!-- Filter -->
  <div class="card p-3 mb-3 shadow-sm">
    <form method="get" action="<?= site_url('jadwal') ?>" class="row g-2">
      <div class="col-md-4">
        <label>Filter Program</label>
        <select name="id_program" class="form-control">
          <option value="">-- Semua Program --</option>
          <?php foreach ($program as $p): ?>
            <option value="<?= $p->id ?>" <?= $this->input->get('id_program') == $p->id ? 'selected' : '' ?>>
              <?= $p->nama_program ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-4">
        <label>Filter Pengajar</label>
        <select name="id_pengajar" class="form-control">
          <option value="">-- Semua Pengajar --</option>
          <?php foreach ($pengajar as $pg): ?>
            <option value="<?= $pg->id ?>" <?= $this->input->get('id_pengajar') == $pg->id ? 'selected' : '' ?>>
              <?= $pg->nama ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-4 align-self-end">
        <button type="submit" class="btn btn-success">🔍 Filter</button>
        <a href="<?= site_url('jadwal') ?>" class="btn btn-secondary">Reset</a>
      </div>
    </form>
  </div>

  <!-- Tabel Jadwal -->
  <?php if (empty($jadwal)) : ?>
    <div class="alert alert-warning">Belum ada data jadwal.</div>
  <?php else : ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
          <tr class="text-center">
            <th>No</th>
            <th>Program</th>
            <th>Kelas</th>
            <th>Pengajar</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Ruang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($jadwal as $j): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $j->nama_program ?></td>
              <td><?= $j->nama_kelas ?></td>
              <td><?= $j->nama_pengajar ?></td>
              <td><?= $j->hari ?></td>
              <td><?= date('H:i', strtotime($j->jam_mulai)) ?> - <?= date('H:i', strtotime($j->jam_selesai)) ?></td>
              <td><?= $j->ruang ?></td>
              <td class="text-center">
                <a href="<?= site_url('jadwal/edit/' . $j->id) ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                <a href="<?= site_url('jadwal/hapus/' . $j->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">🗑 Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
