<?php
error_reporting(0);
include "../config/connection.php";
include "../config/setting.php";

$id      = $_REQUEST['id'];
$total   = count($_POST['DTL_SEMESTER']);
$protaId = $_POST["PROTA_ID"];

for ($i=0; $i < $total; $i++) {
  $arrdetil .= '
            {
              "DTL_ID" : "",
              "DTL_HDR_ID" : "",
              "DTL_SEMESTER" : "'.$_POST["DTL_SEMESTER"][$i].'",
              "DTL_NO" : "'.$_POST["DTL_NO"][$i].'",
              "DTL_TEMA" : "'.$_POST["DTL_TEMA"][$i].'",
              "DTL_ALOKASI_WAKTU" : "'.$_POST["DTL_ALOKASI_WAKTU"][$i].'",
              "DTL_KETERANGAN" : "'.$_POST["DTL_KETERANGAN"][$i].'"
            },';
}

$arrdetil = substr($arrdetil, 0,-1);

switch ($id) {
  case 'insert':
    $page      = "data_prota";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_prota",
                      "PK": "PROTA_ID",
                      "VALUE": [
                          {
                            "PROTA_ID" : "",
                            "PROTA_NO_PENGAJUAN" : "'.$_POST["PROTA_NO_PENGAJUAN"].'",
                            "PROTA_SATUAN_AJAR" : "'.$_POST["PROTA_SATUAN_AJAR"].'",
                            "PROTA_TAHUN_AJAR" : "'.$_POST["PROTA_TAHUN_AJAR"].'",
                            "PROTA_KELAS" : "'.$_POST["PROTA_KELAS"].'",
                            "PROTA_USER_ID" : "'.$_POST["PROTA_USER_ID"].'"
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "sdnpakis",
                      "TABLE": "tx_dtl_prota",
                      "FK": [
                          "DTL_HDR_ID",
                          "PROTA_ID"
                      ],
                      "VALUE": ['.$arrdetil.']}}';
    break;

    case 'update':
      $delHeader = mysqli_query($mysqli, "DELETE FROM `tx_hdr_prota` WHERE `tx_hdr_prota`.`PROTA_ID`  = '$protaId'");
      $delDetail = mysqli_query($mysqli, "DELETE FROM `tx_dtl_prota` WHERE `tx_dtl_prota`.`DTL_HDR_ID` = '$protaId'");

      $page      = "data_prota";
      $json      = '{
                    "action": "saveheaderdetail",
                    "data": [
                        "HEADER",
                        "DETAIL"
                    ],
                    "HEADER": {
                        "DB": "'.$databaseApi.'",
                        "TABLE": "tx_hdr_prota",
                        "PK": "PROTA_ID",
                        "VALUE": [
                            {
                              "PROTA_ID" : "",
                              "PROTA_NO_PENGAJUAN" : "'.$_POST["PROTA_NO_PENGAJUAN"].'",
                              "PROTA_SATUAN_AJAR" : "'.$_POST["PROTA_SATUAN_AJAR"].'",
                              "PROTA_TAHUN_AJAR" : "'.$_POST["PROTA_TAHUN_AJAR"].'",
                              "PROTA_KELAS" : "'.$_POST["PROTA_KELAS"].'",
                              "PROTA_USER_ID" : "'.$_POST["PROTA_USER_ID"].'"
                            }
                        ]
                    },
                    "DETAIL": {
                        "DB": "sdnpakis",
                        "TABLE": "tx_dtl_prota",
                        "FK": [
                            "DTL_HDR_ID",
                            "PROTA_ID"
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
