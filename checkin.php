<?php
$role = 'organizer';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Check-In</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-dark">
  <main class="app-container p-3">
    <h1 class="h2 mb-4 text-white">Scan QR Code</h1>

    <div class="scanner-container" id="qr-reader">
        <div class="scanner-placeholder">
            <i class="bi bi-camera-video fs-1"></i>
            <p>Camera view here</p>
            <!-- Real implementation would replace this div with a video stream -->
        </div>
    </div>

    <div class="scan-result-card">
        <h3 class="h5">Scan Result</h3>
        <div id="scan-result" class="text-muted">
            Awaiting scan...
        </div>
    </div>
  </main>

  <nav class="navbar fixed-bottom navbar-light bg-white border-top">
    <div class="container d-flex justify-content-around align-items-center">
        <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item text-primary"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>