<?php
error_reporting(0);
include "../config/setting.php";

$id = $_REQUEST['id'];

switch ($id) {
  case 'insert':
    $page = "input_raport";
    $json = array(
    "action"                   => "simpleSave",
    "db"                       => "sdnpakis",
    "table"                    => "tx_hdr_raport",
    "primaryKey"               => "RAPORT_ID",
    "value"                    => [
    array(
    "RAPORT_ID"               => "",
    "RAPORT_NAMA_SISWA"       => $_POST['RAPORT_NAMA_SISWA'],
    "RAPORT_KELAS"            => $_POST['RAPORT_KELAS'],
    "RAPORT_MAPEL"            => $_POST['RAPORT_MAPEL'],
    "RAPORT_GURU"             => $_POST['RAPORT_GURU'],
    "RAPORT_NIS"              => $_POST['RAPORT_NIS'],
    "RAPORT_TAHUN"            => $_POST['RAPORT_TAHUN'],
    "RAPORT_USER_ID"          => $_POST["RAPORT_USER_ID"],
    "RAPORT_FILE"             =>  date("d_m_Y")."_".basename($_FILES["RAPORT_FILE"]["name"]),
    )]);

    if (!empty($_FILES["RAPORT_FILE"]["name"])) uploadFile("RAPORT_FILE", "Raport");

    break;

  default:
    $json = array(
      "ERROR" => "No Format JSON FOUND"
    );
    break;
}


function uploadFile($input,$folder) {
  $target_dir = "../../resource/public/$folder/";
  $target_file = $target_dir . date("d_m_Y")."_".basename($_FILES[$input]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (file_exists($target_file)) $uploadOk = 0;
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      // echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES[$input]["tmp_name"], $target_file)) {
          // echo "The file ". basename( $_FILES["RAPORT_FILE"]["name"]). " has been uploaded.";
      } else {
          // echo "Sorry, there was an error uploading your file.";
      }
  }
}

$data = json_encode($json);
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
