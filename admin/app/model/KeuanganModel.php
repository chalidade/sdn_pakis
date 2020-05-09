<?php
error_reporting(0);
include "../config/connection.php";
include "../config/setting.php";

$id       = $_REQUEST['id'];

switch ($id) {
  case 'rkasInsert':
    $total    = count($_POST['RKAS_DTL_NO']);
    $rkasId = $_POST["KEUANGAN_RKAS_ID"];

    for ($i=0; $i < $total; $i++) {
      $arrdetil .= '
                {
                   "RKAS_DTL_ID"           : "",
                   "RKAS_HDR_ID"           : "",
                   "RKAS_DTL_NO"           : "'.$_POST["RKAS_DTL_NO"][$i].'",
                   "RKAS_DTL_KODE"         : "'.$_POST["RKAS_DTL_KODE"][$i].'",
                   "RKAS_DTL_URAIAN"       : "'.$_POST["RKAS_DTL_URAIAN"][$i].'",
                   "RKAS_DTL_KOEFISIEN"    : "'.$_POST["RKAS_DTL_KOEFISIEN"][$i].'",
                   "RKAS_DTL_HARGA"        : "'.$_POST["RKAS_DTL_HARGA"][$i].'",
                   "RKAS_DTL_JUMLAH"       : "'.$_POST["RKAS_DTL_JUMLAH"][$i].'",
                   "RKAS_DTL_I"            : "'.$_POST["RKAS_DTL_I"][$i].'",
                   "RKAS_DTL_II"           : "'.$_POST["RKAS_DTL_II"][$i].'",
                   "RKAS_DTL_III"          : "'.$_POST["RKAS_DTL_III"][$i].'",
                   "RKAS_DTL_IV"           : "'.$_POST["RKAS_DTL_IV"][$i].'",
                   "RKAS_DTL_V"            : "'.$_POST["RKAS_DTL_V"][$i].'",
                   "RKAS_DTL_VI"           : "'.$_POST["RKAS_DTL_VI"][$i].'",
                   "RKAS_DTL_VII"          : "'.$_POST["RKAS_DTL_VII"][$i].'",
                   "RKAS_DTL_VIII"         : "'.$_POST["RKAS_DTL_VIII"][$i].'",
                   "RKAS_DTL_IX"           : "'.$_POST["RKAS_DTL_IX"][$i].'",
                   "RKAS_DTL_X"            : "'.$_POST["RKAS_DTL_X"][$i].'",
                   "RKAS_DTL_XI"           : "'.$_POST["RKAS_DTL_XI"][$i].'",
                   "RKAS_DTL_XII"          : "'.$_POST["RKAS_DTL_XII"][$i].'"
                },';
    }

    $arrdetil = substr($arrdetil, 0,-1);
    $page      = "data_rkas";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_keuangan_rkas",
                      "PK": "KEUANGAN_RKAS_ID",
                      "VALUE": [
                          {
                            "KEUANGAN_RKAS_ID"              : "",
                            "KEUANGAN_RKAS_NO_PENGAJUAN"    : "'.$_POST["KEUANGAN_RKAS_NO_PENGAJUAN"].'",
                            "KEUANGAN_RKAS_NAMA_SEKOLAH"    : "'.$_POST["KEUANGAN_RKAS_NAMA_SEKOLAH"].'",
                            "KEUANGAN_RKAS_TAHUN_ANGGARAN"  : "'.$_POST["KEUANGAN_RKAS_TAHUN_ANGGARAN"].'",
                            "KEUANGAN_RKAS_SUMBER_DANA"     : "'.$_POST["KEUANGAN_RKAS_SUMBER_DANA"].'",
                            "KEUANGAN_RKAS_TGL_UPDATE"      : "'.$_POST["KEUANGAN_RKAS_TGL_UPDATE"].'",
                            "KEUANGAN_RKAS_USER"            : "'.$_POST["RKAS_DTL_USER_ID"].'"
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "sdnpakis",
                      "TABLE": "tx_dtl_keuangan_rkas",
                      "FK": [
                          "RKAS_HDR_ID",
                          "KEUANGAN_RKAS_ID"
                      ],
                      "VALUE": ['.$arrdetil.']}}';
    break;

case 'rapbsInsert':
  $total    = count($_POST['RAPBS_DTL_PENERIMAAN_KODE']);
  $rkasId = $_POST["KEUANGAN_RAPBS_ID"];

  for ($i=0; $i < $total; $i++) {
    $arrdetil .= '
              {
                "RAPBS_DTL_ID"                  : "'.$_POST["RAPBS_DTL_ID"][$i].'",
                "RAPBS_DTL_HDR_ID"              : "'.$_POST["RAPBS_DTL_HDR_ID"][$i].'",
                "RAPBS_DTL_PENERIMAAN_URUT"     : "'.$_POST["RAPBS_DTL_PENERIMAAN_URUT"][$i].'",
                "RAPBS_DTL_PENERIMAAN_KODE"     : "'.$_POST["RAPBS_DTL_PENERIMAAN_KODE"][$i].'",
                "RAPBS_DTL_PENERIMAAN_URAIAN"   : "'.$_POST["RAPBS_DTL_PENERIMAAN_URAIAN"][$i].'",
                "RAPBS_DTL_PENERIMAAN_ANGGARAN" : "'.$_POST["RAPBS_DTL_PENERIMAAN_ANGGARAN"][$i].'",
                "RAPBS_DTL_PENERIMAAN_NO"       : "'.$_POST["RAPBS_DTL_PENERIMAAN_NO"][$i].'",
                "RAPBS_DTL_PENGELUARAN_KODE"    : "'.$_POST["RAPBS_DTL_PENGELUARAN_KODE"][$i].'",
                "RAPBS_DTL_PENGELUARAN_URAIAN"  : "'.$_POST["RAPBS_DTL_PENGELUARAN_URAIAN"][$i].'",
                "RAPBS_DTL_PENGELUARAN_ANGGARAN": "'.$_POST["RAPBS_DTL_PENGELUARAN_ANGGARAN"][$i].'"
              },';
  }

  $arrdetil = substr($arrdetil, 0,-1);
  $page      = "data_rapbs";
  $json      = '{
                "action": "saveheaderdetail",
                "data": [
                    "HEADER",
                    "DETAIL"
                ],
                "HEADER": {
                    "DB": "'.$databaseApi.'",
                    "TABLE": "tx_hdr_keuangan_rapbs",
                    "PK": "KEUANGAN_RAPBS_ID",
                    "VALUE": [
                        {
                          "KEUANGAN_RAPBS_ID"           : "",
                          "KEUANGAN_RAPBS_NO_PENGAJUAN" : "'.$_POST["KEUANGAN_RAPBS_NO_PENGAJUAN"].'",
                          "KEUANGAN_RAPBS_NAMA_SEKOLAH" : "'.$_POST["KEUANGAN_RAPBS_NAMA_SEKOLAH"].'",
                          "KEUANGAN_RAPBS_DESA"         : "'.$_POST["KEUANGAN_RAPBS_DESA"].'",
                          "KEUANGAN_RAPBS_KABUPATEN"    : "'.$_POST["KEUANGAN_RAPBS_KABUPATEN"].'",
                          "KEUANGAN_RAPBS_PROVINSI"     : "'.$_POST["KEUANGAN_RAPBS_PROVINSI"].'",
                          "KEUANGAN_RAPBS_USER"         : "'.$_POST["KEUANGAN_RAPBS_USER"].'"
                        }
                    ]
                },
                "DETAIL": {
                    "DB": "sdnpakis",
                    "TABLE": "tx_dtl_keuangan_rapbs",
                    "FK": [
                        "RAPBS_DTL_HDR_ID",
                        "KEUANGAN_RAPBS_ID"
                    ],
                    "VALUE": ['.$arrdetil.']}}';
  break;

  case 'rapbsUpdate':
    $total    = count($_POST['RAPBS_DTL_PENERIMAAN_KODE']);
    $rapbsId  = $_POST["KEUANGAN_RAPBS_ID"];

    $delHeader = mysqli_query($mysqli, "DELETE FROM `tx_hdr_keuangan_rapbs` WHERE `tx_hdr_keuangan_rapbs`.`KEUANGAN_RKAS_ID`  = '$rapbsId'");
    $delDetail = mysqli_query($mysqli, "DELETE FROM `tx_dtl_keuangan_rapbs` WHERE `tx_dtl_keuangan_rapbs`.`RAPBS_DTL_HDR_ID` = '$rapbsId'");

    for ($i=0; $i < $total; $i++) {
      $arrdetil .= '
                {
                  "RAPBS_DTL_ID"                  : "",
                  "RAPBS_DTL_HDR_ID"              : "",
                  "RAPBS_DTL_PENERIMAAN_URUT"     : "'.$_POST["RAPBS_DTL_PENERIMAAN_URUT"][$i].'",
                  "RAPBS_DTL_PENERIMAAN_KODE"     : "'.$_POST["RAPBS_DTL_PENERIMAAN_KODE"][$i].'",
                  "RAPBS_DTL_PENERIMAAN_URAIAN"   : "'.$_POST["RAPBS_DTL_PENERIMAAN_URAIAN"][$i].'",
                  "RAPBS_DTL_PENERIMAAN_ANGGARAN" : "'.$_POST["RAPBS_DTL_PENERIMAAN_ANGGARAN"][$i].'",
                  "RAPBS_DTL_PENERIMAAN_NO"       : "'.$_POST["RAPBS_DTL_PENERIMAAN_NO"][$i].'",
                  "RAPBS_DTL_PENGELUARAN_KODE"    : "'.$_POST["RAPBS_DTL_PENGELUARAN_KODE"][$i].'",
                  "RAPBS_DTL_PENGELUARAN_URAIAN"  : "'.$_POST["RAPBS_DTL_PENGELUARAN_URAIAN"][$i].'",
                  "RAPBS_DTL_PENGELUARAN_ANGGARAN": "'.$_POST["RAPBS_DTL_PENGELUARAN_ANGGARAN"][$i].'"
                },';
    }

    $arrdetil = substr($arrdetil, 0,-1);
    $page      = "data_rapbs";
    $json      = '{
                  "action": "saveheaderdetail",
                  "data": [
                      "HEADER",
                      "DETAIL"
                  ],
                  "HEADER": {
                      "DB": "'.$databaseApi.'",
                      "TABLE": "tx_hdr_keuangan_rapbs",
                      "PK": "KEUANGAN_RAPBS_ID",
                      "VALUE": [
                          {
                            "KEUANGAN_RAPBS_ID"           : "'.$rapbsId.'",
                            "KEUANGAN_RAPBS_NO_PENGAJUAN" : "'.$_POST["KEUANGAN_RAPBS_NO_PENGAJUAN"].'",
                            "KEUANGAN_RAPBS_NAMA_SEKOLAH" : "'.$_POST["KEUANGAN_RAPBS_NAMA_SEKOLAH"].'",
                            "KEUANGAN_RAPBS_DESA"         : "'.$_POST["KEUANGAN_RAPBS_DESA"].'",
                            "KEUANGAN_RAPBS_KABUPATEN"    : "'.$_POST["KEUANGAN_RAPBS_KABUPATEN"].'",
                            "KEUANGAN_RAPBS_PROVINSI"     : "'.$_POST["KEUANGAN_RAPBS_PROVINSI"].'",
                            "KEUANGAN_RAPBS_USER"         : "'.$_POST["KEUANGAN_RAPBS_USER"].'"
                          }
                      ]
                  },
                  "DETAIL": {
                      "DB": "sdnpakis",
                      "TABLE": "tx_dtl_keuangan_rapbs",
                      "FK": [
                          "RAPBS_DTL_HDR_ID",
                          "KEUANGAN_RAPBS_ID"
                      ],
                      "VALUE": ['.$arrdetil.']}}';
    break;

    case 'rkasUpdate':
      $total    = count($_POST['RKAS_DTL_NO']);
      $rkasId   = $_POST["KEUANGAN_RKAS_ID"];

      $delHeader = mysqli_query($mysqli, "DELETE FROM `tx_hdr_keuangan_rkas` WHERE `tx_hdr_keuangan_rkas`.`KEUANGAN_RKAS_ID`  = '$rkasId'");
      $delDetail = mysqli_query($mysqli, "DELETE FROM `tx_dtl_keuangan_rkas` WHERE `tx_dtl_keuangan_rkas`.`RKAS_HDR_ID` = '$rkasId'");

      for ($i=0; $i < $total; $i++) {
        $arrdetil .= '
                  {
                     "RKAS_DTL_ID"           : "",
                     "RKAS_HDR_ID"           : "",
                     "RKAS_DTL_NO"           : "'.$_POST["RKAS_DTL_NO"][$i].'",
                     "RKAS_DTL_KODE"         : "'.$_POST["RKAS_DTL_KODE"][$i].'",
                     "RKAS_DTL_URAIAN"       : "'.$_POST["RKAS_DTL_URAIAN"][$i].'",
                     "RKAS_DTL_KOEFISIEN"    : "'.$_POST["RKAS_DTL_KOEFISIEN"][$i].'",
                     "RKAS_DTL_HARGA"        : "'.$_POST["RKAS_DTL_HARGA"][$i].'",
                     "RKAS_DTL_JUMLAH"       : "'.$_POST["RKAS_DTL_JUMLAH"][$i].'",
                     "RKAS_DTL_I"            : "'.$_POST["RKAS_DTL_I"][$i].'",
                     "RKAS_DTL_II"           : "'.$_POST["RKAS_DTL_II"][$i].'",
                     "RKAS_DTL_III"          : "'.$_POST["RKAS_DTL_III"][$i].'",
                     "RKAS_DTL_IV"           : "'.$_POST["RKAS_DTL_IV"][$i].'",
                     "RKAS_DTL_V"            : "'.$_POST["RKAS_DTL_V"][$i].'",
                     "RKAS_DTL_VI"           : "'.$_POST["RKAS_DTL_VI"][$i].'",
                     "RKAS_DTL_VII"          : "'.$_POST["RKAS_DTL_VII"][$i].'",
                     "RKAS_DTL_VIII"         : "'.$_POST["RKAS_DTL_VIII"][$i].'",
                     "RKAS_DTL_IX"           : "'.$_POST["RKAS_DTL_IX"][$i].'",
                     "RKAS_DTL_X"            : "'.$_POST["RKAS_DTL_X"][$i].'",
                     "RKAS_DTL_XI"           : "'.$_POST["RKAS_DTL_XI"][$i].'",
                     "RKAS_DTL_XII"          : "'.$_POST["RKAS_DTL_XII"][$i].'"
                  },';
      }

      $arrdetil = substr($arrdetil, 0,-1);
      $page      = "data_rkas";
      $json      = '{
                    "action": "saveheaderdetail",
                    "data": [
                        "HEADER",
                        "DETAIL"
                    ],
                    "HEADER": {
                        "DB": "'.$databaseApi.'",
                        "TABLE": "tx_hdr_keuangan_rkas",
                        "PK": "KEUANGAN_RKAS_ID",
                        "VALUE": [
                            {
                              "KEUANGAN_RKAS_ID"              : "'.$_POST["KEUANGAN_RKAS_ID"].'",
                              "KEUANGAN_RKAS_NO_PENGAJUAN"    : "'.$_POST["KEUANGAN_RKAS_NO_PENGAJUAN"].'",
                              "KEUANGAN_RKAS_NAMA_SEKOLAH"    : "'.$_POST["KEUANGAN_RKAS_NAMA_SEKOLAH"].'",
                              "KEUANGAN_RKAS_TAHUN_ANGGARAN"  : "'.$_POST["KEUANGAN_RKAS_TAHUN_ANGGARAN"].'",
                              "KEUANGAN_RKAS_SUMBER_DANA"     : "'.$_POST["KEUANGAN_RKAS_SUMBER_DANA"].'",
                              "KEUANGAN_RKAS_TGL_UPDATE"      : "'.$_POST["KEUANGAN_RKAS_TGL_UPDATE"].'",
                              "KEUANGAN_RKAS_USER"            : "'.$_POST["RKAS_DTL_USER_ID"].'"
                            }
                        ]
                    },
                    "DETAIL": {
                        "DB": "sdnpakis",
                        "TABLE": "tx_dtl_keuangan_rkas",
                        "FK": [
                            "RKAS_HDR_ID",
                            "KEUANGAN_RKAS_ID"
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
