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
  <style>
    body { font-family: var(--font-family); background: #000; color: var(--text-primary); padding-bottom: var(--nav-height); }
    .scanner-container {
        position: relative;
        width: 100%;
        padding-top: 100%; /* 1:1 Aspect Ratio */
        background-color: #333;
        border-radius: var(--radius-lg);
        overflow: hidden;
    }
    .scanner-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
    }
    .scan-result-card {
        background-color: var(--card-bg);
        border-radius: var(--radius-md);
        padding: var(--gap);
        margin-top: var(--gap);
    }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
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

  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
        <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item text-primary"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const scanResultEl = document.getElementById('scan-result');

        // --- TODO: Integrate a real QR scanner library here ---
        // For example, using html5-qrcode:
        //
        // const html5QrCode = new Html5Qrcode("qr-reader");
        // const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        //     scanResultEl.textContent = `Success! Scanned: ${decodedText}`;
        //     scanResultEl.classList.remove('text-muted', 'text-danger');
        //     scanResultEl.classList.add('text-success');
        //     html5QrCode.stop();
        // };
        // const config = { fps: 10, qrbox: { width: 250, height: 250 } };
        // html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);

        // For this stub, we'll just simulate a scan result after a delay.
        setTimeout(() => {
            scanResultEl.innerHTML = `
                <strong class="text-success">Success!</strong><br>
                Ticket ID: TCKT_1001<br>
                Type: VIP
            `;
            scanResultEl.classList.remove('text-muted');
        }, 3000);
    });
  </script>
</body>
</html>