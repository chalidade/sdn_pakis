<?php
error_reporting(0);
include "../config/connection.php";
include "../config/setting.php";

$id      = $_REQUEST['id'];
$total   = count($_POST['DTL_KALIMAT_PENGETAHUAN']);
$protaId = $_POST["PENGETAHUAN_ID"];

for ($i=0; $i < $total; $i++) {
  $arrdetil .= '
            {
              "DTL_KALIMAT_PENGETAHUAN" : "'.$_POST["DTL_KALIMAT_PENGETAHUAN"][$i].'",
              "DTL_SUMBER_BUKU" : "'.$_POST["DTL_SUMBER_BUKU"][$i].'",
              "DTL_HALAMAN" : "'.$_POST["DTL_HALAMAN"][$i].'"
            },';
}

$arrdetil = substr($arrdetil, 0,-1);

switch ($id) {
  case 'insert':
    $page      = "input_pengetahuan";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_buku_pengetahuan",
                      "PK": "PENGETAHUAN_ID",
                      "VALUE": [
                          {
                            "PENGETAHUAN_ID"            : "",
                            "PENGETAHUAN_NIS"           : "'.$_POST["PENGETAHUAN_NIS"].'",
                            "PENGETAHUAN_STATUS"        : "0",
                            "PENGETAHUAN_REMARK"        : ""
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "sdnpakis",
                      "TABLE": "tx_dtl_buku_pengetahuan",
                      "FK": [
                          "DTL_HDR_ID",
                          "PENGETAHUAN_ID"
                      ],
                      "VALUE": ['.$arrdetil.']}}';
    break;

    case 'update':
      $delHeader = mysqli_query($mysqli, "DELETE FROM `tx_hdr_prota` WHERE `tx_hdr_prota`.`PROTA_ID`  = '$protaId'");
      $delDetail = mysqli_query($mysqli, "DELETE FROM `tx_dtl_prota` WHERE `tx_dtl_prota`.`DTL_HDR_ID` = '$protaId'");

      $page      = "input_pengetahuan";
      $json      = '{
                    "action": "saveheaderdetail",
                    "data": [
                        "HEADER",
                        "DETAIL"
                    ],
                    "HEADER": {
                        "DB": "'.$databaseApi.'",
                        "TABLE": "tx_hdr_prota",
                        "PK": "PENGETAHUAN_ID",
                        "VALUE": [
                            {
                              "PENGETAHUAN_ID"            : "",
                              "PENGETAHUAN_NIS"           : "'.$_POST["PENGETAHUAN_NIS"].'",
                              "PENGETAHUAN_STATUS"        : "0",
                              "PENGETAHUAN_REMARK"        : ""
                            }
                        ]
                    },
                    "DETAIL": {
                        "DB": "sdnpakis",
                        "TABLE": "tx_dtl_buku_pengetahuan",
                        "FK": [
                            "DTL_HDR_ID",
                            "PENGETAHUAN_ID"
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
