<?php
//server information
$server = "" ; 
$username = "";
$password = "" ;
$dbname = "" ;
session_start() ;

$conn = new mysqli($server, $username, $password, $dbname) ;
mysqli_set_charset($conn,"utf8");
?>