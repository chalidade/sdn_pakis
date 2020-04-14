<?php
include "../../app/config/setting.php";
include "../../app/config/connection.php";
error_reporting(0);
$id     = $_REQUEST["id"];
if (!empty($_REQUEST["print"])) {

}
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
     <?php
      $data               = $_REQUEST["id"];
      $hdrQuery           = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_silabus` WHERE `SILABUS_HDR_ID` = '$data' ");
      $hdrSilabus         = json_decode(json_encode(mysqli_fetch_assoc($hdrQuery)),TRUE);
      $dtlSilabus         = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_silabus` WHERE `SILABUS_HDR_ID` = '$data'");
       ?>
    <div id="app" style="width:100%" class="Section1">
      <h1 style="text-align:center">SILABUS TEMATIK KELAS <?php echo $hdrSilabus['SILABUS_HDR_KELAS']; ?>
      </h1>
    <br>
      <table width="100%" id="myTable" class="table order-list">
        <tr>
          <td width="15%"><b>Satuan Pendidikan<b></td>
          <td width="2%">:</td>
          <td>
            <?php echo $hdrSilabus['SILABUS_HDR_SATUAN_PENDIDIKAN']; ?>
          </td>
        </tr>
        <tr>
          <td width="15%"><b>Kelas</b></td>
          <td width="2%">:</td>
          <td>
            <?php echo $hdrSilabus['SILABUS_HDR_KELAS']; ?>
          </td>
        </tr>
        <tr>
          <td><b>Kompetensi Inti</b></td>
          <td>:</td>
        </tr>
        <tr>
          <td colspan="3"><?php echo $hdrSilabus["SILABUS_HDR_KOMPETENSI_INTI"]; ?>
          </td>
        </tr>
      </table>
      <br>
      <table class="text-center" border="1" width="100%">
        <tr>
          <th width="15%">Muatan Pelajaran</th>
          <th width="15%">Kompetensi Dasar</th>
          <th width="15%">Tema</th>
          <th width="15%">Pembelajaran</th>
          <th width="12%">Penilaian</th>
          <th width="11%">Alokasi Waktu</th>
          <th width="12%">Sumber Belajar</th>
        </tr>
        <?php
         $no = 0;
         while ($detail = mysqli_fetch_array($dtlSilabus)) {
        ?>
        <tr>
          <td width="15%"><?php echo $detail['SILABUS_DTL_MUATAN_PELAJARAN']; ?></td>
          <td width="15%"><?php echo $detail['SILABUS_DTL_KOMPETENSI_DASAR']; ?></td>
          <td width="15%"><?php echo $detail['SILABUS_DTL_TEMA']; ?></td>
          <td width="15%"><?php echo $detail['SILABUS_DTL_PEMBELAJARAN']; ?></td>
          <td width="12%" style="text-align:center"><?php echo $detail['SILABUS_DTL_PENLAIAN']; ?></td>
          <td width="11%" style="text-align:center"><?php echo $detail['SILABUS_DTL_ALOKASI_WAKTU']; ?></td>
          <td width="12%"><?php echo $detail['SILABUS_DTL_SUMBER_BELAJAR']; ?></td>
        </tr>
      <?php } ?>
    </table>
    </div>
  </body>
</html>
