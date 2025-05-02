<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="css/reg.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
  .login-btn {
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
  .signup-btn {
    background-color: #f2f2f2;
    color: #d63384;
    border: none;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: bold;
    cursor: pointer;
  }
</style>
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
    <h2>Login</h2>
    <form action="" method="post" id="loginForm">
      <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <button type="submit" class="login-btn">LOGIN</button>
    </form>
    <div class="social-icons">
      <p>Or Login with social platform</p>
      <i class="fab fa-facebook-f"></i>
      <i class="fab fa-twitter"></i>
      <i class="fab fa-google"></i>
      <i class="fab fa-linkedin-in"></i>
    </div>
  </div>

  <div class="right">
    <h2>New to our platform?</h2>
    <p>Create an account to start your journey with us. Your experience awaits!</p>
    <button class="signup-btn" onclick="location.href='register.php'">SIGN UP</button>

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
  // Initialize Swiper
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
  $email = $_POST['email'];
  $password = $_POST['password'];

  try {
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $stmt->bind_result($id, $username, $hashed_password);
      $stmt->fetch();

      if (password_verify($password, $hashed_password)) {
        // Password is correct, start a session and redirect to the dashboard
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;

        echo "<script>
          Swal.fire({
            icon: 'success',
            title: 'Login Successful',
            text: 'Welcome, $username!'
          }).then(() => {
            window.location.href = 'describepage.php';
          });
        </script>";
      } else {
        // Password is incorrect
        echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: 'Incorrect password.'
          });
        </script>";
      }
    } else {
      // Email not found
      echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Login Failed',
          text: 'Email not found.'
        });
      </script>";
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
