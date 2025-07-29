<div class="container mt-3">
  <h4><?= $title ?></h4>
  <form method="post" action="<?= site_url('jadwal/update/' . $jadwal->id) ?>">
    
    <div class="mb-3">
      <label>Program Kursus</label>
      <select name="id_program" class="form-control" required>
        <?php foreach ($program as $p): ?>
          <option value="<?= $p->id ?>" <?= $p->id == $jadwal->id_program ? 'selected' : '' ?>>
            <?= $p->nama_program ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Kelas</label>
      <select name="id_kelas" class="form-control" required>
        <?php foreach ($kelas as $k): ?>
          <option value="<?= $k->id ?>" <?= $k->id == $jadwal->id_kelas ? 'selected' : '' ?>>
            <?= $k->nama_kelas ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Pengajar</label>
      <select name="id_pengajar" class="form-control" required>
        <?php foreach ($pengajar as $pg): ?>
          <option value="<?= $pg->id ?>" <?= $pg->id == $jadwal->id_pengajar ? 'selected' : '' ?>>
            <?= $pg->nama ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Hari</label>
      <select name="hari" class="form-control" required>
        <?php foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari): ?>
          <option value="<?= $hari ?>" <?= $hari == $jadwal->hari ? 'selected' : '' ?>>
            <?= $hari ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Jam Mulai</label>
      <input type="time" name="jam_mulai" value="<?= $jadwal->jam_mulai ?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Jam Selesai</label>
      <input type="time" name="jam_selesai" value="<?= $jadwal->jam_selesai ?>" class="form-control" required>
    </div>
    

    <div class="mb-3">
      <label>Ruang</label>
      <input type="text" name="ruang" value="<?= $jadwal->ruang ?>" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
    <a href="<?= site_url('jadwal') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>
