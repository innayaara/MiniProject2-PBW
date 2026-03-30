<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: admin.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    $validUsername = "admin";
    $validPassword = "12345";

    if ($username === $validUsername && $password === $validPassword) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: admin.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #fff0f5, #ffe3ec);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
    }

    .login-card {
      width: 100%;
      max-width: 420px;
      border: none;
      border-radius: 24px;
      box-shadow: 0 18px 40px rgba(214, 51, 132, 0.15);
    }

    .btn-login {
      background: linear-gradient(45deg, #ff8fab, #d63384);
      border: none;
      color: white;
    }

    .btn-login:hover {
      background: linear-gradient(45deg, #ff7aa0, #c0266f);
      color: white;
    }

    .btn-home {
      border: 1px solid #d63384;
      color: #d63384;
      background: white;
    }

    .btn-home:hover {
      background: #d63384;
      color: white;
    }

    .title-pink {
      color: #d63384;
    }
  </style>
</head>
<body>

<div class="card login-card p-4">
  <div class="card-body">
    <h2 class="text-center fw-bold title-pink mb-2">Login Admin</h2>
    <p class="text-center text-muted mb-4">Masuk untuk mengelola gallery dan sertifikat</p>

    <?php if ($error !== ""): ?>
      <div class="alert alert-danger text-center">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control form-control-lg rounded-3" required>
      </div>

      <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control form-control-lg rounded-3" required>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-login w-100 rounded-pill py-2">Login</button>
        <a href="index.php" class="btn btn-home w-100 rounded-pill py-2">
          <i class="fas fa-arrow-left me-2"></i>Kembali ke Home
        </a>
      </div>
    </form>
  </div>
</div>

</body>
</html>