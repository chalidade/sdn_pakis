<?php
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

switch ($id) {
  case 'insert':
    $page = "input_bercerita";
    $json = array(
    "action"                   => "simpleSave",
    "db"                       => "sdnpakis",
    "table"                    => "tx_hdr_buku_bercerita",
    "primaryKey"               => "BERCERITA_NIS",
    "value"                    => [
    array(
    "BERCERITA_NIS"            => $_POST['BERCERITA_NIS'],
    "BERCERITA_JAN"            => $_POST['BERCERITA_JAN'],
    "BERCERITA_FEB"            => $_POST['BERCERITA_FEB'],
    "BERCERITA_MAR"            => $_POST['BERCERITA_MAR'],
    "BERCERITA_APR"            => $_POST['BERCERITA_APR'],
    "BERCERITA_MEI"            => $_POST['BERCERITA_MEI'],
    "BERCERITA_JUN"            => $_POST['BERCERITA_JUN'],
    "BERCERITA_JUL"            => $_POST['BERCERITA_JUL'],
    "BERCERITA_AUG"            => $_POST['BERCERITA_AUG'],
    "BERCERITA_SEP"            => $_POST['BERCERITA_SEP'],
    "BERCERITA_OKT"            => $_POST['BERCERITA_OKT'],
    "BERCERITA_NOV"            => $_POST['BERCERITA_NOV'],
    "BERCERITA_DES"            => $_POST['BERCERITA_DES'],
    "BERCERITA_STATUS"         => "1"
    )]);

    break;

  default:
    $json = array(
      "ERROR" => "No Format JSON FOUND"
    );
    break;
}

$data = json_encode($json);
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
