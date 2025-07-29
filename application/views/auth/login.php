<h4 class="mb-3">Login Sistem</h4>
<form action="<?= site_url('auth/login') ?>" method="post">
  <div class="mb-3">
    <label>Username / NISN / NIK</label>
    <input type="text" name="username" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Login Sebagai</label>
    <select name="role" class="form-control" required>
      <option value="admin">Admin</option>
      <option value="pengajar">Pengajar</option>
      <option value="siswa">Siswa</option>
    </select>
  </div>
  <button class="btn btn-primary w-100">Login</button>
</form>
