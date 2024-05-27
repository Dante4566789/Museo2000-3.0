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
    <div class="container_ev vi">
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
                <h1>Prenota la tua visita</h1>
                <form method="POST"> <!--action= "../../php/email_sender/email_sender.php"-->

                    <label for="data">Data:</label><br>
                    <input type="date" id="data" name="data" required><br>
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
            </div>
        </div>
    </div>
    <?php
    include '../../php/server/connection.php';

    session_start();
    function prenVis($conn, $email, $data, $quantita, $categoria, $servizio)
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
            } else {
                header('Location: ../login.php?prenotazione=fallita');
            }
            $data = $_POST['data'];
            $quantita = $_POST['quantita'];
            $categoria = $_POST['categoria'];
            $servizio = $_POST['servizio'];
            $long = strtotime($data);
            $evento = "Visita_museo";

            //dettagli visita
            $sql = "SELECT IDEvento, DescrizioneE, Tariffa FROM Evento";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
                if($row["DescrizioneE"] == $evento){
                    $tariffa = $row["Tariffa"];
                
                }
            }



            //dettagli prezzo per categoria
            $sql_category = "SELECT Descrizione, ScontoCategoria FROM Visitatori";
            $result_category = $conn->query($sql_category);
            while($row_category = $result_category->fetch_assoc()){
                if($row_category["Descrizione"] == $categoria){
                    $tariffa = $tariffa - (($tariffa*$row_category["ScontoCategoria"])/100);
                }
            }

            //dettagli prezzo per servizio
            $sql_service = "SELECT DescrizioneS, PrezzoAccessorio FROM Servizio";
            $result_service = $conn->query($sql_service);
            while($row_service = $result_service->fetch_assoc()){
                if($row_service["DescrizioneS"] == $servizio){
                    $tariffa = $tariffa + $row_service["PrezzoAccessorio"]; 
                }
            }

            //inserimento 
            $stmt = $conn->prepare("INSERT INTO Biglietto (Mail, Evento, TariffaTotale, DataValidità, Categoria, Servizio) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sidsii", $email, $evento, $tariffa, $data, $categoria, $servizio);
            //controllo biglietto
            date_default_timezone_set('Italy/Rome');
            $date = date('m/d/Y h:i:s a', time());
            $startdate = strtotime($date);
            $long = strtotime($data);
            if($startdate > $long){
                echo "<script>alert('Attenzione : La data non è valida')</script>";
                exit();
            }



        





            

            /*$stmt1 = $conn->prepare("SELECT IDBiglietto,Mail, Evento, TariffaTotale, DataValidità, Categoria, Servizio FROM Biglietto ORDER BY IDBiglietto DESC");
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            $temp = 0;
            while ($row1 = $result1->fetch_assoc() && $temp == 0) {
                $temp = $temp + 1;
                if ($row1["Mail"] == $_SESSION["email"]) {
                    $_SESSION["id"] = $row1["IDBiglietto"];
                }
            }*/

            $_SESSION["evento"] = "Visita Al Museo";
            $_SESSION["data"] = $data;
            $_SESSION["quantita"] = $quantita;
            header("Location: ../../php/email_sender/email_sender.php");
            exit();
        }
    }
    if (isset($_POST['Prenota'])) {
        prenVis($conn, $email, $data, $quantita, $categoria, $servizio);
    }
    ?>

</body>

</html>