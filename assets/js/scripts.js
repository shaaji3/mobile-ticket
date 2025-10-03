document.addEventListener('DOMContentLoaded', ()=> {
  
  // Toast Notification System
  window.showToast = (msg, type='success') => {
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-bg-${type === 'error' ? 'danger' : 'success'} border-0 fade-in`;
    toast.style.position = 'fixed';
    toast.style.bottom = '90px';
    toast.style.right = '16px';
    toast.style.left = '16px';
    toast.style.maxWidth = '400px';
    toast.style.margin = '0 auto';
    toast.style.zIndex = '1060';
    toast.innerHTML = `
      <div class="d-flex">
        <div class="toast-body">${msg}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    `;
    document.body.appendChild(toast);
    
    // Auto remove after 3.5 seconds
    setTimeout(()=> {
      toast.style.opacity = '0';
      setTimeout(() => toast.remove(), 300);
    }, 3500);
  };

  // Enhanced Navigation with Active State
  function updateActiveNav() {
    const currentPath = window.location.pathname.split('/').pop() || 'index.php';
    const navItems = document.querySelectorAll('.nav-item');
    
    navItems.forEach(item => {
      const href = item.getAttribute('href');
      if (href && (href.includes(currentPath) || (currentPath === '' && href === 'index.php'))) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
  }
  
  updateActiveNav();

  // Add Floating Center Button to Specific Pages
  function addFloatingCenterButton() {
    const navbar = document.querySelector('.navbar.fixed-bottom .container');
    if (!navbar) return;

    const currentPage = window.location.pathname.split('/').pop();
    
    // Pages that should have the floating center button
    const pagesWithCenterButton = {
      'index.php': { icon: 'bi-qr-code-scan', action: () => window.location.href = 'checkin.php' },
      'tickets.php': { icon: 'bi-plus-circle', action: () => window.location.href = 'index.php' },
      'wallet.php': { icon: 'bi-plus-circle', action: () => handleWalletTopup() },
      'dashboard.php': { icon: 'bi-plus-circle', action: () => window.location.href = 'myevents.php' }
    };

    if (pagesWithCenterButton[currentPage]) {
      const config = pagesWithCenterButton[currentPage];
      const centerButton = document.createElement('a');
      centerButton.className = 'nav-item-center';
      centerButton.href = '#';
      centerButton.innerHTML = `<i class="${config.icon}"></i>`;
      centerButton.addEventListener('click', (e) => {
        e.preventDefault();
        config.action();
      });
      navbar.appendChild(centerButton);
    }
  }

  addFloatingCenterButton();

  // Wallet Top-up Handler
  function handleWalletTopup() {
    showToast('Wallet top-up feature coming soon!', 'success');
  }

  // Category Filter System
  const categoryChips = document.querySelectorAll('.category-chip');
  if (categoryChips.length > 0) {
    categoryChips.forEach(chip => {
      chip.addEventListener('click', function() {
        categoryChips.forEach(c => c.classList.remove('active'));
        this.classList.add('active');
        
        const category = this.textContent.trim();
        filterEventsByCategory(category);
      });
    });
  }

  function filterEventsByCategory(category) {
    const eventCards = document.querySelectorAll('.event-card');
    
    eventCards.forEach(card => {
      if (category === 'All') {
        card.style.display = 'block';
        card.classList.add('fade-in');
      } else {
        const cardCategory = card.querySelector('.event-card-category')?.textContent.trim();
        if (cardCategory === category) {
          card.style.display = 'block';
          card.classList.add('fade-in');
        } else {
          card.style.display = 'none';
        }
      }
    });
  }

  // Search Functionality
  const searchInput = document.querySelector('.search-input');
  if (searchInput) {
    searchInput.addEventListener('input', function(e) {
      const searchTerm = e.target.value.toLowerCase();
      const eventCards = document.querySelectorAll('.event-card');
      
      eventCards.forEach(card => {
        const title = card.querySelector('.event-card-title')?.textContent.toLowerCase() || '';
        const location = card.querySelector('.event-card-meta')?.textContent.toLowerCase() || '';
        
        if (title.includes(searchTerm) || location.includes(searchTerm)) {
          card.style.display = 'block';
          card.classList.add('fade-in');
        } else {
          card.style.display = 'none';
        }
      });
    });
  }

  // Enhanced Event Fetch with Loading State
  window.fetchEvents = async () => {
    const eventsListContainer = document.getElementById('events-list');
    if (!eventsListContainer) return;

    try {
      // Show skeleton loader
      await new Promise(resolve => setTimeout(resolve, 800));

      const response = await fetch('api/events.json');
      if (!response.ok) throw new Error('Network response was not ok');
      const events = await response.json();

      eventsListContainer.innerHTML = '';
      
      if (events.length > 0) {
        events.forEach((event, index) => {
          const eventCard = createEventCard(event, index);
          eventsListContainer.appendChild(eventCard);
        });
      } else {
        eventsListContainer.innerHTML = '<p class="text-center text-muted">No upcoming events found.</p>';
      }
    } catch (error) {
      console.error('Fetch error:', error);
      eventsListContainer.innerHTML = '<p class="text-danger text-center">Could not load events.</p>';
    }
  };

  // Create Enhanced Event Card
  function createEventCard(event, index) {
    const card = document.createElement('a');
    card.href = `event.php?id=${event.id}`;
    card.className = 'event-card fade-in';
    card.style.animationDelay = `${index * 0.1}s`;
    
    card.innerHTML = `
      <div class="event-card-image">
        <img src="${event.image}" alt="${event.title}" loading="lazy">
        <div class="event-card-badge">₦${event.tickets[0].price.toLocaleString()}</div>
      </div>
      <div class="event-card-content">
        <span class="event-card-category">${event.categories[0]}</span>
        <h3 class="event-card-title">${event.title}</h3>
        <div class="event-card-meta">
          <span><i class="bi bi-calendar-event"></i> ${new Date(event.date).toLocaleDateString('en-US', { month: 'short', day: 'numeric' })}</span>
          <span><i class="bi bi-geo-alt"></i> ${event.location.split(',')[0]}</span>
        </div>
        <div class="event-card-footer">
          <div class="event-card-price">From ₦${event.tickets[0].price.toLocaleString()}</div>
          <div class="event-card-attendees">
            <i class="bi bi-people"></i>
            <span>${event.tickets[0].qty_available} spots</span>
          </div>
        </div>
      </div>
    `;
    
    return card;
  }

  // Enhanced Ticket Fetch
  window.fetchTickets = async () => {
    const ticketsList = document.getElementById('tickets-list');
    const skeletonLoader = document.getElementById('skeleton-loader');
    const noTicketsMessage = document.getElementById('no-tickets');
    
    if (!ticketsList) return;

    try {
      await new Promise(resolve => setTimeout(resolve, 1000));
      
      const response = await fetch('api/tickets.json');
      const tickets = await response.json();

      if (skeletonLoader) skeletonLoader.classList.add('d-none');
      ticketsList.innerHTML = '';

      if (tickets.length > 0) {
        tickets.forEach((ticket, index) => {
          const ticketCard = createTicketCard(ticket, index);
          ticketsList.appendChild(ticketCard);
        });
      } else {
        if (noTicketsMessage) noTicketsMessage.classList.remove('d-none');
      }
    } catch (error) {
      console.error('Error fetching tickets:', error);
      ticketsList.innerHTML = '<p class="text-danger text-center">Could not load tickets.</p>';
    }
  };

  // Create Enhanced Ticket Card
  function createTicketCard(ticket, index) {
    const statusClass = `badge-${ticket.status}`;
    const card = document.createElement('div');
    card.className = 'ticket-card fade-in';
    card.style.animationDelay = `${index * 0.1}s`;
    
    card.innerHTML = `
      <div class="qr-code">
        <i class="bi bi-qr-code" style="font-size: 48px; color: var(--text-muted);"></i>
      </div>
      <div class="flex-grow-1">
        <h3 class="h5 mb-2">${ticket.event_title}</h3>
        <p class="small text-secondary mb-2">
          <i class="bi bi-calendar-event"></i> ${new Date(ticket.date).toLocaleString('en-US', { 
            month: 'short', 
            day: 'numeric', 
            hour: 'numeric', 
            minute: '2-digit' 
          })}
        </p>
        <div class="d-flex gap-2 align-items-center">
          <span class="badge ${statusClass}">${ticket.status}</span>
          <span class="small text-muted">${ticket.ticket_type}</span>
        </div>
      </div>
      <button class="btn btn-link text-primary" onclick="viewTicketDetails('${ticket.id}')">
        <i class="bi bi-chevron-right fs-5"></i>
      </button>
    `;
    
    return card;
  }

  // View Ticket Details
  window.viewTicketDetails = (ticketId) => {
    showToast('Opening ticket details...', 'success');
    // Add your ticket detail logic here
  };

  // Simulate Payment
  window.simulatePayment = () => {
    return new Promise((resolve) => {
      setTimeout(() => {
        resolve({ success: true, transactionId: 'TXN_' + Date.now() });
      }, 2000);
    });
  };

  // Form Validation Enhancement
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      if (!form.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
        showToast('Please fill in all required fields', 'error');
      }
      form.classList.add('was-validated');
    });
  });

  // Smooth Scroll for Anchor Links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href !== '#' && href !== '') {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  });

  // Add Ripple Effect to Buttons
  const buttons = document.querySelectorAll('.btn, .nav-item, .category-chip');
  buttons.forEach(button => {
    button.addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      
      ripple.style.width = ripple.style.height = size + 'px';
      ripple.style.left = x + 'px';
      ripple.style.top = y + 'px';
      ripple.className = 'ripple';
      
      this.style.position = 'relative';
      this.style.overflow = 'hidden';
      this.appendChild(ripple);
      
      setTimeout(() => ripple.remove(), 600);
    });
  });

  // Progressive Image Loading
  const images = document.querySelectorAll('img[loading="lazy"]');
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src || img.src;
          img.classList.add('fade-in');
          imageObserver.unobserve(img);
        }
      });
    });
    
    images.forEach(img => imageObserver.observe(img));
  }

  // Pull to Refresh (Optional)
  let startY = 0;
  let pulling = false;
  
  document.addEventListener('touchstart', (e) => {
    if (window.scrollY === 0) {
      startY = e.touches[0].pageY;
      pulling = true;
    }
  });
  
  document.addEventListener('touchmove', (e) => {
    if (pulling) {
      const currentY = e.touches[0].pageY;
      const distance = currentY - startY;
      
      if (distance > 80) {
        // Trigger refresh
        pulling = false;
        location.reload();
      }
    }
  });
  
  document.addEventListener('touchend', () => {
    pulling = false;
  });

  console.log('✨ EventApp Enhanced Scripts Loaded');
});
