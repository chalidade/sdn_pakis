<?php
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

switch ($id) {
  case 'insert':
    $imageName = "DTL_PHOTO";
    $page = "data_guru";
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
            "USER_ID"         => "6",
            'USER_NAME'       => $_POST["USER_NAME"],
            'USER_EMAIL'      => $_POST["USER_EMAIL"],
            'USER_ADDRESS'    => $_POST["USER_ADDRESS"],
            'USER_ROLE'       => '2',
            'USER_PASSWORD'   => $_POST["DTL_NIP"],
            'USER_BIRTHDATE'  => $_POST["USER_BIRTHDATE"],
            'USER_BIRTHPLACE' => $_POST["USER_BIRTHPLACE"],
            'USER_NIP'        => $_POST["DTL_NIP"],
            'USER_TOKEN'      => '',
            'USER_STATUS'     => '',
            'USER_ACTIVITY'   => '',
          ),
        ),
      ),
      'DETAIL' =>
      array (
        'DB' => $databaseApi,
        'TABLE' => 'tx_dtl_user_guru',
        'FK' =>
        array (
          'DTL_HDR_ID',
          'USER_ID',
        ),
        'VALUE' =>
        array (
          array (
            "DTL_ID"            => "",
            "DTL_HDR_ID"        => "",
            "DTL_NUPTK"         => $_POST["DTL_NUPTK"],
            "DTL_STATUS"        => $_POST["DTL_STATUS"],
            "DTL_JABATAN"       => $_POST["DTL_JABATAN"],
            "DTL_IJAZAH"        => $_POST["DTL_IJAZAH"],
            "DTL_IJAZAH_TAHUN"  => $_POST["DTL_IJAZAH_TAHUN"],
            "DTL_IJAZAH_JURUSAN"=> $_POST["DTL_IJAZAH_JURUSAN"],
            "DTL_TANGGAL_MULAI" => $_POST["DTL_TANGGAL_MULAI"],
            "DTL_GOL"           => $_POST["DTL_GOL"],
            "DTL_TELPON"        => $_POST["DTL_TELPON"],
            'DTL_PHOTO'         => date("d_m_Y")."_".basename($_FILES[$imageName]["name"]),
          ),
        ),
      ),
    );

    if (!empty($_FILES[$imageName]["name"])) uploadImage($imageName, "Guru");

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
