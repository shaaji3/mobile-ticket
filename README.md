# Mobile Event Ticketing UI

This project is a mobile-first UI template for an event ticketing system, built with Bootstrap 5 and plain PHP. It's designed to be a clean, accessible, and production-ready skeleton for the UI layer, without any backend logic.

## Features

- **Mobile-First Design:** The UI is optimized for mobile devices with a maximum content width of 420px.
- **Role-Based Views:** The navigation and available pages change based on the user's role (`user` or `organizer`).
- **Dynamic Data Stubs:** The application uses `fetch()` to load static JSON data, simulating API calls.
- **Component-Based:** Includes a lightweight set of reusable components and styles.
- **Accessibility:** Built with accessibility in mind, following WCAG guidelines.

## Getting Started

To run this project locally, you need to have PHP installed on your system.

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   ```

2. **Navigate to the project directory:**
   ```bash
   cd <project-directory>
   ```

3. **Start the PHP development server:**
   ```bash
   php -S localhost:8000
   ```

4. **Open your browser:**
   Navigate to `http://localhost:8000` to view the application.

## How to Test Different Roles

To switch between the `user` and `organizer` views, open any of the `.php` files (e.g., `index.php`) and change the `$role` variable at the top of the file:

```php
// From
$role = $role ?? 'user';

// To
$role = 'organizer';
```

Save the file and refresh the page in your browser to see the UI update with the appropriate navigation and content for the selected role.