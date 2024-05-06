<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo2000</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <h2>Prenota l'evento</h2>
    <form method="POST"> <!--action= "../../php/email_sender/email_sender.php"      action="../../pages/home.php"-->

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
        <input type="submit" value="Prenota" name="Prenota">
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

            $evento = $_POST['evento'];

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
            if ($evento === 'Basquiat') {
                $evento = 2;
            } elseif ($evento === 'Van_gogh') {
                $evento = 3;
            } elseif ($evento === 'Dali') {
                $evento = 4;
            } elseif ($evento === 'Frida_Khalo') {
                $evento = 5;
            }
            $data = date("Y/m/d", strtotime($data));
            $stmt = $conn->prepare("INSERT INTO Biglietto (Mail, Evento, TariffaTotale, DataValidità, Categoria, Servizio) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sidsii", $email, $evento, $tariffaTotale, $data, $categoria, $servizio);

            for ($i = 0; $i < $quantita; $i++) {
                $stmt->execute();
            }
            header('Location: end.php');
            exit();
        }
    }
    if (isset($_POST['Prenota'])) {
        prenVis($conn, $email, $evento, $data, $quantita, $categoria, $servizio);
    }
    ?>
</body>

</html>