<?php
$role = $role ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EventApp — Welcome</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body { 
      font-family: var(--font-family); 
      background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
      color: var(--text-white);
      overflow-x: hidden;
    }
    
    .onboarding-container {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 100vh;
      padding: var(--gap);
      position: relative;
    }
    
    /* Skip Button */
    .skip-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border: none;
      color: var(--text-white);
      padding: 8px 20px;
      border-radius: 20px;
      font-size: var(--small);
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      z-index: 10;
    }
    
    .skip-btn:hover {
      background: rgba(255, 255, 255, 0.3);
    }
    
    /* Carousel Styling */
    .carousel {
      flex: 1;
      display: flex;
      align-items: center;
    }
    
    .carousel-inner {
      padding: var(--gap-lg) 0;
    }
    
    .carousel-item {
      text-align: center;
      padding: 40px 20px;
      animation: fadeInUp 0.6s ease;
    }
    
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .carousel-icon {
      width: 120px;
      height: 120px;
      margin: 0 auto var(--gap-lg);
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(10px);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 64px;
      color: var(--text-white);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
      animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    
    .carousel-item h2 {
      font-size: var(--h1);
      font-weight: 700;
      margin-bottom: var(--gap);
      color: var(--text-white);
    }
    
    .carousel-item p {
      font-size: var(--body);
      line-height: 1.6;
      color: rgba(255, 255, 255, 0.9);
      max-width: 320px;
      margin: 0 auto;
    }
    
    /* Custom Indicators */
    .carousel-indicators {
      position: static;
      margin: var(--gap-lg) 0;
    }
    
    .carousel-indicators [data-bs-target] {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.3);
      border: none;
      margin: 0 6px;
      transition: var(--transition);
    }
    
    .carousel-indicators [data-bs-target].active {
      width: 24px;
      border-radius: 5px;
      background-color: var(--text-white);
    }
    
    /* Bottom Actions */
    .bottom-actions {
      padding: var(--gap) 0;
    }
    
    .btn-get-started {
      width: 100%;
      height: var(--btn-height);
      background: var(--text-white);
      color: var(--color-primary);
      border: none;
      border-radius: var(--radius-md);
      font-weight: 700;
      font-size: var(--body);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
      transition: var(--transition);
    }
    
    .btn-get-started:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
    }
    
    .btn-secondary-action {
      margin-top: var(--gap);
      color: var(--text-white);
      text-align: center;
      font-size: var(--small);
    }
    
    .btn-secondary-action a {
      color: var(--text-white);
      font-weight: 600;
      text-decoration: underline;
    }
    
    /* Background Animation */
    .bg-circles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }
    
    .circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.05);
      animation: float 20s infinite ease-in-out;
    }
    
    .circle:nth-child(1) {
      width: 200px;
      height: 200px;
      top: -100px;
      left: -100px;
      animation-delay: 0s;
    }
    
    .circle:nth-child(2) {
      width: 150px;
      height: 150px;
      bottom: -75px;
      right: -75px;
      animation-delay: 5s;
    }
    
    .circle:nth-child(3) {
      width: 100px;
      height: 100px;
      top: 50%;
      right: -50px;
      animation-delay: 10s;
    }
    
    @keyframes float {
      0%, 100% { transform: translate(0, 0) scale(1); }
      33% { transform: translate(30px, -30px) scale(1.1); }
      66% { transform: translate(-20px, 20px) scale(0.9); }
    }
  </style>
</head>
<body>
  <!-- Background Animation -->
  <div class="bg-circles">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
  </div>

  <main class="app-container onboarding-container" style="max-width: var(--max-width); margin: 0 auto;">
    
    <!-- Skip Button -->
    <button class="skip-btn" onclick="window.location.href='login.php'">Skip</button>

    <!-- Carousel -->
    <div id="onboardingCarousel" class="carousel slide" data-bs-ride="carousel">
      
      <!-- Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#onboardingCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#onboardingCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#onboardingCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

      <!-- Carousel Inner -->
      <div class="carousel-inner">
        
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="carousel-icon">
            <i class="bi bi-calendar-heart"></i>
          </div>
          <h2>Discover Amazing Events</h2>
          <p>Find and explore exciting concerts, conferences, workshops, and entertainment events happening near you.</p>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="carousel-icon">
            <i class="bi bi-ticket-perforated"></i>
          </div>
          <h2>Book Tickets Instantly</h2>
          <p>Secure your spot with just a few taps. Fast, easy, and completely secure payment options available.</p>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
          <div class="carousel-icon">
            <i class="bi bi-qr-code-scan"></i>
          </div>
          <h2>Digital Tickets & More</h2>
          <p>Access all your tickets in one place. Use QR codes for seamless check-in at any event.</p>
        </div>

      </div>
    </div>

    <!-- Bottom Actions -->
    <div class="bottom-actions">
      <button class="btn btn-get-started" onclick="window.location.href='login.php'">
        Get Started
      </button>
      <div class="btn-secondary-action">
        Already have an account? <a href="login.php">Sign In</a>
      </div>
    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    // Auto-advance carousel
    const carousel = new bootstrap.Carousel(document.getElementById('onboardingCarousel'), {
      interval: 4000,
      wrap: true
    });

    // Track when user reaches last slide
    const carouselElement = document.getElementById('onboardingCarousel');
    carouselElement.addEventListener('slid.bs.carousel', function (e) {
      const activeIndex = e.to;
      const totalSlides = document.querySelectorAll('.carousel-item').length;
      
      // Change button text on last slide
      const getStartedBtn = document.querySelector('.btn-get-started');
      if (activeIndex === totalSlides - 1) {
        getStartedBtn.textContent = "Let's Go!";
      } else {
        getStartedBtn.textContent = "Get Started";
      }
    });

    // Swipe gesture support
    let touchStartX = 0;
    let touchEndX = 0;

    carouselElement.addEventListener('touchstart', e => {
      touchStartX = e.changedTouches[0].screenX;
    });

    carouselElement.addEventListener('touchend', e => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    });

    function handleSwipe() {
      if (touchEndX < touchStartX - 50) {
        carousel.next();
      }
      if (touchEndX > touchStartX + 50) {
        carousel.prev();
      }
    }
  </script>
</body>
</html>
