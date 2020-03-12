<?php
// End Point
$urlAdmin       = "http://localhost/sdn_pakis_baru/admin/index.php";
$urlApi         = "http://localhost/uapi";
$urlPageMembaca = "http://localhost/sdn_pakis_baru/admin/index.php?id=input_membaca&start=";
$urlPageBerita  = "http://localhost/sdn_pakis_baru/admin/index.php?id=berita&start=";
$urlPageRpp     = "http://localhost/sdn_pakis_baru/admin/index.php?id=data_rpp&start=";
$urlDataSiswa   = "http://localhost/sdn_pakis_baru/admin/index.php?id=data_siswa&start=";
$urlDataGuru    = "http://localhost/sdn_pakis_baru/admin/index.php?id=data_guru&start=";
$urlAssets      = "assets/dist/img/";
$urlPageRangking= "http://localhost/sdn_pakis_baru/admin/index.php?id=data_rangking&start=";
$urlAnalisisHB  = "http://localhost/sdn_pakis_baru/admin/index.php?id=data_analisis_hb&start=";
$publicFolder   = "resource/public/";
$publicMembaca  = "resource/public/Membaca/";
$publicSiswa    = "resource/public/Siswa/";
$publicBerita   = "resource/public/Berita/";
$publicImage    = "../../assets/img/";
$publicJs       = "../../assets/js/";

$database       = "sdn_pakis";
$databaseApi    = "sdnpakis";

// LogicException
if (isset($_REQUEST['start'])) {
  $start        = $_REQUEST['start'];
}
 ?>
