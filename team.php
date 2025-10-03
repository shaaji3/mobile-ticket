<?php
$role = 'organizer';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Manage Team</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { font-family: var(--font-family); background: var(--bg); color: var(--text-primary); padding-bottom: var(--nav-height); }
    .team-member-card {
        background-color: var(--card-bg);
        border-radius: var(--radius-md);
        padding: var(--gap);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: var(--gap);
    }
    .team-member-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
    }
    .badge-admin { background-color: var(--color-primary); }
    .badge-staff { background-color: var(--color-secondary); }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Manage Team</h1>
        <button class="btn btn-primary" style="background-color: var(--color-primary);" data-bs-toggle="modal" data-bs-target="#inviteModal">
            <i class="bi bi-plus-circle"></i> Invite
        </button>
    </div>

    <div id="team-list">
        <div class="team-member-card">
            <img src="https://i.pravatar.cc/150?u=a042581f4e29026704e" alt="Team Member" class="team-member-avatar">
            <div class="flex-grow-1">
                <h3 class="h6 mb-1">Jane Smith</h3>
                <p class="small text-muted mb-0">jane.smith@example.com</p>
            </div>
            <span class="badge badge-admin">Admin</span>
            <i class="bi bi-three-dots-vertical text-muted"></i>
        </div>
        <div class="team-member-card">
            <img src="https://i.pravatar.cc/150?u=a042581f4e29026704f" alt="Team Member" class="team-member-avatar">
            <div class="flex-grow-1">
                <h3 class="h6 mb-1">Mike Johnson</h3>
                <p class="small text-muted mb-0">mike.j@example.com</p>
            </div>
            <span class="badge badge-staff">Staff</span>
             <i class="bi bi-three-dots-vertical text-muted"></i>
        </div>
    </div>
  </main>

  <!-- Invite Modal -->
  <div class="modal fade" id="inviteModal" tabindex="-1" aria-labelledby="inviteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="inviteModalLabel">Invite Team Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="invite-form">
            <div class="mb-3">
                <label for="inviteEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="inviteEmail" required>
            </div>
            <div class="mb-3">
                <label for="inviteRole" class="form-label">Role</label>
                <select class="form-select" id="inviteRole">
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background-color: var(--color-primary);">Send Invitation</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
        <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    document.getElementById('invite-form').addEventListener('submit', (e) => {
        e.preventDefault();
        const inviteModal = bootstrap.Modal.getInstance(document.getElementById('inviteModal'));
        inviteModal.hide();
        showToast('Invitation sent successfully!', 'success');
    });
  </script>
</body>
</html>