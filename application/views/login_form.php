<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Sistem Administrasi LKP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f1f3f5;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-card {
      background: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    .login-card img {
      width: 100px;
      height: auto;
      margin-bottom: 1rem;
    }
    .form-select, .form-control {
      border-radius: 10px;
    }
    .btn-primary {
      border-radius: 10px;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <img src="<?= base_url('assets/images/logo-lkp.png') ?>" alt="Logo LKP">
    <h4>Login</h4>
    <P>LKP Citra Bangsa Education Center</P>

    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= site_url('auth/login') ?>" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username / NISN / NIK</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
      </div>

      <div class="mb-3">
        <label for="role" class="form-label">Login Sebagai</label>
        <select name="role" class="form-select" id="role" required>
          <option value="" disabled selected>Pilih role</option>
          <option value="admin">Admin</option>
          <option value="pengajar">Pengajar</option>
          <option value="siswa">Siswa</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>
  </div>

</body>
</html>
