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
        <h1 class="h2 text-center mb-4">Log In</h1>
        <form id="login-form">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background-color: var(--color-primary); height: var(--btn-height); border-radius: var(--radius-md);">Log In</button>
            <div class="text-center my-3">
                <a href="#" class="text-muted small">Forgot password?</a>
            </div>
        </form>
        <p class="text-center small">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();
        // Simulate API call
        showToast('Login successful!', 'success');
        setTimeout(() => {
            window.location.href = 'index.php';
        }, 1500);
    });
  </script>
</body>
</html>