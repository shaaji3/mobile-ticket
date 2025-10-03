<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Checkout</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); padding-bottom: var(--nav-height); }
    .summary-card, .payment-card {
        background-color: var(--card-bg);
        border-radius: var(--radius-md);
        padding: var(--gap);
        margin-bottom: var(--gap);
    }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    <h1 class="h2 mb-4">Checkout</h1>

    <div class="summary-card">
      <h2 class="h4">Order Summary</h2>
      <div id="order-summary-content">
        <!-- content loaded via JS -->
      </div>
      <div class="d-flex justify-content-between fw-bold mt-3">
        <span>Total</span>
        <span id="total-price"></span>
      </div>
    </div>

    <div class="payment-card">
        <h2 class="h4">Payment Method</h2>
        <div class="list-group">
            <label class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <i class="bi bi-credit-card-fill"></i> Card
                </div>
                <input class="form-check-input" type="radio" name="paymentMethod" value="card" checked>
            </label>
            <label class="list-group-item d-flex justify-content-between align-items-center">
                 <div>
                    <i class="bi bi-phone-fill"></i> Paystack / Flutterwave
                </div>
                <input class="form-check-input" type="radio" name="paymentMethod" value="mobile">
            </label>
            <label class="list-group-item d-flex justify-content-between align-items-center">
                 <div>
                    <i class="bi bi-wallet2"></i> Wallet
                </div>
                <input class="form-check-input" type="radio" name="paymentMethod" value="wallet">
            </label>
        </div>
    </div>

    <div class="p-3 fixed-bottom" style="max-width:var(--max-width); margin: 0 auto; background: var(--bg);">
         <button id="pay-btn" class="btn btn-primary w-100" style="background-color: var(--color-primary); height: var(--btn-height); border-radius: var(--radius-md);">Pay Now</button>
    </div>
  </main>

  <!-- Payment Confirmation Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: var(--radius-lg);">
          <div class="modal-body text-center p-4">
            <div id="payment-processing">
                <div class="spinner-border text-primary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-3">Processing payment...</p>
            </div>
            <div id="payment-success" class="d-none">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                <h3 class="mt-3">Payment Successful!</h3>
                <p>Your ticket has been sent to your account.</p>
                <a href="tickets.php" class="btn btn-success">View Tickets</a>
            </div>
          </div>
        </div>
      </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const eventId = urlParams.get('event');
        const ticketType = urlParams.get('type');
        const quantity = parseInt(urlParams.get('qty')) || 1;

        const summaryContainer = document.getElementById('order-summary-content');
        const totalPriceEl = document.getElementById('total-price');

        async function loadOrderSummary() {
            const response = await fetch('api/events.json');
            const events = await response.json();
            const event = events.find(e => e.id == eventId);
            if (event) {
                const ticket = event.tickets.find(t => t.type === ticketType);
                if(ticket) {
                    const total = ticket.price * quantity;
                    summaryContainer.innerHTML = `
                        <div class="d-flex justify-content-between">
                            <span>${quantity} x ${ticket.type} (${event.title})</span>
                            <span>₦${(ticket.price * quantity).toLocaleString()}</span>
                        </div>
                    `;
                    totalPriceEl.textContent = `₦${total.toLocaleString()}`;
                }
            }
        }

        loadOrderSummary();

        const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
        document.getElementById('pay-btn').addEventListener('click', () => {
            paymentModal.show();
            // Simulate payment processing
            setTimeout(() => {
                document.getElementById('payment-processing').classList.add('d-none');
                document.getElementById('payment-success').classList.remove('d-none');
            }, 2000);
        });
    });
  </script>
</body>
</html>