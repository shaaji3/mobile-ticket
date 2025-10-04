<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Forgot Password</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="auth-body">

  <a href="login.php" class="back-btn"><i class="bi bi-arrow-left"></i></a>

  <div class="auth-container">
    <div class="auth-card">

      <div class="auth-logo">
        <div class="auth-logo-icon"><i class="bi bi-key-fill"></i></div>
        <h1 class="auth-title">Forgot Password?</h1>
        <p class="auth-subtitle">Enter your email and we'll send you a link to reset your password.</p>
      </div>

      <form id="forgot-password-form">
        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <div class="input-group-custom">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
          </div>
        </div>
        <button type="submit" class="btn-submit">Send Reset Link</button>
      </form>

      <div class="auth-footer">
        Remember your password? <a href="login.php">Sign In</a>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>