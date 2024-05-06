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
    include("../php/components/header.php");
    session_start();
    ?>
    <section class="banner_home home_01 p5">
        <div class="hero_box_text">
            <h1>Eventi</h1>
            <h2>Il Museo 2000</h2>
            <button class="p-brown" onclick="redirect()">Prenota un Evento</button>
            <script>
                function redirect() {
                    window.location.href = "booking/events.php";
                }
            </script>
    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>


    <div class="v1">
        <div class="image_v1">
            <img src="../public/assets/events/basquiat.webp" id="v1">
        </div>
        <div class="text_v1">
            <h1>Basquiat</h1>
            <p>
                Scopri l'evento imperdibile del Museo2000: la straordinaria mostra dedicata a Jean-Michel Basquiat. Esplora l'universo vibrante e provocatorio di questo iconico artista contemporaneo, attraverso una selezione eclettica delle sue opere più iconiche, come "Ragazzo e bandiera" e "Hollywood Africans".<br></br>

                Questa esposizione unica non solo ti offre l'opportunità di immergerti nelle creazioni audaci e senza tempo di Basquiat, ma anche di comprendere il contesto sociale e culturale che ha plasmato la sua arte rivoluzionaria. Attraverso guide esperte e proiezioni video, potrai approfondire la vita, le influenze e il significato dietro ogni pennellata e tratto.

            </p>

            <button p-black onclick="location.href='booking/events.php?evento=Basquiat'">Prenota la visita!!</button>
        </div>
    </div>

    <div class="v1 reverse">
        <div class="image_v1 ">
            <img src="../public/assets/events/van_gogh.jpg" id="v1">
        </div>
        <div class="text_v1">
            <h1>Van Gogh</h1>
            <p>
                Scopri l'evento culturale dell'anno al Museo2000: l'esposizione imperdibile su Vincent Van Gogh. Immergiti nell'incantevole mondo artistico del leggendario pittore olandese attraverso una selezione esclusiva delle sue opere più celebri, tra cui "La notte stellata", "Il campo di grano con i corvi", e "Il girasole".<br></br>

                Questa straordinaria mostra non solo offre un'occasione unica per ammirare i capolavori di Van Gogh in un contesto stimolante e coinvolgente, ma anche per comprendere meglio la sua vita e il suo percorso artistico. Attraverso video, guide audio e tour guidati, avrai l'opportunità di approfondire la storia e il significato dietro ogni opera, arricchendo così la tua esperienza artistica.

            </p>
            <button p-black onclick="location.href='booking/events.php?evento=Van_gogh'">Prenota la visita!!</button>
        </div>
    </div>

    <div class="v1 ">
        <div class="image_v1">
            <img src="../public/assets/events/Frida_Khalo.jpg" id="v1">
        </div>
        <div class="text_v1">
            <h1>Frida Khalo</h1>
            <p>
                Esplora l'universo affascinante e travolgente di Frida Kahlo al Museo2000. Scopri la straordinaria mostra dedicata a questa iconica artista messicana, attraverso una selezione unica delle sue opere più emblematiche, come "Autoritratto con collana di spine" e "Le due Frida".<br></br>

                Questa esposizione eccezionale non solo ti offre l'opportunità di ammirare da vicino le opere intense e personali di Kahlo, ma anche di immergerti nella sua vita tumultuosa e nelle sue influenze artistiche. Attraverso guide esperte e installazioni interattive, potrai esplorare il mondo interiore di Frida, scoprendo i temi universali di dolore, amore e resilienza che permeano la sua arte.
            </p>
            <button p-black onclick="location.href='booking/events.php?evento=Frida_Khalo'">Prenota la visita!!</button>
        </div>
    </div>


    <div class="v2">

        <h1>Guarda altri Eventi del Museo2000</h1>
        <div class="v2_column">
            <table>
                <thead>
                    <tr>
                        <th>Nome dell'evento</th>
                        <th>Data dell'inizio</th>
                        <th>Data della fine</th>
                        <th>Tariffa</th>
                        <th>Prenota</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include("../php/server/connection.php");

                    $sql = "Select TipoEvento, DescrizioneE, Tariffa, DataInizio, DataFine FROM Evento";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        if ($row["DescrizioneE"] != "Van_gogh" && $row["DescrizioneE"] != "Basquiat" && $row["DescrizioneE"] != "Frida_Khalo" && $row["DescrizioneE"] != "Visita_museo") {
                            
                            $nome  = $row["DescrizioneE"];
                            
                            echo "<tr>";
                            echo "<td>" . $row["DescrizioneE"] . "</td>";
                            echo "<td>" . $row["DataInizio"] . "</td>";
                            echo "<td>" . $row["DataFine"] . "</td>";
                            echo "<td>" . $row["Tariffa"] . "</td>";
                            print "<td><a href='booking/events.php?evento=$nome'>Prenota</a></td>";
                            echo "</tr>";
                        }
                    }


                    ?>
                    <!--<script>
                        
                        function redirect_events() {
                            {

                                window.location.href = `booking/events.php?evento=${evento}`;
                            }
                        }
                    </script>-->



                </tbody>
            </table>
        </div>

    </div>

    <footer>
        <?php
        include("../php/components/footer.php")
        ?>
    </footer>


</body>

</html>