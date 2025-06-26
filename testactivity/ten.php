<?php
session_start();
include '../db_connect.php'; // Adjust path as needed

// Handle AJAX POST request for saving score
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_score'])) {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo 'Not logged in';
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $score = isset($_POST['score']) ? intval($_POST['score']) : 0;

    $stmt = $conn->prepare('UPDATE users SET score = ? WHERE id = ?');
    $stmt->bind_param('ii', $score, $user_id);

    if ($stmt->execute()) {
        echo 'Score updated successfully';
    } else {
        http_response_code(500);
        echo 'Failed to update score';
    }
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Color the Butterfly</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css" />

  <style>
    body {
      margin: 0;
      font-family: 'Baloo 2', cursive;
      background: linear-gradient(135deg, #a8edea, #fed6e3);
      min-height: 100vh;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .game-container {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      max-width: 800px;
      width: 90%;
      margin: 20px auto;
      text-align: center;
    }

    .butterflies-container {
      display: flex;
      justify-content: space-around;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
      margin: 20px 0;
    }

    .reference-container, .drawing-container {
      background: white;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      flex: 1;
      min-width: 300px;
    }

    .reference-container h3, .drawing-container h3 {
      color: #6b5ce7;
      margin-bottom: 15px;
      font-size: 1.5rem;
    }

    .butterfly-svg {
      width: 100%;
      max-width: 300px;
      height: auto;
    }

    .butterfly-part {
      stroke: #000;
      stroke-width: 2;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .butterfly-part:hover {
      stroke-width: 3;
      filter: brightness(1.1);
    }

    .color-palette {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .color-option {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
      transition: transform 0.3s ease;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      border: 3px solid white;
    }

    .color-option:hover {
      transform: scale(1.1);
    }

    .color-option.selected {
      transform: scale(1.2);
      box-shadow: 0 0 0 3px #6b5ce7;
    }

    .check-button {
      background-color: #4CAF50;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 25px;
      font-size: 1.2rem;
      cursor: pointer;
      margin-top: 20px;
      font-family: inherit;
      transition: all 0.3s ease;
    }

    .check-button:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .check-button:disabled {
      background-color: #cccccc;
      cursor: not-allowed;
      transform: none;
    }

    .popup {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      padding: 15px 30px;
      border-radius: 25px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      display: none;
      z-index: 1000;
    }

    .final-score-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 2000;
    }

    .final-score-container {
      background: white;
      padding: 40px;
      border-radius: 20px;
      text-align: center;
      max-width: 80%;
      animation: popIn 0.5s ease-out;
    }

    .final-score-container h2 {
      color: #6b5ce7;
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .final-score-container p {
      font-size: 1.5rem;
      margin: 10px 0;
      color: #333;
    }

    .final-score {
      font-size: 3rem;
      color: #4caf50;
      font-weight: bold;
      margin: 20px 0;
    }

    .celebration {
      font-size: 4rem;
      margin: 20px 0;
    }

    @keyframes popIn {
      0% { transform: scale(0.5); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }

    .instruction-button {
      position: fixed;
      top: 20px;
      left: 20px;
      background-color: #9c27b0;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-family: inherit;
      font-size: 1.1rem;
      z-index: 100;
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

  <audio id="instructionSound" src="../Audio/10.mp3"></audio>

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

  <div class="game-container">
    <h1>Color the Butterfly! 🦋</h1>
    <p>Color your butterfly to match the reference image!</p>

    <div class="butterflies-container">
      <div class="reference-container">
        <h3>Reference Butterfly</h3>
        <svg class="butterfly-svg" viewBox="0 0 400 300">
          <!-- Left Upper Wing -->
          <path class="butterfly-part" data-part="wing" 
                d="M200,150 Q150,100 120,80 Q80,60 60,100 Q40,140 80,160 Q120,180 200,150"
                fill="#FF69B4"/>
          
          <!-- Right Upper Wing -->
          <path class="butterfly-part" data-part="wing"
                d="M200,150 Q250,100 280,80 Q320,60 340,100 Q360,140 320,160 Q280,180 200,150"
                fill="#FF69B4"/>
          
          <!-- Left Lower Wing -->
          <path class="butterfly-part" data-part="wing"
                d="M200,150 Q150,180 120,200 Q80,220 100,180 Q120,140 200,150"
                fill="#87CEEB"/>
          
          <!-- Right Lower Wing -->
          <path class="butterfly-part" data-part="wing"
                d="M200,150 Q250,180 280,200 Q320,220 300,180 Q280,140 200,150"
                fill="#87CEEB"/>
          
          <!-- Body -->
          <path class="butterfly-part" data-part="body"
                d="M190,120 Q200,100 210,120 L210,180 Q200,200 190,180 Z"
                fill="#FFD700"/>
          
          <!-- Antennae -->
          <path class="butterfly-part" data-part="antennae"
                d="M195,120 Q180,90 170,70 M205,120 Q220,90 230,70"
                fill="#000000"/>
        </svg>
      </div>

      <div class="drawing-container">
        <h3>Your Butterfly</h3>
        <svg class="butterfly-svg" viewBox="0 0 400 300">
          <!-- Left Wing -->
          <path class="butterfly-part" data-part="wing" 
                d="M200,150 Q150,100 120,80 Q80,60 60,100 Q40,140 80,160 Q120,180 200,150"
                fill="transparent"/>
          
          <!-- Right Wing -->
          <path class="butterfly-part" data-part="wing"
                d="M200,150 Q250,100 280,80 Q320,60 340,100 Q360,140 320,160 Q280,180 200,150"
                fill="transparent"/>
          
          <!-- Left Lower Wing -->
          <path class="butterfly-part" data-part="wing"
                d="M200,150 Q150,180 120,200 Q80,220 100,180 Q120,140 200,150"
                fill="transparent"/>
          
          <!-- Right Lower Wing -->
          <path class="butterfly-part" data-part="wing"
                d="M200,150 Q250,180 280,200 Q320,220 300,180 Q280,140 200,150"
                fill="transparent"/>
          
          <!-- Body -->
          <path class="butterfly-part" data-part="body"
                d="M190,120 Q200,100 210,120 L210,180 Q200,200 190,180 Z"
                fill="transparent"/>
          
          <!-- Antennae -->
          <path class="butterfly-part" data-part="antennae"
                d="M195,120 Q180,90 170,70 M205,120 Q220,90 230,70"
                fill="none"/>
        </svg>
      </div>
    </div>

    <div class="color-palette">
      <div class="color-option" style="background-color: #FF69B4" onclick="selectColor('#FF69B4')" title="Pink"></div>
      <div class="color-option" style="background-color: #87CEEB" onclick="selectColor('#87CEEB')" title="Blue"></div>
      <div class="color-option" style="background-color: #98FB98" onclick="selectColor('#98FB98')" title="Green"></div>
      <div class="color-option" style="background-color: #FFD700" onclick="selectColor('#FFD700')" title="Yellow"></div>
      <div class="color-option" style="background-color: #DDA0DD" onclick="selectColor('#DDA0DD')" title="Purple"></div>
      <div class="color-option" style="background-color: #000000" onclick="selectColor('#000000')" title="Black"></div>
    </div>

    <button class="check-button" onclick="checkColoring()" id="checkButton">Check My Coloring</button>
  </div>

  <div class="popup" id="popupMessage"></div>

  <!-- Add final score overlay -->
  <div class="final-score-overlay" id="finalScoreOverlay">
    <div class="final-score-container">
      <div class="celebration">🎉 🎨 🦋</div>
      <h2>Congratulations!</h2>
      <p>You've completed all the activities!</p>
      <p>Your Total Score:</p>
      <div class="final-score" id="finalScoreDisplay">0</div>
      <p>Great job on your learning journey!</p>
    </div>
  </div>

  <script>
    let selectedColor = null;
    let coloredParts = 0;
    const totalParts = document.querySelectorAll('.drawing-container .butterfly-part').length - 1; // Subtract 1 for antennae
    let hasScored = false;

    // Add console log to check total parts
    console.log('Total parts to color:', totalParts);

    function selectColor(color) {
      // Remove selection from all colors
      document.querySelectorAll('.color-option').forEach(option => {
        option.classList.remove('selected');
      });
      
      // Select the clicked color
      selectedColor = color;
      event.target.classList.add('selected');
      showPopup('Color selected! Click on the butterfly to color it!', color);
    }

    // Add click events to butterfly parts
    document.querySelectorAll('.drawing-container .butterfly-part').forEach(part => {
      part.addEventListener('click', () => {
        if (!selectedColor) {
          showPopup('Please select a color first!', '#ff9800');
          return;
        }

        const isAntennae = part.getAttribute('data-part') === 'antennae';
        const currentFill = part.getAttribute('fill');
        
        // Only increment coloredParts if this is a new part being colored
        if ((currentFill === 'transparent' || currentFill === 'none') && !isAntennae) {
          part.setAttribute('fill', selectedColor);
          coloredParts++;
          console.log('Parts colored:', coloredParts, 'of', totalParts); // Debug log
        } else {
          // Just update the color without incrementing
          part.setAttribute('fill', selectedColor);
        }
        
        // Check if all parts are colored (excluding antennae)
        if (coloredParts >= totalParts) {
          console.log('All parts colored, validating...'); // Debug log
          validateColoring();
        }
      });
    });

    function saveScoreToDB(score) {
      fetch('ten.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'save_score=1&score=' + encodeURIComponent(score)
      })
      .then(response => response.text())
      .then(data => {
        console.log('Score save response:', data);
      })
      .catch(error => {
        console.error('Error saving score:', error);
      });
    }

    function showFinalScore() {
      const score = parseInt(localStorage.getItem('activityScore') || '0');
      const overlay = document.getElementById('finalScoreOverlay');
      const scoreDisplay = document.getElementById('finalScoreDisplay');
      
      scoreDisplay.textContent = score;
      overlay.style.display = 'flex';
      
      // Redirect after 5 seconds
      setTimeout(() => {
        window.location.href = 'next_step.php';
      }, 5000);
    }

    function validateColoring() {
      let isCorrect = true;
      const referenceParts = document.querySelectorAll('.reference-container .butterfly-part');
      const userParts = document.querySelectorAll('.drawing-container .butterfly-part');

      console.log('Starting validation...'); // Debug log
      console.log('Reference parts:', referenceParts.length); // Debug log
      console.log('User parts:', userParts.length); // Debug log

      // Compare each part except antennae
      for (let i = 0; i < referenceParts.length; i++) {
        const refPart = referenceParts[i];
        const userPart = userParts[i];
        
        // Skip antennae in validation
        if (refPart.getAttribute('data-part') === 'antennae') {
          continue;
        }

        const referenceColor = refPart.getAttribute('fill');
        const userColor = userPart.getAttribute('fill');

        console.log(`Comparing part ${i}:`, referenceColor, userColor); // Debug log

        if (referenceColor !== userColor) {
          isCorrect = false;
          console.log('Mismatch found at part', i); // Debug log
          break;
        }
      }

      console.log('Validation result:', isCorrect); // Debug log

      if (isCorrect) {
        showPopup('Perfect! Your butterfly matches the reference! 🎉', '#4caf50');
        if (!hasScored) {
          // Add score and save to database
          let score = parseInt(localStorage.getItem('activityScore') || '0') + 1;
          localStorage.setItem('activityScore', score);
          hasScored = true;

          // Save score to DB immediately
          saveScoreToDB(score);
          
          // Show final score
          setTimeout(() => {
            showFinalScore();
          }, 1500);
        }
      } else {
        showPopup('Not quite right! Try to match the colors exactly! 💪', '#ff9800');
        // Reset the coloring
        document.querySelectorAll('.drawing-container .butterfly-part').forEach(part => {
          if (part.getAttribute('data-part') === 'antennae') {
            part.setAttribute('fill', 'none');
          } else {
            part.setAttribute('fill', 'transparent');
          }
        });
        coloredParts = 0;
      }
    }

    function showPopup(message, color) {
      const popup = document.getElementById('popupMessage');
      popup.textContent = message;
      popup.style.color = color;
      popup.classList.add('show');
      
      setTimeout(() => {
        popup.classList.remove('show');
      }, 2000);
    }

    function playInstructions() {
      const instructionSound = document.getElementById('instructionSound');
      instructionSound.play();
      showPopup('🎧 Listening to instructions...', '#9c27b0');
    }

    function goHome() {
      window.location.href = 'index.html';
    }

    function openSettings() {
      showPopup('Opening settings...', '#2196f3');
    }

    function goBack() {
      window.history.back();
    }

    // Initialize - make sure antennae are properly initialized
    window.onload = function() {
      setTimeout(() => {
        playInstructions();
      }, 500);

      // Initialize antennae with 'none' fill and reset colored parts count
      coloredParts = 0;
      document.querySelectorAll('.drawing-container .butterfly-part').forEach(part => {
        if (part.getAttribute('data-part') === 'antennae') {
          part.setAttribute('fill', 'none');
        } else {
          part.setAttribute('fill', 'transparent');
        }
      });
    };
  </script>
</body>
</html>