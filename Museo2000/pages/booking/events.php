<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo2000</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="../../global.css">
    <link rel="icon" type="image/x-icon" href="../../public/favicon.ico">
</head>

<body>
    <div class="container_ev ev_back">
        <header>
            <a href="../../../Museo2000/pages/home.php" class="logo">Museo2000</a>
            <ul>
                <li><a href="../../pages/visits.php">Visitaci</a></li>
                <li><a href="../../pages/home.php#about">About</a></li>
                <li><a href="../../pages/events.php">Eventi</a></li>
                <li><a href="../../pages/login.php">Login</a></li>

            </ul>

        </header>
        <script type="text/javascript">
            window.addEventListener("scroll", function() {
                var header = document.querySelector("header");
                header.classList.toggle("sticky", window.scrollY > 0);
            })
        </script>
        <div class="ev">
            <div class="wrapper_ev">
                <h1>Prenota il tuo evento</h1>
                <form method="POST">
                    <!--action= "../../php/email_sender/email_sender.php"      action="../../pages/home.php"-->

                    <!-- <label for="email">Email:</label><br>
        <input type="Mail" id="Mail" name="Mail" required><br>
        <br>-->
                    <label for="data">Data:</label><br>
                    <input type="date" id="data" name="data" required>
                    <br>
                    <label for="evento">Evento:</label><br>
                    <select id="evento" name="evento" required>
                        <?php
                        include("../../php/server/connection.php");
                        $sql = "SELECT DescrizioneE FROM Evento";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            if (isset($_GET["evento"])) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row["DescrizioneE"] === $_GET["evento"]) {
                                        echo "<option value='" . $row["DescrizioneE"] . "' selected = 'selected'>";
                                        echo $row["DescrizioneE"];
                                        echo "</option>";
                                        while ($row_1 = $result->fetch_assoc()) {
                                            if ($row_1["DescrizioneE"] != "Visita_museo" && $row_1["DescrizioneE"] != $_GET["evento"]) {
                                                echo "<option value='" . $row_1["DescrizioneE"] . "'>";
                                                echo $row_1["DescrizioneE"];
                                                echo "</option>";
                                            }
                                        }
                                    }
                                }
                            }

                            while ($row = $result->fetch_assoc()) {

                                if ($row["DescrizioneE"] != "Visita_museo") {
                                    echo "<option value='" . $row["DescrizioneE"] . "'>";
                                    echo $row["DescrizioneE"];
                                    echo "</option>";
                                }
                            }
                        } else {
                            echo "eventi non trovati";
                        } ?>

                    </select>
                    <br>
                    <label for="quantita">Quantità:</label><br>
                    <select id="quantita" name="quantita" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>
                    <br>
                    <label for="categoria">Categoria</label><br>
                    <select id="categoria" name="categoria">
                        <option value="" selected disabled>Seleziona una categoria</option>
                        <option value="bambino">bambino (<12) </option>
                        <option value="studente">studente</option>
                        <option value="pubblica istruzione">pubblica istruzione</option>
                        <option value="anziani">anziani (>65)</option>
                        <option value="disabili">disabili</option>
                    </select><br>
                    <br>
                    <label for="servizio">Servizio</label><br>
                    <select id="servizio" name="servizio">
                        <option value="" selected disabled>Seleziona un servizio</option>
                        <option value="audio">audioguida</option>
                        <option value="guida">guida</option>
                        <option value="mappa">mappa</option>
                    </select><br>
                    <br>
                    <input class="button" type="submit" value="Prenota" name="Prenota">
                </form>
                <?php
                include '../../php/server/connection.php';
                session_start();
                function prenVis($conn, $email, $evento, $data, $quantita, $categoria, $servizio)
                {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        //$email = $_POST['Mail'];
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                        } else {
                            header('Location: ../login.php');
                        }
                        $data = $_POST['data'];
                        $quantita = $_POST['quantita'];
                        $categoria = $_POST['categoria'];
                        $servizio = $_POST['servizio'];
                        $long = strtotime($data);
                        $evento = $_POST['evento'];

                        $sql = "SELECT IDEvento, DescrizioneE, DataInizio, DataFine FROM Evento";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($evento == $row["DescrizioneE"]) {
                                    $evento = $row["IDEvento"];
                                    $data_inizio = strtotime($row["DataInizio"]);
                                    $data_fine = strtotime($row["DataFine"]);
                                    if ($long < $data_inizio || $long > $data_fine) {
                                        $data_conferma = "no";
                                    }
                                    $_SESSION["evento"] = $row["DescrizioneE"];

                                }
                            }
                        }


                        $tariffaTotale = $quantita * 15;
                        if ($categoria === 'bambino') {
                            $tariffaTotale *= 0.50; // Prezzo per bambino
                            $categoria = 1;
                        } elseif ($categoria === 'studente') {
                            $tariffaTotale *= 0.80; // Prezzo per studente
                            $categoria = 2;
                        } elseif ($categoria === 'pubblica istruzione') {
                            $tariffaTotale *= 0.75; // Prezzo per pubblica istruzione
                            $categoria = 3;
                        } elseif ($categoria === 'anziani') {
                            $tariffaTotale *= 0.70; // Prezzo per anziani
                            $categoria = 4;
                        } elseif ($categoria === 'disabili') {
                            $tariffaTotale *= 0.65; // Prezzo per disabili
                            $categoria = 5;
                        }
                        if ($servizio === 'audio') {
                            $tariffaTotale += 10 * $quantita; // Prezzo per audioguida
                            $servizio = 1;
                        } elseif ($servizio === 'guida') {
                            $tariffaTotale += 12 * $quantita; // Prezzo per guida
                            $servizio = 2;
                        } elseif ($servizio === 'mappa') {
                            $tariffaTotale += 1 * $quantita; // Prezzo per mappa
                            $servizio = 3;
                        }
                        /*if ($evento === 'Basquiat') {
                    $evento = 2;
                } elseif ($evento === 'Van_gogh') {
                    $evento = 3;
                } elseif ($evento === 'Dali') {
                    $evento = 4;
                } elseif ($evento === 'Frida_Khalo') {
                    $evento = 5;
                }*/


                        $stmt = $conn->prepare("INSERT INTO Biglietto (Mail, Evento, TariffaTotale, DataValidità, Categoria, Servizio) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sidsii", $email, $evento, $tariffaTotale, $data, $categoria, $servizio);

                        for ($i = 0; $i < $quantita; $i++) {
                            if ($data_conferma == "no") {
                                echo "<script>alert('Attenzione : La data non è valida')</script>";
                                exit();
                            }
                            $stmt->execute();
                            
                        }

                        $stmt1 = $conn->prepare("SELECT IDBiglietto,Mail, Evento, TariffaTotale, DataValidità, Categoria, Servizio FROM Biglietto ORDER BY IDBiglietto DESC");
                        $stmt1->execute();
                        $result1 = $stmt1->get_result();
                        $temp = 0;
                        while($row1 = $result1->fetch_assoc() && $temp==0) {
                            $temp = $temp + 1;
                            if($row1["Mail"] == $_SESSION["email"]){
                                $_SESSION["id"] = $row1["IDBiglietto"];
                               
                            }

                        }


                        
                        $_SESSION["data"] = $data;
                        $_SESSION["quantita"] = $quantita;
                        header("Location: end.php");
                        exit();
                    }
                }
                if (isset($_POST['Prenota'])) {
                    prenVis($conn, $email, $evento, $data, $quantita, $categoria, $servizio);
                    header('Location: ../home.php');
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>