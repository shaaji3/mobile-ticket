<?php
// simulate role; set to 'organizer' to preview organizer menu
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-f" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Home</title>

  <!-- Inter font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS (CDN OK) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <main class="app-container p-3" style="padding-bottom: var(--nav-height);">
    <div class="search-container mb-3">
      <i class="bi bi-search search-icon"></i>
      <input type="text" class="form-control search-input" placeholder="Search events...">
    </div>

    <div class="category-chips">
        <a href="#" class="category-chip active">All</a>
        <a href="#" class="category-chip">Music</a>
        <a href="#" class="category-chip">Conference</a>
        <a href="#" class="category-chip">Arts</a>
        <a href="#" class="category-chip">Tech</a>
    </div>

    <h1 class="h3" id="events">Upcoming Events</h1>
    <div id="events-list">
        <!-- Skeleton Loader -->
        <div class="card event-card skeleton">
            <div class="event-card-image"></div>
            <div class="event-card-content">
                <div class="skeleton skeleton-text" style="height: 24px; width: 80%;"></div>
                <div class="skeleton skeleton-text mt-2" style="height: 16px; width: 50%;"></div>
            </div>
        </div>
    </div>
  </main>

  <nav class="navbar fixed-bottom">
    <div class="container d-flex justify-content-around align-items-center">
      <?php if($role === 'user'): ?>
        <a href="index.php" class="text-center nav-item active"><i class="bi bi-house fs-4"></i><div class="small">Home</div></a>
        <a href="index.php#events" class="text-center nav-item"><i class="bi bi-calendar-event fs-4"></i><div class="small">Events</div></a>
        <a href="tickets.php" class="text-center nav-item"><i class="bi bi-ticket fs-4"></i><div class="small">Tickets</div></a>
        <a href="wallet.php" class="text-center nav-item"><i class="bi bi-wallet2 fs-4"></i><div class="small">Wallet</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
      <?php else: /* organizer */ ?>
        <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
      <?php endif; ?>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>