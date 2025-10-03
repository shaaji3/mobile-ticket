<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); padding-bottom: var(--nav-height); }
    .profile-header {
        text-align: center;
        margin-bottom: var(--gap);
    }
    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: var(--gap);
    }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    <div class="profile-header">
        <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="User Avatar" class="profile-avatar">
        <h1 class="h3">John Doe</h1>
        <p class="text-muted">john.doe@example.com</p>
    </div>

    <form id="profile-form">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" value="John Doe" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" value="john.doe@example.com" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" value="+1234567890">
        </div>

        <hr>

        <div class="d-grid gap-2">
             <button type="submit" class="btn btn-primary" style="background-color: var(--color-primary); height: var(--btn-height); border-radius: var(--radius-md);">Save Changes</button>
             <button type="button" class="btn btn-outline-secondary">Change Password</button>
             <button type="button" class="btn btn-outline-danger">Log Out</button>
        </div>
    </form>
  </main>

  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
      <?php if($role === 'user'): ?>
        <a href="index.php" class="text-center nav-item"><i class="bi bi-house fs-4"></i><div class="small">Home</div></a>
        <a href="index.php#events" class="text-center nav-item"><i class="bi bi-calendar-event fs-4"></i><div class="small">Events</div></a>
        <a href="tickets.php" class="text-center nav-item"><i class="bi bi-ticket fs-4"></i><div class="small">Tickets</div></a>
        <a href="wallet.php" class="text-center nav-item"><i class="bi bi-wallet2 fs-4"></i><div class="small">Wallet</div></a>
        <a href="profile.php" class="text-center nav-item text-primary"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
      <?php else: /* organizer */ ?>
        <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item text-primary"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
      <?php endif; ?>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.getElementById('profile-form').addEventListener('submit', function(e) {
        e.preventDefault();
        // Simulate API call
        showToast('Profile updated successfully!', 'success');
    });
  </script>
</body>
</html>