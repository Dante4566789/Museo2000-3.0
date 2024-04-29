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

    <!--header-->
    <?php //header
    include("../php/components/header.php")
    ?>

    <section class="banner_home p5">
        <div class="hero_box">
            <h1 class="hero_heading">Visitaci</h1>
        </div>
    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>


    <div class="hero_section_03 p6">
        <div class="hero_section_03_img grid_section_03">
            <img src="../public/assets/home_03.png">
        </div>
        <div class="hero_section_03_text grid_section_03 ">
            <h1>Visita il MUSEO2000</h1>
            <p>Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è
                considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una
                cassetta di caratteri e li assemblò per preparare un testo campione.<br></br> È sopravvissuto non solo a più di cinque
                secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. <br></br>Fu reso
                popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano
                passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva
                versioni del Lorem Ipsum.</p>
            <button  onclick="location.href='login.php'">Prenota subito una visita</button>
        </div>

    </div>


    <div class="hero_section_04">
        <h2>Solo a <strong>MUSEO2000</strong> vedi <strong>2000 anni</strong> di storia e arte</h2>
        <button onclick="location.href='../login.php'">Registrati Subito</button>
    </div>

    <?php //header
    include("../php/components/footer.php")
    ?>

</body>

</html>