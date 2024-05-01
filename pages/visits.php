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
            <h2>Prezzi di Ingresso</h2>
            <hr class="gray-line" size=”1″ width=”300″  noshade>
            <button  class="p-black"onclick="location.href='login.php'">Prenota subito una visita</button>
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