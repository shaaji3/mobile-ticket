<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Verify OTP</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="auth-body">

  <a href="signup.php" class="back-btn"><i class="bi bi-arrow-left"></i></a>

  <div class="auth-container">
    <div class="auth-card">

      <div class="auth-logo">
        <div class="auth-logo-icon"><i class="bi bi-shield-check"></i></div>
        <h1 class="auth-title">Enter Verification Code</h1>
        <p class="auth-subtitle">A 6-digit code has been sent to your email address.</p>
      </div>

      <form id="otp-form">
        <div class="form-group">
          <label for="otp" class="form-label text-center">Enter Code</label>
          <div class="otp-inputs" id="otp-container">
            <input type="tel" class="form-control otp-input" maxlength="1" pattern="[0-9]" required>
            <input type="tel" class="form-control otp-input" maxlength="1" pattern="[0-9]" required>
            <input type="tel" class="form-control otp-input" maxlength="1" pattern="[0-9]" required>
            <input type="tel" class="form-control otp-input" maxlength="1" pattern="[0-9]" required>
            <input type="tel" class="form-control otp-input" maxlength="1" pattern="[0-9]" required>
            <input type="tel" class="form-control otp-input" maxlength="1" pattern="[0-9]" required>
          </div>
        </div>
        <button type="submit" class="btn-submit">Verify Account</button>
      </form>

      <div class="auth-footer">
        Didn't receive the code? <a href="#">Resend Code</a>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>