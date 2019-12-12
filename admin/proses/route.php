<?php
include "save.php";

$page   = $_REQUEST["page"];
$action = $_POST["action"];
$table  = $_POST["table"];
$data   = $_POST["data"];

foreach ($data as $a) {
  $input[] = "'".$a."'";
}

  $action($input, $table, $page);
 ?>
