<?php
error_reporting(0);
include "../config/setting.php";

$id      = $_REQUEST['id'];

$arrdetil .= '
          {
            "RPP_DTL_ID"                    : "",
            "RPP_HDR_ID"                    : "",
            "RPP_DTL_KOMPETENSI_INTI"       : '.json_encode($_POST["RPP_DTL_KOMPETENSI_INTI"]).',
            "RPP_DTL_KOMPETENSI_DASAR"      : '.json_encode($_POST["RPP_DTL_KOMPETENSI_DASAR"]).',
            "RPP_DTL_TUJUAN_PEMBELAJARAN"   : '.json_encode($_POST["RPP_DTL_TUJUAN_PEMBELAJARAN"]).',
            "RPP_DTL_MATERI_PEMBELAJARAN"   : '.json_encode($_POST["RPP_DTL_MATERI_PEMBELAJARAN"]).',
            "RPP_DTL_METODE_PEMBELAJARAN"   : '.json_encode($_POST["RPP_DTL_METODE_PEMBELAJARAN"]).',
            "RPP_DTL_SUMBER_BELAJAR"        : '.json_encode($_POST["RPP_DTL_SUMBER_BELAJAR"]).',
            "RPP_DTL_KEGIATAN_PEMBELAJARAN" : '.json_encode($_POST["RPP_DTL_KEGIATAN_PEMBELAJARAN"]).',
            "RPP_DTL_PENILAIAN"             : '.json_encode($_POST["RPP_DTL_PENILAIAN"]).',
            "RPP_DTL_UPDATE_BY"             : "'.$_POST["RPP_DTL_UPDATE_BY"].'"
          }';

switch ($id) {
  case 'insert':
    $page      = "data_rpp";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_rpp",
                      "PK": "RPP_HDR_ID",
                      "VALUE": [
                          {
                            "RPP_HDR_ID"                : "'.$_POST["RPP_HDR_ID"].'",
                            "RPP_HDR_SATUAN_PENDIDIKAN" : "'.$_POST["RPP_HDR_SATUAN_PENDIDIKAN"].'",
                            "RPP_HDR_MUATAN_TERPADU"    : "'.$_POST["RPP_HDR_MUATAN_TERPADU"].'",
                            "RPP_HDR_KELAS"             : "'.$_POST["RPP_HDR_KELAS"].'",
                            "RPP_HDR_NO_PENGAJUAN"      : "'.$_POST["RPP_HDR_NO_PENGAJUAN"].'",
                            "RPP_HDR_SEMESTER"          : "'.$_POST["RPP_HDR_SEMESTER"].'",
                            "RPP_HDR_TEMA"              : "'.$_POST["RPP_HDR_TEMA"].'",
                            "RPP_HDR_SUB_TEMA"          : "'.$_POST["RPP_HDR_SUB_TEMA"].'",
                            "RPP_HDR_PEMBELAJARAN"      : "'.$_POST["RPP_HDR_PEMBELAJARAN"].'",
                            "RPP_HDR_MATERI_POKOK"      : "'.$_POST["RPP_HDR_MATERI_POKOK"].'",
                            "RPP_HDR_ALOKASI_WAKTU"     : "'.$_POST["RPP_HDR_ALOKASI_WAKTU"].'",
                            "RPP_HDR_UPDATE_BY"         : "'.$_POST["RPP_HDR_UPDATE_BY"].'"
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "sdnpakis",
                      "TABLE": "tx_dtl_rpp",
                      "FK": [
                          "RPP_HDR_ID",
                          "RPP_HDR_ID"
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
