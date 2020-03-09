<?php
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

switch ($id) {
  case 'modalMembaca':
    $imageName = "MEMBACA_COVER";
    $page = "input_membaca";
    $json = array(
    "action"                   => "simpleSave",
    "db"                       => $database,
    "table"                    => "tx_hdr_buku_membaca",
    "primaryKey"               => "MEMBACA_ID",
    "value"                    => [
    array(
    "MEMBACA_ID"               =>  $_POST['MEMBACA_ID'],
    "MEMBACA_COVER"            =>  date("d_m_Y")."_".basename($_FILES[$imageName]["name"]),
    "MEMBACA_TANGGAL"          =>  $_POST['MEMBACA_TANGGAL'],
    "MEMBACA_SISWA"            =>  $_POST['MEMBACA_SISWA'],
    "MEMBACA_GURU"             =>  $_POST['MEMBACA_GURU'],
    "MEMBACA_JUDUL"            =>  $_POST['MEMBACA_JUDUL'],
    "MEMBACA_PENGARANG"        =>  $_POST['MEMBACA_PENGARANG'],
    "MEMBACA_PENERBIT"         =>  $_POST['MEMBACA_PENERBIT'],
    "MEMBACA_TOKOH"            =>  $_POST['MEMBACA_TOKOH'],
    "MEMBACA_RANGKUMAN"        =>  $_POST['MEMBACA_RANGKUMAN'],
    "MEMBACA_SARAN"            =>  $_POST['MEMBACA_SARAN']
    )]);

    if (!empty($_FILES[$imageName]["name"])) uploadImage($imageName, "Membaca");

    break;
    
  default:
    $json = array(
      "ERROR" => "No Format JSON FOUND"
    );
    break;
}

function uploadImage($input,$folder) {
  $target_dir = "../../resource/public/$folder/";
  $target_file = $target_dir . date("d_m_Y")."_".basename($_FILES[$input]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (file_exists($target_file)) $uploadOk = 0;
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) $uploadOk = 0; // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      // echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES[$input]["tmp_name"], $target_file)) {
          // echo "The file ". basename( $_FILES["MEMBACA_COVER"]["name"]). " has been uploaded.";
      } else {
          // echo "Sorry, there was an error uploading your file.";
      }
  }
}

$data = json_encode($json);
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
