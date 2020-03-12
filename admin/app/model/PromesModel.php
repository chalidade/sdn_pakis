<?php
error_reporting(0);
include "../config/setting.php";

$id      = $_REQUEST['id'];
$total   = count($_POST['DTL_TEMA']);

for ($i=0; $i < $total; $i++) {
  $arrdetil .= '
            {
              "DTL_ID"            : "",
              "DTL_HDR_ID"        : "",
              "DTL_TEMA"          : "'.$_POST["DTL_TEMA"][$i].'",
              "DTL_KOMPETENSI"    : "'.$_POST["DTL_KOMPETENSI"][$i].'",
              "DTL_ALOKASI_WAKTU" : "'.$_POST["DTL_ALOKASI_WAKTU"][$i].'",
              "DTL_BLN_SATU_A"    : "'.$_POST["DTL_BLN_SATU_A"][$i].'",
              "DTL_BLN_SATU_B"    : "'.$_POST["DTL_BLN_SATU_B"][$i].'",
              "DTL_BLN_SATU_C"    : "'.$_POST["DTL_BLN_SATU_C"][$i].'",
              "DTL_BLN_SATU_D"    : "'.$_POST["DTL_BLN_SATU_D"][$i].'",
              "DTL_BLN_SATU_E"    : "'.$_POST["DTL_BLN_SATU_E"][$i].'",
              "DTL_BLN_DUA_A"     : "'.$_POST["DTL_BLN_DUA_A"][$i].'",
              "DTL_BLN_DUA_B"     : "'.$_POST["DTL_BLN_DUA_B"][$i].'",
              "DTL_BLN_DUA_C"     : "'.$_POST["DTL_BLN_DUA_C"][$i].'",
              "DTL_BLN_DUA_D"     : "'.$_POST["DTL_BLN_DUA_D"][$i].'",
              "DTL_BLN_DUA_E"     : "'.$_POST["DTL_BLN_DUA_E"][$i].'",
              "DTL_BLN_TIGA_A"    : "'.$_POST["DTL_BLN_TIGA_A"][$i].'",
              "DTL_BLN_TIGA_B"    : "'.$_POST["DTL_BLN_TIGA_B"][$i].'",
              "DTL_BLN_TIGA_C"    : "'.$_POST["DTL_BLN_TIGA_C"][$i].'",
              "DTL_BLN_TIGA_D"    : "'.$_POST["DTL_BLN_TIGA_D"][$i].'",
              "DTL_BLN_TIGA_E"    : "'.$_POST["DTL_BLN_TIGA_E"][$i].'",
              "DTL_BLN_EMPAT_A"   : "'.$_POST["DTL_BLN_EMPAT_A"][$i].'",
              "DTL_BLN_EMPAT_B"   : "'.$_POST["DTL_BLN_EMPAT_B"][$i].'",
              "DTL_BLN_EMPAT_C"   : "'.$_POST["DTL_BLN_EMPAT_C"][$i].'",
              "DTL_BLN_EMPAT_D"   : "'.$_POST["DTL_BLN_EMPAT_D"][$i].'",
              "DTL_BLN_EMPAT_E"   : "'.$_POST["DTL_BLN_EMPAT_E"][$i].'",
              "DTL_BLN_LIMA_A"    : "'.$_POST["DTL_BLN_LIMA_A"][$i].'",
              "DTL_BLN_LIMA_B"    : "'.$_POST["DTL_BLN_LIMA_B"][$i].'",
              "DTL_BLN_LIMA_C"    : "'.$_POST["DTL_BLN_LIMA_C"][$i].'",
              "DTL_BLN_LIMA_D"    : "'.$_POST["DTL_BLN_LIMA_D"][$i].'",
              "DTL_BLN_LIMA_E"    : "'.$_POST["DTL_BLN_LIMA_E"][$i].'",
              "DTL_UPDATE_DATE"   : ""
            },';
}

$arrdetil = substr($arrdetil, 0,-1);

switch ($id) {
  case 'insert':
    $imageName = "DTL_PHOTO";
    $page      = "input_prota";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_promes",
                      "PK": "PROMES_ID",
                      "VALUE": [
                          {
                            "PROMES_ID"                : "'.$_POST["PROMES_ID"].'",
                            "PROMES_SATUAN_PENDIDIKAN" : "'.$_POST["PROMES_SATUAN_PENDIDIKAN"].'",
                            "PROMES_TAHUN_AJARAN"      : "'.$_POST["PROMES_TAHUN_AJARAN"].'",
                            "PROMES_KELAS"             : "'.$_POST["PROMES_KELAS"].'",
                            "PROMES_SEMESTER"          : "'.$_POST["PROMES_SEMESTER"].'",
                            "PROMES_USER_ID"           : "'.$_POST["PROMES_USER_ID"].'",
                            "PROMES_TGL_UPDATE"        : "'.$_POST["PROMES_TGL_UPDATE"].'"
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "sdnpakis",
                      "TABLE": "tx_dtl_promes",
                      "FK": [
                          "DTL_HDR_ID",
                          "PROMES_ID"
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
