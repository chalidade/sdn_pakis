<?php
error_reporting(0);
include "../config/setting.php";

$id         = $_REQUEST['id'];
$absen      = count($_POST["absen"]);

for ($i=0; $i < $absen; $i++) {
  $arrdetil .= '
            {
              "DTL_NIS"        : "'.$_POST["nis"][$i].'",
              "DTL_NAMA_SISWA" : "'.$_POST["username"][$i].'",
              "DTL_ABSENSI"    : "'.$_POST["absen"][$i].'",
              "DTL_KETERANGAN" : "'.$_POST["keterangan"][$i].'"
            },';
}

$arrdetil   = substr($arrdetil, 0,-1);
$ABSEN_DATA = json_encode($arrdetil);

switch ($id) {
  case 'siswa':
    $page      = "data_absen_siswa";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_absen_siswa",
                      "PK": "ABSEN_ID",
                      "VALUE": [
                          {
                            "ABSEN_ID"           : "",
                            "ABSEN_NO_PENGAJUAN" : "'.$_POST["ABSEN_NO_PENGAJUAN"].'",
                            "ABSEN_TINGKAT"      : "'.$_POST["ABSEN_TINGKAT"].'",
                            "ABSEN_GURU"         : "'.$_POST["ABSEN_GURU"].'",
                            "ABSEN_KELAS"        : "'.$_POST["ABSEN_KELAS"].'",
                            "ABSEN_USER_ID"      : "'.$_POST["ABSEN_USER_ID"].'"
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_dtl_absen_siswa",
                      "FK": [
                          "DTL_HDR_ID",
                          "ABSEN_ID"
                      ],
                      "VALUE": ['.$arrdetil.']}
                }';
    break;

  default:
    $json = array(
      "ERROR" => "No Format JSON FOUND"
    );
    break;
}
//
$data = $json;
// header('Content-Type: application/json'); echo $data;

include "../helper/simpleSaveHelper.php";
 ?>
