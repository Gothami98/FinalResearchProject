<<<<<<< HEAD
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
=======
>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<<<<<<< HEAD
  <title>Color the Butterfly</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css" />
=======
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

>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15

  <style>
    body {
      margin: 0;
<<<<<<< HEAD
      font-family: 'Baloo 2', cursive;
      background: linear-gradient(135deg, #a8edea, #fed6e3);
=======
      font-family: 'Baloo 2', 'Fredoka One', cursive;
      background: linear-gradient(135deg, #a8edea, #fed6e3);
      text-align: center;
>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15
      min-height: 100vh;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
<<<<<<< HEAD
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
=======
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
      background-color: #e8f5e8;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15
    }

    .color-palette {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .color-option {
<<<<<<< HEAD
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
=======
      width: 60px;
      height: 60px;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Fredoka One', cursive;
      font-size: 1.8rem;
      color: white;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      position: relative;
      border: 3px solid transparent;
    }

    .color-option:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0,0,0,0.3);
    }

    .color-option.selected {
      transform: scale(1.1);
      border: 3px solid #fff;
      box-shadow: 0 0 0 3px #6b5ce7, 0 8px 15px rgba(0,0,0,0.3);
    }

    .apple-part {
      position: absolute;
      background-color: transparent;
      stroke: black;
      stroke-width: 3;
      fill: transparent;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .apple-part:hover {
      stroke-width: 4;
      filter: brightness(1.1);
    }

    .apple-part[data-filled="true"] {
      stroke-width: 2;
>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15
    }

    .popup {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
<<<<<<< HEAD
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

=======
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
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: #ffeb3b;
      box-shadow: 0 0 15px 3px rgba(255, 235, 59, 0.8);
      pointer-events: none;
      opacity: 0;
      z-index: 100;
      animation: sparkle 1s ease-in-out forwards;
    }

    /* Decorative elements */
    .decoration {
      position: absolute;
      z-index: -1;
      opacity: 0.1;
      pointer-events: none;
      animation: float 6s infinite ease-in-out;
    }

    .apple-icon {
      font-size: 2rem;
      color: #ff6b6b;
      top: 10%;
      left: 10%;
      animation-delay: 0s;
    }

    .leaf-icon {
      font-size: 2.5rem;
      color: #4caf50;
      top: 20%;
      right: 15%;
      animation-delay: 1s;
    }

    .fruit-icon {
      font-size: 2rem;
      color: #ffa726;
      bottom: 15%;
      left: 20%;
      animation-delay: 2s;
    }

    .apple-icon-2 {
      font-size: 1.8rem;
      color: #ffeb3b;
      bottom: 25%;
      right: 10%;
      animation-delay: 3s;
    }

    .leaf-icon-2 {
      font-size: 2.2rem;
      color: #8bc34a;
      top: 70%;
      left: 25%;
      animation-delay: 4s;
    }

    .fruit-icon-2 {
      font-size: 1.5rem;
      color: #ff9800;
      bottom: 10%;
      right: 20%;
      animation-delay: 5s;
    }

    @keyframes sparkle {
      0% { transform: scale(0); opacity: 0; }
      50% { transform: scale(2); opacity: 1; }
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


  </style>
</head>
<body>



<button class="instruction-button" onclick="playInstructions()">
  <i class="fas fa-volume-up"></i>Instructions
</button>

<audio id="instructionSound" src="../Audio/10.mp3"></audio>
>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15
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

<<<<<<< HEAD
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
=======
  <!-- Skip button -->
    <button class="skip-fixed" onclick="skipActivity()"><i class="fas fa-forward"></i>Skip</button>

  <!-- Decorative elements -->
  <i class="fas fa-apple-alt apple-icon decoration"></i>
  <i class="fas fa-leaf leaf-icon decoration"></i>
  <i class="fas fa-apple-alt fruit-icon decoration"></i>
  <i class="fas fa-apple-alt apple-icon-2 decoration"></i>
  <i class="fas fa-leaf leaf-icon-2 decoration"></i>
  <i class="fas fa-apple-alt fruit-icon-2 decoration"></i>

  <div class="game-container">
    <h1>COLOR THE APPLE</h1>

    <div class="drawing-container">
      <div class="drawing-area">
        <!-- Apple SVG -->
        <svg width="100%" height="100%" viewBox="0 0 300 300">
          <!-- Apple Body - Red -->
          <path id="apple-body" class="apple-part" data-color="red" 
                d="M150,90 C180,90 200,110 200,140 C200,180 190,210 170,230 C160,240 150,245 150,245 C150,245 140,240 130,230 C110,210 100,180 100,140 C100,110 120,90 150,90 Z" />
          
          <!-- Apple Indent (top dimple) - Red -->
          <path id="apple-indent" class="apple-part" data-color="red" 
                d="M135,95 C140,85 145,88 150,92 C155,88 160,85 165,95 C160,90 155,90 150,95 C145,90 140,90 135,95 Z" />
          
          <!-- Left Leaf - Green (pre-colored) -->
          <path id="left-leaf" class="apple-part" data-color="green" 
                d="M140,85 C130,80 125,75 130,70 C135,65 145,70 150,75 C145,80 140,85 140,85 Z" />
          
          <!-- Right Leaf - Green (pre-colored) -->
          <path id="right-leaf" class="apple-part" data-color="green" 
                d="M160,85 C170,80 175,75 170,70 C165,65 155,70 150,75 C155,80 160,85 160,85 Z" />
          
          <!-- Stem - Brown -->
          <rect id="stem" class="apple-part" data-color="brown" 
                x="148" y="70" width="4" height="15" rx="2" />
>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15
        </svg>
      </div>
    </div>

    <div class="color-palette">
<<<<<<< HEAD
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
=======
      <div class="color-option" style="background-color: #e53e3e;" data-color="red" onclick="selectColor('red')">
        <i class="fas fa-apple-alt"></i>
      </div>
      <div class="color-option" style="background-color: #38a169;" data-color="green" onclick="selectColor('green')">
        <i class="fas fa-leaf"></i>
      </div>
    </div>
  </div>

  <!-- Popup message -->
  <div class="popup" id="popupMessage">Great job! You colored it correctly! 🍎</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Define color mappings
    const colorMap = {
      red: '#e53e3e',    // Red (Apple Body)
      green: '#38a169',  // Green (Leaves) - Default
      brown: '#8b4513'   // Brown (Stem)
    };

    let selectedColor = null;
    let completedParts = 0;
    const totalParts = document.querySelectorAll('.apple-part').length;
    const popup = document.getElementById("popupMessage");

    // Initialize with leaves already colored green and stem brown
    function initializeApple() {
      const leaves = document.querySelectorAll('#left-leaf, #right-leaf');
      const stem = document.querySelector('#stem');
      
      leaves.forEach(leaf => {
        leaf.style.fill = colorMap.green;
        leaf.setAttribute('data-filled', 'true');
        completedParts++;
      });
      
      stem.style.fill = colorMap.brown;
      stem.setAttribute('data-filled', 'true');
      completedParts++;
    }

    // Initialize apple parts - no numbers needed
    document.querySelectorAll('.apple-part').forEach(part => {
      // Add click event to fill with selected color
      part.addEventListener('click', () => colorPart(part));
    });

    function selectColor(colorName) {
      // Deselect previous
>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15
      document.querySelectorAll('.color-option').forEach(option => {
        option.classList.remove('selected');
      });
      
<<<<<<< HEAD
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
=======
      // Select new color
      selectedColor = colorName;
      document.querySelector(`[data-color="${colorName}"]`).classList.add('selected');
      
      const colorNames = {red: 'Red', green: 'Green'};
      showPopup(`${colorNames[colorName]} selected!`, colorMap[colorName]);
    }

    function colorPart(part) {
      if (!selectedColor) {
        showPopup("Please select a color first!", '#ff9800');
        return;
      }
      
      const correctColor = part.getAttribute('data-color');
      const isAlreadyFilled = part.getAttribute('data-filled') === 'true';
      
      // Skip if it's leaves or stem (already colored)
      if (correctColor === 'green' || correctColor === 'brown') {
        showPopup("This part is already colored!", '#2196f3');
        return;
      }
      
      if (selectedColor === correctColor) {
        if (!isAlreadyFilled) {
          // Correct coloring
          part.style.fill = colorMap[selectedColor];
          part.setAttribute('data-filled', 'true');
          completedParts++;
          
          createSparkles(part);
          showPopup("Perfect! Beautiful apple! 🍎", '#4caf50');
          
          // Check if all parts are correctly colored
          checkCompletion();
        } else {
          showPopup("This part is already colored correctly!", '#2196f3');
        }
      } else {
        // Incorrect coloring - but for apple, only red is needed
        showPopup("Try the red color for the apple!", '#ff9800');
        
        // Add a shake effect
        part.style.animation = 'shake 0.5s ease-in-out';
        setTimeout(() => {
          part.style.animation = '';
        }, 500);
      }
    }

    function checkCompletion() {      
      if (completedParts === totalParts) {
        setTimeout(() => {
          showPopup("🎉 Amazing! You've completed the apple! 🍎✨", '#4caf50');
          
          // Add celebration sparkles
          createSparkles(document.querySelector('.drawing-area'));
          createSparkles(document.querySelector('.game-container'));
          
          // Mark success
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
      }, 3000);
    }

    function createSparkles(element) {
      for (let i = 0; i < 15; i++) {
        const sparkle = document.createElement('div');
        sparkle.classList.add('sparkle');

        // Random position within the element
        const rect = element.getBoundingClientRect();
        const x = Math.random() * rect.width;
        const y = Math.random() * rect.height;

        sparkle.style.left = `${x}px`;
        sparkle.style.top = `${y}px`;
        sparkle.style.animationDelay = `${Math.random() * 0.8}s`;

        element.appendChild(sparkle);

        // Remove sparkle after animation
        setTimeout(() => {
          sparkle.remove();
        }, 1200);
      }
    }

    function markSuccessAndNext() {
      let score = parseInt(localStorage.getItem('activityScore') || '0', 10);
      localStorage.setItem('activityScore', score + 1);
      
      setTimeout(() => {
        showPopup("Great job! Moving to next activity...", '#6b5ce7');
        setTimeout(() => {
          window.location.href = 'index.html';
        }, 1500);
      }, 2000);
    }

    function skipActivity() {
      showPopup("Skipping this activity...", '#ff9800');
      setTimeout(() => {
        window.location.href = 'index.html';
      }, 1500);
    }

    function goHome() {
      showPopup("Going to home...", '#4caf50');
      setTimeout(() => {
        window.location.href = 'index.html';
      }, 1500);
    }

    function openSettings() {
      showPopup("Opening settings...", '#ff9800');
      setTimeout(() => {
        alert("In a real app, this would open the settings panel.");
      }, 1500);
    }

    function goBack() {
      showPopup("Going back...", '#f44336');
      setTimeout(() => {
        window.history.back();
      }, 1500);
    }

    // Add shake animation for incorrect attempts
    const style = document.createElement('style');
    style.textContent = `
      @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
      }
    `;
    document.head.appendChild(style);

    // Initialize the game when page loads
    window.onload = function() {
      initializeApple();
      setTimeout(() => {
        selectColor('red'); // Auto-select red color
        showPopup("Click on the apple to color it red! 🍎", '#e53e3e');
      }, 1000);
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
>>>>>>> 0e7a33a307e4265aab82ebe484aefd8bb4d2cf15
  </script>
</body>
</html>