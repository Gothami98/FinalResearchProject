<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
    <title>PathBloomers - Register</title>
  

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="css/reg.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .signup-btn {
      background-color: #7a00ff;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 30px;
      width: 100%;
      font-weight: bold;
      cursor: pointer;
      margin-bottom: 15px;
    }

    .login-btn {
      background-color: #f2f2f2;
      color: #d63384;
      border: none;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>

<!-- Glowing Background Animation -->
<div class="glowing">
  <span style="--i:1;"></span>
  <span style="--i:2;"></span>
  <span style="--i:3;"></span>
</div>
<div class="glowing">
  <span style="--i:1;"></span>
  <span style="--i:2;"></span>
  <span style="--i:3;"></span>
</div>
<div class="glowing">
  <span style="--i:1;"></span>
  <span style="--i:2;"></span>
  <span style="--i:3;"></span>
</div>
<div class="glowing">
  <span style="--i:1;"></span>
  <span style="--i:2;"></span>
  <span style="--i:3;"></span>
</div>

<div class="container">
  <div class="left">
    <h2>Create Account</h2>
    <form action="" method="post" id="registerForm">
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" required />
      </div>
      <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
      </div>
      <button type="submit" class="signup-btn">SIGN UP</button>
    </form>
    <div class="social-icons">
      <p>Or Sign up with social platform</p>
      <i class="fab fa-facebook-f"></i>
      <i class="fab fa-twitter"></i>
      <i class="fab fa-google"></i>
      <i class="fab fa-linkedin-in"></i>
    </div>
  </div>

  <div class="right">
    <h2>Already have an account?</h2>
    <p>Login to continue your journey with us. Your experience awaits!</p>
    <button class="login-btn" onclick="location.href='login.php'">LOGIN</button>

    <!-- Swiper Cube Effect Slider -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/cap1.jpg" alt="Child with disability playing" />
          <div class="caption">Empowering Through Play</div>
        </div>
        <div class="swiper-slide">
          <img src="images/cap3.jpg" alt="Inclusive classroom" />
          <div class="caption">Inclusive Education for All</div>
        </div>
        <div class="swiper-slide">
          <img src="images/cap2.jpg" alt="Therapy session" />
          <div class="caption">Supporting Growth and Development</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- JS Libraries -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper('.swiper-container', {
    effect: 'cube',
    grabCursor: true,
    cubeEffect: {
      shadow: true,
      slideShadows: true,
      shadowOffset: 20,
      shadowScale: 0.94,
    },
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });
</script>

<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password !== $confirm_password) {
    echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Password Mismatch',
        text: 'Passwords do not match.'
      });
    </script>";
    exit;
  }

  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

  try {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
      echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Account Created',
          text: 'Your account has been successfully created!'
        }).then(() => {
          window.location.href = 'login.php';
        });
      </script>";
    } else {
      if ($conn->errno === 1062) {
        echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Duplicate Entry',
            text: 'Username or Email already exists.',
            confirmButtonText: 'Create Again',
            confirmButtonColor: '#7a00ff'
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById('registerForm').reset();
            }
          });
        </script>";
      } else {
        throw new Exception($stmt->error);
      }
    }

    $stmt->close();
  } catch (Exception $e) {
    echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Database Error',
        text: '{$e->getMessage()}'
      });
    </script>";
  }

  $conn->close();
}
?>

</body>
</html>
