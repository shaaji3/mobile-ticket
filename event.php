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
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); padding-bottom: var(--nav-height); }
    .event-banner {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: var(--radius-lg);
    }
    .ticket-type-card {
        background-color: var(--card-bg);
        border: 1px solid #e2e8f0;
        border-radius: var(--radius-md);
        padding: var(--gap);
    }
    .quantity-selector {
        display: flex;
        align-items: center;
    }
    .quantity-selector button {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid #e2e8f0;
        background-color: var(--card-bg);
    }
  </style>
</head>
<body>
  <main class="app-container" style="max-width:var(--max-width);margin:0 auto;">
    <div id="event-details-container" class="p-3">
        <!-- Skeleton Loader -->
        <div id="skeleton-loader">
            <div class="skeleton-banner" style="height: 200px; background-color: #e2e8f0; border-radius: var(--radius-lg);"></div>
            <div class="skeleton-title mt-3" style="height: 28px; background-color: #e2e8f0; border-radius: var(--radius-sm);"></div>
            <div class="skeleton-text mt-2" style="height: 20px; width: 60%; background-color: #e2e8f0; border-radius: var(--radius-sm);"></div>
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
    <div class="p-3 fixed-bottom" style="max-width:var(--max-width); margin: 0 auto; background: var(--card-bg);">
         <a href="#" id="buy-ticket-btn" class="btn btn-primary w-100" style="background-color: var(--color-primary); height: var(--btn-height); border-radius: var(--radius-md);">Buy Ticket</a>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const eventId = urlParams.get('id') || 1; // Default to 1 if no ID

        const skeletonLoader = document.getElementById('skeleton-loader');
        const eventContent = document.getElementById('event-content');

        async function fetchEventDetails() {
            try {
                const response = await fetch(`api/events.json`);
                if (!response.ok) throw new Error('Network response was not ok');
                const events = await response.json();
                const event = events.find(e => e.id == eventId);

                if (event) {
                    document.getElementById('event-banner').src = event.image || 'assets/img/placeholder.jpg';
                    document.getElementById('event-banner').alt = event.title;
                    document.getElementById('event-title').textContent = event.title;
                    document.getElementById('event-date').textContent = new Date(event.date).toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' });
                    document.getElementById('event-location').textContent = event.location;
                    document.getElementById('event-description').textContent = event.description;

                    const ticketTypesContainer = document.getElementById('ticket-types');
                    ticketTypesContainer.innerHTML = ''; // Clear previous
                    event.tickets.forEach(ticket => {
                        const card = `
                            <div class="ticket-type-card d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <h3 class="h5">${ticket.type}</h3>
                                    <p class="fw-bold" style="color: var(--color-primary);">₦${ticket.price.toLocaleString()}</p>
                                </div>
                                <div class="quantity-selector">
                                    <button class="btn btn-sm">-</button>
                                    <span class="mx-2">1</span>
                                    <button class="btn btn-sm">+</button>
                                </div>
                            </div>
                        `;
                        ticketTypesContainer.innerHTML += card;
                    });

                    document.getElementById('buy-ticket-btn').href = `checkout.php?event=${event.id}&type=${event.tickets[0].type}&qty=1`;

                } else {
                    eventContent.innerHTML = '<p>Event not found.</p>';
                }
            } catch (error) {
                console.error('Fetch error:', error);
                eventContent.innerHTML = '<p>Could not load event details.</p>';
            } finally {
                skeletonLoader.classList.add('d-none');
                eventContent.classList.remove('d-none');
            }
        }
        fetchEventDetails();
    });
  </script>
</body>
</html>