<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Listen to the Sound - Dog Activity</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Bubblegum+Sans&display=swap" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  
  <!-- Add score.js -->
  <script src="score.js"></script>

  <style>
    body {
      margin: 0;
      font-family: 'Fredoka One', cursive;
      background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
      text-align: center;
      min-height: 100vh;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      overflow-x: hidden;
    }

    .container {
      max-width: 800px;
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 30px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
      position: relative;
      overflow: hidden;
    }

    .container::before {
      content: "";
      position: absolute;
      top: -50px;
      left: -50px;
      width: 100px;
      height: 100px;
      background-color: rgba(255, 187, 92, 0.2);
      border-radius: 50%;
      z-index: 0;
    }

    .container::after {
      content: "";
      position: absolute;
      bottom: -30px;
      right: -30px;
      width: 80px;
      height: 80px;
      background-color: rgba(126, 214, 223, 0.3);
      border-radius: 50%;
      z-index: 0;
    }

    h1 {
      font-size: 2.8rem;
      margin: 5px 130px;
      color: #ff6b6b;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      animation: bounce 2s infinite alternate;
      position: relative;
      z-index: 1;
    }

    h1::after {
      content: "🔊";
      font-size: 0.8em;
      position: absolute;
      margin-left: 10px;
      animation: pulse 1.5s infinite;
    }

    .paw-print {
      position: absolute;
      opacity: 0.1;
      z-index: 0;
    }

    .paw-1 {
      top: 20px;
      left: 30px;
      transform: rotate(-20deg);
      font-size: 2rem;
    }

    .paw-2 {
      bottom: 40px;
      right: 50px;
      transform: rotate(15deg);
      font-size: 2.5rem;
    }

    .dog-container {
      position: relative;
      cursor: pointer;
      transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      margin: 20px 0 30px;
      z-index: 1;
    }

    .dog-container:active {
      transform: scale(0.95);
    }

    .dog-container img {
      width: 320px;
      max-width: 90vw;
      border-radius: 25px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      transition: all 0.4s ease;
      animation: float 6s ease-in-out infinite;
      border: 8px solid white;
    }

    .glow-effect {
      position: absolute;
      top: -10px;
      left: -10px;
      right: -10px;
      bottom: -10px;
      border-radius: 35px;
      background: transparent;
      z-index: -1;
      transition: box-shadow 0.4s ease;
    }

    .dog-container:hover .glow-effect {
      box-shadow: 0 0 30px rgba(255, 107, 107, 0.6);
    }

    .dog-container:hover img {
      transform: scale(1.05) rotate(2deg);
      box-shadow: 0 20px 30px rgba(0, 0, 0, 0.25);
    }

    .click-instruction {
      position: absolute;
      bottom: -15px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #ff9a76;
      color: white;
      padding: 8px 15px;
      border-radius: 20px;
      font-size: 0.9rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      animation: pulse 2s infinite;
      z-index: 2;
    }

    .popup {
      position: fixed;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #ffffff;
      color: #4caf50;
      padding: 15px 30px;
      font-size: 1.4rem;
      border-radius: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      opacity: 0;
      transform: translate(-50%, 30px);
      transition: opacity 0.5s ease, transform 0.5s ease;
      z-index: 1000;
    }

    .popup.show {
      opacity: 1;
      transform: translate(-50%, 0);
    }

    .progress-bar {
      width: 80%;
      max-width: 300px;
      height: 10px;
      background-color: rgba(255, 255, 255, 0.7);
      border-radius: 10px;
      overflow: hidden;
      margin: 0 auto 20px;
      position: relative;
      z-index: 1;
    }

    .progress-fill {
      height: 100%;
      width: 16.67%;
      background: linear-gradient(to right, #4caf50, #8bc34a);
      border-radius: 10px;
      transition: width 0.5s ease;
    }

    .sound-wave {
      display: flex;
      justify-content: center;
      gap: 6px;
      height: 40px;
      margin-bottom: 10px;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .sound-wave.active {
      opacity: 1;
    }

    .wave-bar {
      width: 6px;
      background-color: #4caf50;
      border-radius: 3px;
      animation: sound-wave 1s infinite ease-in-out alternate;
    }

    .wave-bar:nth-child(1) { animation-delay: 0.0s; height: 60%; }
    .wave-bar:nth-child(2) { animation-delay: 0.1s; height: 80%; }
    .wave-bar:nth-child(3) { animation-delay: 0.2s; height: 100%; }
    .wave-bar:nth-child(4) { animation-delay: 0.3s; height: 80%; }
    .wave-bar:nth-child(5) { animation-delay: 0.4s; height: 60%; }

    /* Navigation icons */
    .nav-icons {
      position: fixed;
      top: 20px;
      right: 20px;
      display: flex;
      gap: 15px;
      z-index: 100;
    }

    .nav-icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      cursor: pointer;
      transition: all 0.3s;
    }

    .nav-icon:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .nav-icon i {
      font-size: 1.5rem;
      color: #555;
    }

    .nav-icon.home i {
      color: #4caf50;
    }

    .nav-icon.setting i {
      color: #2196f3;
    }

    .nav-icon.back i {
      color: #ff9800;
    }

    /* Instruction button */
    .instruction-button {
      position: fixed;
      top: 20px;
      left: 20px;
      background-color: #9c27b0;
      color: white;
      padding: 12px 20px;
      font-size: 1.1rem;
      font-family: 'Bubblegum Sans', cursive;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      z-index: 100;
    }

    .instruction-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
      background-color: #7b1fa2;
    }

    .instruction-button:active {
      transform: translateY(1px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .instruction-button i {
      margin-right: 8px;
    }

    /* Skip button at body level */
    .skip-fixed {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #ff9800;
      color: white;
      padding: 12px 25px;
      font-size: 1.2rem;
      font-family: 'Bubblegum Sans', cursive;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      z-index: 100;
    }

    .skip-fixed:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }

    .skip-fixed:active {
      transform: translateY(1px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .skip-fixed i {
      margin-right: 8px;
    }

    .confetti {
      position: absolute;
      width: 10px;
      height: 10px;
      background-color: #f44336;
      opacity: 0;
    }

    @keyframes bounce {
      0% { transform: translateY(0); }
      100% { transform: translateY(-10px); }
    }

    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0); }
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    @keyframes sound-wave {
      0% { transform: scaleY(0.5); }
      100% { transform: scaleY(1); }
    }

    @keyframes popIn {
      0% { opacity: 0; transform: scale(0.5); }
      50% { transform: scale(1.1); }
      100% { opacity: 1; transform: scale(1); }
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(-20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    /* Loading animation */
    .loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.8);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.5s ease;
    }

    .loading-overlay.show {
      opacity: 1;
      pointer-events: auto;
    }

    .loading-spinner {
      width: 50px;
      height: 50px;
      border: 5px solid rgba(76, 175, 80, 0.3);
      border-radius: 50%;
      border-top-color: #4caf50;
      animation: spin 1s infinite linear;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 2.2rem;
        margin: 5px 40px;
      }
      
      .container {
        padding: 20px;
      }
      
      .nav-icons {
        top: 10px;
        right: 10px;
        gap: 10px;
      }
      
      .nav-icon {
        width: 40px;
        height: 40px;
      }
      
      .nav-icon i {
        font-size: 1.2rem;
      }
      
      .instruction-button {
        padding: 10px 15px;
        font-size: 1rem;
        top: 10px;
        left: 10px;
      }
      
      .skip-fixed {
        padding: 10px 20px;
        font-size: 1rem;
        bottom: 15px;
        right: 15px;
      }
    }
  </style>
</head>
<body>
  <!-- Instruction button -->
  <button class="instruction-button" onclick="playInstructions()">
    <i class="fas fa-volume-up"></i>Instructions
  </button>

  <!-- Navigation Icons -->
  <div class="nav-icons">
    <div class="nav-icon home" onclick="goHome()">
      <i class="fas fa-home"></i>
    </div>
    <div class="nav-icon setting" onclick="openSettings()">
      <i class="fas fa-cog"></i>
    </div>
    <div class="nav-icon back" onclick="goBack()">
      <i class="fas fa-arrow-left"></i>
    </div>
  </div>
  
  <!-- Skip button at body level -->
  <button class="btn skip-fixed" onclick="skipAnimal()"><i class="fas fa-forward"></i>Skip</button>
  
  <div class="container">
    <i class="fas fa-paw paw-print paw-1"></i>
    <i class="fas fa-paw paw-print paw-2"></i>
    
    <div class="progress-bar">
      <div class="progress-fill"></div>
    </div>
    
    <h1>Listen to the Sound!</h1>
    
    <div class="sound-wave" id="soundWave">
      <div class="wave-bar"></div>
      <div class="wave-bar"></div>
      <div class="wave-bar"></div>
      <div class="wave-bar"></div>
      <div class="wave-bar"></div>
    </div>
    
    <div class="dog-container" onclick="playDogSound()">
      <div class="glow-effect"></div>
      <img src="../images/dog.avif" alt="Cartoon Dog" id="dogImage">
      <div class="click-instruction">Click me to hear!</div>
    </div>
  </div>

  <!-- Popup message -->
  <div class="popup" id="popupMessage">Great! You heard the dog barking! 🐶🔊</div>

  <!-- Loading overlay -->
  <div class="loading-overlay" id="loadingOverlay">
    <div class="loading-spinner"></div>
  </div>

  <!-- Audio elements -->
  <audio id="dogSound" src="../Audio/dog.mp3"></audio>
  <audio id="instructionSound" src="../Audio/first.mp3"></audio>

  <script>
    const sound = document.getElementById("dogSound");
    const instructionSound = document.getElementById("instructionSound");
    const popup = document.getElementById("popupMessage");
    const soundWave = document.getElementById("soundWave");
    const loadingOverlay = document.getElementById("loadingOverlay");

    function showPopup(message, color = '#4caf50') {
      popup.textContent = message;
      popup.style.color = color;
      popup.classList.add("show");

      // Create confetti effect
      createConfetti();

      setTimeout(() => {
        popup.classList.remove("show");
      }, 2500);
    }

    function playInstructions() {
      instructionSound.currentTime = 0;
      instructionSound.play();
      soundWave.classList.add("active");
      showPopup("🎧 Listening to instructions...", '#9c27b0');
    }

    function playDogSound() {
      sound.currentTime = 0;
      sound.play();
      soundWave.classList.add("active");
      showPopup("Great! You heard the dog barking! 🐶🔊", '#4caf50');
    }

    // Auto-navigate to next page after dog sound ends
    sound.addEventListener('ended', () => {
      soundWave.classList.remove("active");
      
      // Show loading animation
      setTimeout(() => {
        loadingOverlay.classList.add("show");
        
        // Navigate to next page after a brief delay
        setTimeout(() => {
          window.location.href = 'second.php';
        }, 1000);
      }, 1500); // Wait a moment after sound ends before loading
    });

    // Remove sound wave animation when instruction sound ends
    instructionSound.addEventListener('ended', () => {
      soundWave.classList.remove("active");
    });

    function skipAnimal() {
      showPopup("You skipped this one! ⏭️", '#ff9800');
      
      // Add a slight delay before loading the next activity
      setTimeout(() => {
        loadingOverlay.classList.add("show");
        setTimeout(() => {
          window.location.href = 'second.php';
        }, 1000);
      }, 1000);
    }

    // Navigation functions
    function goHome() {
      showPopup("Going home...", '#4caf50');
      setTimeout(() => {
        loadingOverlay.classList.add("show");
        setTimeout(() => {
          window.location.href = 'index.html';
        }, 1000);
      }, 1000);
    }

    function openSettings() {
      showPopup("Opening settings...", '#2196f3');
      // This would normally open a settings modal or page
    }

    function goBack() {
      showPopup("Going back...", '#ff9800');
      setTimeout(() => {
        loadingOverlay.classList.add("show");
        setTimeout(() => {
          window.history.back();
        }, 1000);
      }, 1000);
    }

    window.onload = function() {
        // Reset score only when starting from first activity
        localStorage.setItem('activityScore', '0');
        
        // Play instructions automatically when page loads
        setTimeout(() => {
            playInstructions();
        }, 500);
    };

    // Also play instructions when page is refreshed or reloaded
    window.addEventListener('beforeunload', function() {
      // Set a flag to indicate the page is being refreshed
      sessionStorage.setItem('pageRefreshed', 'true');
    });

    // Check if page was refreshed and play instructions
    document.addEventListener('DOMContentLoaded', function() {
      if (sessionStorage.getItem('pageRefreshed') === 'true') {
        sessionStorage.removeItem('pageRefreshed');
        setTimeout(() => {
          playInstructions();
        }, 500);
      }
    });

    function createConfetti() {
      const container = document.querySelector('.container');
      const colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39'];
      
      for (let i = 0; i < 30; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.left = Math.random() * 100 + '%';
        confetti.style.top = Math.random() * 100 + '%';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';
        
        container.appendChild(confetti);
        
        // Animate
        const animation = confetti.animate([
          { 
            transform: 'translate3d(0, 0, 0) rotate(' + Math.random() * 360 + 'deg)', 
            opacity: 1 
          },
          { 
            transform: 'translate3d(' + (Math.random() * 200 - 100) + 'px, ' + (Math.random() * 200 - 100) + 'px, 0) rotate(' + Math.random() * 360 + 'deg)', 
            opacity: 0 
          }
        ], {
          duration: 2000 + Math.random() * 1000,
          easing: 'cubic-bezier(0, .9, .57, 1)',
          delay: Math.random() * 500
        });
        
        animation.onfinish = function() {
          confetti.remove();
        };
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const dogContainer = document.querySelector('.dog-container');
        const popup = document.querySelector('.popup');
        let hasScored = false;

        dogContainer.addEventListener('click', function() {
            // Play sound
            const audio = new Audio('../Audio/dog.mp3');
            audio.play();

            // Show popup
            popup.textContent = 'Great job! You found the dog!';
            popup.classList.add('show');

            // Add score if not already scored
            if (!hasScored) {
                // Get current score from localStorage
                let currentScore = parseInt(localStorage.getItem('activityScore') || '0');
                // Add 1 point
                currentScore += 1;
                // Save back to localStorage
                localStorage.setItem('activityScore', currentScore);
                hasScored = true;
            }

            // Hide popup after 2 seconds
            setTimeout(() => {
                popup.classList.remove('show');
            }, 2000);
        });
    });
  </script>
</body>
</html>