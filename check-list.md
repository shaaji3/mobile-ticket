# Event Ticketing Mobile UI – Step by Step Generation Plan

This document defines the UI screens, components, and theming for the Event Ticketing System.  
Each section is broken down into **checklists** so that the LLM can implement them step by step.

---

## 🎨 Theming Requirements
- [ ] Use **Bootstrap 5** (mobile-first).
- [ ] Primary color: `#2B6CB0` (blue).
- [ ] Secondary color: `#38B2AC` (teal).
- [ ] Accent color: `#F56565` (red, for alerts/errors).
- [ ] Neutral gray scale for backgrounds, dividers, borders.
- [ ] Typography: Sans-serif, Google Fonts “Inter” or “Roboto”.
- [ ] Rounded corners (`.rounded-2xl` style).
- [ ] Shadows for cards & modals.
- [ ] Consistent spacing (padding/margin).

---

## 🟢 Core Pages

### 1. **Get Started / Onboarding**
- [ ] Fullscreen mobile welcome screen.
- [ ] App logo + tagline.
- [ ] "Get Started" button (leads to login/signup).
- [ ] Carousel option (multiple slides with illustrations).
- [ ] Background gradient using theme colors.

### 2. **Login Page**
- [ ] Email + password fields.
- [ ] Login button (primary color).
- [ ] Link to signup page.
- [ ] “Forgot password” link.
- [ ] Social login placeholder (Google, Facebook).

### 3. **Signup Page**
- [ ] Fields: Name, Email, Password, Confirm Password.
- [ ] Signup button.
- [ ] Link back to login.
- [ ] Checkbox: "I agree to Terms & Conditions".

### 4. **404 / Error Page**
- [ ] Centered illustration or icon.
- [ ] Message: "Page Not Found".
- [ ] Button: "Go Home".
- [ ] Theming matches app colors.

### 5. **Home / Event Listing**
- [ ] Search bar at top.
- [ ] Filter icon (category, date).
- [ ] Event cards:
  - Image/banner.
  - Event title.
  - Date/time.
  - Location.
  - Price or "Free".
- [ ] Bottom navigation (Home, My Tickets, Profile).

### 6. **Event Detail Page**
- [ ] Large event image.
- [ ] Title, organizer name.
- [ ] Date/time, venue details.
- [ ] Description section.
- [ ] "Buy Ticket" button (fixed bottom).

### 7. **Ticket Selection / Checkout**
- [ ] Ticket type dropdown (Regular, VIP).
- [ ] Quantity selector (with + / – buttons).
- [ ] Price calculation (auto-updated).
- [ ] Payment options (card, mobile money).
- [ ] Checkout button.

### 8. **My Tickets Page**
- [ ] List of purchased tickets.
- [ ] Each ticket card includes:
  - Event title.
  - Date/time.
  - Venue.
  - **QR code placeholder**.
- [ ] Status badges (Upcoming, Used, Expired).

### 9. **Profile Page**
- [ ] User avatar.
- [ ] Name, email, phone.
- [ ] Buttons: Edit Profile, Change Password.
- [ ] Toggle for 2FA.
- [ ] Logout button.

### 10. **Organizer Dashboard (extra menu)**
- [ ] Only visible if user = organizer.
- [ ] Menu options:
  - My Events.
  - Sales Reports.
  - Manage Team.
  - Notifications.
- [ ] Quick action button: "+ Create Event".

### 11. **Manage Team Page (Organizer only)**
- [ ] List of team members (name, role).
- [ ] Buttons: Add Member, Remove Member.
- [ ] Roles: Admin, Staff.
- [ ] Invite by email form.

---

## 🔘 Shared Components

### Bottom Navigation (Role-Based)
- [ ] **For Users:** Home, My Tickets, Profile.
- [ ] **For Organizers:** Home, My Events, Dashboard, Profile.
- [ ] Icons for each (Bootstrap Icons / Feather Icons).

### Modals
- [ ] Ticket confirmation modal.
- [ ] Payment success/failure modal.
- [ ] Team invitation modal.

### Notifications
- [ ] Toast notification component (Bootstrap Toast).
- [ ] For errors, use accent red `#F56565`.
- [ ] For success, use green `#48BB78`.

---

## 📋 Final Checklist
- [ ] Apply consistent theming across all screens.
- [ ] Ensure mobile responsiveness.
- [ ] Verify navigation between pages.
- [ ] Role-based menus switch correctly.
- [ ] All placeholder assets (logos, QR codes) included.
- [ ] Error/empty states included (e.g., no tickets, no events).
