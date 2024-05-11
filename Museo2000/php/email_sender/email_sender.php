<?php


session_start();

$template_file = "template/template_1.php";


$swap_var = array(
    "{SESSIONE}" => $_SESSION["email"]
);

$to      = "palladoriccardo@gmail.com";
$subject = 'Prenotazione del biglietto';
$message = file_get_contents($template_file);
$headers  = "From: Museo200"."\r\n";
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