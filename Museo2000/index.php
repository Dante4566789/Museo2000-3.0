<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Museo2000</title>
  <link rel="stylesheet" href="global.css?v=2784">
  <link rel="icon" type="image/x-icon" href="public/favicon.ico">
</head>

<body>
  <?php //header
  include("php/components/header.php");
  session_start();
  ?>
  <div class="banner_home">
    <video autoplay loop muted plays-inline poster="public/assets/home_banner.jpg" class="video">
      <source src="public/assets/slider.mp4" type="video/mp4" />
    </video>
    <div class="overlay"></div>
    <div class="hero_box_text">
      <h1>Museo2000</h1>
      <h2>Art & History Museum</h2>
      <button class="p-brown" onclick="redirect()">Prenota Visita</button>
      <script>
        function redirect() {
          window.location.href = "visits.php";
        }
      </script>
    </div>

  </div>
 
  <script type="text/javascript">
    window.addEventListener("scroll", function() {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
  </script>
  <!--1 hero section-->
  <div id="about"></div>
  <div class="hero_section_01">
    <img src="public//assets/home_04.png">
    <div class="hero_text">
      <h1>Visita il Nostro Museo!</h1>
      <p>Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è
        considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una
        cassetta di caratteri e li assemblò per preparare un testo campione.<br></br> È sopravvissuto non solo a più di cinque
        secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato.<br></br> Fu reso
        popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano
        passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva
        versioni del Lorem Ipsum.</p>
    </div>
  </div>

  <!--2 hero section-->
  <div class="hero_section_02">

    <div class="hero_text_02">
      <h1>Il nostro reparto Eventi</h1>
      <button class="hero_text_02_button_01 p-white" onclick="redirect1()">EVENTI</button>
      <script>
        function redirect1() {
          window.location.href = "events.php";
        }
      </script>
    </div>
    <img src="public/assets/home_05.jpg">
    <div class="hero_text_vertical">
      <p class="hero_text_normal">Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione</p>
      <button class="hero_section_02_button_02" onclick="redirect3()">EVENTI</button>
      <script>
        function redirect3() {
          window.location.href = "events.php";
        }
      </script>
    </div>


  </div>

  <!--hero section 3-->
  <div class="hero_section_03 p6">
    <div class="hero_section_03_img grid_section_03">
      <img src="public/assets/home_06.jpg">
    </div>
    <div class="hero_section_03_text grid_section_03">
      <h1 style="text-align:left">Informazioni</h1>
      <h2>Prezzi di Ingresso</h2>
      <hr class="gray-line" size=”1″ width=”300″ noshade>
      <div class="sec2">
        <ul class=" sec0 border-left">
          <li class="font25 gray-text">Adulti</li>
          <li class=" font25 gray-text">Ragazzi</li>
          <li class=" font25 gray-text">Bamibini</li>

        </ul>
        <ul class="sec1">
          <li class=" font25 gray-text">15.00 €</li>
          <li class=" font25 gray-text">10.00 €</li>
          <li class=" font25 gray-text">7.50 €</li>
        </ul>
      </div>
      <h2>Orari di Apertura</h2>
      <hr class="gray-line" size=”1″ width=”300″ noshade>
      <div class="sec2">
        <ul class=" sec0 border-left">
          <li class="font25 gray-text">Lun</li>
          <li class=" font25 gray-text">Mar - Ven</li>
          <li class=" font25 gray-text">Sab - Dom</li>

        </ul>
        <ul class="sec1">
          <li class=" font25 gray-text">10.00 - 19.00</li>
          <li class=" font25 gray-text">8.00 - 18.00</li>
          <li class=" font25 gray-text">9.00 - 16.00</li>

        </ul>
      </div>
      <button class="p-black" onclick="redirect4()">Guarda Qui</button>
      <script>
        function redirect4() {
          window.location.href = "visits.php";
        }
      </script>
    </div>

  </div>

  <div class="hero_section_04">
    <h2>Solo a <strong>MUSEO2000</strong> vedi <strong>2000 anni</strong> di storia e arte</h2>
    <button class="p-white" onclick="redirect5()">Vieni a Trovarci!</button>
    <script>
      function redirect5() {
        window.location.href = "visits.php";
      }
    </script>
  </div>




  <!--footer-->
  <footer>
    <?php
    include("php/components/footer.php")
    ?>
  </footer>
</body>

</html>