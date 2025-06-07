<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Maze</title>
  
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

    .maze-container {
      width: 300px;
      height: 300px;
      border: 8px solid #ff6f61;
      border-radius: 15px;
      position: relative;
      background: #fff;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      overflow: hidden;
      margin: 20px auto;
    }

    .maze {
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: #f9f9f9;
      background-image: 
        radial-gradient(#e3e3e3 1px, transparent 1px),
        radial-gradient(#e3e3e3 1px, transparent 1px);
      background-size: 20px 20px;
      background-position: 0 0, 10px 10px;
    }

    .drag-area {
      position: absolute;
      cursor: grab;
      width: 36px;
      height: 36px;
      background-color: #ff6f61;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      z-index: 10;
      transition: all 0.2s;
    }

    .drag-area:active {
      cursor: grabbing;
      transform: scale(1.1);
    }

    .drag-area i {
      font-size: 20px;
      color: white;
    }

    #flag {
      position: absolute;
      width: 50px;
      height: 50px;
      background-color: #4caf50;
      border-radius: 10px;
      top: 230px;
      left: 230px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
      animation: pulse 2s infinite;
    }

    #flag i {
      font-size: 26px;
      color: white;
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

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

  </style>
</head>
<body>
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
    <h2>Simple Maze</h2>
    <p id="instruction"> Guide the mouse through the maze to the flag.</p>

    <!-- Maze Container -->
    <div class="maze-container">
      <div class="maze">
        <div id="dragArea" class="drag-area" draggable="true">
          <i class="fas fa-mouse"></i>
        </div>
        <div id="flag">
          <i class="fas fa-flag"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Popup message -->
  <div class="popup" id="popupMessage">Guide the mouse to the flag! 🎯</div>

  <audio id="instructionSound" src="../Audio/Instruction-audio.mp3"></audio>
  <script>
    // --- New Instructions Script (Audio Version) ---
    function playInstructions() {
      const instructionSound = document.getElementById("instructionSound");
      const soundWave = null; // soundWave element does not exist in seven.php
      if (!instructionSound) { console.error('instructionSound element not found'); return; }
      instructionSound.currentTime = 0;
      instructionSound.play();
      if (soundWave) { // This check will prevent errors
        soundWave.classList.add("active");
      }
      if (typeof showPopup === 'function') {
        showPopup("🎧 Listening to instructions...\", '#9c27b0');
      }
      instructionSound.removeEventListener('ended', instructionSoundEndedListener);
      instructionSound.addEventListener('ended', instructionSoundEndedListener, { once: true });
    }

    function instructionSoundEndedListener() {
      const soundWave = null; // soundWave element does not exist in seven.php
      if (soundWave) {
        soundWave.classList.remove("active");
      }
    }

    var originalWindowOnloadSeven = window.onload; // Preserve potential existing onload
    window.onload = function(e) { // Pass event args
      if (typeof originalWindowOnloadSeven === 'function') {
        originalWindowOnloadSeven(e);
      }
      console.log('New window.onload for audio instructions (seven.php).');
      setTimeout(() => {
        playInstructions();
      }, 500);
    };

    window.addEventListener('beforeunload', function() {
      sessionStorage.setItem('pageRefreshed', 'true');
    });

    document.addEventListener('DOMContentLoaded', function() {
      console.log('New DOMContentLoaded for audio instructions (seven.php).');
      if (sessionStorage.getItem('pageRefreshed') === 'true') {
        sessionStorage.removeItem('pageRefreshed');
        setTimeout(() => {
          playInstructions();
        }, 500);
      }
    });
    // --- End of New Instructions Script ---

    const dragArea = document.getElementById("dragArea");
    const flag = document.getElementById("flag");
    const popup = document.getElementById("popupMessage");
    let isDropped = false;

    // Show startup popup
    showPopup("Guide the mouse to the flag! 🎯", "#ff6f61");

    // Drag start event for the mouse
    dragArea.addEventListener("dragstart", function(e) {
      e.dataTransfer.setData("text", "mouse");
    });

    // Drag over event to allow dropping
    flag.addEventListener("dragover", function(e) {
      e.preventDefault();
    });

    // Add drop event listener to the flag
    flag.addEventListener('drop', (e) => {
      e.preventDefault();
      const mouse = document.getElementById('mouse');
      const rect = flag.getBoundingClientRect();
      const mouseRect = mouse.getBoundingClientRect();
      
      // Check if mouse is dropped on the flag
      if (e.clientX >= rect.left && e.clientX <= rect.right &&
          e.clientY >= rect.top && e.clientY <= rect.bottom) {
        // Add mark for correct answer without showing feedback
        let score = parseInt(localStorage.getItem('activityScore') || '0', 10);
        localStorage.setItem('activityScore', score + 1);
      }
      
      // Proceed to next activity after a delay, without showing feedback
      setTimeout(() => {
        window.location.href = 'eight.php';
      }, 1500);
    });

    // Add drop event listener to the document for drops outside the flag
    document.addEventListener('drop', (e) => {
      e.preventDefault();
      // Proceed to next activity after a delay, without showing feedback
      setTimeout(() => {
        window.location.href = 'eight.php';
      }, 1500);
    });

    // Add event listener for dragover anywhere on the page
    document.body.addEventListener("dragover", function(e) {
      e.preventDefault();
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
      window.location.href = 'index.html';
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
      window.location.href = 'eight.php';
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
        window.location.href = 'eight.php'; // Ensure this path is correct
    }, 1000);
}

  </script>
</body>
</html>
