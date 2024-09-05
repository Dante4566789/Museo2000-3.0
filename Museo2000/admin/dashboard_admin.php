<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Museo2000</title>
    <link rel="stylesheet" href="../../global.css?v=34  ">
    <link rel="icon" type="image/x-icon" href="../../public/favicon.ico">
</head>

<body>

    <!--<header>
        <a href="../../../Museo2000/pages/home.php" class="logo">Museo2000</a>
        <ul>
            <li><a href="../../pages/visits.php">Visitaci</a></li>
            <li><a href="../../pages/home.php#about">About</a></li>
            <li><a href="../../pages/events.php">Eventi</a></li>
            <li><a href="../../pages/login.php">Login</a></li>

        </ul>

    </header>-->

    <?php
    include ("../../php/components/header.php");
    ?>

    <?php
    session_start();

    include ("../../php/server/connection.php");


    if ($_SESSION["tipo"] != "A") {
        header("Location: ../login.php?admin=false");
    }

    //add aggiungi evento 
    ?>




    <section class="banner_home home_01 p5">
        <div class="hero_box_text">
            <h1>Pagina Admin</h1>
    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function () {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>

    <!--fine header-->
    <div class="admin_container">
        <div class="admin">
            <?php
            session_start();


            echo "<h1>";
            echo "Salve," . $_SESSION['nome'];
            echo "</h1>"
                ?>
            <h2>Questa è la pagina admin, qui potrai aggiungere o eliminare un evento, modificare i prezzi degli eventi
                o delle visite , oppure richiede dell'assistenza da parte dei tecnici del sito</h2>


        </div>

        <div class="remove section_admin">
            <h1>Elimina un evento</h1>
            <form class="remove" method="post">
                <label>Nome dell'evento : </label>
                <select name="select_remove">
                    <?php
                    include ("../../php/server/connection.php");

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

            include ("../../php/server/connection.php");

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

        <div class="update section_admin">
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
            <?php
            include ("../../php/server/connection.php");
            function updateEvents($conn)
            {
                $nomeEvento = $_POST["nome"];
                $tariffa = $_POST["tariffa"];
                $dataInizio = $_POST["dataInizio"];
                $dataFine = $_POST["dataFine"];
                $Evento = "Evento";
                $new_dataInizio = date("Y/m/d", strtotime($dataInizio));
                $new_dataFine = date("Y/m/d", strtotime($dataFine));

                $stmt = $conn->prepare("INSERT INTO Evento (TipoEvento, DescrizioneE, Tariffa,DataInizio,DataFine) VALUES (?,?,?,?,?)");
                $stmt->bind_param("ssdss", $Evento, $nomeEvento, $tariffa, $new_dataInizio, $new_dataFine);
                $stmt->execute();

                $rows_affected = $conn->affected_rows;
                if ($rows_affected == 0) {
                    echo "Non è presente questo evetno nel sistema";
                } else {
                    echo "Hai aggiunto l'evento";
                }
            }


            if (isset($_POST["update"])) {
                updateEvents($conn);
            }

            ?>
        </div>

        <div class="modPrezzi section_admin">
            <h1>Modifica i prezzi di un'evento</h1>
            <form method="POST">
                <label>Scegli l'evento da modificare</label>
                <select name="select_modPrezzi">
                    <?php
                    include ("../../php/server/connection.php");

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
            include ("../../php/server/connection.php");
            function modifyPrice($conn)
            {
                $nomeEvento = $_POST["select_modPrezzi"];
                $price = $_POST["price"];

                $stmt = $conn->prepare("UPDATE Evento SET Tariffa = ? WHERE DescrizioneE = ?");
                $stmt->bind_param("ds", $price, $nomeEvento);
                $stmt->execute();

                $rows_affected = $conn->affected_rows;
                if ($rows_affected == 0) {
                    echo "Non è presente questo evetno nel sistema";
                } else {
                    echo "Hai modificato il prezzo dell'evento";
                }
            }

            if (isset($_POST["modPrezzi"])) {
                modifyPrice($conn);
            }
            ?>

        </div>

        <!--modifica evento-->
        <div class="modEvents section_admin">
            <h1>Modifica l'evento</h1>
            <form method="POST">
                <label>Nome evento</label>
                <input type="text" name="evento" required></input>
                <label>Prezzo dell'evento</label>
                <input type="number" name="Tariffa"></input>
                <label>Data dell'inizio dell'evento</label>
                <input type="date" name="DataInizio"></input>
                <label>Data dell'inizio dell'evento</label>
                <input type="date" name="DataFine"></input>
                <button type="submit" name="modEvento">Modifica l'evento</button>
            </form>

            <?php
            include ("../../php/server/connection.php");
            function modificaEvento($conn)
            {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $evento = htmlentities($_POST["evento"]);

                    $update_query = "UPDATE Evento SET ";
                    $update_values = [];

                    // Loop attraverso gli attributi del libro e verifica se sono stati forniti nuovi valori
                    $attributi = array('TipoEvento', 'DescrizioneE', 'Tariffa', 'DataInizio', 'DataFine');
                    foreach ($attributi as $attributo) {
                        if (isset($_POST[$attributo]) && !empty($_POST[$attributo])) {
                            $value = $conn->real_escape_string($_POST[$attributo]);
                            $update_values[] = "$attributo = '$value'";
                        }
                    }

                    // Aggiungi i valori alla query di aggiornamento
                    $update_query .= implode(", ", $update_values);
                    $update_query .= " WHERE DescrizioneE = ?";
                    $stmt = $conn->prepare($update_query);
                    $stmt->bind_param("s", $evento);
                    $stmt->execute();

                    $rows_affected = $conn->affected_rows;
                    if ($rows_affected == 0) {
                        echo "Non è stato possibile modificare l'evento. Riprovare";
                    } else {
                        echo "Hai modificato l'evento";
                    }
                }
            }

            if (isset($_POST["modEvento"])) {
                modificaEvento($conn);
            }

            ?>
        </div>



        <div class="section_admin numBiglietti" id="numero">
            <h1>Numero di Biglietti Venduti</h1>
            <form method="POST" action="/Museo2000/pages/admin/dashboard_admin.php#numero">
                <label>Nome dell'esposizione</label>
                <input type="text" name="evento"></input>
                <button type="submit" name="numBiglietti">Controlla il numero delle esposizioni</button>
            </form>

            <?php

            include ("../../php/server/connection.php");

            function numero($conn)
            {
                $evento = $_POST["evento"];

                $result1 = $conn->query("SELECT DescrizioneE, IDEvento FROM Evento");
                //$stmt1->execute();
                //$result1 = $stmt1->get_result();
                while ($row = $result1->fetch_assoc()) {
                    if ($row["DescrizioneE"] == $evento) {
                        //$numE = $row["IDEvento"];
                        $numE = $row["IDEvento"];
                    }

                }






                $stmt = $conn->prepare("SELECT COUNT(Evento) as numero FROM Biglietto WHERE Evento = ? GROUP BY Evento");

                $stmt->bind_param("i", $numE);
                $stmt->execute();
                $result = $stmt->get_result();
                $row1 = $result->fetch_assoc();
                $numBiglietti = $row1["numero"];
                if (isset($numBiglietti) && $numBiglietti > 0) {
                    echo "<p style='font-size:25px;'><strong>" . $numBiglietti . " Biglietti venduti.</strong></p>";
                } else {
                    echo "<p>Non è stato possibile trovare l'evento</p>";
                }
            }

            if (isset($_POST["numBiglietti"])) {
                numero($conn);
            }


            ?>


        </div>

        <div class="section_admin TotalEarn" id="earn">

            <h1>Guadagno totale di un'evento</h1>
            <form method="POST" action="/Museo2000/pages/admin/dashboard_admin.php#earn">

                <label>Inserisci nome dell'esposizione</label>
                <input type="text" name="evento"></input>
                <button type="submit" name="TotalEarn">Controlla</button>

            </form>
            <?php

            include ("../../php/server/connection.php");

            function guadagno($conn)
            {
                $evento = $_POST["evento"];

                $result1 = $conn->query("SELECT DescrizioneE, IDEvento FROM Evento");
                //$stmt1->execute();
                //$result1 = $stmt1->get_result();
                while ($row = $result1->fetch_assoc()) {
                    if ($row["DescrizioneE"] == $evento) {
                        //$numE = $row["IDEvento"];
                        $numE = $row["IDEvento"];
                    }

                }






                $stmt = $conn->prepare("SELECT SUM(TariffaTotale) as prezzo FROM Biglietto WHERE Evento = ? GROUP BY Evento");

                $stmt->bind_param("i", $numE);
                $stmt->execute();
                $result = $stmt->get_result();
                $row1 = $result->fetch_assoc();
                $prezzo = $row1["prezzo"];
                if (isset($prezzo) && $prezzo != 0) {
                    echo "<p style='font-size:25px'><strong>" . $prezzo . " €.</strong></p>";
                } else {
                    echo "<p>Non è stato possibile vedere il prezzo di questo evento</p>";
                }
            }

            if (isset($_POST["TotalEarn"])) {
                guadagno($conn);
            }


            ?>

        </div>


        <div class="section_admin">
            <form method="POST">
                <label>Inserire Anno</label>
                <input type="number" name="anno"></input>
                <button type="submit" name="annox">Cerca</button>
            </form>

            <?php

            include ("../../php/server/connection.php");
            function cercaAnno($conn)
            {



                $anno = $_POST["anno"];

                $sql = "SELECT DescrizioneE , DataInizio , DataFine FROM Evento WHERE DataInizio between ? and ? AND DataFine between ? and ?";
                $stmt = $conn->prepare($sql);
                //date 
                $start_dataInizio = $anno . "-01-01";
                $end_dataInizio = $anno . "-12-31";
                $start_dataFine = $anno . "-01-01";
                $end_dataFine = $anno . "-12-31";
                $stmt->bind_param("ssss", $start_dataInizio, $end_dataInizio, $start_dataFine, $end_dataFine);
                $stmt->execute();
                $result = $stmt->get_result();

                echo "<table style='border-spacing: 5px;'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Evento</td>";
                echo "<th>Data Inizio</td>";
                echo "<th>Data Fine</td>";
                echo "</tr>";
                echo "<thead>";
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["DescrizioneE"] . "</td>";
                        echo "<td>" . $row["DataInizio"] . "</td>";
                        echo "<td>" . $row["DataFine"] . "</td>";
                        echo "</tr>";

                    }
                }
                echo "<table>";
            }

            if (isset($_POST["annox"])) {
                cercaAnno($conn);
            }

            ?>

        </div>



        <div class="logout section_admin">
            <h1>Logout</h1>
            <form method="POST" action="destroy.php">
                <button type="submit" name="Logout">Esci</button>
            </form>






        </div>







    </div>



</body>

</html>