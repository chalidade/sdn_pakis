<?php
error_reporting(0);
include "../config/setting.php";

$id             = $_REQUEST['id'];
$total          = count($_POST['SARPRAS_DTL_JENIS_BARANG']);

for ($i=0; $i < $total; $i++) {
  $arrdetil .= '
            {
              "SARPRAS_DTL_ID"           : "",
              "SARPRAS_HDR_ID"           : "",
              "SARPRAS_DTL_JENIS_BARANG" : "'.$_POST["SARPRAS_DTL_JENIS_BARANG"][$i].'",
              "SARPRAS_DTLJUMLAH_BARANG" : "'.$_POST["SARPRAS_DTLJUMLAH_BARANG"][$i].'",
              "SARPRAS_DTL_SATUAN"       : "'.$_POST["SARPRAS_DTL_SATUAN"][$i].'",
              "SARPRAS_DTL_KONDISI_BAIK" : "'.$_POST["SARPRAS_DTL_KONDISI_BAIK"][$i].'",
              "SARPRAS_DTL_KONDISI_RUSAK": "'.$_POST["SARPRAS_DTL_KONDISI_RUSAK"][$i].'",
              "SARPRAS_DTL_KETERANGAN"   : "'.$_POST["SARPRAS_DTL_KETERANGAN"][$i].'",
              "SARPRAS_DTL_UPDATE_BY"    : "'.$_POST["SARPRAS_DTL_UPDATE_BY"].'",
              "SARPRAS_DTL_UPDATE_DATE"  : ""
            },';
}

$arrdetil = substr($arrdetil, 0,-1);

switch ($id) {
  case 'insert':
    $page      = "input_inventaris";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_sarpras",
                      "PK": "SARPRAS__HDR_ID",
                      "VALUE": [
                          {
                            "SARPRAS__HDR_ID"            : "",
                            "SARPRAS_HDR_NAMA_SEKOLAH"   : "'.$_POST["SARPRAS_HDR_NAMA_SEKOLAH"].'",
                            "SARPRAS_HDR_ALAMAT_SEKOLAH" : "'.$_POST["SARPRAS_HDR_ALAMAT_SEKOLAH"].'",
                            "SARPRAS_HDR_KECAMATAN"      : "'.$_POST["SARPRAS_HDR_KECAMATAN"].'",
                            "SARPRAS_HDR_UPDATE_BY"      : "'.$_POST["SARPRAS_HDR_UPDATE_BY"].'",
                            "SARPRAS_HDR_UPDATE_DATE"    : ""
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "sdnpakis",
                      "TABLE": "tx_dtl_sarpras",
                      "FK": [
                          "SARPRAS_HDR_ID",
                          "SARPRAS__HDR_ID"
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
