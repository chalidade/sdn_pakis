<?php
session_start();
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

switch ($id) {
  case 'modalBerita':
    $imageName = "BERITA_IMAGE";
    $page = "berita";
    $json = array(
    "action"                   => "simpleSave",
    "db"                       => "sdnpakis",
    "table"                    => "tx_home_berita",
    "primaryKey"               => "BERITA_ID",
    "value"                    => [
    array(
    "BERITA_ID"               =>  "",
    "BERITA_IMAGE"            =>  date("d_m_Y")."_".basename($_FILES[$imageName]["name"]),
    "BERITA_JUDUL"            =>  $_POST['BERITA_JUDUL'],
    "BERITA_DESKRIPSI"        =>  $_POST['BERITA_DESKRIPSI'],
    "BERITA_USER"             =>  $_POST["BERITA_USER"],
    )]);

    if (!empty($_FILES[$imageName]["name"])) uploadImage($imageName, "Berita");

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
          // echo "The file ". basename( $_FILES["BERITA_IMAGE"]["name"]). " has been uploaded.";
      } else {
          // echo "Sorry, there was an error uploading your file.";
      }
  }
}

$data = json_encode($json);
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
