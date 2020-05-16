<?php
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

if (isset($_REQUEST["ext"])) {
  $role = "3";
} else if (isset($_REQUEST["adm"])) {
  $role = "4";
} else {
  $role = "2";
}

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
            "USER_ID"         => "",
            'USER_NAME'       => $_POST["USER_NAME"],
            'USER_EMAIL'      => $_POST["USER_EMAIL"],
            'USER_ADDRESS'    => $_POST["USER_ADDRESS"],
            'USER_ROLE'       => $role,
            'USER_PASSWORD'   => "",
            'USER_BIRTHDATE'  => $_POST["USER_BIRTHDATE"],
            'USER_BIRTHPLACE' => $_POST["USER_BIRTHPLACE"],
            'USER_NIP'        => $_POST["USER_NIP"],
            'USER_TOKEN'      => '',
            'USER_STATUS'     => '',
            'USER_ACTIVITY'   => '',
            'USER_PHOTO'      => date("d_m_Y")."_".basename($_FILES[$imageName]["name"])
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
            "DTL_TELPON"        => $_POST["DTL_TELPON"]
          ),
        ),
      ),
    );

    if (!empty($_FILES[$imageName]["name"])) uploadImage($imageName, "User");

    break;

    case 'update':
      $guruId     = $_POST["USER_ID"];
      $imageName  = "USER_PHOTO";
      if (!empty($_FILES[$imageName]["name"])) {
        $photo = date("d_m_Y")."_".basename($_FILES[$imageName]["name"]);
      } else {
        $photo = $_POST["USER_PHOTO_BACKUP"];
      }

      if (!empty($_REQUEST['data'])) {
        $page = "../../index.php?id=data_guru&start=0";
      } else {
        $page  = "detail_guru.php?id=$guruId";
      }

      $modal = "true";
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
              "USER_ID"         => $guruId,
              'USER_NAME'       => $_POST["USER_NAME"],
              'USER_EMAIL'      => $_POST["USER_EMAIL"],
              'USER_ADDRESS'    => $_POST["USER_ADDRESS"],
              'USER_ROLE'       => $role,
              'USER_PASSWORD'   => $_POST["USER_PASSWORD"],
              'USER_BIRTHDATE'  => $_POST["USER_BIRTHDATE"],
              'USER_BIRTHPLACE' => $_POST["USER_BIRTHPLACE"],
              'USER_NIP'        => $_POST["USER_NIP"],
              'USER_TOKEN'      => '',
              'USER_STATUS'     => '',
              'USER_ACTIVITY'   => '',
              'USER_PHOTO'      => $photo
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
              "DTL_TELPON"        => $_POST["DTL_TELPON"]
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
