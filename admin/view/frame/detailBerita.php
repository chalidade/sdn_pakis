<?php
error_reporting(0);
include "../../app/config/setting.php";
include "../../app/config/connection.php";
$id        = $_REQUEST["id"];
$sql       = mysqli_query($mysqli, "SELECT * FROM `tx_home_berita` JOIN `tx_hdr_user` ON `tx_home_berita`.`BERITA_USER` = `tx_hdr_user`.`USER_ID` WHERE `BERITA_ID` = '$id'");
$berita    = json_decode(json_encode(mysqli_fetch_assoc($sql)), TRUE);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="../../assets/js/axios.min.js"></script>
    <script src="../../assets/js/vue.js"></script>
    <style type="text/css" media="screen">
      table {
        border-collapse: collapse;
        border-spacing: 0;
      }
      body {
        margin:0px;
        font-size:12px;
        font-family: "Arial"
      }
    </style>
  </head>

 <body style="padding:10px;height:500px">
    <div id="app" style="width:100%" class="Section1">
      <center>
        <h1><?php echo $berita["BERITA_JUDUL"]; ?></h1>
        <p style="margin-top:-10px;font-size:10px"><?php echo $berita["BERITA_UPDATE"]; ?> | <?php echo $berita["USER_NAME"]; ?> </p>
        <img onerror="this.onerror=null; this.src='../img/unavailable.png'" src="../../<?php echo $publicBerita."".$berita["BERITA_IMAGE"] ?>" style='width:100%;margin-top:20px;border-radius:10px' alt=''>
      </center>
        <p style="margin-top:20px;text-align:justify;font-size:14px">
          <?php echo $berita["BERITA_DESKRIPSI"]; ?>
        </p>
    </div>
  </body>
</html>
