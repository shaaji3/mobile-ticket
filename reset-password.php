<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Reset Password</title>
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
        <div class="auth-logo-icon"><i class="bi bi-shield-lock-fill"></i></div>
        <h1 class="auth-title">Create New Password</h1>
        <p class="auth-subtitle">Your new password must be different from previous ones.</p>
      </div>

      <form id="reset-password-form">
        <div class="form-group">
          <label for="password" class="form-label">New Password</label>
          <div class="input-group-custom">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" class="form-control" id="password" placeholder="Enter new password" required>
            <button type="button" class="password-toggle" onclick="togglePassword('password', 'password-toggle-icon')">
              <i class="bi bi-eye" id="password-toggle-icon"></i>
            </button>
          </div>
        </div>
        <div class="form-group">
          <label for="confirm-password" class="form-label">Confirm New Password</label>
          <div class="input-group-custom">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" class="form-control" id="confirm-password" placeholder="Confirm new password" required>
             <button type="button" class="password-toggle" onclick="togglePassword('confirm-password', 'confirm-password-toggle-icon')">
              <i class="bi bi-eye" id="confirm-password-toggle-icon"></i>
            </button>
          </div>
        </div>
        <button type="submit" class="btn-submit">Reset Password</button>
      </form>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>