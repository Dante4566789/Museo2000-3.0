<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo2000</title>
    <link rel="stylesheet" href="../../global.css?v=34  ">
    <link rel="icon" type="image/x-icon" href="../../public/favicon.ico">
</head>

<body>

    <header>
        <a href="../../../Museo2000/pages/home.php" class="logo">Museo2000</a>
        <ul>
            <li><a href="../../pages/visits.php">Visitaci</a></li>
            <li><a href="../../pages/home.php#about">About</a></li>
            <li><a href="../../pages/events.php">Eventi</a></li>
            <li><a href="../../pages/login.php">Login</a></li>

        </ul>

    </header>


    <?php
    session_start();
    if ($_SESSION["tipo"] != 'U') {
        header("Location: ../login.php?login=fallito");
    }
    ?>


    <section class="banner_home home_01 p5">
        <div class="hero_box_text">
            <h1>Controllo Account</h1>
    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function () {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>


    <div class="container_3but">
        <button onclick="location.href='../events.php'">Prenota un'evento</button>
        <button onclick="location.href='../visits.php'">Prenota una visita</button>
        <button onclick="location.href='destroy.php'">Logout</button>



    </div>

    <div style="padding-bottom : 50px; padding-left:50px;
    padding-right : 50px;" class="acquisti">
        <h1>Biglietti acquistati</h1>
        <div class="v2_column acquisti_column">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Quantità</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include ("../../php/server/connection.php");
                    session_start();





                    $sql = "SELECT IDBiglietto,Mail,Evento,TariffaTotale,DataValidità,Categoria,Servizio,Validita FROM Biglietto WHERE Mail = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $_SESSION["email"]);

                    $stmt->execute();
                    $result = $stmt->get_result();
                    $data = "";
                    $evento = "";
                    while ($row = $result->fetch_assoc()) {
                        // funzione quantita
                        $stmt1 = $conn->prepare("SELECT COUNT(*) as count,Evento FROM Biglietto WHERE Mail = ? AND Evento = ? AND DataValidità = ? GROUP BY Mail,Evento,DataValidità;");
                            $stmt1->bind_param("sis", $_SESSION["email"], $row["Evento"],$row["DataValidità"]);
                            $stmt1->execute();
                            $result1 = $stmt1->get_result();
                            $result_row = $result1->fetch_assoc();
                            $quantita = $result_row["count"];
                        
                        //funzione nome evento 
                        $sql2 = "SELECT DescrizioneE, IDEvento FROM Evento" ;
                        $result2 = $conn->query($sql2);
                        while($row2 = $result2->fetch_assoc()){
                            if($row2["IDEvento"] == $row["Evento"]){
                                $eventoName = $row2["DescrizioneE"];
                            }
                        }

                        if ($data != $row["DataValidità"]) {
                                echo "<tr>";
                                echo "<td>" . $eventoName. "</td>";
                                echo "<td>" . $row["DataValidità"] . "</td>";
                                echo "<td>" . $quantita . "</td>";
                                echo "</tr>";   
                            
                        } else if ($evento != $row["Evento"]) {
                            echo "<tr>";
                            echo "<td>" . $eventoName. "</td>";
                            echo "<td>" . $row["DataValidità"] . "</td>";
                            echo "<td>" . $quantita . "</td>";
                            echo "</tr>";
                        }
                        $data = $row["DataValidità"];
                        $evento = $row["Evento"];

                    }


                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <?php
        include ("../../php/components/footer.php")
            ?>
    </footer>


</body>

</html>