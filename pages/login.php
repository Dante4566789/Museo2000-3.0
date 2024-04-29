<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Museo2000</title>
  <link rel="stylesheet" href="../global.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" type="image/x-icon" href="../public/favicon.ico">
</head>

<body>

  <!--HTML-->
  <div class="Login">
    <div class="wrapper">
      <form action="../php/server/handler.php" method="POST">
        <h1>Login</h1>
        <div class="input-box">
          <input type="text" name="email" placeholder="Email" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="remember-forgot">
          <label><input name="checkbox" type="checkbox">Ricordati di me</label>
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="register-link">
          <p>Non hai un'account? <a href="register.php">Registrati</a></p>
        </div>
      </form>
    </div>

  </div>


  <!--PHP-->
  <?php
  if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
    echo "<script>alert('Password o email sbagliata 💀')</script>";
  }
  ?>

</body>

</html>