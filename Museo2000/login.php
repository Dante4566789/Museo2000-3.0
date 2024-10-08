<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Museo2000</title>
  <link rel="stylesheet" href="global.css">

  <link rel="icon" type="image/x-icon" href="public/favicon.ico">
</head>

<body>
 
  <!--HTML-->
  <div class="Login">
    <div class="wrapper">
      <form action="php/server/handler.php"  method="POST">
        <h1>Login</h1>
        <div class="input-box">
          <input type="text" name="email" value="<?php echo isset($_COOKIE['mail']) ? $_COOKIE['mail'] : "";  ?>"placeholder="Email" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class='bx bxs-lock-alt'></i>
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="register-link">
          <p>Non hai un'account? <a href="register.php">Registrati</a></p>
        </div>
      </form>
    </div>

  </div>
  <?php


    if(isset($_GET["msg"]) && $_GET["msg"] == 'failed'){
      echo "<script>alert('Login non effettuato')</script>";
    }
  ?>

</body>

</html>