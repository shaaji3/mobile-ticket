<?php
$role = 'organizer';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — My Events</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); padding-bottom: var(--nav-height); }
    .event-manage-card {
        background-color: var(--card-bg);
        border-radius: var(--radius-md);
        padding: var(--gap);
        margin-bottom: var(--gap);
        display: flex;
        align-items: center;
        gap: var(--gap);
    }
    .event-manage-card img {
        width: 60px;
        height: 60px;
        border-radius: var(--radius-sm);
        object-fit: cover;
    }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">My Events</h1>
        <a href="#" class="btn btn-primary" style="background-color: var(--color-primary);" data-bs-toggle="modal" data-bs-target="#editEventModal"><i class="bi bi-plus-circle"></i> Create</a>
    </div>
    <div id="my-events-list">
        <!-- Events loaded via JS -->
    </div>
  </main>

  <!-- Edit Event Modal -->
  <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editEventModalLabel">Create / Edit Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="event-edit-form">
            <div class="mb-3">
                <label for="eventTitle" class="form-label">Event Title</label>
                <input type="text" class="form-control" id="eventTitle" value="Summer Beats Concert">
            </div>
            <div class="mb-3">
                <label for="eventDate" class="form-label">Date & Time</label>
                <input type="datetime-local" class="form-control" id="eventDate">
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background-color: var(--color-primary);">Save Event</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
        <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item text-primary"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const eventsListContainer = document.getElementById('my-events-list');

        async function loadMyEvents() {
            const response = await fetch('api/events.json');
            const events = await response.json();

            eventsListContainer.innerHTML = ''; // Clear
            events.forEach(event => {
                const eventCard = `
                    <div class="event-manage-card">
                        <img src="${event.image}" alt="${event.title}">
                        <div class="flex-grow-1">
                            <h3 class="h6 mb-1">${event.title}</h3>
                            <p class="small text-muted mb-0">${new Date(event.date).toLocaleDateString()}</p>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editEventModal">Edit</button>
                    </div>
                `;
                eventsListContainer.innerHTML += eventCard;
            });
        }

        loadMyEvents();

        document.getElementById('event-edit-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const editModal = bootstrap.Modal.getInstance(document.getElementById('editEventModal'));
            editModal.hide();
            showToast('Event saved successfully!', 'success');
        });
    });
  </script>
</body>
</html>