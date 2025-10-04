<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Event Details</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <main class="app-container">
    <div id="event-details-container" class="p-3">
        <!-- Skeleton Loader -->
        <div id="skeleton-loader">
            <div class="skeleton event-banner"></div>
            <div class="skeleton skeleton-title mt-3" style="height: 28px; width: 80%;"></div>
            <div class="skeleton skeleton-text mt-2" style="height: 20px; width: 60%;"></div>
        </div>
        <!-- Event Content -->
        <div id="event-content" class="d-none">
            <img src="" id="event-banner" class="event-banner" alt="Event Banner">
            <h1 class="h2 mt-3" id="event-title"></h1>
            <p class="text-secondary"><i class="bi bi-calendar-event"></i> <span id="event-date"></span></p>
            <p class="text-secondary"><i class="bi bi-geo-alt"></i> <span id="event-location"></span></p>
            <p id="event-description"></p>
            <hr>
            <h2 class="h3">Tickets</h2>
            <div id="ticket-types"></div>
        </div>
    </div>
    <div class="p-3 fixed-bottom bg-white">
         <a href="#" id="buy-ticket-btn" class="btn btn-primary w-100">Buy Ticket</a>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>