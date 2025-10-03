<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — My Tickets</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); padding-bottom: var(--nav-height); }
    .ticket-card {
        background-color: var(--card-bg);
        border-radius: var(--radius-lg);
        margin-bottom: var(--gap);
        padding: var(--gap);
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        display: flex;
        gap: var(--gap);
    }
    .ticket-card .qr-code {
        width: 80px;
        height: 80px;
        flex-shrink: 0;
    }
    .badge-upcoming { background-color: var(--color-primary); }
    .badge-used { background-color: var(--muted); }
    .badge-canceled { background-color: var(--color-accent); }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    <h1 class="h2 mb-4">My Tickets</h1>
    <div id="tickets-list">
        <!-- Skeleton Loader -->
        <div id="skeleton-loader">
            <div class="ticket-card">
                <div class="qr-code" style="background-color: #e2e8f0; border-radius: var(--radius-md);"></div>
                <div class="w-100">
                    <div style="height: 24px; background-color: #e2e8f0; border-radius: var(--radius-sm); width: 80%;"></div>
                    <div style="height: 16px; background-color: #e2e8f0; border-radius: var(--radius-sm); width: 50%; margin-top: 8px;"></div>
                </div>
            </div>
        </div>
        <!-- Tickets will be loaded here -->
    </div>
    <div id="no-tickets" class="text-center d-none">
        <i class="bi bi-ticket-perforated fs-1 text-muted"></i>
        <p class="mt-3">You don't have any tickets yet.</p>
        <a href="index.php" class="btn btn-primary" style="background-color: var(--color-primary);">Find Events</a>
    </div>
  </main>

  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
      <?php if($role === 'user'): ?>
        <a href="index.php" class="text-center nav-item"><i class="bi bi-house fs-4"></i><div class="small">Home</div></a>
        <a href="index.php#events" class="text-center nav-item"><i class="bi bi-calendar-event fs-4"></i><div class="small">Events</div></a>
        <a href="tickets.php" class="text-center nav-item text-primary"><i class="bi bi-ticket fs-4"></i><div class="small">Tickets</div></a>
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
  <script src="assets/js/scripts.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const ticketsList = document.getElementById('tickets-list');
        const skeletonLoader = document.getElementById('skeleton-loader');
        const noTicketsMessage = document.getElementById('no-tickets');

        async function fetchTickets() {
            try {
                const response = await fetch('api/tickets.json');
                const tickets = await response.json();

                skeletonLoader.classList.add('d-none');
                ticketsList.innerHTML = ''; // Clear loader

                if (tickets.length > 0) {
                    tickets.forEach(ticket => {
                        const statusClass = `badge-${ticket.status}`;
                        const ticketCard = `
                            <div class="ticket-card">
                                <img src="assets/img/qr-placeholder.svg" alt="QR Code" class="qr-code">
                                <div>
                                    <h3 class="h5">${ticket.event_title}</h3>
                                    <p class="small text-secondary mb-2">${new Date(ticket.date).toLocaleString()}</p>
                                    <span class="badge ${statusClass}">${ticket.status}</span>
                                </div>
                            </div>
                        `;
                        ticketsList.innerHTML += ticketCard;
                    });
                } else {
                    noTicketsMessage.classList.remove('d-none');
                }

            } catch (error) {
                console.error('Error fetching tickets:', error);
                ticketsList.innerHTML = '<p class="text-danger">Could not load tickets.</p>';
            }
        }

        fetchTickets();
    });
  </script>
</body>
</html>