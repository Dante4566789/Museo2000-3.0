<?php

include("../server/connection.php");
session_start();

$template_file = "template/template_1.php";




$swap_var = array(
    "{nome}" => $_SESSION["nome"],
    "{nomeEvento}" => $_SESSION["evento"],
    "{data}" => $_SESSION["data"],
    "{quantita}" => $_SESSION["quantita"],
    "{id}" => $_SESSION["id"]
);




$to      = $_SESSION["email"];
$subject = 'Prenotazione del biglietto';
$message = file_get_contents($template_file);
$headers  = "From: Museo2000"."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .=  'X-Mailer: PHP/' . phpversion()."\r\n";

foreach(array_keys($swap_var) as $key){
    if(strlen($key) > 2 && trim($key) != ""){
        $message = str_replace($key,$swap_var[$key],$message);
    }
}



if(mail($to, $subject, $message, $headers)){
    header("Location: ../../pages/booking/end.php");
}else{
    echo "errore durante l'acquisto, controlla bene i campi o rifai il login";
}

?>