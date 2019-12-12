<?php
include "koneksi.php";
$id   = $_REQUEST["id"];
$page = $_REQUEST["page"];
$data = $_REQUEST["data"];

$del  = mysqli_query($connect, "DELETE FROM `$data` WHERE `$data`.`id` = $id");
echo "<script>alert('Data Berhasil Dihapus');window.location = '../home.php?id=$page';</script>";
 ?>
