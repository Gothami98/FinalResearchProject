<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emotion Recognition Activity</title>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css" />

  <style>
    body {
      margin: 0;
      font-family: 'Baloo 2', 'Fredoka One', cursive;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      text-align: center;
      min-height: 100vh;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      overflow-x: hidden;
    }

    .game-container {
      background-color: rgba(255, 255, 255, 0.85);
      border-radius: 30px;
      padding: 40px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1),
                  0 5px 15px rgba(0, 0, 0, 0.05),
                  inset 0 0 15px rgba(255, 255, 255, 0.5);
      width: 90%;
      max-width: 700px;
      position: relative;
      overflow: hidden;
    }

    .game-container::before {
      content: "";
      position: absolute;
      top: -20px;
      left: -20px;
      right: -20px;
      bottom: -20px;
      background: linear-gradient(45deg,
        rgba(255,111,97,0.1),
        rgba(33,150,243,0.1),
        rgba(76,175,80,0.1));
      z-index: -1;
      filter: blur(15px);
      border-radius: 40px;
    }

    h2 {
      font-size: 2.8rem;
      color: #ff6f61;
      margin-bottom: 30px;
      animation: bounceIn 1s ease-out;
      text-shadow: 2px 2px 0 rgba(255, 255, 255, 0.5);
      position: relative;
    }

    h2::after {
      content: "";
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(to right, #ff6f61, #ff9a8b);
      border-radius: 2px;
    }

    #instruction {
      font-size: 1.5rem;
      color: #444;
      margin-bottom: 30px;
      animation: fadeIn 1s ease-out;
    }

    .face-container {
      display: flex;
      gap: 30px;
      margin: 30px 0;
      flex-wrap: wrap;
      justify-content: center;
    }

    .face {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      position: relative;
      overflow: hidden;
      border: 5px solid white;
    }

    .face::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg,
        rgba(255,255,255,0.25),
        rgba(255,255,255,0));
      pointer-events: none;
    }

    .face:hover {
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .face:active {
      transform: scale(0.95);
    }

    .popup {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #ffffff;
      color: #ff6f61;
      padding: 15px 30px;
      font-size: 1.4rem;
      font-weight: bold;
      border-radius: 25px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      opacity: 0;
      transform: translate(-50%, 20px);
      transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      z-index: 1000;
    }

    .popup.show {
      opacity: 1;
      transform: translate(-50%, 0);
    }



    /* Confetti effect for correct answers */
    .confetti {
      position: absolute;
      width: 10px;
      height: 10px;
      background-color: #fff;
      border-radius: 2px;
      animation: fall linear forwards;
    }

    @keyframes fall {
      to {
        transform: translateY(100vh) rotate(720deg);
        opacity: 0;
      }
    }

    /* Decorative shapes */
    .shape {
      position: absolute;
      opacity: 0.1;
      pointer-events: none;
      animation: float 6s infinite ease-in-out;
    }

    .circle-1 {
      width: 50px;
      height: 50px;
      background-color: #ff6f61;
      border-radius: 50%;
      top: 10%;
      left: 10%;
      animation-delay: 0s;
    }

    .square-1 {
      width: 40px;
      height: 40px;
      background-color: #0575e6;
      top: 20%;
      right: 15%;
      animation-delay: 1s;
    }

    .triangle-1 {
      width: 0;
      height: 0;
      border-left: 25px solid transparent;
      border-right: 25px solid transparent;
      border-bottom: 45px solid #43a047;
      top: 70%;
      left: 25%;
      animation-delay: 2s;
    }

    .circle-2 {
      width: 60px;
      height: 60px;
      background-color: #ffeb3b;
      border-radius: 50%;
      bottom: 15%;
      right: 10%;
      animation-delay: 3s;
    }

    .square-2 {
      width: 35px;
      height: 35px;
      background-color: #9c27b0;
      bottom: 25%;
      left: 20%;
      animation-delay: 4s;
    }

    .triangle-2 {
      width: 0;
      height: 0;
      border-left: 20px solid transparent;
      border-right: 20px solid transparent;
      border-bottom: 35px solid #ff9800;
      top: 30%;
      right: 20%;
      animation-delay: 5s;
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(-20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes bounceIn {
      0% { opacity: 0; transform: scale(0.8); }
      50% { opacity: 1; transform: scale(1.05); }
      70% { transform: scale(0.95); }
      100% { transform: scale(1); }
    }

    @keyframes float {
      0% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(5deg); }
      100% { transform: translateY(0) rotate(0deg); }
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

@keyframes sound-wave {
  0% { transform: scaleY(0.5); }
  100% { transform: scaleY(1); }
}

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
  </style>
</head>
<body>



<button class="instruction-button" onclick="playInstructions()">
  <i class="fas fa-volume-up"></i>Instructions
</button>

<audio id="instructionSound" src="../Audio/8.mp3"></audio>

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

    <!-- Skip button -->
    <button class="skip-fixed" onclick="skipActivity()"><i class="fas fa-forward"></i>Skip</button>


  <!-- Decorative shapes -->
  <div class="shape circle-1"></div>
  <div class="shape square-1"></div>
  <div class="shape triangle-1"></div>
  <div class="shape circle-2"></div>
  <div class="shape square-2"></div>
  <div class="shape triangle-2"></div>

  <div class="game-container">
    <h2>Emotion Recognition</h2>
    <p id="instruction"><strong>Instruction:</strong> Click on the happy face.</p>

    <div class="face-container">
      <img src="../images/happy.png" alt="Happy Face" id="happy" class="face">
      <img src="../images/natural.png" alt="Neutral Face" id="neutral" class="face">
      <img src="../images/sad.png" alt="Sad Face" id="sad" class="face">
    </div>
  </div>

  <!-- Popup message -->
  <div class="popup" id="popupMessage">Let's get started! 😊</div>

  <script>
    const happy = document.getElementById("happy");
    const neutral = document.getElementById("neutral");
    const sad = document.getElementById("sad");
    const popup = document.getElementById("popupMessage");

    // Show startup popup
    showPopup("Let's get started! 😊", "#ff6f61");

    // Event listeners for face clicks
    happy.addEventListener("click", () => {
      // Add mark for correct answer without showing feedback
      let score = parseInt(localStorage.getItem('activityScore') || '0', 10);
      localStorage.setItem('activityScore', score + 1);
      
      // Proceed to next activity after a delay, without showing feedback
      setTimeout(() => {
        window.location.href = 'nine.php';
      }, 1500);
    });

    neutral.addEventListener("click", () => {
      // Proceed to next activity after a delay, without showing feedback
      setTimeout(() => {
        window.location.href = 'nine.php';
      }, 1500);
    });

    sad.addEventListener("click", () => {
      // Proceed to next activity after a delay, without showing feedback
      setTimeout(() => {
        window.location.href = 'nine.php';
      }, 1500);
    });

    function showPopup(message, color = '#4caf50') {
      popup.textContent = message;
      popup.style.color = color;
      popup.classList.add("show");

      setTimeout(() => {
        popup.classList.remove("show");
      }, 2500);
    }

    function goHome() {
      window.location.href = 'index.php';
    }

    function openSettings() {
      showPopup("Opening settings...", '#2196f3');
    }

    function goBack() {
      window.history.back();
    }

    function markSuccessAndNext() {
      let score = parseInt(localStorage.getItem('activityScore') || '0', 10);
      localStorage.setItem('activityScore', score + 1);
      window.location.href = 'nine.php';
    }

    // Add confetti effect for correct answers
    function createConfetti() {
      const confettiCount = 100;
      const colors = ['#ff416c', '#0575e6', '#43a047', '#ffeb3b', '#ff9800', '#9c27b0'];

      for (let i = 0; i < confettiCount; i++) {
        const confetti = document.createElement('div');
        confetti.classList.add('confetti');

        // Random position, color, size and animation duration
        const size = Math.random() * 8 + 6;
        confetti.style.width = `${size}px`;
        confetti.style.height = `${size}px`;
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.left = `${Math.random() * 100}%`;
        confetti.style.animationDuration = `${Math.random() * 3 + 2}s`;
        confetti.style.opacity = Math.random() + 0.5;

        document.body.appendChild(confetti);

        // Remove confetti after animation ends
        setTimeout(() => {
          confetti.remove();
        }, 5000);
      }
    }
    function skipActivity() {
    showPopup("Skipped this one! ⏭", '#ff9800');

    // Add a slight delay before loading the next activity
    setTimeout(() => {
        window.location.href = 'nine.php'; // Ensure this path is correct
    }, 1000);
}


const instructionSound = document.getElementById("instructionSound");
const soundWave = document.getElementById("soundWave");

function playInstructions() {
  instructionSound.currentTime = 0;
  instructionSound.play();
  soundWave.classList.add("active");
  showPopup("🎧 Listening to instructions...", '#9c27b0');
}

// Remove sound wave animation when instruction sound ends
instructionSound.addEventListener('ended', () => {
  soundWave.classList.remove("active");
});


window.onload = function() {
  localStorage.setItem('activityScore', '0');
  
  // Play instructions automatically when page loads
  setTimeout(() => {
    playInstructions();
  }, 500); // Small delay to ensure page is fully loaded
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

  </script>
</body>
</html>
