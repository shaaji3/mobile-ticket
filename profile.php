<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Profile</title>
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
    
    /* Profile Header */
    .profile-header {
      background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
      padding: var(--gap-lg) var(--gap);
      margin: 0 calc(-1 * var(--gap)) var(--gap-lg);
      text-align: center;
      color: var(--text-white);
      position: relative;
      overflow: hidden;
    }
    
    .profile-header::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
    }
    
    .profile-avatar-container {
      position: relative;
      width: 100px;
      height: 100px;
      margin: 0 auto var(--gap);
    }
    
    .profile-avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid var(--text-white);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }
    
    .avatar-edit-btn {
      position: absolute;
      bottom: 0;
      right: 0;
      width: 32px;
      height: 32px;
      background: var(--text-white);
      color: var(--color-primary);
      border-radius: 50%;
      border: 2px solid var(--color-primary);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: var(--shadow-card);
    }
    
    .stat-value {
      font-size: var(--h2);
      font-weight: 700;
      color: var(--color-primary);
      margin-bottom: 4px;
    }
    
    .stat-label {
      font-size: var(--tiny);
      color: var(--text-secondary);
      font-weight: 600;
      text-transform: uppercase;
    }
    
    /* Action Buttons */
    .btn-danger-outline {
      width: 100%;
      height: var(--btn-height);
      background: var(--card-bg);
      border: 2px solid var(--color-danger);
      color: var(--color-danger);
      border-radius: var(--radius-md);
      font-weight: 600;
      transition: var(--transition);
    }
    
    .btn-danger-outline:hover {
      background: var(--color-danger);
      color: var(--text-white);
    }
  </style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    
    <!-- Profile Header -->
    <div class="profile-header">
      <div class="profile-avatar-container">
        <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="User Avatar" class="profile-avatar">
        <button class="avatar-edit-btn" onclick="handleAvatarEdit()">
          <i class="bi bi-camera-fill"></i>
        </button>
      </div>
      <h1 class="profile-name">John Doe</h1>
      <p class="profile-email">john.doe@example.com</p>
      <span class="profile-badge">
        <i class="bi bi-star-fill me-1"></i> Premium Member
      </span>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
      <div class="stat-box">
        <div class="stat-value">12</div>
        <div class="stat-label">Events</div>
      </div>
      <div class="stat-box">
        <div class="stat-value">8</div>
        <div class="stat-label">Tickets</div>
      </div>
      <div class="stat-box">
        <div class="stat-value">₦45K</div>
        <div class="stat-label">Spent</div>
      </div>
    </div>

    <!-- Account Settings -->
    <div class="settings-section">
      <h3 class="section-title">Account Settings</h3>
      <div class="settings-card">
        
        <div class="settings-item" onclick="editProfile()">
          <div class="settings-item-left">
            <div class="settings-icon primary">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Edit Profile</div>
              <div class="settings-subtitle">Update your personal information</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

        <div class="settings-item" onclick="changePassword()">
          <div class="settings-item-left">
            <div class="settings-icon primary">
              <i class="bi bi-lock-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Change Password</div>
              <div class="settings-subtitle">Update your password</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

        <div class="settings-item">
          <div class="settings-item-left">
            <div class="settings-icon success">
              <i class="bi bi-shield-check"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Two-Factor Authentication</div>
              <div class="settings-subtitle">Add extra security to your account</div>
            </div>
          </div>
          <label class="toggle-switch">
            <input type="checkbox" id="toggle-2fa" onchange="handle2FAToggle(this)">
            <span class="toggle-slider"></span>
          </label>
        </div>

      </div>
    </div>

    <!-- Preferences -->
    <div class="settings-section">
      <h3 class="section-title">Preferences</h3>
      <div class="settings-card">
        
        <div class="settings-item">
          <div class="settings-item-left">
            <div class="settings-icon primary">
              <i class="bi bi-bell-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Push Notifications</div>
              <div class="settings-subtitle">Receive event updates</div>
            </div>
          </div>
          <label class="toggle-switch">
            <input type="checkbox" checked onchange="handleNotificationToggle(this)">
            <span class="toggle-slider"></span>
          </label>
        </div>

        <div class="settings-item">
          <div class="settings-item-left">
            <div class="settings-icon primary">
              <i class="bi bi-envelope-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Email Notifications</div>
              <div class="settings-subtitle">Get updates via email</div>
            </div>
          </div>
          <label class="toggle-switch">
            <input type="checkbox" checked onchange="handleEmailToggle(this)">
            <span class="toggle-slider"></span>
          </label>
        </div>

        <div class="settings-item" onclick="managePreferences()">
          <div class="settings-item-left">
            <div class="settings-icon primary">
              <i class="bi bi-sliders"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Manage Preferences</div>
              <div class="settings-subtitle">Customize your experience</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

      </div>
    </div>

    <!-- Payment & Wallet -->
    <div class="settings-section">
      <h3 class="section-title">Payment & Wallet</h3>
      <div class="settings-card">
        
        <div class="settings-item" onclick="window.location.href='wallet.php'">
          <div class="settings-item-left">
            <div class="settings-icon success">
              <i class="bi bi-wallet2"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">My Wallet</div>
              <div class="settings-subtitle">Balance: ₦12,500</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

        <div class="settings-item" onclick="paymentMethods()">
          <div class="settings-item-left">
            <div class="settings-icon success">
              <i class="bi bi-credit-card-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Payment Methods</div>
              <div class="settings-subtitle">Manage saved cards</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

        <div class="settings-item" onclick="transactionHistory()">
          <div class="settings-item-left">
            <div class="settings-icon success">
              <i class="bi bi-receipt"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Transaction History</div>
              <div class="settings-subtitle">View all transactions</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

      </div>
    </div>

    <!-- Support & Legal -->
    <div class="settings-section">
      <h3 class="section-title">Support & Legal</h3>
      <div class="settings-card">
        
        <div class="settings-item" onclick="helpCenter()">
          <div class="settings-item-left">
            <div class="settings-icon warning">
              <i class="bi bi-question-circle-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Help Center</div>
              <div class="settings-subtitle">Get help and support</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

        <div class="settings-item" onclick="termsConditions()">
          <div class="settings-item-left">
            <div class="settings-icon warning">
              <i class="bi bi-file-text-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Terms & Conditions</div>
              <div class="settings-subtitle">Read our terms</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

        <div class="settings-item" onclick="privacyPolicy()">
          <div class="settings-item-left">
            <div class="settings-icon warning">
              <i class="bi bi-shield-lock-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Privacy Policy</div>
              <div class="settings-subtitle">How we protect your data</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

      </div>
    </div>

    <!-- Danger Zone -->
    <div class="settings-section">
      <h3 class="section-title">Danger Zone</h3>
      <div class="settings-card">
        
        <div class="settings-item" onclick="deleteAccount()">
          <div class="settings-item-left">
            <div class="settings-icon danger">
              <i class="bi bi-trash-fill"></i>
            </div>
            <div class="settings-info">
              <div class="settings-title">Delete Account</div>
              <div class="settings-subtitle">Permanently delete your account</div>
            </div>
          </div>
          <i class="bi bi-chevron-right settings-chevron"></i>
        </div>

      </div>
    </div>

    <!-- Logout Button -->
    <button class="btn-danger-outline mb-4" onclick="handleLogout()">
      <i class="bi bi-box-arrow-right me-2"></i> Log Out
    </button>

    <!-- Version Info -->
    <div class="text-center text-muted small pb-3">
      Version 1.0.0 • Built with ❤️
    </div>

  </main>

  <!-- Bottom Navigation -->
  <nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
    <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
      <?php if($role === 'user'): ?>
        <a href="index.php" class="text-center nav-item"><i class="bi bi-house fs-4"></i><div class="small">Home</div></a>
        <a href="index.php#events" class="text-center nav-item"><i class="bi bi-calendar-event fs-4"></i><div class="small">Events</div></a>
        <a href="tickets.php" class="text-center nav-item"><i class="bi bi-ticket fs-4"></i><div class="small">Tickets</div></a>
        <a href="wallet.php" class="text-center nav-item"><i class="bi bi-wallet2 fs-4"></i><div class="small">Wallet</div></a>
        <a href="profile.php" class="text-center nav-item text-primary"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
      <?php else: ?>
        <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4"></i><div class="small">Dashboard</div></a>
        <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4"></i><div class="small">My Events</div></a>
        <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4"></i><div class="small">Reports</div></a>
        <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4"></i><div class="small">Check-In</div></a>
        <a href="profile.php" class="text-center nav-item text-primary"><i class="bi bi-person fs-4"></i><div class="small">Profile</div></a>
      <?php endif; ?>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    // Avatar Edit
    function handleAvatarEdit() {
      showToast('Avatar upload coming soon!', 'success');
    }

    // Edit Profile
    function editProfile() {
      showToast('Opening profile editor...', 'success');
    }

    // Change Password
    function changePassword() {
      showToast('Opening password change form...', 'success');
    }

    // 2FA Toggle
    function handle2FAToggle(checkbox) {
      if (checkbox.checked) {
        showToast('Two-Factor Authentication enabled!', 'success');
        // Show 2FA setup modal
        setTimeout(() => {
          alert('Scan the QR code with your authenticator app:\n\n[QR Code would appear here]\n\nBackup codes:\n123456\n789012\n345678');
        }, 500);
      } else {
        if (confirm('Are you sure you want to disable 2FA?')) {
          showToast('Two-Factor Authentication disabled', 'success');
        } else {
          checkbox.checked = true;
        }
      }
    }

    // Notification Toggle
    function handleNotificationToggle(checkbox) {
      const status = checkbox.checked ? 'enabled' : 'disabled';
      showToast(`Push notifications ${status}`, 'success');
    }

    // Email Toggle
    function handleEmailToggle(checkbox) {
      const status = checkbox.checked ? 'enabled' : 'disabled';
      showToast(`Email notifications ${status}`, 'success');
    }

    // Preferences
    function managePreferences() {
      showToast('Opening preferences...', 'success');
    }

    // Payment Methods
    function paymentMethods() {
      showToast('Opening payment methods...', 'success');
    }

    // Transaction History
    function transactionHistory() {
      showToast('Loading transaction history...', 'success');
    }

    // Help Center
    function helpCenter() {
      showToast('Opening help center...', 'success');
    }

    // Terms & Conditions
    function termsConditions() {
      showToast('Loading terms & conditions...', 'success');
    }

    // Privacy Policy
    function privacyPolicy() {
      showToast('Loading privacy policy...', 'success');
    }

    // Delete Account
    function deleteAccount() {
      const confirmation = confirm('Are you sure you want to delete your account? This action cannot be undone!');
      if (confirmation) {
        const finalConfirmation = prompt('Type "DELETE" to confirm:');
        if (finalConfirmation === 'DELETE') {
          showToast('Account deletion initiated', 'error');
          setTimeout(() => {
            window.location.href = 'onboarding.php';
          }, 2000);
        }
      }
    }

    // Logout
    function handleLogout() {
      if (confirm('Are you sure you want to log out?')) {
        showToast('Logging out...', 'success');
        setTimeout(() => {
          window.location.href = 'login.php';
        }, 1000);
      }
    }
  </script>
</body>
</html>shadow-md);
      transition: var(--transition);
    }
    
    .avatar-edit-btn:hover {
      transform: scale(1.1);
    }
    
    .profile-name {
      font-size: var(--h2);
      font-weight: 700;
      margin-bottom: 4px;
    }
    
    .profile-email {
      font-size: var(--small);
      opacity: 0.9;
    }
    
    .profile-badge {
      display: inline-block;
      margin-top: var(--gap-sm);
      padding: 6px 16px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      font-size: var(--tiny);
      font-weight: 600;
      text-transform: uppercase;
    }
    
    /* Settings Sections */
    .settings-section {
      margin-bottom: var(--gap-lg);
    }
    
    .section-title {
      font-size: var(--body);
      font-weight: 700;
      color: var(--text-primary);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: var(--gap);
      padding: 0 var(--gap-sm);
    }
    
    .settings-card {
      background: var(--card-bg);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-card);
      overflow: hidden;
    }
    
    .settings-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: var(--gap);
      border-bottom: 1px solid #E2E8F0;
      transition: var(--transition);
      cursor: pointer;
    }
    
    .settings-item:last-child {
      border-bottom: none;
    }
    
    .settings-item:hover {
      background: var(--card-hover);
    }
    
    .settings-item-left {
      display: flex;
      align-items: center;
      gap: var(--gap);
      flex: 1;
    }
    
    .settings-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      flex-shrink: 0;
    }
    
    .settings-icon.primary {
      background: rgba(99, 102, 241, 0.1);
      color: var(--color-primary);
    }
    
    .settings-icon.success {
      background: rgba(16, 185, 129, 0.1);
      color: var(--color-success);
    }
    
    .settings-icon.warning {
      background: rgba(245, 158, 11, 0.1);
      color: var(--color-accent);
    }
    
    .settings-icon.danger {
      background: rgba(239, 68, 68, 0.1);
      color: var(--color-danger);
    }
    
    .settings-info {
      flex: 1;
    }
    
    .settings-title {
      font-size: var(--body);
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 2px;
    }
    
    .settings-subtitle {
      font-size: var(--small);
      color: var(--text-secondary);
    }
    
    .settings-chevron {
      color: var(--text-muted);
      font-size: 18px;
    }
    
    /* Toggle Switch */
    .toggle-switch {
      position: relative;
      width: 52px;
      height: 28px;
      flex-shrink: 0;
    }
    
    .toggle-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .toggle-slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #E2E8F0;
      transition: var(--transition);
      border-radius: 34px;
    }
    
    .toggle-slider:before {
      position: absolute;
      content: "";
      height: 20px;
      width: 20px;
      left: 4px;
      bottom: 4px;
      background-color: var(--text-white);
      transition: var(--transition);
      border-radius: 50%;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .toggle-switch input:checked + .toggle-slider {
      background-color: var(--color-primary);
    }
    
    .toggle-switch input:checked + .toggle-slider:before {
      transform: translateX(24px);
    }
    
    /* Stats Grid */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: var(--gap);
      margin: var(--gap-lg) 0;
    }
    
    .stat-box {
      background: var(--card-bg);
      border-radius: var(--radius-md);
      padding: var(--gap);
      text-align: center;
      box-shadow: var(--
