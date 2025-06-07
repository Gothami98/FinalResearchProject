<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Learn with Us!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    @import url(https://fonts.googleapis.com/css?family=Pacifico);
    @import url(https://fonts.googleapis.com/css?family=Shadows+Into+Light);
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@700..900");

    html,
    body {
      padding: 0;
      margin: 0;
      font-family: 'Fredoka', 'Comic Neue', cursive;
      overflow-x: hidden;
    }

    .title {
      font-family: "Inter";
      font-weight: 900;
      font-size: 5vw;
      width: 60vw;
      margin: 0 20vw;
      line-height: 1.2em;
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
      width: 100%;
    }

    #sunny {
      background: #84aaf5;
      color: black;
      z-index: 201;
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
      transition: all 0.3s ease;
    }

    #sun:hover {
      transform: scale(1.1);
      box-shadow: 0px 0px 60px 20px rgba(255, 255, 255, 0.8);
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
      filter: drop-shadow(0 0 0.3rem rgba(255, 255, 255, 0.8));
      transition: filter 0.3s ease;
    }

    .cloud:hover {
      filter: drop-shadow(0 0 0.5rem rgba(255, 255, 255, 1));
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

    /* Enhanced Header Styling */
    .cartoon-header {
      position: relative;
      text-align: center;
      margin-bottom: 2rem;
      z-index: 10;
    }

    .cartoon-header .cloud {
      position: absolute;
      top: -20px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 2rem;
      animation: float 3s ease-in-out infinite;
      z-index: -1;
    }

    @keyframes float {
      0%, 100% { transform: translateX(-50%) translateY(0px); }
      50% { transform: translateX(-50%) translateY(-10px); }
    }

    h1 {
      font-family: 'Fredoka', cursive;
      font-weight: 700;
      font-size: clamp(2.5rem, 6vw, 4rem);
      background: linear-gradient(135deg, #ff6f61, #ff9068, #ffb347);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      animation: titleGlow 2s ease-in-out infinite alternate;
      margin-bottom: 1rem;
      position: relative;
      margin-top: 0;
      margin-bottom: 0.5rem;
    }

    @keyframes titleGlow {
      0% { filter: drop-shadow(0 0 5px rgba(255, 111, 97, 0.5)); }
      100% { filter: drop-shadow(0 0 15px rgba(255, 111, 97, 0.8)); }
    }

    /* Enhanced Main Container */
    .main-container {
      max-width: 900px;
      margin: 0 auto;
      padding: 0 20px;
      position: relative;
      z-index: 10;
    }

    /* Enhanced Paragraph Box with New Design */
    .paragraph-box {
      background: linear-gradient(145deg, #ffffff 0%, #f8f9ff 50%, #e8f4fd 100%);
      border-radius: 30px;
      padding: 35px 40px;
      box-shadow: 
        0 15px 35px rgba(132, 170, 245, 0.15),
        0 5px 15px rgba(0, 0, 0, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.8),
        inset 0 -1px 0 rgba(132, 170, 245, 0.1);
      min-height: 220px;
      font-size: 1.3rem;
      font-weight: 500;
      line-height: 1.7;
      white-space: pre-wrap;
      animation: floatUp 1.2s ease-out;
      position: relative;
      backdrop-filter: blur(10px);
      border: 3px solid rgba(132, 170, 245, 0.2);
      color: #2c3e50;
      font-family: 'Fredoka', cursive;
      overflow: hidden;
    }

    .paragraph-box::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, 
        #ff6f61 0%, 
        #ffb347 25%, 
        #84aaf5 50%, 
        #a8e6cf 75%, 
        #ff6f61 100%);
      background-size: 200% 100%;
      animation: shimmer 3s ease-in-out infinite;
    }

    .paragraph-box::after {
      content: '📚';
      position: absolute;
      top: 20px;
      right: 25px;
      font-size: 2rem;
      animation: bookFloat 3s ease-in-out infinite;
      filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    /* Add decorative elements */
    .paragraph-box .decoration {
      position: absolute;
      font-size: 1.2rem;
      opacity: 0.6;
      animation: sparkle 4s ease-in-out infinite;
    }

    .paragraph-box .decoration:nth-child(1) {
      content: '⭐';
      top: 15px;
      left: 20px;
      animation-delay: 0s;
    }

    .paragraph-box .decoration:nth-child(2) {
      content: '🌟';
      bottom: 20px;
      right: 50px;
      animation-delay: 1s;
    }

    .paragraph-box .decoration:nth-child(3) {
      content: '✨';
      bottom: 50px;
      left: 30px;
      animation-delay: 2s;
    }

    @keyframes shimmer {
      0%, 100% { 
        background-position: 0% 0%;
        opacity: 0.7;
      }
      50% { 
        background-position: 100% 0%;
        opacity: 1;
      }
    }

    @keyframes bookFloat {
      0%, 100% { 
        transform: translateY(0px) rotate(0deg);
        opacity: 0.8;
      }
      50% { 
        transform: translateY(-8px) rotate(5deg);
        opacity: 1;
      }
    }

    @keyframes floatUp {
      0% { 
        opacity: 0; 
        transform: translateY(50px) scale(0.9) rotateX(10deg); 
      }
      60% {
        opacity: 0.8;
        transform: translateY(-10px) scale(1.02) rotateX(-2deg);
      }
      100% { 
        opacity: 1; 
        transform: translateY(0) scale(1) rotateX(0deg); 
      }
    }

    /* Enhanced Start Button */
    .start-btn {
      margin-top: 30px;
      font-size: 1.4rem;
      font-weight: 600;
      font-family: 'Fredoka', cursive;
      background: linear-gradient(135deg, #ff6f61, #ff9068);
      border: none;
      color: white;
      padding: 18px 40px;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: none;
      box-shadow: 
        0 10px 25px rgba(255, 111, 97, 0.3),
        0 3px 12px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .start-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s;
    }

    .start-btn:hover::before {
      left: 100%;
    }

    .start-btn:hover {
      background: linear-gradient(135deg, #ff3d33, #ff6f61);
      transform: translateY(-4px) scale(1.05);
      box-shadow: 
        0 15px 30px rgba(255, 111, 97, 0.4),
        0 5px 18px rgba(0, 0, 0, 0.2);
    }

    .start-btn:active {
      transform: translateY(-2px) scale(1.02);
    }

    /* Enhanced Animations */
    .animate-bounce {
      animation: enhancedBounce 1.5s ease forwards;
    }

    @keyframes enhancedBounce {
      0% {
        transform: scale(0.3) rotate(-10deg);
        opacity: 0;
      }
      50% {
        transform: scale(1.15) rotate(5deg);
        opacity: 0.8;
      }
      70% {
        transform: scale(0.95) rotate(-2deg);
        opacity: 1;
      }
      100% {
        transform: scale(1) rotate(0deg);
        opacity: 1;
      }
    }

    /* Enhanced Highlighted text during audio playback */
    .highlight {
      background: linear-gradient(120deg, #ffeb3b 0%, #fff176 100%);
      padding: 4px 8px;
      border-radius: 12px;
      transition: all 0.4s ease;
      box-shadow: 0 4px 12px rgba(255, 235, 59, 0.4);
      animation: gentlePulse 2s ease-in-out infinite;
      position: relative;
    }

    @keyframes gentlePulse {
      0%, 100% { 
        transform: scale(1);
        box-shadow: 0 4px 12px rgba(255, 235, 59, 0.4);
      }
      50% { 
        transform: scale(1.01);
        box-shadow: 0 6px 18px rgba(255, 235, 59, 0.6);
      }
    }

    @keyframes sparkle {
      0%, 100% { 
        opacity: 0.4; 
        transform: rotate(0deg) scale(1); 
      }
      25% { 
        opacity: 0.8; 
        transform: rotate(90deg) scale(1.1); 
      }
      50% { 
        opacity: 1; 
        transform: rotate(180deg) scale(1.2); 
      }
      75% { 
        opacity: 0.8; 
        transform: rotate(270deg) scale(1.1); 
      }
    }

    /* Responsive Design Improvements */
    @media (max-width: 768px) {
      .paragraph-box {
        padding: 25px 30px;
        font-size: 1.15rem;
        border-radius: 25px;
      }
      
      .start-btn {
        font-size: 1.2rem;
        padding: 15px 30px;
        width: 100%;
        max-width: 320px;
      }
      
      h1 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
      }
      
      .main-container {
        padding: 0 15px;
      }
    }

    @media (max-width: 480px) {
      .paragraph-box {
        padding: 20px 25px;
        font-size: 1.05rem;
      }
      
      h1 {
        font-size: 2rem;
      }
    }

    /* Typing Cursor Animation */
    .typing-cursor {
      display: inline-block;
      width: 3px;
      height: 1.3em;
      background: linear-gradient(45deg, #ff6f61, #ff9068);
      animation: cursorBlink 1.2s infinite;
      border-radius: 2px;
      margin-left: 2px;
    }

    @keyframes cursorBlink {
      0%, 50% { opacity: 1; }
      51%, 100% { opacity: 0; }
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

    <div class="main-container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-lg-10">
          <div id="para1" class="paragraph-box text-center">
            <div class="decoration">⭐</div>
            <div class="decoration">🌟</div>
            <div class="decoration">✨</div>
          </div>
          <div class="text-center">
            <button id="startButton" class="start-btn" onclick="navigateToDashboard()">
              🚀 Let's Start Learning!
            </button>
          </div>
          
          <!-- Audio elements -->
          <audio id="startSound" preload="auto">
            <source src="Audio/button-2-214383.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
          <audio id="instructionsAudio" preload="auto">
            <source src="Audio/Instruction-audio.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Enhanced Audio Script -->
  <script>
    const paragraphs = [
      "Let's begin by testing your child's knowledge. Our goal is to provide them with the right support and guidance as they navigate through these questions. By doing so, we aim to help them understand the concepts better and ensure they can answer confidently and successfully. After this test, we will assess their current level and tailor the upcoming sessions accordingly to match their learning needs and help them progress further."
    ];

    let isAudioPlaying = false;
    let currentAudio = null;

    // Create synthetic button sound using Web Audio API
    function createButtonSound() {
      try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.type = 'sine';
        oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
        oscillator.frequency.exponentialRampToValueAtTime(400, audioContext.currentTime + 0.1);
        
        gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 0.1);
      } catch (error) {
        console.log('Web Audio API not supported, using silent fallback');
      }
    }

    // Play audio automatically when text starts typing
    function playAudioWithText() {
      const audio = document.getElementById('instructionsAudio');
      const textElement = document.getElementById('para1');
      
      // Check if audio file exists/loads
      audio.addEventListener('loadstart', function() {
        console.log('Audio loading started...');
      });

      audio.addEventListener('canplay', function() {
        console.log('Audio can start playing');
      });

      audio.addEventListener('error', function(e) {
        console.log('Audio file not found, using text-to-speech instead');
        // Fallback to text-to-speech if audio file fails
        setTimeout(() => speakWithTTS(), 800);
      });

      // Try to start playing audio
      audio.play().then(() => {
        isAudioPlaying = true;
        currentAudio = audio;
        
        // Add highlight effect during playback
        textElement.classList.add('highlight');
        
      }).catch(error => {
        console.log('Audio playback failed, using text-to-speech instead');
        // Fallback to text-to-speech
        setTimeout(() => speakWithTTS(), 800);
      });

      // When audio ends
      audio.addEventListener('ended', function() {
        stopAudio();
      });
    }

    function stopAudio() {
      if (currentAudio) {
        currentAudio.pause();
        currentAudio.currentTime = 0;
      }
      
      // Cancel text-to-speech if running
      window.speechSynthesis.cancel();
      
      isAudioPlaying = false;
      currentAudio = null;
      
      const textElement = document.getElementById('para1');
      textElement.classList.remove('highlight');
    }

    // Improved text-to-speech function with better voice selection
    function speakWithTTS() {
      window.speechSynthesis.cancel();
      
      // Wait for voices to load
      const initSpeech = () => {
        const textChunks = paragraphs[0].split('. ').map(chunk => chunk.trim() + '.');
        const textElement = document.getElementById('para1');
        
        let currentChunk = 0;
        isAudioPlaying = true;
        
        textElement.classList.add('highlight');
        
        function speakNextChunk() {
          if (currentChunk < textChunks.length && isAudioPlaying) {
            const utterance = new SpeechSynthesisUtterance(textChunks[currentChunk]);
            
            utterance.rate = 0.65;  // Slower speech rate
            utterance.pitch = 1.1;
            utterance.volume = 0.8;
            
            // Better voice selection
            const voices = window.speechSynthesis.getVoices();
            const preferredVoice = voices.find(voice => 
              (voice.name.toLowerCase().includes('female') ||
               voice.name.toLowerCase().includes('woman') ||
               voice.name.toLowerCase().includes('google') ||
               voice.name.toLowerCase().includes('natural')) &&
              voice.lang.startsWith('en')
            ) || voices.find(voice => voice.lang.startsWith('en')) || voices[0];
            
            if (preferredVoice) {
              utterance.voice = preferredVoice;
            }
            
            utterance.onend = function() {
              currentChunk++;
              if (currentChunk < textChunks.length && isAudioPlaying) {
                setTimeout(speakNextChunk, 400); // Slightly longer pause between sentences
              } else {
                stopAudio();
              }
            };
            
            utterance.onerror = function(e) {
              console.log('Speech synthesis error:', e);
              stopAudio();
            };
            
            window.speechSynthesis.speak(utterance);
          }
        }
        
        speakNextChunk();
      };
      
      // Ensure voices are loaded
      if (window.speechSynthesis.getVoices().length > 0) {
        initSpeech();
      } else {
        window.speechSynthesis.onvoiceschanged = function() {
          initSpeech();
        };
      }
    }

    function typeText(elementId, text, delay = 0, onComplete = null) {
      const element = document.getElementById(elementId);
      
      // Preserve decorative elements
      const decorations = element.querySelectorAll('.decoration');
      element.innerHTML = '';
      decorations.forEach(dec => element.appendChild(dec));
      
      let i = 0;
      let cursor = document.createElement('span');
      cursor.className = 'typing-cursor';
      element.appendChild(cursor);
      
      setTimeout(() => {
        const interval = setInterval(() => {
          if (i < text.length) {
            // Insert character before cursor
            const textNode = document.createTextNode(text.charAt(i));
            element.insertBefore(textNode, cursor);
            i++;
          } else {
            clearInterval(interval);
            // Remove cursor after typing is complete
            cursor.remove();
            if (onComplete) onComplete();
          }
        }, 80); // Much slower typing speed (was 40ms, now 80ms)
      }, delay);
    }

    function playSound() {
      const sound = document.getElementById("startSound");
      
      // Try to play the audio file first
      sound.play().then(() => {
        console.log('Button sound played successfully');
      }).catch(e => {
        console.log('Audio file not available, creating synthetic sound');
        // Use synthetic sound as fallback
        createButtonSound();
      });
    }

    function navigateToDashboard() {
      playSound();
      // Add a fun click effect
      const btn = document.getElementById("startButton");
      btn.style.transform = "scale(0.95)";
      setTimeout(() => {
        btn.style.transform = "";
      }, 150);
      
      // Replace with your actual navigation
      window.location.href = 'testactivity/first.php';
      console.log('Navigating to dashboard...');
    }

    function showStartButton() {
      const btn = document.getElementById("startButton");
      btn.style.display = "inline-block";
      btn.classList.add("animate-bounce");
    }

    function initializePage() {
      // Much slower but more readable typing speed
      typeText("para1", paragraphs[0], 800, showStartButton);
      
      // Sync audio after more text appears to match slower typing
      setTimeout(() => {
        playAudioWithText();
      }, 800);
    }

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
      initializePage();
    });

    // Enhanced sun movement animation
    const sun = document.getElementById("sun");
    let mouseX = 0;
    let mouseY = 0;
    let sunX = 0;
    let sunY = 0;

    const handleMove = (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
    };

    function animateSun() {
      const targetX = (mouseX / window.innerWidth) * (window.innerWidth - 200) - 100;
      const targetY = window.innerHeight - (mouseY / window.innerHeight) * window.innerHeight - 220;
      
      sunX += (targetX - sunX) * 0.1;
      sunY += (targetY - sunY) * 0.1;
      
      sun.style.left = `${sunX}px`;
      sun.style.bottom = `${Math.max(20, sunY)}px`;
      
      requestAnimationFrame(animateSun);
    }

    document.onmousemove = handleMove;
    document.ontouchmove = (e) => handleMove(e.touches[0]);
    animateSun();

    // Enhanced cloud animation with variety
    const clouds = document.getElementById("clouds");
    const cloudSizes = [0.6, 0.8, 1.0, 1.2];
    const cloudOpacities = [0.4, 0.5, 0.6, 0.7, 0.8];

    for (var i = 0; i < 8; i++) {
      const cloud = document.createElement("div");
      cloud.classList.add("cloud");
      
      const randomSize = cloudSizes[Math.floor(Math.random() * cloudSizes.length)];
      const randomOpacity = cloudOpacities[Math.floor(Math.random() * cloudOpacities.length)];
      
      cloud.style.top = `${Math.floor(Math.random() * 70 + 10)}vh`;
      cloud.style.opacity = randomOpacity;
      cloud.style.transform = `scale(${randomSize})`;
      cloud.style.animationDelay = `${Math.floor(Math.random() * 20)}s`;
      cloud.style.animationDuration = `${Math.random() * (30 - 20) + 20}s`;
      
      clouds.appendChild(cloud);
    }
  </script>

</body>
</html>