<?php
if ($session["USER_ROLE"] == 1) {
$nis            = $session['DTL_NIS'];
$sqlTahu        = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT count('PENGETAHUAN_NIS') as TOTAL_PENGETAHUAN FROM tx_hdr_buku_pengetahuan WHERE PENGETAHUAN_STATUS = '2' AND PENGETAHUAN_NIS = '$nis'"))), TRUE);
$sqlBaca        = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT count('MEMBACA_SISWA') as TOTAL_MEMBACA FROM tx_hdr_buku_membaca WHERE MEMBACA_SISWA = '$nis'"))), TRUE);
$sqlCerita      = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tx_hdr_buku_bercerita WHERE BERCERITA_NIS = '$nis'"))), TRUE);
$cekRangking    = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM `ts_rangking` WHERE RANGKING_NIS = '$nis'"))), TRUE);
$jmlCerita  = $sqlCerita["BERCERITA_JAN"]+$sqlCerita["BERCERITA_FEB"]+$sqlCerita["BERCERITA_MAR"]+$sqlCerita["BERCERITA_APR"]+$sqlCerita["BERCERITA_MEI"]+$sqlCerita["BERCERITA_JUN"]+$sqlCerita["BERCERITA_JUL"]+$sqlCerita["BERCERITA_AUG"]+$sqlCerita["BERCERITA_SEP"]+$sqlCerita["BERCERITA_OKT"]+$sqlCerita["BERCERITA_NOV"]+$sqlCerita["BERCERITA_DES"];

 if (!empty($sqlBaca["TOTAL_MEMBACA"])) {
   $membaca   = $sqlBaca["TOTAL_MEMBACA"]*2;
 } else {
   $membaca   = 0;
 }

 if (!empty($jmlCerita)) {
   $bercerita   = $jmlCerita;
 } else {
   $bercerita   = 0;
 }

 if (!empty($sqlTahu["TOTAL_PENGETAHUAN"])) {
   $kip   = $sqlTahu["TOTAL_PENGETAHUAN"];
 } else {
   $kip   = 0;
 }

 $total = $membaca+$bercerita+$kip;

  if (empty($cekRangking["RANGKING_NIS"])) {
    $insert       = mysqli_query($mysqli, "INSERT INTO `ts_rangking` (`RANGKING_ID`, `RANGKING_NIS`, `RANGKING_MEMBACA`, `RANGKING_BERCERITA`, `RANGKING_PENGETAHUAN`, `RANGKING_TOTAL`, `RANGKING_TGL_UPDATE`) VALUES (NULL, '$nis', '$membaca', '$bercerita', '$kip', '$total', current_timestamp());");
  } else {
    $update       = mysqli_query($mysqli, "UPDATE `ts_rangking` SET `RANGKING_MEMBACA` = '$membaca', `RANGKING_BERCERITA` = '$bercerita', `RANGKING_PENGETAHUAN` = '$kip', `RANGKING_TOTAL` = '$total' WHERE `ts_rangking`.`RANGKING_NIS` = '$nis';");
  }
}
 ?>
