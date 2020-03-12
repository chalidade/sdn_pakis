<?php

$host     = "localhost";
$username = "root";
$password = "";
$db       = "sdn_pakis";

$mysqli = new mysqli($host,$username,$password,$db);
$myArray = array();
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
