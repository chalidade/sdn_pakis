<?php
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

switch ($id) {
  case 'insert':
    $imageName = "BOOK_COVER";
    $page = "input_ebook";
    $json = array(
    "action"                   => "simpleSave",
    "db"                       => "sdnpakis",
    "table"                    => "tx_hdr_ebook",
    "primaryKey"               => "BOOK_ID",
    "value"                    => [
    array(
    "BOOK_ID"               =>  $_POST['BOOK_ID'],
    "BOOK_COVER"            =>  date("d_m_Y")."_".basename($_FILES[$imageName]["name"]),
    "BOOK_PENGARANG"        =>  $_POST['BOOK_PENGARANG'],
    "BOOK_PENERBIT"         =>  $_POST['BOOK_PENERBIT'],
    "BOOK_TAHUN"            =>  $_POST['BOOK_TAHUN'],
    "BOOK_JUDUL"            =>  $_POST['BOOK_JUDUL'],
    "BOOK_FILE"            =>  date("d_m_Y")."_".basename($_FILES["BOOK_FILE"]["name"]),
    )]);

    if (!empty($_FILES[$imageName]["name"])) uploadImage($imageName, "Membaca");
    if (!empty($_FILES["BOOK_FILE"]["name"])) uploadFile("BOOK_FILE", "Membaca");

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
          // echo "The file ". basename( $_FILES["BOOK_COVER"]["name"]). " has been uploaded.";
      } else {
          // echo "Sorry, there was an error uploading your file.";
      }
  }
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
          // echo "The file ". basename( $_FILES["BOOK_FILE"]["name"]). " has been uploaded.";
      } else {
          // echo "Sorry, there was an error uploading your file.";
      }
  }
}

$data = json_encode($json);
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
