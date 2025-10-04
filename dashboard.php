<?php
// Set role to 'organizer' for this page
$role = 'organizer';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <main class="app-container p-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Dashboard</h1>
        <a href="#" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Create Event</a>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="metric-card">
                <p class="text-muted mb-1">Tickets Sold</p>
                <h3 class="fw-bold">1,250</h3>
            </div>
        </div>
        <div class="col-6">
            <div class="metric-card">
                <p class="text-muted mb-1">Revenue</p>
                <h3 class="fw-bold">₦8.5M</h3>
            </div>
        </div>
    </div>

    <h3 class="h4 mt-4">Sales Analytics</h3>
    <div class="chart-placeholder my-3">
        <i class="bi bi-bar-chart-line"></i> Chart Placeholder
    </div>

    <h3 class="h4 mt-4" id="reports">Recent Sales</h3>
    <ul class="list-group">
        <li class="list-group-item">
            <strong>VIP Ticket</strong> for Summer Beats Concert
            <span class="float-end">₦15,000</span>
        </li>
        <li class="list-group-item">
            <strong>Regular Ticket</strong> for Summer Beats Concert
            <span class="float-end">₦5,000</span>
        </li>
        <li class="list-group-item">
            <strong>Professional Ticket</strong> for Innovate Lagos
            <span class="float-end">₦10,000</span>
        </li>
    </ul>
  </main>

  <nav class="navbar fixed-bottom navbar-light bg-white border-top">
    <div class="container d-flex justify-content-around align-items-center">
        <a href="dashboard.php" class="text-center nav-item text-primary"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>