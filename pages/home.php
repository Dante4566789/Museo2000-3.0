<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Museo2000</title>
  <link rel="stylesheet" href="../global.css">
  <link rel="icon" type="image/x-icon" href="../public/favicon.ico">
</head>

<body>
  <?php //header
  include("../php/components/header.php")
  ?>
  <!--banner home background-->
  <section  class="banner_home home">
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
  
  <!--2 hero section-->
  <div class="hero_section_02">
    
      <div class="hero_text_02">
        <h1>Il nostro reparto Eventi</h1>
        <button class="hero_text_02_button_01 .p-white">EVENTI</button>
      </div>
      <img src="../public/assets/home_05.jpg">
      <div class="hero_text_vertical">
        <p class="hero_text_normal">Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione</p>
        <button class="hero_section_02_button_02">EVENTI</button>
      </div>
    

  </div>

  <!--hero section 3-->
   <div class="hero_section_03 p6">
      <div class="hero_section_03_img grid_section_03">
        <img src="../public/assets/home_06.jpg" id="about">
      </div>
      <div class="hero_section_03_text grid_section_03">
        <h1>Visita il MUSEO2000</h1>
        <p>Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è
        considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una
        cassetta di caratteri e li assemblò per preparare un testo campione.<br></br> È sopravvissuto non solo a più di cinque
        secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. <br></br>Fu reso
        popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano
        passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva
        versioni del Lorem Ipsum.</p>
        <button class="p-black">Guarda Qui</button>
      </div>

   </div>

   <div class="hero_section_04">
    <h2>Solo a <strong>MUSEO2000</strong> vedi <strong>2000 anni</strong> di storia e arte</h2>
    <button class="p-white">Vieni a Trovarci!</button>
   </div>
  



  <!--footer-->
  <footer>
    <?php 
      include("../php/components/footer.php")
    ?>
  </footer>
</body>

</html>