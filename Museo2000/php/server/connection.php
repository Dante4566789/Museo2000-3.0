<?php
//pagina di connessione al database 


$conn = new mysqli('localhost','palladoriccardo','nq83zEmY2A68','my_palladoriccardo');

if($conn -> connect_error){
    die('connessione fallita : ' .$conn -> connect_error);

}



?>