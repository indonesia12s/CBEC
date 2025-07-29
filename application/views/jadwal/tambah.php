<div class="container mt-3">
  <h4><?= $title ?></h4>
  <form method="post" action="<?= site_url('jadwal/simpan') ?>">
    
    <div class="mb-3">
      <label>Program Kursus</label>
      <select name="id_program" class="form-control" required>
        <option value="">-- Pilih Program --</option>
        <?php foreach ($program as $p): ?>
          <option value="<?= $p->id ?>"><?= $p->nama_program ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Kelas</label>
      <select name="id_kelas" class="form-control" required>
        <option value="">-- Pilih Kelas --</option>
        <?php foreach ($kelas as $k): ?>
          <option value="<?= $k->id ?>"><?= $k->nama_kelas ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Pengajar</label>
      <select name="id_pengajar" class="form-control" required>
        <option value="">-- Pilih Pengajar --</option>
        <?php foreach ($pengajar as $pg): ?>
          <option value="<?= $pg->id ?>"><?= $pg->nama ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Hari</label>
      <select name="hari" class="form-control" required>
        <?php foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $h): ?>
          <option value="<?= $h ?>"><?= $h ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Jam Mulai</label>
      <input type="time" name="jam_mulai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Jam Selesai</label>
      <input type="time" name="jam_selesai" class="form-control" required>
    </div>
    

    <div class="mb-3">
      <label>Ruang</label>
      <input type="text" name="ruang" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('jadwal') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>
