<?php 

ini_set('display_errors' , 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//controllare se si sta logando come admin o come user


//Prendiamo i risultati dal form

include 'connection.php';

//Verifichiamo se il login ha preso i dati

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['email'] || empty($_POST['password']))){
        echo("Dati mancanti");
    }else {
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

    }

}

session_start();
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;




//verifichiamo siano giusti rispetto ai dati del database

function check($conn, $email, $password){
    $sql = 'SELECT email, password FROM Utente;';

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            if($row["email"] == $_SESSION["email"] && password_verify($_SESSION['password'], $row["password"])){
                if($row['ruolo'] == 'admin'){
                    header('Location: ../index/dashboard_admin.php?msg=success');
                    exit();
                }else if(isset($_GET["biglietto"]) && $_GET["biglietto"] == 'true' ){
                    header('Location: ../../pages/booking/events.php');
                }else{
                    header('Location: ../../pages/home.php?msg=success');
                    exit();
                }
            }
        }
        /*if(isset($_GET["biglietto"]) && $_GET["biglietto"] == 'failed' ){
            header('Location: ../../pages/login.php?biglietto=failed');
        }else {
            header('Location: ../../pages/login.php?msg=failed');
        }*/
        header('Location: ../../pages/login.php?msg=failed');
        exit();

    }
}

check($conn,$email,$password);

/*function check($conn, $email, $password){
    //controlloadmin
    
    $sql = "SELECT * FROM utenti";

    $result = $conn->query($sql);
    $rows = $result->num_rows;
    if($rows>0){
        while($row = $result->fetch_assoc()){

            if($row['email']!=$_SESSION["email"] && $row['password']!=$_SESSION["password"]){
                header("Location: ../index/log/login.php?msg=failed");
                
            }

            if($row['email']==$_SESSION["email"] && $row['password']==$_SESSION["password"]){
                if($row['ruolo']=='admin'){
                    header('Location: ../index/dashboard_admin.php?msg=success');
                }else{
                    header('Location: ../index/dashboard_user.php?msg=success');
                }
            }
        }
    }
}
check($conn,$email,$password);*/





/*if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['email']) && empty($_POST['password']))
    {
        echo("Dati mancanti");
    }
}//controlliamo che esistano i dati


$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password' AND ruolo = 'admin'";
$result = $conn->query($sql);

if( $result->num_rows > 0){
    header('Location: ../index/dashboard_admin.php');
}



if( $result ->num_rows > 0){
    //controlliamo che dentro al database esistano gli utenti
    while($row = $result -> fetch_assoc()){
        if($row["email"] == $email  ){
            
            header('Location : ../index/dashboard_admin.php');
        }
    }

}
*/
/*if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST['email']) && empty($_POST['password'])){
        echo ("Dati Mancanti");
    }
}

$email = $_POST["email"];
$password = $_POST["password"];

function controllo($email, $password,$conn){
    

    /*$sql = "SELECT * FROM utenti ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            if($row["email"]==$email){
                if($row["password"]==$password){   
                    echo ("");
            }
        }
    }

    $sql = "SELECT * FROM utenti";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            if($row["email"]==$email){
                
            }
        }
    }
    
}

controllo($email, $password);*/





?>