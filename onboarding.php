<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Welcome</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); }
    .onboarding-container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 100vh;
        padding: var(--gap);
    }
    .carousel-item {
        text-align: center;
        padding: 40px 0;
    }
    .carousel-indicators [data-bs-target] {
        background-color: var(--color-primary);
    }
  </style>
</head>
<body>
  <main class="app-container onboarding-container" style="max-width: var(--max-width); margin: 0 auto;">
    <div id="onboardingCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#onboardingCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#onboardingCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#onboardingCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <i class="bi bi-calendar-heart fs-1 text-primary"></i>
          <h2 class="h3 mt-3">Discover Events</h2>
          <p class="text-secondary">Find exciting concerts, conferences, and more near you.</p>
        </div>
        <div class="carousel-item">
          <i class="bi bi-ticket-perforated fs-1 text-primary"></i>
          <h2 class="h3 mt-3">Buy Tickets Easily</h2>
          <p class="text-secondary">Secure your spot in just a few taps.</p>
        </div>
        <div class="carousel-item">
          <i class="bi bi-wallet2 fs-1 text-primary"></i>
          <h2 class="h3 mt-3">Manage Your Tickets</h2>
          <p class="text-secondary">Access all your tickets and event details in one place.</p>
        </div>
      </div>
    </div>

    <div>
        <a href="login.php" class="btn btn-primary w-100" style="background-color: var(--color-primary); height: var(--btn-height); border-radius: var(--radius-md);">Get Started</a>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>