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
        $email = strtolower(htmlentities($_POST['email']));
        $password = htmlentities($_POST['password']);

    }

}

session_start();
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;


setcookie('mail', $email, time() + 120);



//verifichiamo siano giusti rispetto ai dati del database

function check($conn, $email, $password){
    $sql = 'SELECT nome, cognome, email, password, tipo FROM Utente;';

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            if($row["email"] == $_SESSION["email"] && password_verify($_SESSION['password'], $row["password"])){
               
                if($row["tipo"] == "A"){
                    
                    $_SESSION["nome"]  = $row["nome"];
                    $_SESSION["tipo"] = 'A';
                    header('Location: ../../pages/admin/dashboard_admin.php');
                    exit();
                }else{
                    
                    $_SESSION['nome'] = $row['nome'];
                    $_SESSION["tipo"] = 'U';
                    header('Location: ../../pages/home.php?msg=success');
                    exit();
                }
            }
        }
        
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