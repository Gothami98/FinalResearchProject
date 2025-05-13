<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Color By Numbers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css" />

  <style>
    body {
      margin: 0;
      font-family: 'Baloo 2', 'Fredoka One', cursive;
      background: linear-gradient(135deg, #a8edea, #fed6e3);
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

    h1 {
      font-size: 2.5rem;
      color: #6b5ce7;
      margin-bottom: 30px;
      animation: bounceIn 1s ease-out;
      text-shadow: 2px 2px 0 rgba(255, 255, 255, 0.5);
      position: relative;
    }

    h1::after {
      content: "";
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(to right, #6b5ce7, #8a7ef8);
      border-radius: 2px;
    }

    .drawing-container {
      position: relative;
      width: 100%;
      max-width: 550px;
      height: 400px;
      margin: 0 auto 30px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.15);
      overflow: hidden;
    }

    .drawing-area {
      width: 100%;
      height: 100%;
      background-color: #e5daed; /* Bird background */
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .color-palette {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .color-option {
      width: 50px;
      height: 50px;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Fredoka One', cursive;
      font-size: 1.5rem;
      color: white;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      position: relative;
    }

    .color-option:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0,0,0,0.3);
    }

    .color-option.selected {
      transform: scale(1.1);
      box-shadow: 0 0 0 3px white, 0 8px 15px rgba(0,0,0,0.3);
    }

    .color-label {
      position: absolute;
      top: -5px;
      right: -5px;
      background-color: white;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.7rem;
      font-weight: bold;
      color: black;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .bird-part {
      position: absolute;
      background-color: transparent;
      stroke: black;
      stroke-width: 2;
      fill: transparent;
      cursor: pointer;
    }

    .bird-part[data-filled="true"] {
      stroke-width: 1;
    }

    .popup {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #ffffff;
      color: #4caf50;
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




 
    /* Sparkle effect */
    .sparkle {
      position: absolute;
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background-color: white;
      box-shadow: 0 0 10px 2px rgba(255, 255, 255, 0.8);
      pointer-events: none;
      opacity: 0;
      z-index: 100;
      animation: sparkle 0.8s ease-in-out forwards;
    }

    /* Bird SVG parts */
    #bird-body {
      fill: transparent;
      stroke: black;
      stroke-width: 3;
    }
    
    #left-eye, #right-eye {
      fill: transparent;
      stroke: black;
      stroke-width: 3;
    }
    
    #left-pupil, #right-pupil {
      fill: transparent;
      stroke: black;
      stroke-width: 3;
    }
    
    #beak {
      fill: transparent;
      stroke: black;
      stroke-width: 3;
    }
    
    #left-wing, #right-wing {
      fill: transparent;
      stroke: black;
      stroke-width: 3;
    }
    
    #left-leg, #right-leg {
      fill: transparent;
      stroke: black;
      stroke-width: 3;
    }
    
    #left-foot, #right-foot {
      fill: transparent;
      stroke: black;
      stroke-width: 3;
    }
    
    #shadow {
      fill: transparent;
      stroke: black;
      stroke-width: 3;
    }

    /* Decorative elements */
    .decoration {
      position: absolute;
      z-index: -1;
      opacity: 0.1;
      pointer-events: none;
      animation: float 6s infinite ease-in-out;
    }

    .dog-icon {
      font-size: 2rem;
      color: #ff6f61;
      top: 10%;
      left: 10%;
      animation-delay: 0s;
    }

    .butterfly-icon {
      font-size: 2.5rem;
      color: #0575e6;
      top: 20%;
      right: 15%;
      animation-delay: 1s;
    }

    .flower-icon {
      font-size: 2rem;
      color: #43a047;
      bottom: 15%;
      left: 20%;
      animation-delay: 2s;
    }

    .dog-icon-2 {
      font-size: 1.8rem;
      color: #ffeb3b;
      bottom: 25%;
      right: 10%;
      animation-delay: 3s;
    }

    .butterfly-icon-2 {
      font-size: 2.2rem;
      color: #9c27b0;
      top: 70%;
      left: 25%;
      animation-delay: 4s;
    }

    .flower-icon-2 {
      font-size: 1.5rem;
      color: #ff9800;
      bottom: 10%;
      right: 20%;
      animation-delay: 5s;
    }

    @keyframes sparkle {
      0% { transform: scale(0); opacity: 0; }
      50% { transform: scale(1.5); opacity: 1; }
      100% { transform: scale(0); opacity: 0; }
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
  </style>
</head>
<body>
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

  <!-- Decorative elements -->
  <i class="fas fa-dog dog-icon decoration"></i>
  <i class="fas fa-butterfly butterfly-icon decoration"></i>
  <i class="fas fa-spa flower-icon decoration"></i>
  <i class="fas fa-dog dog-icon-2 decoration"></i>
  <i class="fas fa-butterfly butterfly-icon-2 decoration"></i>
  <i class="fas fa-spa flower-icon-2 decoration"></i>

  <div class="game-container">
    <h1>COLOR THE BIRD</h1>

    <div class="drawing-container">
      <div class="drawing-area">
        <!-- Bird SVG -->
        <svg width="100%" height="100%" viewBox="0 0 300 300">
          <!-- Bird Body - Purple (1) -->
          <ellipse id="bird-body" class="bird-part" data-number="1" cx="150" cy="150" rx="70" ry="70" />
          
          <!-- Eyes - White (4) -->
          <circle id="left-eye" class="bird-part" data-number="4" cx="120" cy="120" r="20" />
          <circle id="right-eye" class="bird-part" data-number="4" cx="180" cy="120" r="20" />
          
          <!-- Pupils - Black (6) -->
          <circle id="left-pupil" class="bird-part" data-number="6" cx="120" cy="120" r="10" />
          <circle id="right-pupil" class="bird-part" data-number="6" cx="180" cy="120" r="10" />
          
          <!-- Beak - Yellow (2) -->
          <path id="beak" class="bird-part" data-number="2" d="M150,120 L130,150 L170,150 Z" />
          
          <!-- Wings - Dark Purple (3) -->
          <path id="left-wing" class="bird-part" data-number="3" d="M90,150 C60,130 40,150 60,180 C80,190 90,170 90,150 Z" />
          <path id="right-wing" class="bird-part" data-number="3" d="M210,150 C240,130 260,150 240,180 C220,190 210,170 210,150 Z" />
          
          <!-- Legs - Yellow (2) -->
          <rect id="left-leg" class="bird-part" data-number="2" x="135" y="220" width="5" height="30" rx="2" />
          <rect id="right-leg" class="bird-part" data-number="2" x="160" y="220" width="5" height="30" rx="2" />
          
          <!-- Feet - Yellow (2) -->
          <path id="left-foot" class="bird-part" data-number="2" d="M135,250 L125,260 L145,260 Z" />
          <path id="right-foot" class="bird-part" data-number="2" d="M160,250 L150,260 L170,260 Z" />
          
          <!-- Shadow - Gray (5) -->
          <ellipse id="shadow" class="bird-part" data-number="5" cx="150" cy="270" rx="50" ry="10" />
        </svg>
      </div>
    </div>

    <div class="color-palette">
      <div class="color-option" style="background-color: #a855fd;" data-color="1" onclick="selectColor(1)">
        <span>1</span>
      </div>
      <div class="color-option" style="background-color: #ffc501;" data-color="2" onclick="selectColor(2)">
        <span>2</span>
      </div>
      <div class="color-option" style="background-color: #3e007f;" data-color="3" onclick="selectColor(3)">
        <span>3</span>
      </div>
      <div class="color-option" style="background-color: #FFFFFF;" data-color="4" onclick="selectColor(4)">
        <span>4</span>
      </div>
      <div class="color-option" style="background-color: #5f5f5f;" data-color="5" onclick="selectColor(5)">
        <span>5</span>
      </div>
      <div class="color-option" style="background-color: #000000;" data-color="6" onclick="selectColor(6)">
        <span>6</span>
      </div>
    </div>
  </div>

  <!-- Popup message -->
  <div class="popup" id="popupMessage">Great job! You colored it correctly! 🎉</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Define color mappings
    const colorMap = {
      1: '#a855fd', // Purple (Bird Body)
      2: '#ffc501', // Yellow (Beak and Legs)
      3: '#3e007f', // Dark Purple (Wings)
      4: '#FFFFFF', // White (Eyes)
      5: '#5f5f5f', // Gray (Shadow)
      6: '#000000'  // Black (Pupils)
    };

    let selectedColor = null;
    let completedParts = 0;
    const totalParts = document.querySelectorAll('.bird-part').length;
    const popup = document.getElementById("popupMessage");

    // Initialize bird parts with their numbers
    document.querySelectorAll('.bird-part').forEach(part => {
      const number = part.getAttribute('data-number');
      
      // Add number text to the center of each part
      const bbox = part.getBBox();
      const textX = bbox.x + bbox.width / 2;
      const textY = bbox.y + bbox.height / 2;
      
      const text = document.createElementNS("http://www.w3.org/2000/svg", "text");
      text.setAttribute("x", textX);
      text.setAttribute("y", textY);
      text.setAttribute("text-anchor", "middle");
      text.setAttribute("dominant-baseline", "middle");
      text.setAttribute("fill", "black");
      text.setAttribute("font-size", "14");
      text.setAttribute("font-weight", "bold");
      text.setAttribute("pointer-events", "none");
      text.textContent = number;
      
      part.parentNode.appendChild(text);
      
      // Add click event to fill with selected color
      part.addEventListener('click', () => colorPart(part));
    });

    function selectColor(number) {
      // Deselect previous
      document.querySelectorAll('.color-option').forEach(option => {
        option.classList.remove('selected');
      });
      
      // Select new color
      selectedColor = number;
      document.querySelector(`[data-color="${number}"]`).classList.add('selected');
      
      showPopup(`Color ${number} selected!`, '#0575e6');
    }

    function colorPart(part) {
      if (!selectedColor) {
        showPopup("Please select a color first!", '#ff9800');
        return;
      }
      
      const correctNumber = parseInt(part.getAttribute('data-number'));
      
      if (selectedColor === correctNumber) {
        // Correct coloring
        part.style.fill = colorMap[selectedColor];
        part.setAttribute('data-filled', 'true');
        
        createSparkles(part);
        showPopup("Great job! That's the right color! 🎉", '#4caf50');
        
        // Check if all parts are correctly colored
        checkCompletion();
      } else {
        // Incorrect coloring
        showPopup(`Try again! This part needs color ${correctNumber}`, '#ff9800');
      }
    }

    function checkCompletion() {
      const filledParts = document.querySelectorAll('.bird-part[data-filled="true"]').length;
      
      if (filledParts === totalParts) {
        setTimeout(() => {
          showPopup("Amazing! You've completed the coloring! 🎉", '#4caf50');
          
          // Add big sparkles all over
          createSparkles(document.querySelector('.drawing-area'));
          createSparkles(document.querySelector('.game-container'));
          
          // Save progress
          markSuccessAndNext();
        }, 1000);
      }
    }

    function showPopup(message, color = '#4caf50') {
      popup.textContent = message;
      popup.style.color = color;
      popup.classList.add("show");

      setTimeout(() => {
        popup.classList.remove("show");
      }, 2500);
    }

    function createSparkles(element) {
      for (let i = 0; i < 20; i++) {
        const sparkle = document.createElement('div');
        sparkle.classList.add('sparkle');

        // Random position within the element
        const rect = element.getBoundingClientRect();
        const x = Math.random() * rect.width;
        const y = Math.random() * rect.height;

        sparkle.style.left = `${x}px`;
        sparkle.style.top = `${y}px`;
        sparkle.style.animationDelay = `${Math.random() * 0.5}s`;

        element.appendChild(sparkle);

        // Remove sparkle after animation
        setTimeout(() => {
          sparkle.remove();
        }, 1000);
      }
    }

    function markSuccessAndNext() {
      let score = parseInt(localStorage.getItem('activityScore') || '0', 10);
      localStorage.setItem('activityScore', score + 1);
      
      // In a real app, you'd redirect to the next activity
      // For now, we'll just show a message
      setTimeout(() => {
        showPopup("Moving to next activity...", '#6b5ce7');
      }, 2000);
    }

    function skipActivity() {
      showPopup("Skipping this activity...", '#ff9800');
      setTimeout(() => {
        // In a real app, redirect to next activity
        // window.location.href = 'next-activity.html';
        alert("In a real app, this would take you to the next activity.");
      }, 1500);
    }

    function goHome() {
      showPopup("Going to home...", '#4caf50');
      setTimeout(() => {
        // In a real app, redirect to home
        // window.location.href = 'index.html';
        alert("In a real app, this would take you to the home page.");
      }, 1500);
    }

    function openSettings() {
      showPopup("Opening settings...", '#ff9800');
      setTimeout(() => {
        // In a real app, open settings
        alert("In a real app, this would open the settings panel.");
      }, 1500);
    }

    function goBack() {
      showPopup("Going back...", '#f44336');
      setTimeout(() => {
        // In a real app, go back
        window.history.back();
      }, 1500);
    }

    // Add googly eyes effect
    document.querySelector('.drawing-area').addEventListener("mousemove", (evt) => {
      const leftPupil = document.getElementById('left-pupil');
      const rightPupil = document.getElementById('right-pupil');
      const leftEye = document.getElementById('left-eye');
      const rightEye = document.getElementById('right-eye');
      
      if (leftPupil && leftPupil.getAttribute('data-filled') === 'true' && 
          rightPupil && rightPupil.getAttribute('data-filled') === 'true') {
        
        // Get eye positions
        const leftEyePos = leftEye.getBoundingClientRect();
        const rightEyePos = rightEye.getBoundingClientRect();
        
        // Calculate center points
        const leftX = leftEyePos.left + leftEyePos.width / 2;
        const leftY = leftEyePos.top + leftEyePos.height / 2;
        const rightX = rightEyePos.left + rightEyePos.width / 2;
        const rightY = rightEyePos.top + rightEyePos.height / 2;
        
        // Calculate angle for pupils
        const leftRadian = Math.atan2(evt.clientX - leftX, evt.clientY - leftY);
        const rightRadian = Math.atan2(evt.clientX - rightX, evt.clientY - rightY);
        
        // Limit pupil movement
        const maxMove = 5;
        const leftDeltaX = Math.sin(leftRadian) * maxMove;
        const leftDeltaY = Math.cos(leftRadian) * maxMove;
        const rightDeltaX = Math.sin(rightRadian) * maxMove;
        const rightDeltaY = Math.cos(rightRadian) * maxMove;
        
        // Update pupil positions
        leftPupil.setAttribute('cx', 120 + leftDeltaX);
        leftPupil.setAttribute('cy', 120 + leftDeltaY);
        rightPupil.setAttribute('cx', 180 + rightDeltaX);
        rightPupil.setAttribute('cy', 120 + rightDeltaY);
      }
    });

    // Auto-select the first color when page loads
    window.onload = function() {
      setTimeout(() => {
        selectColor(1);
      }, 1000);
    };
  </script>
</body>
</html>