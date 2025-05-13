<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Learn with Us!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap" rel="stylesheet">

  <style>
    @import url(https://fonts.googleapis.com/css?family=Pacifico);
    @import url(https://fonts.googleapis.com/css?family=Shadows+Into+Light);
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@700..900");

    html,
    body {
      padding: 0;
      margin: 0;
      font-family: 'Comic Neue', cursive;
      overflow-x: hidden;
    }

    .title {
      font-family: "Inter";
      font-weight: 900;
      font-size: 5vw;
      width: 60vw;
      margin: 0 20vw;
      line-height: 2em;
    }

    .fancy-font {
      line-height: 1em;
      font-size: 1.5em;
    }

    .font-shadows {
      font-family: "Shadows Into Light";
      letter-spacing: 0.14em;
    }

    .font-pacifico {
      font-family: "Pacifico";
    }

    #sunny,
    #rainy {
      position: absolute;
      display: grid;
      place-items: center;
      overflow: hidden;
      height: 100vh;
      width: 100%; /* Ensure full width */
    }

    #sunny {
      background: #84aaf5;
      color: black;
      z-index: 201; /* Ensure it's on top */
    }

    #rainy {
      background: #001338;
      color: white;
      z-index: 101;
    }

    #sun,
    #moon {
      position: absolute;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background: white;
      opacity: 0.95;
      box-shadow: 0px 0px 40px 15px white;
      z-index: -2;
    }

    #sun {
      left: 6vw;
      filter: sepia(0.5);
    }

    #moon {
      right: 6vw;
    }

    .crater {
      background-color: lightgray;
      height: 25px;
      width: 25px;
      border-radius: 50%;
      position: relative;
    }

    .crater:before {
      content: "";
      position: absolute;
      height: 20px;
      width: 20px;
      border-radius: 50%;
      box-shadow: -5px 0 0 2px darkgray;
      top: 2px;
      left: 7px;
    }
    .crater:nth-child(1) {
      top: 15%;
      left: 55%;
      transform: scale(1.4);
    }
    .crater:nth-child(2) {
      top: 40%;
      left: 70%;
      transform: scale(1.3);
    }
    .crater:nth-child(3) {
      left: 20%;
      transform: scale(1);
    }
    .crater:nth-child(4) {
      left: 30%;
      top: 30%;
      transform: scale(1.8);
    }

    #rain {
      position: absolute;
      z-index: -1;
      inset: 0;
    }

    .drop {
      position: absolute;
      bottom: 100%;
      width: 2px;
      aspect-ratio: 1;
      border-radius: 50%;
      animation: drop 0.5s linear infinite;
    }

    .drop:after {
      position: absolute;
      top: -120px;
      height: 120px;
      width: 2px;
      background-color: inherit;
      content: "";
    }

    @keyframes drop {
      0% {
        bottom: 100%;
        opacity: 1;
      }
      75% {
        bottom: 10%;
        opacity: 1;
      }
      100% {
        bottom: -10%;
        opacity: 0;
      }
    }

    #clouds {
      position: absolute;
      z-index: -1;
      inset: 0;
    }

    .cloud {
      position: absolute;
      width: 150px;
      height: 150px;
      left: -200px;
      background-color: white;
      border-radius: 50%;
      animation: cloudMove linear infinite;
      filter: drop-shadow(0 0 0.2rem white);
    }

    .cloud:before,
    .cloud:after {
      content: "";
      border-radius: 50%;
      background: #fff;
      position: absolute;
    }

    .cloud:before {
      width: 70%;
      height: 70%;
      left: -30%;
      top: 30%;
    }

    .cloud:after {
      width: 80%;
      height: 80%;
      right: -35%;
      bottom: 0;
    }

    @keyframes cloudMove {
      0% {
        left: -200px;
      }
      100% {
        left: 110vw;
      }
    }

    h1 {
      font-size: 3rem;
      color: #ff6f61;
      animation: fadeInDown 1s ease-out;
    }

    .paragraph-box {
      background: #fff8dc;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      min-height: 200px;
      font-size: 1.25rem;
      white-space: pre-wrap;
      animation: fadeInDown 1s ease-out;
      position: relative;
    }

    .talking-human img {
      width: 100%;
      max-width: 250px;
      animation: fadeInDown 1s ease-out;
    }

    .start-btn {
      margin-top: 20px;
      font-size: 1.2rem;
      background-color: #ff6f61;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 12px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      display: none;
    }

    .start-btn:hover {
      background-color: #ff3d33;
    }

    .animate-bounce {
      animation: bounceIn 0.9s ease forwards;
    }

    @keyframes bounceIn {
      0% {
        transform: scale(0.5);
        opacity: 0;
      }
      60% {
        transform: scale(1.2);
        opacity: 1;
      }
      100% {
        transform: scale(1);
      }
    }

    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-30px); }
      100% { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div id="sunny">
    <div id="sun"></div>
    <div id="clouds"></div>
    <div class="cartoon-header">
      <div class="cloud">☁️</div>
      <h1 class="text-center">Welcome Little Explorers!</h1>
    </div>

    <div class="container ">
      <div class="row align-items-center">
        <div class="col-md-6 text-center talking-human">
          <img src="images/talkingto cat.png" alt="Talking Cartoon Human">
        </div>
        <div class="col-md-6">
          <div id="para1" class="paragraph-box"></div>
          <button id="startButton" class="start-btn" onclick="navigateToDashboard()">Let's Start</button>
          <button id="speakButton" class="start-btn" style="background-color: #4CAF50; margin-right: 10px;">Listen to Instructions</button>
          <audio id="startSound" src="Audio/button-2-214383.mp3"></audio>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Typing + Button Script -->
  <script>
    const paragraphs = [
      "Let's begin by testing your child's knowledge. Our goal is to provide them with the right support and guidance as they navigate through these questions. By doing so, we aim to help them understand the concepts better and ensure they can answer confidently and successfully. After this test, we will assess their current level and tailor the upcoming sessions accordingly to match their learning needs and help them progress further."
    ];

    // Split the text into smaller chunks
    const textChunks = paragraphs[0].split('. ').map(chunk => chunk + '.');

    // Text-to-speech function
    function speakText() {
      // Cancel any ongoing speech
      window.speechSynthesis.cancel();
      
      let currentChunk = 0;
      
      function speakNextChunk() {
        if (currentChunk < textChunks.length) {
          const utterance = new SpeechSynthesisUtterance(textChunks[currentChunk]);
          
          // Set voice properties
          utterance.rate = 0.8;
          utterance.pitch = 1.0;
          utterance.volume = 1.0;
          
          // Get available voices and set a female voice if available
          const voices = window.speechSynthesis.getVoices();
          const femaleVoice = voices.find(voice => voice.name.includes('Female') || voice.name.includes('female'));
          if (femaleVoice) {
            utterance.voice = femaleVoice;
          }
          
          // When this chunk is done, speak the next one
          utterance.onend = function() {
            currentChunk++;
            speakNextChunk();
          };
          
          // Speak the current chunk
          window.speechSynthesis.speak(utterance);
        }
      }
      
      // Start speaking the first chunk
      speakNextChunk();
    }

    function typeText(elementId, text, delay = 0, onComplete = null) {
      const element = document.getElementById(elementId);
      // Clear any existing text
      element.textContent = '';
      let i = 0;
      setTimeout(() => {
        const interval = setInterval(() => {
          if (i < text.length) {
            element.textContent += text.charAt(i);
            i++;
          } else {
            clearInterval(interval);
            if (onComplete) onComplete();
          }
        }, 30);
      }, delay);
    }

    function playSound() {
      const sound = document.getElementById("startSound");
      sound.play();
    }

    function navigateToDashboard() {
      window.location.href = 'testactivity/first.php';
    }

    // Show button after typing
    function showStartButton() {
      const btn = document.getElementById("startButton");
      const speakBtn = document.getElementById("speakButton");
      btn.style.display = "inline-block";
      speakBtn.style.display = "inline-block";
      btn.classList.add("animate-bounce");
      speakBtn.classList.add("animate-bounce");
    }

    // Initialize speech synthesis
    function initializeSpeech() {
      // Start animation
      typeText("para1", paragraphs[0], 500, showStartButton);
      
      // Add click handler for speak button
      document.getElementById("speakButton").addEventListener("click", function() {
        speakText();
      });
    }

    // Wait for voices to be loaded
    if (window.speechSynthesis) {
      window.speechSynthesis.onvoiceschanged = initializeSpeech;
      if (window.speechSynthesis.getVoices().length > 0) {
        initializeSpeech();
      }
    } else {
      console.error("Speech synthesis not supported");
      typeText("para1", paragraphs[0], 500, showStartButton);
    }

    const sun = document.getElementById("sun");

    const handleMove = (e) => {
      sun.style.bottom = `${
        (e.clientX / window.innerWidth) * window.innerHeight - sun.clientHeight - 20
      }px`;
    };

    document.onmousemove = (e) => handleMove(e);

    document.ontouchmove = (e) => handleMove(e.touches[0]);

    const clouds = document.getElementById("clouds");

    for (var i = 0; i < 6; i++) {
      const cloud = document.createElement("div");
      cloud.classList.add("cloud");
      cloud.style.top = `${Math.floor(Math.random() * (80 - 10) + 10)}vh`;
      cloud.style.opacity = `${Math.random() * (0.8 - 0.4) + 0.4}`;
      cloud.style.transform = `scale(${Math.random() * (1 - 0.4) + 0.4})`;
      cloud.style.animationDelay = `${Math.floor(Math.random() * 19)}s`;
      cloud.style.animationDuration = `${Math.random() * (25 - 19) + 19}s`;
      clouds.appendChild(cloud);
    }
  </script>

</body>
</html>
