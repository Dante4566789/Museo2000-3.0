<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo2000</title>
    <link rel="stylesheet" href="global.css?">
    <link rel="icon" type="image/x-icon" href="public/favicon.ico">
</head>

<body>

    <!--header-->
    <?php //header
    include("php/components/header.php");
   
    ?>

    <section class="banner_home home_01 p5">
    <div class="hero_box_text">
        <h1>Visita</h1>
        <h2>Il Museo 2000</h2>
        <button class="p-brown" onclick="redirect()">Prenota Visita</button>
        <script>
    		function redirect() {
        		window.location.href = "booking/visits.php";
    		}
		</script>
    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>

<div class="hero_section_03 p6">
    <div class="hero_section_03_img grid_section_03">
      <img src="public/assets/home_03.png" id="about">
    </div>
    <div class="hero_section_03_text grid_section_03">
      <h1>Informazioni</h1>
      <h2>Prezzi di Ingresso</h2>
      <hr class="gray-line" size=”1″ width=”300″ noshade>
      <div class="sec2">
        <!--<p class="gray-text border-left">hfsfsfsfsfsfsf</p>
                <p class="gray-text">fsbfbsbfbsdbfsbdibfbsidbfsdh</p>-->
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
        <!--<p class="gray-text border-left">hfsfsfsfsfsfsf</p>
                <p class="gray-text">fsbfbsbfbsdbfsbdibfbsidbfsdh</p>-->
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
    
    
      <button class="p-black" onclick="location.href='booking/visits.php'">Prenota subito una visita</button>
        </div>
    

  </div>

    </div>


    <div class="hero_section_04">
        <h2>Solo a <strong>MUSEO2000</strong> vedi <strong>2000 anni</strong> di storia e arte</h2>
        <button onclick="location.href='register.php'">Registrati Subito</button>
    </div>

    <?php //header
    include("php/components/footer.php")
    ?>

</body>

</html>