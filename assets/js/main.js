document.addEventListener('DOMContentLoaded', () => {
    // Check-in page logic
    if (document.getElementById('scan-result')) {
        const scanResultEl = document.getElementById('scan-result');
        setTimeout(() => {
            scanResultEl.innerHTML = `
                <strong class="text-success">Success!</strong><br>
                Ticket ID: TCKT_1001<br>
                Type: VIP
            `;
            scanResultEl.classList.remove('text-muted');
        }, 3000);
    }

    // Checkout page logic
    if (document.getElementById('order-summary-content')) {
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
            setTimeout(() => {
                document.getElementById('payment-processing').classList.add('d-none');
                document.getElementById('payment-success').classList.remove('d-none');
            }, 2000);
        });
    }

    // Event details page logic
    if (document.getElementById('event-details-container')) {
        const urlParams = new URLSearchParams(window.location.search);
        const eventId = urlParams.get('id') || 1;
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
                    ticketTypesContainer.innerHTML = '';
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
    }

    // Home page logic
    if (document.getElementById('events-list')) {
        const eventsListContainer = document.getElementById('events-list');
        async function fetchEvents() {
            try {
                await new Promise(resolve => setTimeout(resolve, 1000));
                const response = await fetch('api/events.json');
                if (!response.ok) throw new Error('Network response was not ok');
                const events = await response.json();
                eventsListContainer.innerHTML = '';
                if (events.length > 0) {
                    events.forEach(event => {
                        const eventCard = `
                            <a href="event.php?id=${event.id}" class="card mb-3 text-decoration-none text-dark">
                                <img src="${event.image}" class="card-img-top" alt="${event.title}" style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">${event.title}</h5>
                                    <p class="card-text text-muted small">${new Date(event.date).toLocaleDateString()}</p>
                                    <p class="card-text fw-bold" style="color: var(--color-primary);">₦${event.tickets[0].price.toLocaleString()}</p>
                                </div>
                            </a>
                        `;
                        eventsListContainer.innerHTML += eventCard;
                    });
                } else {
                    eventsListContainer.innerHTML = '<p>No upcoming events found.</p>';
                }
            } catch (error) {
                console.error('Fetch error:', error);
                eventsListContainer.innerHTML = '<p class="text-danger">Could not load events.</p>';
            }
        }
        fetchEvents();
    }

    // Login page logic
    if (document.getElementById('login-form')) {
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Login successful!');
            window.location.href = 'index.php';
        });
    }

    // Signup page logic
    if (document.getElementById('signup-form')) {
        document.getElementById('signup-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return;
            }
            alert('Account created successfully! Please check your email to verify your account.');
            window.location.href = 'otp.php';
        });
    }

    // OTP page logic
    if (document.getElementById('otp-form')) {
        const otpContainer = document.getElementById('otp-container');
        const inputs = [...otpContainer.children];
        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
        document.getElementById('otp-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const otp = inputs.map(input => input.value).join('');
            alert('Account verified successfully!');
            window.location.href = 'index.php';
        });
    }

    // Forgot password page logic
    if (document.getElementById('forgot-password-form')) {
        document.getElementById('forgot-password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('If an account with that email exists, a reset link has been sent.');
            window.location.href = 'reset-password.php';
        });
    }

    // Reset password page logic
    if (document.getElementById('reset-password-form')) {
        document.getElementById('reset-password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return;
            }
            alert('Your password has been successfully reset. Please sign in with your new password.');
            window.location.href = 'login.php';
        });
    }
});

// Global functions for auth pages
function togglePassword(fieldId, iconId) {
    const passwordField = document.getElementById(fieldId);
    const toggleIcon = document.getElementById(iconId);
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
    } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
    }
}

function handleSocialLogin(provider) {
  alert(`${provider.charAt(0).toUpperCase() + provider.slice(1)} login coming soon!`);
  setTimeout(() => {
    window.location.href = 'index.php';
  }, 1500);
}