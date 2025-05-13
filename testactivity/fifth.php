<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Click and Drag Real Images</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

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

    .drag-area {
      display: flex;
      gap: 60px;
      margin: 40px 0;
      align-items: center;
      justify-content: center;
    }

    #ball {
      width: 120px;
      cursor: grab;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      filter: drop-shadow(0 10px 15px rgba(0,0,0,0.15));
    }

    #ball:hover {
      transform: scale(1.05) rotate(5deg);
    }

    #ball:active {
      transform: scale(1.1) rotate(-5deg);
      cursor: grabbing;
    }

    #basket {
      width: 180px;
      height: 180px;
      border: 3px dashed #6c7b95;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgba(255,255,255,0.3);
      transition: all 0.3s ease;
      box-shadow: 0 10px 20px rgba(0,0,0,0.05),
                  inset 0 0 10px rgba(108, 123, 149, 0.1);
    }

    #basket:hover {
      background-color: rgba(255,255,255,0.5);
      border-color: #4f7cac;
    }

    #basket img {
      width: 90%;
      height: auto;
      pointer-events: none;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }

    #basket:hover img {
      opacity: 1;
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


  <!-- Decorative shapes -->
  <div class="shape circle-1"></div>
  <div class="shape square-1"></div>
  <div class="shape triangle-1"></div>
  <div class="shape circle-2"></div>
  <div class="shape square-2"></div>
  <div class="shape triangle-2"></div>

  <div class="game-container">
    <h2>Click and Drag</h2>
    <p id="instruction"><strong>Instruction:</strong> Drag the ball into the basket.</p>

    <div class="drag-area">
      <img id="ball" src="../images/ball.png" draggable="true" alt="Ball">
      <div id="basket">
        <img src="../images/basket.png" alt="Basket">
      </div>
    </div>
  </div>

  <!-- Popup message -->
  <div class="popup" id="popupMessage">Let's get started! 🎯</div>

  <script>
    const ball = document.getElementById("ball");
    const basket = document.getElementById("basket");
    const popup = document.getElementById("popupMessage");
    let droppedSuccessfully = false;

    // Show startup popup
    showPopup("Let's get started! 🎯", "#ff6f61");

    ball.addEventListener("dragstart", function (e) {
      e.dataTransfer.setData("text/plain", "ball");
      droppedSuccessfully = false;
    });

    basket.addEventListener("dragover", function (e) {
      e.preventDefault();
      basket.style.backgroundColor = "rgba(255,255,255,0.6)";
      basket.style.borderColor = "#4caf50";
    });

    basket.addEventListener("dragleave", function (e) {
      basket.style.backgroundColor = "rgba(255,255,255,0.3)";
      basket.style.borderColor = "#6c7b95";
    });

    basket.addEventListener("drop", function (e) {
      e.preventDefault();
      const data = e.dataTransfer.getData("text");
      if (data === "ball") {
        ball.style.display = "none";
        showPopup("Well done! You moved the ball into the basket! 🏀✅", "#4caf50");
        droppedSuccessfully = true;
        createConfetti();
        setTimeout(markSuccessAndNext, 2000);
      }
    });

    document.body.addEventListener("drop", function (e) {
      e.preventDefault();
      if (!droppedSuccessfully) {
        showPopup("Try again. Drag the ball into the basket. ❌", "#ff9800");
      }
    });

    document.body.addEventListener("dragover", function (e) {
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
      window.location.href = 'six.php';
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
        window.location.href = 'six.php'; // Ensure this path is correct
    }, 1000);
}

  </script>
</body>
</html>