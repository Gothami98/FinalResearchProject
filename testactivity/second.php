<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Identify the Sound - Dog Activity</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Bubblegum+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    body {
      margin: 0;
      font-family: 'Fredoka One', cursive;
      background: linear-gradient(135deg, #ffd2cc 0%, #a6e1ff 100%);
      text-align: center;
      min-height: 100vh;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      overflow-x: hidden;
      position: relative;
    }
    
    /* Decorative elements */
    .decoration {
      position: absolute;
      z-index: -1;
      opacity: 0.1;
      pointer-events: none;
    }
    
    .music-note {
      position: absolute;
      font-size: 2rem;
      color: #333;
      animation: float 6s infinite ease-in-out;
      opacity: 0.2;
    }
    
    .note-1 {
      top: 10%;
      left: 10%;
      animation-delay: 0s;
    }
    
    .note-2 {
      top: 20%;
      right: 15%;
      animation-delay: 1s;
      font-size: 2.5rem;
    }
    
    .note-3 {
      bottom: 15%;
      left: 20%;
      animation-delay: 2s;
      font-size: 1.8rem;
    }
    
    .note-4 {
      bottom: 25%;
      right: 10%;
      animation-delay: 3s;
    }
    
    .animal-track {
      position: absolute;
      font-size: 1.5rem;
      color: #333;
      opacity: 0.1;
      transform: rotate(var(--rotation, 0deg));
    }
    
    .track-1 {
      top: 15%;
      left: 25%;
      --rotation: 45deg;
    }
    
    .track-2 {
      top: 70%;
      right: 20%;
      --rotation: -15deg;
    }
    
    .track-3 {
      bottom: 10%;
      left: 10%;
      --rotation: 30deg;
    }
    
    .main-container {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 30px;
      padding: 30px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
      max-width: 800px;
      width: 90%;
      position: relative;
      overflow: hidden;
    }
    
    .main-container::before,
    .main-container::after {
      content: "";
      position: absolute;
      border-radius: 50%;
      z-index: 0;
    }
    
    .main-container::before {
      width: 150px;
      height: 150px;
      background-color: rgba(255, 230, 114, 0.2);
      top: -50px;
      right: -30px;
    }
    
    .main-container::after {
      width: 120px;
      height: 120px;
      background-color: rgba(114, 211, 255, 0.2);
      bottom: -40px;
      left: -40px;
    }

    h1 {
      font-size: 2.5rem;
      color: #ff5983;
      margin-bottom: 10px;
      animation: pulse 2s infinite alternate;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 1;
    }
    
    h1::after {
      content: "🔍";
      font-size: 0.7em;
      margin-left: 10px;
      animation: bounce 2s infinite alternate;
      display: inline-block;
    }

    .instruction {
      font-size: 1.3rem;
      margin-bottom: 25px;
      color: #333;
      animation: fadeIn 1.5s ease-in-out;
      padding: 10px 20px;
      background-color: rgba(255, 255, 255, 0.7);
      border-radius: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 1;
    }

    .sound-btn {
      padding: 15px 30px;
      font-size: 1.2rem;
      font-family: 'Bubblegum Sans', cursive;
      border: none;
      border-radius: 25px;
      background: linear-gradient(to right, #4caf50, #8bc34a);
      color: white;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
      z-index: 1;
    }
    
    .sound-btn::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 0%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.2);
      transition: width 0.3s ease;
    }
    
    .sound-btn:hover::before {
      width: 100%;
    }

    .sound-btn:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 10px 20px rgba(76, 175, 80, 0.4);
    }
    
    .sound-btn:active {
      transform: translateY(1px);
    }
    
    .sound-waves {
      display: none;
      justify-content: center;
      gap: 5px;
      margin-top: 15px;
    }
    
    .sound-waves.active {
      display: flex;
    }
    
    .wave {
      width: 5px;
      height: 20px;
      background-color: #4caf50;
      border-radius: 2px;
      animation: wave 1s infinite ease-in-out alternate;
    }
    
    .wave:nth-child(1) { animation-delay: 0.0s; }
    .wave:nth-child(2) { animation-delay: 0.1s; height: 30px; }
    .wave:nth-child(3) { animation-delay: 0.2s; height: 40px; }
    .wave:nth-child(4) { animation-delay: 0.3s; height: 30px; }
    .wave:nth-child(5) { animation-delay: 0.4s; }

    .image-options {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      margin-top: 30px;
      position: relative;
      z-index: 1;
    }

    .option {
      text-align: center;
      transition: all 0.3s;
      position: relative;
    }
    
    .option::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background: radial-gradient(circle, rgba(255,255,255,0.5) 0%, rgba(255,255,255,0) 70%);
      opacity: 0;
      transform: scale(0.8);
      transition: all 0.3s ease;
      z-index: -1;
      border-radius: 50%;
    }
    
    .option:hover::before {
      opacity: 1;
      transform: scale(1.2);
    }

    .option img {
      width: 160px;
      max-width: 30vw;
      border-radius: 20px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      transition: all 0.3s;
      cursor: pointer;
      border: 4px solid white;
    }

    .option img:hover {
      transform: scale(1.08);
      box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }

    .option.correct img {
      animation: correctAnswer 1s ease;
      box-shadow: 0 0 30px 10px rgba(76, 175, 80, 0.6);
      border-color: #4caf50;
    }

    .option.wrong img {
      animation: wrongAnswer 0.5s ease;
      box-shadow: 0 0 30px 10px rgba(244, 67, 54, 0.6);
      border-color: #f44336;
    }
    
    .option-label {
      margin-top: 10px;
      font-size: 1.2rem;
      color: #333;
      transition: all 0.3s;
    }
    
    .option:hover .option-label {
      transform: scale(1.1);
      color: #ff5983;
    }

    .nav-buttons {
      margin-top: 40px;
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
      position: relative;
      z-index: 1;
    }

    .nav-btn {
      padding: 12px 24px;
      font-size: 1.1rem;
      font-family: 'Bubblegum Sans', cursive;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.3s;
      position: relative;
      overflow: hidden;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .nav-btn::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 0%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.2);
      transition: width 0.3s ease;
    }
    
    .nav-btn:hover::before {
      width: 100%;
    }
    
    .nav-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
    
    .nav-btn:active {
      transform: translateY(1px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .nav-btn i {
      margin-right: 8px;
    }
    
    .skip-btn {
      background: linear-gradient(to right, #ff9800, #ffb74d);
      color: white;
    }
    
    .next-btn {
      background: linear-gradient(to right, #2196f3, #64b5f6);
      color: white;
    }
    
    .replay-btn {
      background: linear-gradient(to right, #9c27b0, #ba68c8);
      color: white;
    }

    .popup {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #ffffff;
      padding: 15px 30px;
      font-size: 1.3rem;
      border-radius: 25px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
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
      width: 33.33%;
      background: linear-gradient(to right, #ff9800, #ffb74d);
      border-radius: 10px;
      transition: width 0.5s ease;
    }
    
    .confetti {
      position: absolute;
      width: 10px;
      height: 10px;
      opacity: 0;
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

    /* Speaking animation for instruction button */
    .instruction-button.speaking {
      animation: speaking-pulse 0.8s infinite alternate;
    }

    @keyframes speaking-pulse {
      0% { 
        transform: translateY(-3px) scale(1);
        box-shadow: 0 10px 15px rgba(156, 39, 176, 0.3);
      }
      100% { 
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 25px rgba(156, 39, 176, 0.5);
      }
    }

    body {
      margin: 0;
      font-family: 'Fredoka One', cursive;
      background: linear-gradient(135deg, #ffd2cc 0%, #a6e1ff 100%);
      text-align: center;
      min-height: 100vh;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      overflow-x: hidden;
      position: relative;
    }
    
    /* Decorative elements */
    .decoration {
      position: absolute;
      z-index: -1;
      opacity: 0.1;
      pointer-events: none;
    }
    
    .music-note {
      position: absolute;
      font-size: 2rem;
      color: #333;
      animation: float 6s infinite ease-in-out;
      opacity: 0.2;
    }
    
    .note-1 {
      top: 10%;
      left: 10%;
      animation-delay: 0s;
    }
    
    .note-2 {
      top: 20%;
      right: 15%;
      animation-delay: 1s;
      font-size: 2.5rem;
    }
    
    .note-3 {
      bottom: 15%;
      left: 20%;
      animation-delay: 2s;
      font-size: 1.8rem;
    }
    
    .note-4 {
      bottom: 25%;
      right: 10%;
      animation-delay: 3s;
    }
    
    .animal-track {
      position: absolute;
      font-size: 1.5rem;
      color: #333;
      opacity: 0.1;
      transform: rotate(var(--rotation, 0deg));
    }
    
    .track-1 {
      top: 15%;
      left: 25%;
      --rotation: 45deg;
    }
    
    .track-2 {
      top: 70%;
      right: 20%;
      --rotation: -15deg;
    }
    
    .track-3 {
      bottom: 10%;
      left: 10%;
      --rotation: 30deg;
    }
    
    .main-container {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 30px;
      padding: 30px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
      max-width: 800px;
      width: 90%;
      position: relative;
      overflow: hidden;
    }
    
    .main-container::before,
    .main-container::after {
      content: "";
      position: absolute;
      border-radius: 50%;
      z-index: 0;
    }
    
    .main-container::before {
      width: 150px;
      height: 150px;
      background-color: rgba(255, 230, 114, 0.2);
      top: -50px;
      right: -30px;
    }
    
    .main-container::after {
      width: 120px;
      height: 120px;
      background-color: rgba(114, 211, 255, 0.2);
      bottom: -40px;
      left: -40px;
    }

    h1 {
      font-size: 2.5rem;
      color: #ff5983;
      margin-bottom: 10px;
      animation: pulse 2s infinite alternate;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 1;
    }
    
    h1::after {
      content: "🔍";
      font-size: 0.7em;
      margin-left: 10px;
      animation: bounce 2s infinite alternate;
      display: inline-block;
    }

    .instruction {
      font-size: 1.3rem;
      margin-bottom: 25px;
      color: #333;
      animation: fadeIn 1.5s ease-in-out;
      padding: 10px 20px;
      background-color: rgba(255, 255, 255, 0.7);
      border-radius: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 1;
    }

    .sound-btn {
      padding: 15px 30px;
      font-size: 1.2rem;
      font-family: 'Bubblegum Sans', cursive;
      border: none;
      border-radius: 25px;
      background: linear-gradient(to right, #4caf50, #8bc34a);
      color: white;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(76, 175, 80, 0.3);
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
      z-index: 1;
    }
    
    .sound-btn::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 0%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.2);
      transition: width 0.3s ease;
    }
    
    .sound-btn:hover::before {
      width: 100%;
    }

    .sound-btn:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 10px 20px rgba(76, 175, 80, 0.4);
    }
    
    .sound-btn:active {
      transform: translateY(1px);
    }
    
    .sound-waves {
      display: none;
      justify-content: center;
      gap: 5px;
      margin-top: 15px;
    }
    
    .sound-waves.active {
      display: flex;
    }
    
    .wave {
      width: 5px;
      height: 20px;
      background-color: #4caf50;
      border-radius: 2px;
      animation: wave 1s infinite ease-in-out alternate;
    }
    
    .wave:nth-child(1) { animation-delay: 0.0s; }
    .wave:nth-child(2) { animation-delay: 0.1s; height: 30px; }
    .wave:nth-child(3) { animation-delay: 0.2s; height: 40px; }
    .wave:nth-child(4) { animation-delay: 0.3s; height: 30px; }
    .wave:nth-child(5) { animation-delay: 0.4s; }

    .image-options {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      margin-top: 30px;
      position: relative;
      z-index: 1;
    }

    .option {
      text-align: center;
      transition: all 0.3s;
      position: relative;
    }
    
    .option::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background: radial-gradient(circle, rgba(255,255,255,0.5) 0%, rgba(255,255,255,0) 70%);
      opacity: 0;
      transform: scale(0.8);
      transition: all 0.3s ease;
      z-index: -1;
      border-radius: 50%;
    }
    
    .option:hover::before {
      opacity: 1;
      transform: scale(1.2);
    }

    .option img {
      width: 160px;
      max-width: 30vw;
      border-radius: 20px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      transition: all 0.3s;
      cursor: pointer;
      border: 4px solid white;
    }

    .option img:hover {
      transform: scale(1.08);
      box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }

    .option.correct img {
      animation: correctAnswer 1s ease;
      box-shadow: 0 0 30px 10px rgba(76, 175, 80, 0.6);
      border-color: #4caf50;
    }

    .option.wrong img {
      animation: wrongAnswer 0.5s ease;
      box-shadow: 0 0 30px 10px rgba(244, 67, 54, 0.6);
      border-color: #f44336;
    }
    
    .option-label {
      margin-top: 10px;
      font-size: 1.2rem;
      color: #333;
      transition: all 0.3s;
    }
    
    .option:hover .option-label {
      transform: scale(1.1);
      color: #ff5983;
    }

    .nav-buttons {
      margin-top: 40px;
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
      position: relative;
      z-index: 1;
    }

    .nav-btn {
      padding: 12px 24px;
      font-size: 1.1rem;
      font-family: 'Bubblegum Sans', cursive;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.3s;
      position: relative;
      overflow: hidden;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .nav-btn::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 0%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.2);
      transition: width 0.3s ease;
    }
    
    .nav-btn:hover::before {
      width: 100%;
    }
    
    .nav-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
    
    .nav-btn:active {
      transform: translateY(1px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
    
    .nav-btn i {
      margin-right: 8px;
    }
    
    .skip-btn {
      background: linear-gradient(to right, #ff9800, #ffb74d);
      color: white;
    }
    
    .next-btn {
      background: linear-gradient(to right, #2196f3, #64b5f6);
      color: white;
    }
    
    .replay-btn {
      background: linear-gradient(to right, #9c27b0, #ba68c8);
      color: white;
    }

    .popup {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #ffffff;
      padding: 15px 30px;
      font-size: 1.3rem;
      border-radius: 25px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
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
      width: 33.33%;
      background: linear-gradient(to right, #ff9800, #ffb74d);
      border-radius: 10px;
      transition: width 0.5s ease;
    }
    
    .confetti {
      position: absolute;
      width: 10px;
      height: 10px;
      opacity: 0;
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

    @keyframes correctAnswer {
      0% { transform: scale(1); }
      50% { transform: scale(1.1) rotate(5deg); }
      100% { transform: scale(1); }
    }

    @keyframes wrongAnswer {
      0%, 100% { transform: translateX(0); }
      20% { transform: translateX(-15px); }
      40% { transform: translateX(15px); }
      60% { transform: translateX(-10px); }
      80% { transform: translateX(10px); }
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      100% { transform: scale(1.05); }
    }

    @keyframes bounce {
      0% { transform: translateY(0); }
      100% { transform: translateY(-10px); }
    }

    @keyframes float {
      0% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(5deg); }
      100% { transform: translateY(0) rotate(0deg); }
    }
    
    @keyframes wave {
      0% { transform: scaleY(0.5); }
      100% { transform: scaleY(1); }
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(10px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    
    @media (max-width: 600px) {
      h1 {
        font-size: 2rem;
      }
      
      .instruction {
        font-size: 1.1rem;
      }
      
      .image-options {
        gap: 15px;
      }
      
      .option img {
        width: 120px;
      }
      
      .nav-buttons {
        gap: 10px;
      }
      
      .nav-btn {
        padding: 10px 18px;
        font-size: 1rem;
      }
      
      .main-container {
        padding: 20px;
      }

      .instruction-button {
        padding: 10px 15px;
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <!-- Instruction button -->
  <button class="instruction-button" id="instructionBtn" onclick="playInstructions()">
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
  <button class="btn skip-fixed" onclick="skipActivity()"><i class="fas fa-forward"></i>Skip</button>
  
  <!-- Decoration elements -->
  <i class="fas fa-music music-note note-1 decoration"></i>
  <i class="fas fa-music music-note note-2 decoration"></i>
  <i class="fas fa-music music-note note-3 decoration"></i>
  <i class="fas fa-music music-note note-4 decoration"></i>
  
  <i class="fas fa-paw animal-track track-1 decoration"></i>
  <i class="fas fa-paw animal-track track-2 decoration"></i>
  <i class="fas fa-paw animal-track track-3 decoration"></i>

  <div class="main-container">
    <div class="progress-bar">
      <div class="progress-fill"></div>
    </div>
    
    <h1>Identify the Sound</h1>
    <div class="instruction"><i class="fas fa-headphones"></i> Listen and match the sound with the correct picture!</div>

    <button class="sound-btn" onclick="playDogSound()">
      <i class="fas fa-volume-up"></i> Play Sound
    </button>
    
    <div class="sound-waves" id="soundWaves">
      <div class="wave"></div>
      <div class="wave"></div>
      <div class="wave"></div>
      <div class="wave"></div>
      <div class="wave"></div>
    </div>

    <div class="image-options">
      <div class="option" onclick="checkAnswer(this, 'dog')">
        <img src="../images/dog.avif" alt="Dog">
        <div class="option-label">Dog</div>
      </div>
      <div class="option" onclick="checkAnswer(this, 'cat')">
        <img src="../images/cat.jpg" alt="Cat">
        <div class="option-label">Cat</div>
      </div>
      <div class="option" onclick="checkAnswer(this, 'bird')">
        <img src="../images/bird.jpg" alt="Bird">
        <div class="option-label">Bird</div>
      </div>
    </div>

    <div class="nav-buttons">
 
    </div>
  </div>

  <div class="popup" id="popupMessage"></div>

  <audio id="dogSound" src="../Audio/dog.mp3"></audio>

  <script>
    const popup = document.getElementById("popupMessage");
    const dogSound = document.getElementById("dogSound");
    const soundWaves = document.getElementById("soundWaves");
    const instructionBtn = document.getElementById("instructionBtn");

    // Speech synthesis variables
    let speechSynth = window.speechSynthesis;
    let isInstructionPlaying = false;

    // Instructions text
    const instructionText = "Welcome to the sound matching game! Listen carefully to the sound, then click on the picture that matches what you heard. Click the play sound button to hear the sound again. Choose the correct animal from the three options: dog, cat, or bird. Good luck!";

    // Function to play voice instructions
    function playInstructions() {
      // Stop any currently playing speech
      if (speechSynth.speaking) {
        speechSynth.cancel();
        instructionBtn.classList.remove('speaking');
        isInstructionPlaying = false;
        return;
      }

      // Create speech utterance
      const utterance = new SpeechSynthesisUtterance(instructionText);
      
      // Set speech properties
      utterance.rate = 0.8; // Slightly slower for children
      utterance.pitch = 1.1; // Slightly higher pitch for friendliness
      utterance.volume = 1;

      // Try to use a child-friendly voice if available
      const voices = speechSynth.getVoices();
      const preferredVoice = voices.find(voice => 
        voice.lang.startsWith('en') && 
        (voice.name.toLowerCase().includes('female') || 
         voice.name.toLowerCase().includes('woman') ||
         voice.name.toLowerCase().includes('child'))
      ) || voices.find(voice => voice.lang.startsWith('en'));
      
      if (preferredVoice) {
        utterance.voice = preferredVoice;
      }

      // Event handlers
      utterance.onstart = function() {
        isInstructionPlaying = true;
        instructionBtn.classList.add('speaking');
        instructionBtn.innerHTML = '<i class="fas fa-stop"></i>Stop';
      };

      utterance.onend = function() {
        isInstructionPlaying = false;
        instructionBtn.classList.remove('speaking');
        instructionBtn.innerHTML = '<i class="fas fa-volume-up"></i>Instructions';
      };

      utterance.onerror = function() {
        isInstructionPlaying = false;
        instructionBtn.classList.remove('speaking');
        instructionBtn.innerHTML = '<i class="fas fa-volume-up"></i>Instructions';
        showPopup("Speech not available on this device", '#ff9800');
      };

      // Play the speech
      speechSynth.speak(utterance);
    }

    // Auto-play instructions when page loads
    window.addEventListener('load', function() {
      // Wait a bit for everything to load, then play instructions
      setTimeout(() => {
        // Check if speech synthesis is available
        if ('speechSynthesis' in window) {
          // Wait for voices to load
          if (speechSynth.getVoices().length === 0) {
            speechSynth.addEventListener('voiceschanged', function() {
              setTimeout(playInstructions, 1000);
            }, { once: true });
          } else {
            setTimeout(playInstructions, 1000);
          }
        }
      }, 500);
    });

    function playDogSound() {
      dogSound.currentTime = 0;
      dogSound.play();
      
      // Show sound waves animation
      soundWaves.classList.add("active");
      
      // Hide sound waves when audio ends
      dogSound.onended = function() {
        soundWaves.classList.remove("active");
      };
    }

    function showPopup(message, color = '#4caf50') {
      popup.textContent = message;
      popup.style.color = color;
      popup.classList.add("show");
      
      if (color === '#4caf50') {
        createConfetti();
      }
      
      setTimeout(() => {
        popup.classList.remove("show");
      }, 2500);
    }

    function goHome() {
      showPopup("Going to home...", '#ff9800');

      // Add a slight delay before navigating to the home page
      setTimeout(() => {
          window.location.href = 'index.php'; // Ensure this path is correct
      }, 1000);
    }

    function markSuccessAndNext() {
      let score = parseInt(localStorage.getItem('activityScore') || '0', 10);
      localStorage.setItem('activityScore', score + 1);
      window.location.href = 'third.php';
    }

    function checkAnswer(optionElement, choice) {
      const options = document.querySelectorAll(".option");
      options.forEach(opt => opt.classList.remove("correct", "wrong"));

      if (choice === "dog") {
        // Add mark for correct answer without showing feedback
        let score = parseInt(localStorage.getItem('activityScore') || '0', 10);
        localStorage.setItem('activityScore', score + 1);
      }
      
      // Proceed to next activity after a delay, without showing feedback
      setTimeout(() => {
        window.location.href = 'third.php';
      }, 1500);
    }

    function skipActivity() {
      showPopup("Skipped this one! ⏭", '#ff9800');

      // Add a slight delay before loading the next activity
      setTimeout(() => {
          // Ensure loadingOverlay is defined
          const loadingOverlay = document.querySelector('.loading-overlay'); // Adjust selector as needed
          if (loadingOverlay) {
              loadingOverlay.classList.add("show");
          }

          setTimeout(() => {
              window.location.href = 'third.php';
          }, 1000);
      }, 1000);
    }

    function goBack() {
      showPopup("Going back...", '#ff9800');

      // Add a slight delay before going back
      setTimeout(() => {
          window.history.back();
      }, 1000);
    }
    
    function createConfetti() {
      const mainContainer = document.querySelector('.main-container');
      const colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39'];
      
      for (let i = 0; i < 30; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.left = Math.random() * 100 + '%';
        confetti.style.top = Math.random() * 100 + '%';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';
        
        mainContainer.appendChild(confetti);
        
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

    // Handle page visibility changes to stop speech when page is hidden
    document.addEventListener('visibilitychange', function() {
      if (document.hidden && speechSynth.speaking) {
        speechSynth.cancel();
        instructionBtn.classList.remove('speaking');
        instructionBtn.innerHTML = '<i class="fas fa-volume-up"></i>Instructions';
        isInstructionPlaying = false;
      }
    });

  </script>
</body>
</html>