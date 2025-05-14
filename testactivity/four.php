<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Choose the Similar Picture</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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

    .target-image {
      width: 200px;
      height: 200px;
      border-radius: 20px;
      margin: 0 auto 30px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.15);
      padding: 10px;
      background-color: #ffffff;
      position: relative;
    }

    .target-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 15px;
    }

    .target-image::after {
      position: absolute;
      bottom: -25px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 1rem;
      color: #6b5ce7;
      background: rgba(255,255,255,0.8);
      padding: 5px 15px;
      border-radius: 15px;
      white-space: nowrap;
    }

    .image-container {
      display: flex;
      gap: 40px;
      justify-content: center;
      margin-top: 50px;
      flex-wrap: wrap;
    }

    .image-box {
      width: 160px;
      height: 160px;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
      position: relative;
      overflow: hidden;
      background-color: #ffffff;
      padding: 8px;
      perspective: 1000px;
    }

    .image-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 14px;
      transition: transform 0.5s;
    }

    .image-box::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg,
        rgba(255,255,255,0.2),
        rgba(255,255,255,0));
      pointer-events: none;
      border-radius: 20px;
    }

    .image-box:hover {
      transform: translateY(-8px) scale(1.05);
      box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .image-box:active {
      transform: scale(0.95);
    }

    .image-box.selected {
      box-shadow: 0 0 0 4px #6b5ce7, 0 15px 30px rgba(0,0,0,0.15);
      transform: translateY(-8px) scale(1.05);
    }

    .image-box.matched {
      animation: pulse 1s infinite;
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 0 0 rgba(107, 92, 231, 0.7); }
      70% { box-shadow: 0 0 0 10px rgba(107, 92, 231, 0); }
      100% { box-shadow: 0 0 0 0 rgba(107, 92, 231, 0); }
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

    @keyframes sparkle {
      0% { transform: scale(0); opacity: 0; }
      50% { transform: scale(1.5); opacity: 1; }
      100% { transform: scale(0); opacity: 0; }
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
    <h1>Find the matching picture!</h1>

    <!-- Target image at the top -->
    <div class="target-image">
      <img src="../images/dog.avif" alt="Target Image" id="targetImg">
    </div>

    <!-- Options below -->
    <div class="image-container">
      <div class="image-box" onclick="checkMatch('img1')" id="box1">
        <img src="../images/dog.avif" alt="Match Option 1" id="img1">
      </div>
      <div class="image-box" onclick="checkMatch('img2')" id="box2">
        <img src="../images/butterfly.png" alt="Match Option 2" id="img2">
      </div>
    </div>
  </div>

  <!-- Popup message -->
  <div class="popup" id="popupMessage">Great job! You found the matching picture! 🎉</div>

  <script>
    const popup = document.getElementById("popupMessage");
    const targetImg = document.getElementById("targetImg");

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

    function checkMatch(imageId) {
      const boxId = imageId === 'img1' ? 'box1' : 'box2';
      const box = document.getElementById(boxId);
      const img = document.getElementById(imageId);

      // Check if the selected image matches the target image
      if (img.src === targetImg.src) {
        // Add mark for correct answer without showing feedback
        let score = parseInt(localStorage.getItem('activityScore') || '0', 10);
        localStorage.setItem('activityScore', score + 1);
      }
      
      // Proceed to next activity after a delay, without showing feedback
      setTimeout(() => {
        window.location.href = 'fifth.php';
      }, 1500);
    }

    function skipActivity() {
    showPopup("Skipped this one! ⏭", '#ff9800');

    // Add a slight delay before loading the next activity
    setTimeout(() => {
        window.location.href = 'fifth.php'; // Ensure this path is correct
    }, 1000);
}
function goHome() {
    showPopup("Going to home...", '#ff9800');

    // Add a slight delay before navigating to the home page
    setTimeout(() => {
        window.location.href = 'index.php'; // Ensure this path is correct
    }, 1000);
}

function goBack() {
    showPopup("Going back...", '#ff9800');

    // Add a slight delay before navigating back
    setTimeout(() => {
        window.history.back();
    }, 1000);
}


  </script>
</body>
</html>
