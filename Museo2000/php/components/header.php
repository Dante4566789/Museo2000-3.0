<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museo2000</title>
    <link rel="stylesheet" href="Museo2000/global.css?v=1">
    <script src="https://kit.fontawesome.com/5ebde279c1.js" crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <a href="/Museo2000/index.php"class="logo">Museo2000</a>
       

        <ul>
            <li><a href="/Museo2000/visits.php">Visitaci</a></li>
            <li><a href="/Museo2000/index.php#about">About</a></li>
            <li><a href="/Museo2000/events.php">Eventi</a></li>
            <li><img class="utenti" src="/Museo2000/public/assets/login_20.png" onclick="redirectone()"></img></li>





            <script>

        

                function redirectone() {

                    /*if (tipo == "U") {
                        window.location.href = "../../Museo2000/pages/admin/dashboard_user.php";
                    } else if (tipo == "A") {
                        window.location.href = "../../Museo2000/pages/admin/dashboard_admin.php";
                    } else {
                        window.location.href = "../../Museo2000/pages/login.php";
                    }*/

                    session_status = <?php echo (session_start()); ?>;
                    if (session_status == false) {
                        window.location.href = "../login.php";
                    } else if (session_status) {
                        tipo = '<?php echo $_SESSION["tipo"]; ?>';
                        if (tipo == 'U') {
                            window.location.href = "/Museo2000/admin/dashboard_user.php";
                        } else {
                            window.location.href = "/Museo2000/admin/dashboard_admin.php";
                        }
                    }







                }

            </script>
        </ul>

    </header>





</body>

</html>