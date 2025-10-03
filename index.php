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
  <style>body{font-family:var(--font-family);background:var(--bg);color:var(--text-primary);}</style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto; padding-bottom: var(--nav-height);">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search events..." aria-label="Search events">
        <span class="input-group-text" style="background-color: var(--color-primary); color: white;"><i class="bi bi-search"></i></span>
    </div>

    <div class="d-flex overflow-auto mb-3">
        <span class="badge rounded-pill text-bg-primary me-2" style="background-color: var(--color-primary) !important;">All</span>
        <span class="badge rounded-pill text-bg-light me-2">Music</span>
        <span class="badge rounded-pill text-bg-light me-2">Conference</span>
        <span class="badge rounded-pill text-bg-light me-2">Arts</span>
        <span class="badge rounded-pill text-bg-light me-2">Tech</span>
    </div>

    <h1 class="h3" id="events">Upcoming Events</h1>
    <div id="events-list">
        <!-- Skeleton Loader -->
        <div class="card mb-3">
            <div class="card-img-top" style="height: 180px; background-color: #e2e8f0; border-radius: var(--radius-md) var(--radius-md) 0 0;"></div>
            <div class="card-body">
                <div class="skeleton-text" style="height: 24px; background-color: #e2e8f0; border-radius: var(--radius-sm); width: 80%;"></div>
                <div class="skeleton-text mt-2" style="height: 16px; background-color: #e2e8f0; border-radius: var(--radius-sm); width: 50%;"></div>
            </div>
        </div>
    </div>
  </main>

  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
      <?php if($role === 'user'): ?>
        <a href="index.php" class="text-center nav-item"><i class="bi bi-house fs-4" aria-hidden="true"></i><div class="small">Home</div></a>
        <a href="index.php#events" class="text-center nav-item"><i class="bi bi-calendar-event fs-4" aria-hidden="true"></i><div class="small">Events</div></a>
        <a href="tickets.php" class="text-center nav-item"><i class="bi bi-ticket fs-4" aria-hidden="true"></i><div class="small">Tickets</div></a>
        <a href="wallet.php" class="text-center nav-item"><i class="bi bi-wallet2 fs-4" aria-hidden="true"></i><div class="small">Wallet</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4" aria-hidden="true"></i><div class="small">Profile</div></a>
      <?php else: /* organizer */ ?>
        <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4" aria-hidden="true"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4" aria-hidden="true"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4" aria-hidden="true"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4" aria-hidden="true"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4" aria-hidden="true"></i><div class="small">Profile</div></a>
      <?php endif; ?>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const eventsListContainer = document.getElementById('events-list');

        async function fetchEvents() {
            try {
                // Keep skeleton for 1s to show loading state
                await new Promise(resolve => setTimeout(resolve, 1000));

                const response = await fetch('api/events.json');
                if (!response.ok) throw new Error('Network response was not ok');
                const events = await response.json();

                eventsListContainer.innerHTML = ''; // Clear skeleton
                if (events.length > 0) {
                    events.forEach(event => {
                        const eventCard = `
                            <a href="event.php?id=${event.id}" class="card mb-3 text-decoration-none text-dark">
                                <img src="${event.image}" class="card-img-top" alt="${event.title}" style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">${event.title}</h5>
                                    <p class="card-text text-muted small">${new Date(event.date).toLocaleDateString()}</p>
                                    <p class="card-text fw-bold" style="color: var(--color-primary);">₦${event.tickets[0].price.toLocaleString()}</p>
                                </div>
                            </a>
                        `;
                        eventsListContainer.innerHTML += eventCard;
                    });
                } else {
                    eventsListContainer.innerHTML = '<p>No upcoming events found.</p>';
                }
            } catch (error) {
                console.error('Fetch error:', error);
                eventsListContainer.innerHTML = '<p class="text-danger">Could not load events.</p>';
            }
        }

        fetchEvents();
    });
  </script>
</body>
</html>