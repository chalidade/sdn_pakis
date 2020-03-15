<?php
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

switch ($id) {
  case 'insert':
    $imageName = "DTL_PHOTO";
    $page = "data_siswa";
    $json = array (
      'action' => 'saveheaderdetail',
      'data' =>
      array (
      'HEADER','DETAIL'
      ),
      'HEADER' =>
      array (
        'DB' => $databaseApi,
        'TABLE' => 'tx_hdr_user',
        'PK' => 'USER_ID',
        'VALUE' =>
        array (
          array (
            "USER_ID"         => "",
            'USER_NAME'       => $_POST["USER_NAME"],
            'USER_EMAIL'      => $_POST["USER_EMAIL"],
            'USER_ADDRESS'    => $_POST["USER_ADDRESS"],
            'USER_ROLE'       => '1',
            'USER_PASSWORD'   => $_POST["DTL_NIS"],
            'USER_BIRTHDATE'  => $_POST["USER_BIRTHDAY"],
            'USER_BIRTHPLACE' => $_POST["USER_BIRTHPLACE"],
            'USER_NIP'        => '',
            'USER_TOKEN'      => '',
            'USER_STATUS'     => '',
            'USER_ACTIVITY'   => '',
            'USER_PHOTO'      => date("d_m_Y")."_".basename($_FILES[$imageName]["name"])
          ),
        ),
      ),
      'DETAIL' =>
      array (
        'DB' => 'sdnpakis',
        'TABLE' => 'tx_dtl_user_siswa',
        'FK' =>
        array (
          'DTL_HDR_ID',
          'USER_ID',
        ),
        'VALUE' =>
        array (
          array (
            'DTL_TINGKAT'  => $_POST["DTL_TINGKAT"],
            'DTL_KELAS'    => $_POST["DTL_KELAS"],
            'DTL_AYAH'     => $_POST["DTL_AYAH"],
            'DTL_IBU'      => $_POST["DTL_IBU"],
            'DTL_PRESTASI' => '',
            'DTL_NIS'      => $_POST["DTL_NIS"]
          ),
        ),
      ),
    );

    if (!empty($_FILES[$imageName]["name"])) uploadImage($imageName, "User");

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
          // echo "The file ". basename( $_FILES[$input]["name"]). " has been uploaded.";
      } else {
          // echo "Sorry, there was an error uploading your file.";
      }
  }
}

$data = json_encode($json);
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
