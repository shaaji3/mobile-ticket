<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Sign Up</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="auth-body">

  <a href="onboarding.php" class="back-btn"><i class="bi bi-arrow-left"></i></a>

  <div class="auth-container">
    <div class="auth-card">

      <div class="auth-logo">
        <div class="auth-logo-icon"><i class="bi bi-person-plus-fill"></i></div>
        <h1 class="auth-title">Create Your Account</h1>
        <p class="auth-subtitle">Join us and start discovering amazing events.</p>
      </div>

      <form id="signup-form">
        <div class="form-group">
          <label for="name" class="form-label">Full Name</label>
          <div class="input-group-custom">
            <i class="bi bi-person input-icon"></i>
            <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <div class="input-group-custom">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <div class="input-group-custom">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" class="form-control" id="password" placeholder="Create a password" required>
            <button type="button" class="password-toggle" onclick="togglePassword('password', 'password-toggle-icon')">
              <i class="bi bi-eye" id="password-toggle-icon"></i>
            </button>
          </div>
        </div>
        <div class="form-group">
          <label for="confirm-password" class="form-label">Confirm Password</label>
          <div class="input-group-custom">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password" required>
            <button type="button" class="password-toggle" onclick="togglePassword('confirm-password', 'confirm-password-toggle-icon')">
              <i class="bi bi-eye" id="confirm-password-toggle-icon"></i>
            </button>
          </div>
        </div>
        <div class="form-options">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms" required>
                <label class="form-check-label" for="terms">
                I agree to the <a href="#" class="forgot-link">Terms & Conditions</a>
                </label>
            </div>
        </div>
        <button type="submit" class="btn-submit">Create Account</button>
      </form>

      <div class="auth-footer">
        Already have an account? <a href="login.php">Sign In</a>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>