<?php

$host     = "localhost";
$username = "root";
$password = "";
$db       = "travel";

$connect = new mysqli($host, $username, $password, $db);
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
