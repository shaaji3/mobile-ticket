<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="auth-body">
  
  <!-- Back Button -->
  <a href="onboarding.php" class="back-btn">
    <i class="bi bi-arrow-left"></i>
  </a>

  <div class="auth-container">
    <div class="auth-card">
      
      <!-- Logo & Title -->
      <div class="auth-logo">
        <div class="auth-logo-icon">
          <i class="bi bi-calendar-event-fill"></i>
        </div>
        <h1 class="auth-title">Welcome Back!</h1>
        <p class="auth-subtitle">Sign in to continue to your account</p>
      </div>

      <!-- Social Login -->
      <div class="social-login">
        <button class="social-btn google" onclick="handleSocialLogin('google')">
          <i class="bi bi-google"></i>
          <span>Continue with Google</span>
        </button>
        <button class="social-btn facebook" onclick="handleSocialLogin('facebook')">
          <i class="bi bi-facebook"></i>
          <span>Continue with Facebook</span>
        </button>
        <button class="social-btn apple" onclick="handleSocialLogin('apple')">
          <i class="bi bi-apple"></i>
          <span>Continue with Apple</span>
        </button>
      </div>

      <!-- Divider -->
      <div class="divider">
        <span>Or sign in with email</span>
      </div>

      <!-- Login Form -->
      <form id="login-form">
        
        <!-- Email Field -->
        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <div class="input-group-custom">
            <i class="bi bi-envelope input-icon"></i>
            <input 
              type="email" 
              class="form-control" 
              id="email" 
              placeholder="you@example.com"
              required
            >
          </div>
        </div>

        <!-- Password Field -->
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <div class="input-group-custom">
            <i class="bi bi-lock input-icon"></i>
            <input 
              type="password" 
              class="form-control" 
              id="password" 
              placeholder="Enter your password"
              required
            >
            <button type="button" class="password-toggle" onclick="togglePassword()">
              <i class="bi bi-eye" id="password-toggle-icon"></i>
            </button>
          </div>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="form-options">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" checked>
            <label class="form-check-label" for="remember">
              Remember me
            </label>
          </div>
          <a href="#" class="forgot-link" onclick="handleForgotPassword(event)">Forgot Password?</a>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-submit">
          Sign In
        </button>

      </form>

      <!-- Footer -->
      <div class="auth-footer">
        Don't have an account? <a href="signup.php">Sign Up</a>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
