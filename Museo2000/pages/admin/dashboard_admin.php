<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Museo2000</title>
    <link rel="stylesheet" href="../../global.css?">
    <link rel="icon" type="image/x-icon" href="../../public/favicon.ico">
</head>

<body>

    <!--header-->
    <?php //header
    include("../../php/components/header.php")
    ?>

    <section class="banner_home home_01 p5">
        <div class="hero_box">
            <h1 class="hero_heading">Pagina admin</h1>
        </div>
    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>

    <!--fine header-->
    <div class="admin_container">
        <div class="admin">
            <?php
            session_start();


            echo "<h1 class='admin'>";
            echo "Salve," . $_SESSION['nome'];
            echo "</h1>"
            ?>
            <h2>Questa è la pagina admin, qui potrai aggiungere o eliminare un evento, modificare i prezzi degli eventi o delle visite , oppure richiede dell'assistenza da parte dei tecnici del sito</h2>


        </div>

        <div class="remove">
            <h1>Elimina un evento</h1>
            <form class="remove" method="post">
                <label>Nome dell'evento : </label>
                <select name="select_remove">
                    <?php
                    include("../../php/server/connection.php");

                    $sql = "SELECT DescrizioneE FROM Evento";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row["DescrizioneE"] != "Visita_museo") {
                                echo "<option value='" . $row["DescrizioneE"] . "'>";
                                echo $row["DescrizioneE"];
                                echo "</option>";
                            }
                        }
                    } else {
                        echo "eventi non trovati";
                    }
                    ?>


                </select>
                <button type="submit" name="remove">Rimuovi l'evento</button>

            </form>
            <?php

            include("../../php/server/connection.php");

            function removeEvents($conn)
            {

                $nomeEvento = $_POST["select_remove"];

                $stmt = $conn->prepare("DELETE FROM Evento WHERE DescrizioneE = ?");
                $stmt->bind_param("s", $nomeEvento);
                $stmt->execute();

                $rows_affected = $conn->affected_rows;
                if ($rows_affected == 0) {
                    echo "Non è presente questo evetno nel sistema";
                } else {
                    echo "Hai eliminato l'evento";
                }
            }

            if (isset($_POST['remove'])) {
                removeEvents($conn);
            }
            ?>




        </div>

        <div class="update">
            <h1> Aggiungi un'Evento </h1>
            <form class="aggiungi" method="post">

                <label>Nome :</label>
                <input type="text" name="nome" required>
                <label>Tariffa :</label>
                <input type="number" name="tariffa" required>
                <label>Data dell'inizio dell'evento :</label>
                <input type="date" name="dataInizio" required>
                <label>Data della fine dell'evento :</label>
                <input type="date" name="dataFine" required>
                <button type="submit" name="update">Aggiorna sito</button>
            </form>

        </div>

        <div class="modPrezzi">
            <h1>Modifica i prezzi di un'evento</h1>
            <form method="POST">
                <label>Scegli l'evento da modificare</label>
                <select name="select_modPrezzi">
                    <?php
                    include("../../php/server/connection.php");

                    $sql = "SELECT DescrizioneE FROM Evento";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row["DescrizioneE"] != "Visita_museo") {
                                echo "<option value='" . $row["DescrizioneE"] . "'>";
                                echo $row["DescrizioneE"];
                                echo "</option>";
                            }
                        }
                    } else {
                        echo "eventi non trovati";
                    }
                    ?>


                </select>
                <label>Prezzo : </label>
                <input type="number" name="price" required>
                <button type="submit" name="modPrezzi">Modifica il prezzo</button>
            </form>

            <?php
            include("../../php/server/connection.php");
            function modifyPrice($conn)
            {
                $nomeEvento = $_POST["select_modPrezzi"];
                $price = $_POST["price"];

                $stmt = $conn->prepare("UPDATE Evento SET Tariffa = ? WHERE DescrizioneE = ?");
                $stmt->bind_param("ds", $price , $nomeEvento);
                $stmt->execute();

                $rows_affected = $conn->affected_rows;
                if ($rows_affected == 0) {
                    echo "Non è presente questo evetno nel sistema";
                } else {
                    echo "Hai modificato il prezzo dell'evento";
                }
            }

            if(isset($_POST["modPrezzi"])){
                modifyPrice($conn);
            }
            ?>

        </div>

        





    </div>



</body>

</html>


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../php/server/connection.php");


if ($_SESSION["tipo"] != "A") {
    header("Location: ../login.php?admin=false");
}

//add aggiungi evento



?>