<?php 

ini_set('display_errors' , 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ("../../php/server/connection.php");


session_start();
if($_SESSION["tipo"] == "U"){
    header("Location: ../login.php?admin=false");
}

echo "success";




?>