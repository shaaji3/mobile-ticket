# Mobile Event Ticketing — UI (Bootstrap 5, Mobile-first)

> **Goal:** Generate a complete mobile-first Bootstrap 5 UI template for an event ticketing system (single codebase, same shell for users & organizers; menu changes by role). Output is a plain HTML/PHP + CSS skeleton (no backend logic), using static JSON placeholders for data and `fetch()` for dynamic stubs. No frameworks other than Bootstrap 5 and Bootstrap Icons. Use plain PHP where conditional role-based rendering is required. Keep code clean, accessible, and production-ready for the UI layer.

---

## Assumptions & Constraints (must follow)

* Use **Bootstrap 5** (CDN OK). No build tools required. Keep it runnable on shared hosting (plain PHP).
* Mobile-first layout; **max content width: 420px** (centered on larger screens).
* Font: **Inter** (Google Fonts) or Roboto if unavailable.
* Icons: **Bootstrap Icons**.
* Prefer **plain PHP** for pages and role logic (no MVC). Use `$role` variable at top of PHP pages to simulate role (`'user'` or `'organizer'`).
* Use **`fetch()`** (not jQuery AJAX) for simulated API calls.
* Do not commit secrets or external API keys. Use placeholder endpoints: `/api/events.json`, `/api/tickets.json`.
* Theme tokens exactly as listed below. Stick to them.

---

## Design tokens (CSS variables)

Put into `assets/css/styles.css` (or `css/vars.css`) as the first rules.

```css
:root{
  --max-width: 420px;

  /* Colors */
  --color-primary: #2B6CB0;    /* CTA */
  --color-secondary: #38B2AC;  /* Highlights */
  --color-accent: #F56565;     /* Errors/Cancel */
  --bg: #F9FAFB;
  --card-bg: #FFFFFF;
  --text-primary: #1A202C;
  --text-secondary: #4A5568;
  --muted: #A0AEC0;

  /* Typography */
  --font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
  --h1: 22px;
  --h2: 18px;
  --body: 15px;
  --small: 12px;

  /* Spacing & radius */
  --gap: 16px;
  --radius-sm: 6px;
  --radius-md: 10px;
  --radius-lg: 16px;

  /* Buttons */
  --btn-height: 48px;
  --nav-height: 64px;
}
```

---

## Project file structure (what the agent must create)

```
/ (repo root)
  ├─ index.php                # Home (event list)
  ├─ login.php
  ├─ signup.php
  ├─ onboarding.php
  ├─ event.php                # Event detail (query param e.g. ?id=1)
  ├─ checkout.php
  ├─ tickets.php              # My tickets (user)
  ├─ wallet.php               # Wallet page
  ├─ profile.php
  ├─ dashboard.php            # Organizer dashboard
  ├─ myevents.php             # Organizer: manage events
  ├─ team.php                 # Organizer: manage team
  ├─ checkin.php              # Organizer: QR scanner UI (stub)
  ├─ 404.php
  ├─ assets/
  │   ├─ css/
  │   │   ├─ bootstrap.min.css (CDN referenced OK instead of file)
  │   │   └─ styles.css
  │   ├─ js/
  │   │   └─ scripts.js
  │   └─ img/
  │       └─ placeholder images
  ├─ api/
  │   ├─ events.json          # static sample data
  │   └─ tickets.json
  └─ README.md
```

> **Agent instruction:** create each file with the content described in the next section. For PHP pages, assume `$role = 'user'` at top; later agent will create an easy switch to `'organizer'` for testing.

---

## High-level pages & behavior (deliverables)

For each page below the agent *must* create working, mobile-optimized HTML/PHP that uses Bootstrap 5 and `assets/css/styles.css`. Use sample static JSON data from `/api/*.json` and `fetch()` to demonstrate dynamic loading/skeletons.

### 1) `index.php` — Home / Event list

* Top search bar; horizontal category chips; featured events carousel; vertical event cards list.
* Each event card: image 16:9, title, date, location, price tag, "View" CTA. Card radius 8px, subtle shadow.
* Clicking event opens `event.php?id=<id>`. Use `href="event.php?id=1"` for static links.

### 2) `login.php` & `signup.php`

* Centered card style (auth card). Fields with labels above. Social login buttons placeholders. Links between login/signup.
* Form must `onsubmit` prevent default and show a mocked fetch to `/api/login` returning success (simulate with `setTimeout`). Show success toast and redirect to `index.php`.

### 3) `onboarding.php` (Get started)

* 3 slides (illustration + headline + small description), pagination dots, "Get started" button → `login.php`.

### 4) `event.php` — Event details

* Banner image, event title, date/time, venue (map link placeholder), ticket types list with price & quantity selector. "Buy Ticket" CTA leads to `checkout.php` with query params.

### 5) `checkout.php`

* Ticket summary, user details (guest or logged-in), payment method list (card, Paystack/Flutterwave placeholder, wallet). Payment modal confirmation using Bootstrap modal. After payment simulation, redirect to `tickets.php` and add new ticket to sample `tickets.json` (skip actual write; show success message and demonstrate UI state).

### 6) `tickets.php` — My Tickets

* List of ticket cards with QR code placeholder (use `data:` svg or placeholder image). Each card shows status badge (Upcoming: blue, Used: gray, Canceled: red). Provide "Add to wallet" and "Download" placeholder buttons.

### 7) `wallet.php` & `profile.php`

* Wallet shows balance card, transaction list (use sample JSON). Profile shows editable profile form (no real save needed; simulate success toast).

### 8) Organizer pages: `dashboard.php`, `myevents.php`, `team.php`, `checkin.php`

* Dashboard: metric cards (Tickets sold, Revenue, Upcoming events) with charts placeholder (small svg or static image) and list of recent sales.
* MyEvents: list of events with edit button leading to a modal editing form.
* Team: list of team members, invite modal (email input), role badges, action menu (edit, suspend).
* Checkin: QR scanning UI stub — show camera permission UI and a static "Scan result" area; use JS comments where to integrate real scanner (e.g., `html5-qrcode`).

### 9) `404.php`

* Branded friendly 404 with illustration, message, and "Go Home" CTA.

---

## Component library (files & examples)

Create a lightweight component library inside `assets/css/styles.css` and small helper JS in `assets/js/scripts.js`.

### Bottom navigation component (role-based) — required implementation

**File:** put snippet in `inc-navbar.php` or inline at bottom of each PHP page. Example (agent must create this exact snippet in every page or include file):

```php
<?php
// top of each page: simulate role
// change to 'organizer' to preview organizer view
$role = $role ?? 'user';
?>
<nav class="navbar fixed-bottom navbar-light bg-white border-top" style="height:var(--nav-height);">
  <div class="container d-flex justify-content-around align-items-center" style="max-width:var(--max-width);">
    <?php if($role === 'user'): ?>
      <a href="index.php" class="text-center nav-item"><i class="bi bi-house fs-4" aria-hidden="true"></i><div class="small">Home</div></a>
      <a href="index.php#events" class="text-center nav-item"><i class="bi bi-calendar-event fs-4" aria-hidden="true"></i><div class="small">Events</div></a>
      <a href="tickets.php" class="text-center nav-item"><i class="bi bi-ticket fs-4" aria-hidden="true"></i><div class="small">Tickets</div></a>
      <a href="wallet.php" class="text-center nav-item"><i class="bi bi-wallet2 fs-4" aria-hidden="true"></i><div class="small">Wallet</div></a>
      <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4" aria-hidden="true"></i><div class="small">Profile</div></a>
    <?php else: /* organizer */ ?>
      <a href="dashboard.php" class="text-center nav-item"><i class="bi bi-speedometer2 fs-4" aria-hidden="true"></i><div class="small">Dashboard</div></a>
      <a href="myevents.php" class="text-center nav-item"><i class="bi bi-calendar fs-4" aria-hidden="true"></i><div class="small">My Events</div></a>
      <a href="dashboard.php#reports" class="text-center nav-item"><i class="bi bi-bar-chart fs-4" aria-hidden="true"></i><div class="small">Reports</div></a>
      <a href="checkin.php" class="text-center nav-item"><i class="bi bi-qr-code-scan fs-4" aria-hidden="true"></i><div class="small">Check-In</div></a>
      <a href="profile.php" class="text-center nav-item"><i class="bi bi-person fs-4" aria-hidden="true"></i><div class="small">Profile</div></a>
    <?php endif; ?>
  </div>
</nav>
```

> **Accessibility:** include `aria-hidden` for icons and ensure linked text labels are visible. Make each icon+label a `role="button"` equivalent by using `<a>` tags.

---

## API stubs (static sample data)

Create `/api/events.json` and `/api/tickets.json` with the sample structures below so `fetch()` calls succeed.

**`api/events.json` (sample):**

```json
[
  {
    "id": 1,
    "title": "Summer Beats Concert",
    "date": "2025-11-14T19:00:00Z",
    "location": "Main Arena, Lagos",
    "image": "assets/img/event1.jpg",
    "categories": ["Music", "Concert"],
    "tickets": [
      {"type":"Regular","price":5000,"qty_available":200},
      {"type":"VIP","price":15000,"qty_available":50}
    ],
    "description": "Join top artists..."
  },
  { "id":2, "title":"Tech Conf", "...": "..." }
]
```

**`api/tickets.json` (sample):**

```json
[
  {
    "id": "TCKT_1001",
    "event_id": 1,
    "event_title": "Summer Beats Concert",
    "ticket_type": "VIP",
    "date": "2025-11-14T19:00:00Z",
    "status": "upcoming",
    "qr": "assets/img/qr-placeholder.svg"
  }
]
```

---

## Scripts & behaviors (assets/js/scripts.js)

* Provide functions:

  * `fetchEvents()` → load `/api/events.json` + render event cards. Show skeleton when loading.
  * `fetchTickets()` → load `/api/tickets.json` for `tickets.php`.
  * `simulatePayment()` → boot a spinner, then resolve success.
  * `showToast(message, type)` → bottom toast for success/error.
* Use `async/await` and `fetch()`.

---

## Styling requirements (visual specifics)

* **Primary CTA button:** full-width, `background: var(--color-primary)`, color: white, border radius `var(--radius-md)`, height: `var(--btn-height)`.
* **Badges:** Upcoming: background `var(--color-primary)` with white text; Canceled: background `var(--color-accent)` with white text.
* **Tap targets:** minimum 44x44px for tappable items.
* **Spacing:** main content paddings: 16px top/bottom.
* **Nav:** persistent bottom nav; active item colored `var(--color-primary)`; icons 24px.

---

## Accessibility requirements

* All interactive elements must have keyboard focusable states and `aria-label` where appropriate.
* Images must include `alt` text.
* Color contrast for text must meet WCAG AA for primary text on backgrounds.
* Forms: `label` elements present; `aria-invalid` on validation errors.

---

## Step-by-step tasks (exact order). For each task the agent should produce files and a short commit message.

> **Important**: For each step, return the created files and their full file contents in the response. Use exact file names from the structure. Provide a suggested Git commit message for the change.

### Step 0 — Repo scaffold

**Task:** create folder structure and empty files, `assets/css/styles.css`, `assets/js/scripts.js`, `api/events.json`, `api/tickets.json`.
**Commit message:** `chore: scaffold project and add assets + api stubs`

### Step 1 — Base template & CSS variables

**Task:** Create `assets/css/styles.css` with the CSS variables above, global resets, mobile container `.app-container { max-width: var(--max-width); margin: 0 auto; }`, and Bootstrap CDN link in a base `inc-head.php` snippet or inline `<head>` content in pages. Add Inter font link.
**Commit message:** `feat: add base styles, design tokens and bootstrapped head`

**Expected deliverable:** `assets/css/styles.css` and example `index.php` head using Bootstrap CDN and CSS.

### Step 2 — Navbar component (role-based)

**Task:** Implement the bottom nav snippet (above) and include it in `index.php` & other pages. Ensure PHP `$role` variable exists at top.
**Commit message:** `feat: add role-based bottom navigation`

### Step 3 — Login, Signup, Onboarding

**Task:** Build `login.php`, `signup.php`, `onboarding.php` with the UI spec. Include client-side JS that simulates authentication and redirects.
**Commit message:** `feat: add onboarding + auth pages (login, signup)`

### Step 4 — 404 page

**Task:** `404.php` static branded page.
**Commit message:** `feat: add 404 page`

### Step 5 — Home page with events list and skeleton loader

**Task:** `index.php` uses `fetch('/api/events.json')` to render event cards; show skeleton placeholders while loading. Include category chips and featured carousel (Bootstrap carousel or static).
**Commit message:** `feat: add home page and dynamic events list`

### Step 6 — Event detail page

**Task:** `event.php` (reads `?id=` param), loads event from `api/events.json` and renders event detail + ticket types + "Buy" CTA linking to `checkout.php?event=1&type=VIP&qty=1`.
**Commit message:** `feat: add event detail page`

### Step 7 — Checkout UI & Payment modal

**Task:** `checkout.php` with order summary, payment method selector, payment modal. Simulate payment via `simulatePayment()` and show success.
**Commit message:** `feat: add checkout and payment UI`

### Step 8 — Tickets page with QR placeholders

**Task:** `tickets.php` uses `api/tickets.json` to list tickets with QR placeholder image. Provide options "Add to wallet" (simulate) and "Download" (simulated blob).
**Commit message:** `feat: add my tickets page`

### Step 9 — Wallet & Profile pages

**Task:** `wallet.php` shows wallet balance and transaction list; `profile.php` has profile form with simulated save.
**Commit message:** `feat: add wallet and profile pages`

### Step 10 — Organizer pages (Dashboard, MyEvents, Team, Checkin)

**Task:** `dashboard.php`, `myevents.php`, `team.php`, `checkin.php`. Use the same design tokens & bottom nav (organizer role tests). Provide placeholder charts and modals for event creation.
**Commit message:** `feat: add organizer UI (dashboard, events, team, checkin)`

### Step 11 — Polishing: toasts, skeletons, accessibility

**Task:** Enhance `assets/js/scripts.js` with `showToast()` and skeleton components; ensure every page has correct `alt`, labels, and focusable elements.
**Commit message:** `chore: add UI utilities (toasts, skeletons) and accessibility tweaks`

### Step 12 — Final QA / Acceptance

**Task:** Run through the acceptance checklist (below). Fix any mismatch. Prepare a `README.md` describing how to run the UI (PHP server command: `php -S localhost:8000` in root).
**Commit message:** `test: run UI acceptance checklist and add README`

---

## Acceptance criteria (what “done” looks like)

* Every page listed exists and loads in a PHP dev server. Example command: `php -S 127.0.0.1:8000`.
* UI matches theme tokens (buttons, colors, radius) exactly.
* Bottom nav switches based on `$role` variable (`'user'` vs `'organizer'`).
* All `fetch()` calls use `/api/*.json` and render correctly.
* Mobile friendly: no horizontal scroll on standard phone widths; container max width 420px.
* Minimum keyboard accessibility and aria attributes present.
* Forms have client-side validation and accessible error messages.
* No external proprietary packages; only Bootstrap CDN & Bootstrap Icons & Inter font.

---

## Output format for the LLM agent (strict)

For each step the agent should return a JSON array or a markdown block listing created files and their exact contents. Example (for each commit):

````
### Commit: feat: add home page and dynamic events list
- File: index.php
```html
[...full file contents...]
````

* File: assets/css/styles.css

```css
[...]
```

* File: api/events.json

```json
[...]
```

````

> The agent must not omit any file and must ensure HTML/PHP is syntactically correct.

---

## Example minimal `index.php` header + container (exact code to use)
Place at top of `index.php` (agent must include exactly):

```php
<?php
// simulate role; set to 'organizer' to preview organizer menu
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Home</title>

  <!-- Inter font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS (CDN OK) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/styles.css">
  <style>body{font-family:var(--font-family);background:var(--bg);color:var(--text-primary);}</style>
</head>
<body>
  <main class="app-container p-3" style="max-width:var(--max-width);margin:0 auto;">
    <!-- content goes here -->
````

> Each page should close `</main>` and include the footer nav snippet and the scripts: Bootstrap JS CDN and `assets/js/scripts.js`.

---

## Example `assets/js/scripts.js` starter (exact)

```javascript
document.addEventListener('DOMContentLoaded', ()=> {
  window.showToast = (msg, type='success') => {
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-bg-${type === 'error' ? 'danger' : 'success'} border-0`;
    toast.style.position = 'fixed';
    toast.style.bottom = '80px';
    toast.style.right = '16px';
    toast.style.zIndex = '1060';
    toast.innerHTML = `<div class="d-flex"><div class="toast-body">${msg}</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>`;
    document.body.appendChild(toast);
    setTimeout(()=> toast.remove(), 3500);
  };
});
```

---

## QA Checklist (manual)

* [ ] Open `index.php` on mobile viewport (or browser devtools mobile). No horizontal scroll.
* [ ] Click event card → event page loads with ticket options.
* [ ] Complete purchase flow (simulated) → tickets listed on `tickets.php`.
* [ ] Login/Signup flow shows simulated success and redirects.
* [ ] Switch `$role` to `'organizer'` and verify the bottom nav changes and organizer pages are accessible.
* [ ] Accessibility checks: labels exist, aria attributes for icons, keyboard-only navigation works for primary actions.
* [ ] CSS tokens match exact hex values above.

---

## Handover / Next steps after UI generation

* Hook backend endpoints: replace `/api/*.json` with real PHP endpoints (MySQLi) that return JSON.
* Implement persistent login/session.
* Integrate payment gateways (Paystack/Flutterwave/Stripe) server-side.
* Replace QR placeholders with server-generated QR codes.
* Integrate a client-side scanner library for check-in (`html5-qrcode` or ZXing).

---

## Final note to the LLM agent

* **Do not** add or remove pages beyond the list in the file structure.
* **Do** return every created file content.
* **Do** ensure all HTML, CSS, JS, PHP snippets are syntactically valid.
* When creating PHP pages, place role variable at top as shown so reviewer can toggle roles easily.
* Keep output compact but complete — include full file contents.

---

If you want, I can now:

* produce the **first commit** (Step 0 + Step 1) contents right away (scaffold + styles + index.php head) as an example, or
* convert this `.md` into a single prompt for Jules/Gemini optimized for repo-based execution (with exact task breakdowns).

Which would you like me to do now?
