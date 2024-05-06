<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../global.css?">
    <link rel="icon" type="image/x-icon" href="../public/favicon.ico">
    <title>Museo2000</title>
</head>

<body>
    <?php //header
    include("../php/components/header.php")
    ?>
    <div class="banner_home">
        <video autoplay loop muted plays-inline poster="../public/assets/home_banner.jpg" class="video">
            <source src="../public/assets/slider.mp4" type="video/mp4" />
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
    </div>
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>


    <div class="v1">
        <div class="image_v1">
            <img src="../public/assets/bg.jpg" id="v1">
        </div>
        <div class="text_v1">
            <h1>Van Gogh</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.<br></br> Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></br> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <button p-black onclick="location.href='booking/events.php?evento=Van_gogh'">Prenota la visita!!</button>
        </div>
    </div>

    <div class="v1 reverse">
        <div class="image_v1 ">
            <img src="../public/assets/bg.jpg" id="v1">
        </div>
        <div class="text_v1">
            <h1>Van Gogh</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.<br></br> Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></br> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <button p-black onclick="location.href='booking/events.php?evento=Van_gogh'">Prenota la visita!!</button>
        </div>
    </div>

    <div class="v1 ">
        <div class="image_v1">
            <img src="../public/assets/bg.jpg" id="v1">
        </div>
        <div class="text_v1">
            <h1>Van Gogh</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                industry.<br></br> Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></br> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <button p-black onclick="location.href='booking/events.php?evento=Van_gogh'">Prenota la visita!!</button>
        </div>
    </div>

    <footer>
        <?php
        include("../php/components/footer.php")
        ?>
    </footer>


</body>

</html>