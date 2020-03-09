<?php
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

switch ($id) {
  case 'profileModel':
    $imageName = "PROFILE_IMAGE";
    $page = "profil";
    $json = array(
    "action"                   => "simpleSave",
    "db"                       => $database,
    "table"                    => "tx_home_profile",
    "primaryKey"               => "PROFILE_ID",
    "value"                    => [
    array(
    "PROFILE_ID"               =>  "1",
    "PROFILE_IMAGE"            =>  date("d_m_Y")."_".basename($_FILES[$imageName]["name"]),
    "PROFILE_VISI"              =>  $_POST['PROFILE_VISI'],
    "PROFILE_MISI"             =>  $_POST['PROFILE_MISI'],
    "PROFILE_INFORMASI"        =>  $_POST['PROFILE_INFORMASI'],
    "PROFILE_MAPS"             =>  $_POST['PROFILE_MAPS'],
    )]);

    if (!empty($_FILES[$imageName]["name"])) uploadImage($imageName, "Profile");

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
          // echo "The file ". basename( $_FILES["PROFILE_IMAGE"]["name"]). " has been uploaded.";
      } else {
          // echo "Sorry, there was an error uploading your file.";
      }
  }
}

$data = json_encode($json);
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
