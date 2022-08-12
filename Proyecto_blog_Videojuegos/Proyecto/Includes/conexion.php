<?php
$Server='localhost';
$userame="root";
$password="";
$database="proyectphp";

$db= mysqli_connect($Server,$userame,$password,$database);
mysqli_query($db,"SET NAMES 'utf8'");
// Iniciar la seccion
if(!isset($_SESSION)){session_start();}
?>