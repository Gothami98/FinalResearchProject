<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PathBloomers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

    * {
      margin: 0px;
      padding: 0px;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Heebo', sans-serif;
      overflow: hidden; /* Prevent scrolling */
    }

    .hero-section {
      opacity: 0;
      transition: opacity 1.5s ease-in-out;
      height: 100vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      flex-direction: column;
      padding: 0 20px;
      position: relative;
      overflow: hidden;
    }

    .hero-section h1 {
      font-size: 120px;
      font-family: sans-serif;
      text-transform: uppercase;
      background: linear-gradient(to right, #30CFD0 0%, #330867 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      -webkit-text-stroke-width: 4px;
      -webkit-text-stroke-color: #ffffff;
      font-weight: 900;
      animation: animate 10s linear infinite;
    }

    .btn-custom {
      background-color: #007bff;
      color: white;
      border-radius: 50px;
      padding: 10px 30px;
      font-size: 1.2rem;
      border: none;
      margin-top: 20px;
    }

    .btn-custom:hover {
      background-color: #0056b3;
    }

    @keyframes animate {
      0% {
        filter: hue-rotate(0deg);
      }
      50% {
        filter: hue-rotate(360deg);
      }
      100% {
        filter: hue-rotate(0deg);
      }
    }

    .context {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 999;
      text-align: center;
    }

    .context h1 {
      color: #fff;
      font-size: 50px;
      margin-bottom: 20px;
    }

    .area {
      background: #4e54c8;
      background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
      width: 100%;
      height: 100vh;
      position: absolute;
      top: 0;
      left: 0;
      overflow: hidden;
    }

    .circles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .circles li {
      position: absolute;
      display: block;
      list-style: none;
      width: 20px;
      height: 20px;
      background: rgba(255, 255, 255, 0.2);
      animation: animate 25s linear infinite;
      bottom: -150px;
    }

    .circles li:nth-child(1) {
      left: 25%;
      width: 80px;
      height: 80px;
      animation-delay: 0s;
    }

    .circles li:nth-child(2) {
      left: 10%;
      width: 20px;
      height: 20px;
      animation-delay: 2s;
      animation-duration: 12s;
    }

    .circles li:nth-child(3) {
      left: 70%;
      width: 20px;
      height: 20px;
      animation-delay: 4s;
    }

    .circles li:nth-child(4) {
      left: 40%;
      width: 60px;
      height: 60px;
      animation-delay: 0s;
      animation-duration: 18s;
    }

    .circles li:nth-child(5) {
      left: 65%;
      width: 20px;
      height: 20px;
      animation-delay: 0s;
    }

    .circles li:nth-child(6) {
      left: 75%;
      width: 110px;
      height: 110px;
      animation-delay: 3s;
    }

    .circles li:nth-child(7) {
      left: 35%;
      width: 150px;
      height: 150px;
      animation-delay: 7s;
    }

    .circles li:nth-child(8) {
      left: 50%;
      width: 25px;
      height: 25px;
      animation-delay: 15s;
      animation-duration: 45s;
    }

    .circles li:nth-child(9) {
      left: 20%;
      width: 15px;
      height: 15px;
      animation-delay: 2s;
      animation-duration: 35s;
    }

    .circles li:nth-child(10) {
      left: 85%;
      width: 150px;
      height: 150px;
      animation-delay: 0s;
      animation-duration: 11s;
    }

    @keyframes animate {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
      }

      100% {
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
      }
    }
  </style>
</head>

<body>
  <div class="hero-section" id="hero">
    <div class="context">
      <h2 class="display-4 fw-bold">Welcome to PathBloomers</h2>
      <a href="register.php" class="btn btn-custom">Get Started</a>
    </div>
    <div class="area">
      <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
  </div>

  <!-- Image Preload & Fade-in Script -->
  <script>
    const heroSection = document.getElementById('hero');
    const img = new Image();
    img.src = 'images/welcome.png';
    img.onload = () => {
      heroSection.style.backgroundImage = `url('${img.src}')`;
      heroSection.style.opacity = '1';
    };
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
