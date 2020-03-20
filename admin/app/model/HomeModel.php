<?php
error_reporting(0);
include "../config/setting.php";

// header('Content-Type: application/json');
$id = $_REQUEST['id'];

switch ($id) {
  case 'slider':
      $imageA = "SLIDER_IMG_A";
      $imageB = "SLIDER_IMG_B";
      $imageC = "SLIDER_IMG_C";
      $imageD = "SLIDER_IMG_D";
      $page   = "homepage";

      if (empty($_FILES[$imageA]["name"])) {
        $imgA = $_POST["SLIDER_IMG_A_BACKUP"];
      } else {
        $imgA = date("d_m_Y")."_".basename($_FILES[$imageA]["name"]);
      }

      if (empty($_FILES[$imageB]["name"])) {
        $imgB = $_POST["SLIDER_IMG_B_BACKUP"];
      } else {
        $imgB = date("d_m_Y")."_".basename($_FILES[$imageB]["name"]);
      }

      if (empty($_FILES[$imageC]["name"])) {
        $imgC = $_POST["SLIDER_IMG_C_BACKUP"];
      } else {
        $imgC = date("d_m_Y")."_".basename($_FILES[$imageC]["name"]);
      }

      if (empty($_FILES[$imageD]["name"])) {
        $imgD = $_POST["SLIDER_IMG_D_BACKUP"];
      } else {
        $imgD = date("d_m_Y")."_".basename($_FILES[$imageD]["name"]);
      }

      $json = array(
        "action"                => "simpleSave",
        "db"                    => $databaseApi,
        "table"                 => "tx_home_slider",
        "primaryKey"            => "SLIDER_ID",
        "value"                 => [
        array(
        "SLIDER_ID"             =>  $_POST['SLIDER_ID'][0],
        "SLIDER_IMG"            =>  $imgA,
        "SLIDER_TITLE"          =>  $_POST['SLIDER_TITLE'][0],
        "SLIDER_DESC"           =>  $_POST['SLIDER_DESC'][0]
        ),
        array(
        "SLIDER_ID"             =>  $_POST['SLIDER_ID'][1],
        "SLIDER_IMG"            =>  $imgB,
        "SLIDER_TITLE"          =>  $_POST['SLIDER_TITLE'][1],
        "SLIDER_DESC"           =>  $_POST['SLIDER_DESC'][1]
        ),
        array(
        "SLIDER_ID"             =>  $_POST['SLIDER_ID'][2],
        "SLIDER_IMG"            =>  $imgC,
        "SLIDER_TITLE"          =>  $_POST['SLIDER_TITLE'][2],
        "SLIDER_DESC"           =>  $_POST['SLIDER_DESC'][2]
        ),
        array(
        "SLIDER_ID"             =>  $_POST['SLIDER_ID'][3],
        "SLIDER_IMG"            =>  $imgD,
        "SLIDER_TITLE"          =>  $_POST['SLIDER_TITLE'][3],
        "SLIDER_DESC"           =>  $_POST['SLIDER_DESC'][3]
        )]
      );

      if (!empty($_FILES[$imageA]["name"])) uploadImage($imageA,"Slider");
      if (!empty($_FILES[$imageB]["name"])) uploadImage($imageB,"Slider");
      if (!empty($_FILES[$imageC]["name"])) uploadImage($imageC,"Slider");
      if (!empty($_FILES[$imageD]["name"])) uploadImage($imageD,"Slider");

      break;

  case 'kataPengantar':
      $image          = "PENGANTAR_IMG";
      $page           = "homepage";


      if (empty($_FILES[$image]["name"])) {
        $imgPengantar = $_POST["PENGANTAR_IMG_BACKUP"];
      } else {
        $imgPengantar = date("d_m_Y")."_".basename($_FILES[$image]["name"]);
      }

      $json = array(
        "action"                => "simpleSave",
        "db"                    => $databaseApi,
        "table"                 => "tx_home_pengantar",
        "primaryKey"            => "PENGANTAR_ID",
        "value"                 => [
        array(
        "PENGANTAR_ID"          => "1",
        "PENGANTAR_IMG"         =>  $imgPengantar,
        "PENGANTAR_TITLE"       =>  $_POST['PENGANTAR_TITLE'],
        "PENGANTAR_DESC"        =>  $_POST['PENGANTAR_DESC']
        )]
      );

      if (!empty($_FILES[$image]["name"])) uploadImage($image,"Pengantar");
      break;

  case 'fasilitasHomepage':
      $imageA = "FASILITAS_IMG_A";
      $imageB = "FASILITAS_IMG_B";
      $imageC = "FASILITAS_IMG_C";
      $imageD = "FASILITAS_IMG_D";
      $imageE = "FASILITAS_IMG_E";
      $imageF = "FASILITAS_IMG_F";
      $page   = "homepage";


      if (empty($_FILES[$imageA]["name"])) {
        $imgA = $_POST["FASILITAS_IMG_A_BACKUP"];
      } else {
        $imgA = date("d_m_Y")."_".basename($_FILES[$imageA]["name"]);
        uploadImage($imageA,"Fasilitas");
      }

      if (empty($_FILES[$imageB]["name"])) {
        $imgB = $_POST["FASILITAS_IMG_B_BACKUP"];
      } else {
        $imgB = date("d_m_Y")."_".basename($_FILES[$imageB]["name"]);
        uploadImage($imageB,"Fasilitas");

      }

      if (empty($_FILES[$imageC]["name"])) {
        $imgC = $_POST["FASILITAS_IMG_C_BACKUP"];
      } else {
        $imgC = date("d_m_Y")."_".basename($_FILES[$imageC]["name"]);
        uploadImage($imageC,"Fasilitas");

      }

      if (empty($_FILES[$imageD]["name"])) {
        $imgD = $_POST["FASILITAS_IMG_D_BACKUP"];
      } else {
        $imgD = date("d_m_Y")."_".basename($_FILES[$imageD]["name"]);
        uploadImage($imageD,"Fasilitas");

      }

      if (empty($_FILES[$imageE]["name"])) {
        $imgE = $_POST["FASILITAS_IMG_E_BACKUP"];
      } else {
        $imgE = date("d_m_Y")."_".basename($_FILES[$imageE]["name"]);
        uploadImage($imageE,"Fasilitas");

      }

      if (empty($_FILES[$imageF]["name"])) {
        $imgF = $_POST["FASILITAS_IMG_F_BACKUP"];
      } else {
        $imgF = date("d_m_Y")."_".basename($_FILES[$imageF]["name"]);
        uploadImage($imageF,"Fasilitas");

      }

      $json = array(
        "action"                => "simpleSave",
        "db"                    => $databaseApi,
        "table"                 => "tx_home_fasilitas",
        "primaryKey"            => "FASILITAS_ID",
        "value"                 => [
        array(
        "FASILITAS_ID"         =>  "1",
        "FASILITAS_IMG"        =>  $imgA,
        "FASILITAS_TITLE"      =>  $_POST['FASILITAS_TITLE'][0],
        "FASILITAS_DESC"       =>  $_POST['FASILITAS_DESC'][0]
        ),
        array(
        "FASILITAS_ID"         =>  "2",
        "FASILITAS_IMG"        =>  $imgB,
        "FASILITAS_TITLE"      =>  $_POST['FASILITAS_TITLE'][1],
        "FASILITAS_DESC"       =>  $_POST['FASILITAS_DESC'][1]
        ),
        array(
        "FASILITAS_ID"         =>  "3",
        "FASILITAS_IMG"        =>  $imgC,
        "FASILITAS_TITLE"      =>  $_POST['FASILITAS_TITLE'][2],
        "FASILITAS_DESC"       =>  $_POST['FASILITAS_DESC'][2]
        ),
        array(
        "FASILITAS_ID"         =>  "4",
        "FASILITAS_IMG"        =>  $imgD,
        "FASILITAS_TITLE"      =>  $_POST['FASILITAS_TITLE'][3],
        "FASILITAS_DESC"       =>  $_POST['FASILITAS_DESC'][3]
        ),
        array(
        "FASILITAS_ID"         =>  "5",
        "FASILITAS_IMG"        =>  $imgE,
        "FASILITAS_TITLE"      =>  $_POST['FASILITAS_TITLE'][4],
        "FASILITAS_DESC"       =>  $_POST['FASILITAS_DESC'][4]
        ),
        array(
        "FASILITAS_ID"         =>  "6",
        "FASILITAS_IMG"        =>  $imgF,
        "FASILITAS_TITLE"      =>  $_POST['FASILITAS_TITLE'][5],
        "FASILITAS_DESC"       =>  $_POST['FASILITAS_DESC'][5]
        )]
      );
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
