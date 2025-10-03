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
    body { 
      font-family: var(--font-family); 
      background: var(--bg); 
      color: var(--text-primary); 
      padding-bottom: calc(var(--nav-height) + 20px); 
    }
    
    /* Enhanced Header */
    .page-header {
      background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
      color: var(--text-white);
      padding: var(--gap-lg);
      margin: 0 calc(-1 * var(--gap)) var(--gap);
      border-radius: 0 0 var(--radius-xl) var(--radius-xl);
      box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
    }
    
    .page-header h1 {
      font-size: var(--h1);
      margin-bottom: var(--gap-sm);
    }
    
    .page-header p {
      opacity: 0.9;
      font-size: var(--small);
      margin: 0;
    }
    
    /* Team Stats Cards */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: var(--gap);
      margin-bottom: var(--gap-lg);
    }
    
    .stat-card {
      background: var(--card-bg);
      border-radius: var(--radius-lg);
      padding: var(--gap);
      box-shadow: var(--shadow-card);
      text-align: center;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }
    
    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--color-primary) 0%, var(--color-secondary) 100%);
    }
    
    .stat-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-lg);
    }
    
    .stat-icon {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto var(--gap-sm);
      font-size: 24px;
    }
    
    .stat-icon.primary {
      background: rgba(99, 102, 241, 0.1);
      color: var(--color-primary);
    }
    
    .stat-icon.success {
      background: rgba(16, 185, 129, 0.1);
      color: var(--color-success);
    }
    
    .stat-value {
      font-size: 28px;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 4px;
    }
    
    .stat-label {
      font-size: var(--small);
      color: var(--text-secondary);
      font-weight: 500;
    }
    
    /* Team Member Cards */
    .team-member-card {
      background: var(--card-bg);
      border-radius: var(--radius-lg);
      padding: var(--gap);
      margin-bottom: var(--gap);
      box-shadow: var(--shadow-card);
      display: flex;
      align-items: center;
      gap: var(--gap);
      transition: var(--transition);
      position: relative;
    }
    
    .team-member-card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateX(4px);
    }
    
    .team-member-avatar {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--bg);
      flex-shrink: 0;
      box-shadow: var(--shadow-md);
    }
    
    .team-member-info {
      flex-grow: 1;
      min-width: 0;
    }
    
    .team-member-name {
      font-size: var(--body);
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 4px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    .team-member-email {
      font-size: var(--small);
      color: var(--text-secondary);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    .team-member-status {
      display: flex;
      align-items: center;
      gap: 6px;
      margin-top: 6px;
    }
    
    .status-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--color-success);
    }
    
    .status-dot.offline {
      background: var(--text-muted);
    }
    
    /* Role Badges */
    .badge-admin { 
      background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
      color: var(--text-white);
      padding: 6px 14px;
      border-radius: 12px;
      font-size: var(--tiny);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .badge-staff { 
      background: rgba(16, 185, 129, 0.1);
      color: var(--color-success);
      padding: 6px 14px;
      border-radius: 12px;
      font-size: var(--tiny);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    /* Action Menu Button */
    .menu-btn {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--bg);
      border: none;
      color: var(--text-secondary);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: var(--transition);
      flex-shrink: 0;
    }
    
    .menu-btn:hover {
      background: var(--color-primary);
      color: var(--text-white);
    }
    
    /* Enhanced Modal */
    .modal-content {
      border-radius: var(--radius-xl);
      border: none;
      box-shadow: var(--shadow-xl);
    }
    
    .modal-header {
      background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
      color: var(--text-white);
      border-radius: var(--radius-xl) var(--radius-xl) 0 0;
      padding: var(--gap-lg);
      border-bottom: none;
    }
    
    .modal-header .btn-close {
      filter: brightness(0) invert(1);
    }
    
    .modal-body {
      padding: var(--gap-lg);
    }
    
    /* Empty State */
    .empty-state {
      text-align: center;
      padding: var(--gap-lg) var(--gap);
      color: var(--text-secondary);
    }
    
    .empty-state i {
      font-size: 64px;
      color: var(--text-muted);
      margin-bottom: var(--gap);
      opacity: 0.5;
    }
    
    /* Section Headers */
    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: var(--gap);
    }
    
    .section-title {
      font-size: var(--h3);
      font-weight: 700;
      color: var(--text-primary);
      margin: 0;
    }
    
    /* Floating Action Button */
    .fab {
      position: fixed;
      bottom: calc(var(--nav-height) + 20px);
      right: 20px;
      width: 56px;
      height: 56px;
      background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
      border-radius: 50%;
      border: none;
      color: var(--text-white);
      font-size: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 24px rgba(99, 102, 241, 0.4);
      cursor: pointer;
      transition: var(--transition);
      z-index: 999;
    }
    
    .fab:hover {
      transform: scale(1.1) rotate(90deg);
      box-shadow: 0 12px 32px rgba(99, 102, 241, 0.5);
    }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    
    <!-- Header -->
    <div class="page-header">
      <h1>Team Management</h1>
      <p>Manage your event team members and their roles</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon primary">
          <i class="bi bi-people-fill"></i>
        </div>
        <div class="stat-value">8</div>
        <div class="stat-label">Team Members</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon success">
          <i class="bi bi-shield-check"></i>
        </div>
        <div class="stat-value">3</div>
        <div class="stat-label">Admins</div>
      </div>
    </div>

    <!-- Section Header -->
    <div class="section-header">
      <h2 class="section-title">Active Members</h2>
      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#inviteModal">
        <i class="bi bi-plus-circle"></i> Invite
      </button>
    </div>

    <!-- Team List -->
    <div id="team-list">
      <!-- Team Member 1 -->
      <div class="team-member-card">
        <img src="https://i.pravatar.cc/150?u=jane@example.com" alt="Team Member" class="team-member-avatar">
        <div class="team-member-info">
          <div class="team-member-name">Jane Smith</div>
          <div class="team-member-email">jane.smith@example.com</div>
          <div class="team-member-status">
            <span class="status-dot"></span>
            <span class="small text-secondary">Active now</span>
          </div>
        </div>
        <span class="badge-admin">Admin</span>
        <button class="menu-btn" onclick="showMemberMenu('jane')">
          <i class="bi bi-three-dots-vertical"></i>
        </button>
      </div>

      <!-- Team Member 2 -->
      <div class="team-member-card">
        <img src="https://i.pravatar.cc/150?u=mike@example.com" alt="Team Member" class="team-member-avatar">
        <div class="team-member-info">
          <div class="team-member-name">Mike Johnson</div>
          <div class="team-member-email">mike.j@example.com</div>
          <div class="team-member-status">
            <span class="status-dot"></span>
            <span class="small text-secondary">Active 2h ago</span>
          </div>
        </div>
        <span class="badge-staff">Staff</span>
        <button class="menu-btn" onclick="showMemberMenu('mike')">
          <i class="bi bi-three-dots-vertical"></i>
        </button>
      </div>

      <!-- Team Member 3 -->
      <div class="team-member-card">
        <img src="https://i.pravatar.cc/150?u=sarah@example.com" alt="Team Member" class="team-member-avatar">
        <div class="team-member-info">
          <div class="team-member-name">Sarah Williams</div>
          <div class="team-member-email">sarah.w@example.com</div>
          <div class="team-member-status">
            <span class="status-dot"></span>
            <span class="small text-secondary">Active now</span>
          </div>
        </div>
        <span class="badge-staff">Staff</span>
        <button class="menu-btn" onclick="showMemberMenu('sarah')">
          <i class="bi bi-three-dots-vertical"></i>
        </button>
      </div>

      <!-- Team Member 4 -->
      <div class="team-member-card">
        <img src="https://i.pravatar.cc/150?u=david@example.com" alt="Team Member" class="team-member-avatar">
        <div class="team-member-info">
          <div class="team-member-name">David Brown</div>
          <div class="team-member-email">david.brown@example.com</div>
          <div class="team-member-status">
            <span class="status-dot offline"></span>
            <span class="small text-secondary">Offline</span>
          </div>
        </div>
        <span class="badge-admin">Admin</span>
        <button class="menu-btn" onclick="showMemberMenu('david')">
          <i class="bi bi-three-dots-vertical"></i>
        </button>
      </div>
    </div>

    <!-- Pending Invitations Section -->
    <div class="section-header mt-4">
      <h2 class="section-title">Pending Invitations</h2>
    </div>

    <div class="team-member-card" style="opacity: 0.7;">
      <div class="stat-icon primary" style="margin: 0;">
        <i class="bi bi-envelope-fill"></i>
      </div>
      <div class="team-member-info">
        <div class="team-member-name">alex.chen@example.com</div>
        <div class="team-member-email">Invited 2 days ago</div>
      </div>
      <span class="badge" style="background: rgba(245, 158, 11, 0.1); color: var(--color-accent);">Pending</span>
      <button class="menu-btn" onclick="resendInvite('alex')">
        <i class="bi bi-arrow-clockwise"></i>
      </button>
    </div>

  </main>

  <!-- Invite Modal -->
  <div class="modal fade" id="inviteModal" tabindex="-1" aria-labelledby="inviteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="inviteModalLabel">
            <i class="bi bi-person-plus-fill me-2"></i>Invite Team Member
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="invite-form">
            <div class="mb-3">
              <label for="inviteEmail" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="inviteEmail" placeholder="teammate@example.com" required>
            </div>
            <div class="mb-3">
              <label for="inviteRole" class="form-label">Role</label>
              <select class="form-select" id="inviteRole">
                <option value="staff" selected>Staff</option>
                <option value="admin">Admin</option>
              </select>
              <div class="form-text">
                <small><strong>Staff:</strong> Can check-in attendees and view reports<br>
                <strong>Admin:</strong> Full access to manage events and team</small>
              </div>
            </div>
            <div class="mb-3">
              <label for="inviteMessage" class="form-label">Personal Message (Optional)</label>
              <textarea class="form-control" id="inviteMessage" rows="3" placeholder="Welcome to the team! We're excited to have you..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">
              <i class="bi bi-send-fill me-2"></i>Send Invitation
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Member Action Modal -->
  <div class="modal fade" id="memberActionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Member Actions</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="list-group">
            <button class="list-group-item list-group-item-action" onclick="editMember()">
              <i class="bi bi-pencil-fill me-2"></i> Edit Member
            </button>
            <button class="list-group-item list-group-item-action" onclick="changeRole()">
              <i class="bi bi-shield-fill me-2"></i> Change Role
            </button>
            <button class="list-group-item list-group-item-action text-warning" onclick="suspendMember()">
              <i class="bi bi-pause-circle-fill me-2"></i> Suspend Member
            </button>
            <button class="list-group-item list-group-item-action text-danger" onclick="removeMember()">
              <i class="bi bi-trash-fill me-2"></i> Remove Member
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Navigation -->
  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
      <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
      <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
      <a href="team.php" class="text-center nav-item text-primary"><i class="bi bi-people fs-4"></i><div class="small">Team</div></a>
      <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
      <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    // Invite Form Handler
    document.getElementById('invite-form').addEventListener('submit', (e) => {
      e.preventDefault();
      const email = document.getElementById('inviteEmail').value;
      const role = document.getElementById('inviteRole').value;
      
      const inviteModal = bootstrap.Modal.getInstance(document.getElementById('inviteModal'));
      inviteModal.hide();
      
      showToast(`Invitation sent to ${email} as ${role}!`, 'success');
      
      // Reset form
      document.getElementById('invite-form').reset();
    });

    // Show Member Menu
    function showMemberMenu(member) {
      const actionModal = new bootstrap.Modal(document.getElementById('memberActionModal'));
      actionModal.show();
    }

    // Member Actions
    function editMember() {
      showToast('Opening member editor...', 'success');
      bootstrap.Modal.getInstance(document.getElementById('memberActionModal')).hide();
    }

    function changeRole() {
      showToast('Role updated successfully!', 'success');
      bootstrap.Modal.getInstance(document.getElementById('memberActionModal')).hide();
    }

    function suspendMember() {
      showToast('Member suspended', 'success');
      bootstrap.Modal.getInstance(document.getElementById('memberActionModal')).hide();
    }

    function removeMember() {
      if (confirm('Are you sure you want to remove this team member?')) {
        showToast('Member removed from team', 'success');
        bootstrap.Modal.getInstance(document.getElementById('memberActionModal')).hide();
      }
    }

    function resendInvite(member) {
      showToast('Invitation resent!', 'success');
    }
  </script>
</body>
</html>
