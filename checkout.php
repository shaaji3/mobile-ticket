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
</head>
<body>
  <main class="app-container p-3">
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

    <div class="p-3 fixed-bottom bg-white">
         <button id="pay-btn" class="btn btn-primary w-100">Pay Now</button>
    </div>
  </main>

  <!-- Payment Confirmation Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
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
  <script src="assets/js/main.js"></script>
</body>
</html>