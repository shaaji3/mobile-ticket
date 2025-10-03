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
  <style>
    body { 
      font-family: var(--font-family); 
      background: var(--bg); 
      color: var(--text-primary);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: var(--gap);
    }
    
    .auth-container {
      width: 100%;
      max-width: var(--max-width);
      animation: fadeInUp 0.6s ease;
    }
    
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .auth-card {
      background: var(--card-bg);
      border-radius: var(--radius-xl);
      padding: var(--gap-lg);
      box-shadow: var(--shadow-xl);
    }
    
    /* Logo Area */
    .auth-logo {
      text-align: center;
      margin-bottom: var(--gap-lg);
    }
    
    .auth-logo-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
      border-radius: var(--radius-lg);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto var(--gap);
      font-size: 40px;
      color: var(--text-white);
      box-shadow: 0 8px 24px rgba(99, 102, 241, 0.3);
    }
    
    .auth-title {
      font-size: var(--h1);
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: var(--gap-sm);
    }
    
    .auth-subtitle {
      font-size: var(--small);
      color: var(--text-secondary);
    }
    
    /* Social Login Buttons */
    .social-login {
      margin-bottom: var(--gap-lg);
    }
    
    .social-btn {
      width: 100%;
      height: var(--btn-height);
      border: 2px solid #E2E8F0;
      border-radius: var(--radius-md);
      background: var(--card-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: var(--gap);
      font-weight: 600;
      color: var(--text-primary);
      transition: var(--transition);
      cursor: pointer;
      margin-bottom: var(--gap);
    }
    
    .social-btn:hover {
      border-color: var(--color-primary);
      background: rgba(99, 102, 241, 0.05);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }
    
    .social-btn i {
      font-size: 20px;
    }
    
    .social-btn.google {
      color: #DB4437;
    }
    
    .social-btn.facebook {
      color: #1877F2;
    }
    
    .social-btn.apple {
      color: #000000;
    }
    
    /* Divider */
    .divider {
      display: flex;
      align-items: center;
      text-align: center;
      margin: var(--gap-lg) 0;
      color: var(--text-secondary);
      font-size: var(--small);
    }
    
    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      border-bottom: 1px solid #E2E8F0;
    }
    
    .divider span {
      padding: 0 var(--gap);
      background: var(--card-bg);
    }
    
    /* Form Groups */
    .form-group {
      margin-bottom: var(--gap);
    }
    
    .form-label {
      font-weight: 600;
      font-size: var(--small);
      color: var(--text-primary);
      margin-bottom: var(--gap-sm);
      display: block;
    }
    
    .input-group-custom {
      position: relative;
    }
    
    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-secondary);
      z-index: 1;
    }
    
    .form-control {
      height: var(--btn-height);
      border: 2px solid #E2E8F0;
      border-radius: var(--radius-md);
      padding: 0 16px 0 45px;
      font-size: var(--body);
      transition: var(--transition);
    }
    
    .form-control:focus {
      outline: none;
      border-color: var(--color-primary);
      box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }
    
    .password-toggle {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: var(--text-secondary);
      cursor: pointer;
      z-index: 1;
      padding: 0;
      font-size: 18px;
    }
    
    .password-toggle:hover {
      color: var(--color-primary);
    }
    
    /* Remember Me & Forgot Password */
    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: var(--gap-lg);
    }
    
    .form-check {
      display: flex;
      align-items: center;
    }
    
    .form-check-input {
      width: 20px;
      height: 20px;
      border: 2px solid #E2E8F0;
      border-radius: 6px;
      margin-right: var(--gap-sm);
      cursor: pointer;
    }
    
    .form-check-input:checked {
      background-color: var(--color-primary);
      border-color: var(--color-primary);
    }
    
    .form-check-label {
      font-size: var(--small);
      color: var(--text-secondary);
      cursor: pointer;
    }
    
    .forgot-link {
      font-size: var(--small);
      color: var(--color-primary);
      text-decoration: none;
      font-weight: 600;
    }
    
    .forgot-link:hover {
      text-decoration: underline;
    }
    
    /* Submit Button */
    .btn-submit {
      width: 100%;
      height: var(--btn-height);
      background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
      border: none;
      border-radius: var(--radius-md);
      color: var(--text-white);
      font-weight: 700;
      font-size: var(--body);
      box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
      transition: var(--transition);
      cursor: pointer;
    }
    
    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    }
    
    .btn-submit:active {
      transform: translateY(0);
    }
    
    /* Footer */
    .auth-footer {
      text-align: center;
      margin-top: var(--gap-lg);
      font-size: var(--small);
      color: var(--text-secondary);
    }
    
    .auth-footer a {
      color: var(--color-primary);
      font-weight: 600;
      text-decoration: none;
    }
    
    .auth-footer a:hover {
      text-decoration: underline;
    }
    
    /* Back Button */
    .back-btn {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 40px;
      height: 40px;
      background: var(--card-bg);
      border: 2px solid #E2E8F0;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-secondary);
      text-decoration: none;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
    }
    
    .back-btn:hover {
      background: var(--color-primary);
      color: var(--text-white);
      border-color: var(--color-primary);
    }
  </style>
</head>
<body>
  
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
  <script src="assets/js/scripts.js"></script>
  <script>
    // Password Toggle
    function togglePassword() {
      const passwordField = document.getElementById('password');
      const toggleIcon = document.getElementById('password-toggle-icon');
      
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
      } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
      }
    }

    // Handle Social Login
    function handleSocialLogin(provider) {
      showToast(`${provider.charAt(0).toUpperCase() + provider.slice(1)} login coming soon!`, 'success');
      // In production, integrate OAuth here
      setTimeout(() => {
        window.location.href = 'index.php';
      }, 1500);
    }

    // Forgot Password
    function handleForgotPassword(e) {
      e.preventDefault();
      showToast('Password reset link sent to your email!', 'success');
    }

    // Form Submit
    document.getElementById('login-form').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const remember = document.getElementById('remember').checked;

      // Simulate API call
      showToast('Logging in...', 'success');
      
      setTimeout(() => {
        showToast('Login successful!', 'success');
        setTimeout(() => {
          window.location.href = 'index.php';
        }, 1000);
      }, 1500);
    });

    // Add input validation feedback
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
      input.addEventListener('blur', function() {
        if (this.value && !this.validity.valid) {
          this.style.borderColor = 'var(--color-danger)';
        } else if (this.value) {
          this.style.borderColor = 'var(--color-success)';
        }
      });
      
      input.addEventListener('input', function() {
        if (this.style.borderColor) {
          this.style.borderColor = '#E2E8F0';
        }
      });
    });
  </script>
</body>
</html>
