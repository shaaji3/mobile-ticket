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
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); }
    .auth-card {
        background-color: var(--card-bg);
        border-radius: var(--radius-lg);
        padding: var(--gap);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <main class="app-container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="auth-card w-100" style="max-width: var(--max-width);">
        <h1 class="h2 text-center mb-4">Create Account</h1>
        <form id="signup-form">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
             <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="terms" required>
                <label class="form-check-label small" for="terms">
                    I agree to the <a href="#">Terms & Conditions</a>
                </label>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background-color: var(--color-primary); height: var(--btn-height); border-radius: var(--radius-md);">Sign Up</button>
        </form>
        <p class="text-center small mt-3">Already have an account? <a href="login.php">Log In</a></p>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.getElementById('signup-form').addEventListener('submit', function(e) {
        e.preventDefault();
        // Simulate API call
        showToast('Account created successfully!', 'success');
        setTimeout(() => {
            window.location.href = 'login.php';
        }, 1500);
    });
  </script>
</body>
</html>