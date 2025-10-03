<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Wallet</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); padding-bottom: var(--nav-height); }
    .wallet-card {
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        color: white;
        border-radius: var(--radius-lg);
        padding: calc(var(--gap) * 1.5);
        margin-bottom: var(--gap);
    }
    .transaction-list .list-group-item {
        background-color: var(--card-bg);
        border-bottom: 1px solid #e2e8f0;
    }
    .transaction-list .list-group-item:last-child {
        border-bottom: none;
    }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    <h1 class="h2 mb-4">My Wallet</h1>

    <div class="wallet-card text-center">
        <p class="mb-1 text-white-50">Available Balance</p>
        <h2 class="display-5 fw-bold">₦12,500.00</h2>
        <button class="btn btn-light mt-3" style="background: rgba(255,255,255,0.2); border: none; color: white;">
            <i class="bi bi-plus-circle"></i> Fund Wallet
        </button>
    </div>

    <h3 class="h4 mt-4">Transaction History</h3>
    <div class="list-group transaction-list">
        <div class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h4 class="h6 mb-1">Ticket for Summer Beats</h4>
                <p class="small text-muted mb-0">Oct 28, 2025</p>
            </div>
            <span class="fw-bold text-danger">-₦5,000</span>
        </div>
        <div class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h4 class="h6 mb-1">Wallet Top-up</h4>
                <p class="small text-muted mb-0">Oct 27, 2025</p>
            </div>
            <span class="fw-bold text-success">+₦10,000</span>
        </div>
         <div class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h4 class="h6 mb-1">Ticket for Tech Conf</h4>
                <p class="small text-muted mb-0">Oct 25, 2025</p>
            </div>
            <span class="fw-bold text-danger">-₦2,500</span>
        </div>
    </div>
  </main>

  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
      <?php if($role === 'user'): ?>
        <a href="index.php" class="text-center nav-item"><i class="bi bi-house fs-4"></i><div class="small">Home</div></a>
        <a href="index.php#events" class="text-center nav-item"><i class="bi bi-calendar-event fs-4"></i><div class="small">Events</div></a>
        <a href="tickets.php" class="text-center nav-item"><i class="bi bi-ticket fs-4"></i><div class="small">Tickets</div></a>
        <a href="wallet.php" class="text-center nav-item text-primary"><i class="bi bi-wallet2 fs-4"></i><div class="small">Wallet</div></a>
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
  <script src="assets/js/scripts.js"></script>
</body>
</html>