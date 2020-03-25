<?php
error_reporting(0);
include "../config/connection.php";
include "../config/setting.php";

$id             = $_REQUEST['id'];
$total          = count($_POST['SILABUS_DTL_MUATAN_PELAJARAN']);
$kompetensiInti = json_encode($_POST["SILABUS_HDR_KOMPETENSI_INTI"]);
$silabusId      = $_POST["SILABUS_HDR_ID"];

for ($i=0; $i < $total; $i++) {
  $arrdetil .= '
            {
              "SILABUS_DTL_ID"               : "",
              "SILABUS_HDR_ID"               : "",
              "SILABUS_DTL_MUATAN_PELAJARAN" : "'.$_POST["SILABUS_DTL_MUATAN_PELAJARAN"][$i].'",
              "SILABUS_DTL_KOMPETENSI_DASAR" : "'.$_POST["SILABUS_DTL_KOMPETENSI_DASAR"][$i].'",
              "SILABUS_DTL_TEMA"             : "'.$_POST["SILABUS_DTL_TEMA"][$i].'",
              "SILABUS_DTL_PEMBELAJARAN"     : "'.$_POST["SILABUS_DTL_PEMBELAJARAN"][$i].'",
              "SILABUS_DTL_PENLAIAN"         : "'.$_POST["SILABUS_DTL_PENLAIAN"][$i].'",
              "SILABUS_DTL_ALOKASI_WAKTU"    : "'.$_POST["SILABUS_DTL_ALOKASI_WAKTU"][$i].'",
              "SILABUS_DTL_SUMBER_BELAJAR"   : "'.$_POST["SILABUS_DTL_SUMBER_BELAJAR"][$i].'",
              "SILABUS_DTL_UPDATE_BY"        : "'.$_POST["SILABUS_DTL_UPDATE_BY"].'"
            },';
}

$arrdetil = substr($arrdetil, 0,-1);

switch ($id) {
  case 'insert':
    $page      = "data_silabus";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_silabus",
                      "PK": "SILABUS_HDR_ID",
                      "VALUE": [
                          {
                            "SILABUS_HDR_ID"                : "",
                            "SILABUS_HDR_NO_PENGAJUAN"      : "'.$_POST["SILABUS_HDR_NO_PENGAJUAN"].'",
                            "SILABUS_HDR_SATUAN_PENDIDIKAN" : "'.$_POST["SILABUS_HDR_SATUAN_PENDIDIKAN"].'",
                            "SILABUS_HDR_KELAS"             : "'.$_POST["SILABUS_HDR_KELAS"].'",
                            "SILABUS_HDR_SEMESTER"          : "'.$_POST["SILABUS_HDR_SEMESTER"].'",
                            "SILABUS_HDR_KOMPETENSI_INTI"   : '.$kompetensiInti.',
                            "SILABUS_HDR_UPDATE_BY"         : "'.$_POST["SILABUS_HDR_UPDATE_BY"].'"
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "sdnpakis",
                      "TABLE": "tx_dtl_silabus",
                      "FK": [
                          "SILABUS_HDR_ID",
                          "SILABUS_HDR_ID"
                      ],
                      "VALUE": ['.$arrdetil.']}}';
    break;

    case 'update':
      $delHeader = mysqli_query($mysqli, "DELETE FROM `tx_hdr_silabus` WHERE `tx_hdr_silabus`.`SILABUS_HDR_ID`  = '$silabusId'");
      $delDetail = mysqli_query($mysqli, "DELETE FROM `tx_dtl_silabus` WHERE `tx_dtl_silabus`.`SILABUS_HDR_ID` = '$silabusId'");
      
      $page      = "data_silabus";
      $json      = '{
                    "action": "saveheaderdetail",
                    "data": [
                        "HEADER",
                        "DETAIL"
                    ],
                    "HEADER": {
                        "DB": "'.$databaseApi.'",
                        "TABLE": "tx_hdr_silabus",
                        "PK": "SILABUS_HDR_ID",
                        "VALUE": [
                            {
                              "SILABUS_HDR_ID"                : "",
                              "SILABUS_HDR_NO_PENGAJUAN"      : "'.$_POST["SILABUS_HDR_NO_PENGAJUAN"].'",
                              "SILABUS_HDR_SATUAN_PENDIDIKAN" : "'.$_POST["SILABUS_HDR_SATUAN_PENDIDIKAN"].'",
                              "SILABUS_HDR_KELAS"             : "'.$_POST["SILABUS_HDR_KELAS"].'",
                              "SILABUS_HDR_SEMESTER"          : "'.$_POST["SILABUS_HDR_SEMESTER"].'",
                              "SILABUS_HDR_KOMPETENSI_INTI"   : '.$kompetensiInti.',
                              "SILABUS_HDR_UPDATE_BY"         : "'.$_POST["SILABUS_HDR_UPDATE_BY"].'"
                            }
                        ]
                    },
                    "DETAIL": {
                        "DB": "sdnpakis",
                        "TABLE": "tx_dtl_silabus",
                        "FK": [
                            "SILABUS_HDR_ID",
                            "SILABUS_HDR_ID"
                        ],
                        "VALUE": ['.$arrdetil.']}}';
      break;

  default:
    $json = array(
      "ERROR" => "No Format JSON FOUND"
    );
    break;
}

$data = $json;
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
