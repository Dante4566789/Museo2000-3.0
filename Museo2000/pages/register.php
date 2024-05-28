<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Museo2000</title>
  <link rel="stylesheet" href="../global.css?v=37">
  <link rel="icon" type="image/x-icon" href="../public/favicon.ico">
</head>

<body>

  <!--HTML-->
  <div class="Register">
    <div class="wrapper">
      <form method="post">
        <h1>Registrati</h1>
        <div class="input-box">
          <input type="text" name="nome" placeholder="Nome" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="text" name="cognome" placeholder="Cognome" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="text" name="email" placeholder="Email" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class='bx bxs-lock-alt'></i>
        </div>
        <button type="submit" name="registrati" class="btn">Registrati</button>
        <div class="register-link">
          <p>Vai alla home <a href="home.php">Home</a></p>
        </div>
      </form>
    </div>

  </div>


  <!--PHP-->
  <?php
  include '../php/server/connection.php';
  function registra($conn)
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $email = $_POST['email'];
      $password = $_POST['password'];
      $name = $_POST["nome"];
      $cognome = $_POST["cognome"];

      
        $stmt1 = $conn->prepare("SELECT * FROM Utente WHERE email = ?");
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        $ris = $stmt1->get_result();
      if ($ris->num_rows > 0) {
          echo "<script>alert('Utente già registrato')</script>";
      } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);


      $stmt = $conn->prepare("INSERT INTO Utente (email, password, nome, cognome) VALUES (?,?,?,?)");
      $stmt->bind_param("ssss",$email,$hash,$name,$cognome);
      $stmt->execute();
      header('Location: login.php');
      exit();
      }
    }
  }
  if (isset($_POST['registrati'])) {
    registra($conn);
  }

  ?>
  

</body>

</html>