<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Museo2000</title>
  <link rel="stylesheet" href="../global.css">
</head>

<body>
  <?php //header
  include("../php/components/header.php")
  ?>
  <!--banner home background-->
  <section class="banner_home">
    <div class="hero_box">
      <h1 class="hero_heading">Visita il nostro museo</h1>
    </div>
  </section>
  <script type="text/javascript">
    window.addEventListener("scroll", function() {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0);
    })
  </script>
  <!--1 hero section-->
  <div class="hero_section_01">
    <img src="../public//assets/home_04.png">
    <div class="hero_text">
      <h1>Visita il Nostro Museo!</h1>
      <p>Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è
        considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una
        cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque
        secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso
        popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano
        passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva
        versioni del Lorem Ipsum.</p>
    </div>

  </div>
</body>

</html>