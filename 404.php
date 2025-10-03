<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Page Not Found</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); }
    .error-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        text-align: center;
    }
  </style>
</head>
<body>
  <main class="app-container error-container" style="max-width: var(--max-width); margin: 0 auto;">
    <i class="bi bi-exclamation-triangle-fill" style="font-size: 5rem; color: var(--color-accent);"></i>
    <h1 class="display-1 fw-bold">404</h1>
    <h2 class="h3 mb-3">Page Not Found</h2>
    <p class="text-secondary mb-4">The page you are looking for does not exist or has been moved.</p>
    <a href="index.php" class="btn btn-primary" style="background-color: var(--color-primary); height: var(--btn-height); border-radius: var(--radius-md); line-height: calc(var(--btn-height) - 2px);">Go Home</a>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>