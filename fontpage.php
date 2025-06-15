<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PathBloomers - Make A Brighter Future For Child</title>
  

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Inter', sans-serif;
      overflow: hidden;
      background: #0a0a0a;
    }

    .hero-section {
      opacity: 0;
      transition: opacity 2s ease-in-out;
      height: 100vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      flex-direction: column;
      padding: 0 20px;
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
      z-index: 1;
    }

    .hero-section::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      opacity: 0.1;
      z-index: 2;
    }

    .context {
      position: relative;
      z-index: 10;
      max-width: 800px;
      margin: 0 auto;
    }

    .logo-text {
      font-family: 'Space Grotesk', sans-serif;
      font-size: clamp(4rem, 8vw, 8rem);
      font-weight: 700;
      background: linear-gradient(135deg, #ffffff 0%, #f0f0f0 50%, #ffffff 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-shadow: 0 0 40px rgba(255, 255, 255, 0.3);
      margin-bottom: 1rem;
      letter-spacing: -0.02em;
      animation: float 6s ease-in-out infinite;
    }

    .subtitle {
      font-size: clamp(1.2rem, 3vw, 1.5rem);
      font-weight: 300;
      color: rgba(255, 255, 255, 0.8);
      margin-bottom: 2rem;
      line-height: 1.6;
      animation: fadeInUp 1s ease-out 0.5s both;
    }

    .cta-button {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: 2px solid rgba(255, 255, 255, 0.2);
      border-radius: 50px;
      padding: 16px 40px;
      font-size: 1.1rem;
      font-weight: 600;
      text-decoration: none;
      display: inline-block;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
      animation: fadeInUp 1s ease-out 1s both;
    }

    .cta-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }

    .cta-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      border-color: rgba(255, 255, 255, 0.4);
      color: white;
      text-decoration: none;
    }

    .cta-button:hover::before {
      left: 100%;
    }

    .floating-elements {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 3;
    }

    .floating-shape {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      animation: floatUp 20s linear infinite;
    }

    .floating-shape:nth-child(1) {
      width: 60px;
      height: 60px;
      left: 10%;
      animation-delay: 0s;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    }

    .floating-shape:nth-child(2) {
      width: 40px;
      height: 40px;
      left: 25%;
      animation-delay: 2s;
      animation-duration: 15s;
    }

    .floating-shape:nth-child(3) {
      width: 80px;
      height: 80px;
      left: 50%;
      animation-delay: 4s;
      animation-duration: 25s;
    }

    .floating-shape:nth-child(4) {
      width: 30px;
      height: 30px;
      left: 70%;
      animation-delay: 6s;
      animation-duration: 18s;
    }

    .floating-shape:nth-child(5) {
      width: 50px;
      height: 50px;
      left: 85%;
      animation-delay: 8s;
      animation-duration: 22s;
    }

    .floating-shape:nth-child(6) {
      width: 35px;
      height: 35px;
      left: 5%;
      animation-delay: 10s;
      animation-duration: 16s;
    }

    .floating-shape:nth-child(7) {
      width: 90px;
      height: 90px;
      left: 35%;
      animation-delay: 12s;
      animation-duration: 28s;
    }

    .floating-shape:nth-child(8) {
      width: 25px;
      height: 25px;
      left: 60%;
      animation-delay: 14s;
      animation-duration: 20s;
    }

    .grid-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
      background-size: 50px 50px;
      z-index: 4;
      animation: gridMove 20s linear infinite;
    }

    .glow-orb {
      position: absolute;
      width: 300px;
      height: 300px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
      top: 20%;
      right: 10%;
      animation: pulse 4s ease-in-out infinite;
      z-index: 5;
    }

    .glow-orb:nth-child(2) {
      width: 200px;
      height: 200px;
      top: 60%;
      left: 10%;
      animation-delay: 2s;
      animation-duration: 6s;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
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

    @keyframes floatUp {
      0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
      }
    }

    @keyframes pulse {
      0%, 100% {
        transform: scale(1);
        opacity: 0.1;
      }
      50% {
        transform: scale(1.1);
        opacity: 0.2;
      }
    }

    @keyframes gridMove {
      0% { transform: translate(0, 0); }
      100% { transform: translate(50px, 50px); }
    }

    .feature-hint {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      color: rgba(255, 255, 255, 0.6);
      font-size: 0.9rem;
      animation: fadeInUp 1s ease-out 1.5s both;
    }

    .scroll-indicator {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      width: 2px;
      height: 30px;
      background: rgba(255, 255, 255, 0.3);
      border-radius: 2px;
      animation: scrollPulse 2s ease-in-out infinite;
    }

    @keyframes scrollPulse {
      0%, 100% { opacity: 0.3; }
      50% { opacity: 1; }
    }

    @media (max-width: 768px) {
      .hero-section {
        padding: 0 15px;
      }
      
      .logo-text {
        font-size: clamp(3rem, 10vw, 4rem);
      }
      
      .subtitle {
        font-size: 1.1rem;
      }
      
      .cta-button {
        padding: 14px 32px;
        font-size: 1rem;
      }
    }
  </style>
</head>

<body>
  <div class="hero-section" id="hero">
    <div class="grid-overlay"></div>
    <div class="glow-orb"></div>
    <div class="glow-orb"></div>
    
    <div class="floating-elements">
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>
    </div>

    <div class="context">
      <h1 class="logo-text">PathBloomers</h1>
      <p class="subtitle">Discover your potential. Bloom your path. Transform your future.</p>
      <a href="register.php" class="cta-button">Begin Your Journey</a>
    </div>
    
    <div class="feature-hint">
      ✨ Personalized growth experiences await
    </div>
    <div class="scroll-indicator"></div>
  </div>

  <script>
    // Enhanced fade-in with staggered animations
    const heroSection = document.getElementById('hero');
    
    // Simulate image loading (since we're using CSS gradients)
    setTimeout(() => {
      heroSection.style.opacity = '1';
    }, 100);

    // Add interactive mouse movement effect
    document.addEventListener('mousemove', (e) => {
      const shapes = document.querySelectorAll('.floating-shape');
      const mouseX = e.clientX / window.innerWidth;
      const mouseY = e.clientY / window.innerHeight;
      
      shapes.forEach((shape, index) => {
        const speed = (index + 1) * 0.5;
        const x = (mouseX - 0.5) * speed;
        const y = (mouseY - 0.5) * speed;
        shape.style.transform += ` translate(${x}px, ${y}px)`;
      });
    });

    // Add click ripple effect to CTA button
    document.querySelector('.cta-button').addEventListener('click', function(e) {
      const ripple = document.createElement('span');
      const rect = this.getBoundingClientRect();
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;
      
      ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s ease-out;
        pointer-events: none;
      `;
      
      this.appendChild(ripple);
      setTimeout(() => ripple.remove(), 600);
    });

    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes ripple {
        to {
          transform: scale(2);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>