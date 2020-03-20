<?php
error_reporting(0);
include "../../app/config/connection.php";
include "../../app/config/setting.php";
$id        = $_REQUEST["id"];
$sql       = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_rpp` WHERE `RPP_HDR_ID` = '$id'");
$detail    = json_decode(json_encode(mysqli_fetch_assoc($sql)), TRUE);

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
    <div id="app" style="width:100%" class="Section1">
      <h1 style="text-align:center">RENCANA PELAKSANAAN PEMBELAJARAN
      </h1>
    <br>
    <table width="100%" id="myTable" class="table order-list">
      <tr>
        <td width="10%"><b>Satuan Pendidikan<b></td>
        <td width="2%">:</td>
        <td> {{header[0].RPP_HDR_SATUAN_PENDIDIKAN}} </td>
      </tr>
      <tr>
        <td width="10%"><b>Muatan Terpadu</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].RPP_HDR_MUATAN_TERPADU}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Kelas</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].RPP_HDR_KELAS}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Semester</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].RPP_HDR_SEMESTER}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Tema</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].RPP_HDR_TEMA}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Sub Tema</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].RPP_HDR_SUB_TEMA}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Pembelajaran</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].RPP_HDR_PEMBELAJARAN}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Materi Pokok</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].RPP_HDR_MATERI_POKOK}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Alokasi Waktu</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].RPP_HDR_ALOKASI_WAKTU}}
        </td>
      </tr>
    </table>
    <br>
    <h4><b>A. Kompetensi Inti</b></h4>
    <table width="100%" border="0">
      <tr>
        <td>
          <?php echo $detail["RPP_DTL_KOMPETENSI_INTI"]; ?>
        </td>
      </tr>
    </table>
    <br>
    <h4><b>B. Kompetensi Dasar dan Indikator Pencapaian Kompetensi</b></h4>
    <table width="100%" border="0">
      <tr>
        <td>
          <?php echo $detail["RPP_DTL_KOMPETENSI_DASAR"]; ?>
        </td>
      </tr>
    </table>
    <br>
    <br>
    <h4><b>C. Tujuan Pembelajaran</b></h4>
    <table width="100%" border="0">
      <tr>
        <td>
          <?php echo $detail["RPP_DTL_TUJUAN_PEMBELAJARAN"]; ?>
        </td>
      </tr>
    </table>
    <br>
    <h4><b>D. Materi Pembelajaran</b></h4>
    <table width="100%" border="0">
      <tr>
        <td>
          <?php echo $detail["RPP_DTL_MATERI_PEMBELAJARAN"]; ?>
        </td>
      </tr>
    </table>
    <br>
    <h4><b>E. Pendekatan, Model, dan Metode Pembelajaran</b></h4>
    <table width="100%" border="0">
      <tr>
        <td>
          <?php echo $detail["RPP_DTL_METODE_PEMBELAJARAN"]; ?>
        </td>
      </tr>
    </table>
    <br>
    <h4><b>F. Media / Alat, Bahan dan Sumber Belajar</b></h4>
    <table width="100%" border="0">
      <tr>
        <td>
          <?php echo $detail["RPP_DTL_SUMBER_BELAJAR"]; ?>
        </td>
      </tr>
    </table>
    <h4><b>G. Kegiatan Pembelajaran</b></h4>
    <table width="100%" border="0">
      <tr>
        <td>
          <?php echo $detail["RPP_DTL_KEGIATAN_PEMBELAJARAN"]; ?>
        </td>
      </tr>
    </table>
    <br>
    <h4><b>H. Penilaian</b></h4>
    <table width="100%" border="0">
      <tr>
        <td>
          <?php echo $detail["RPP_DTL_PENILAIAN"]; ?>
        </td>
      </tr>
    </table>
    </table>
    </div>
  </body>

  <script type="text/javascript">
  var url = "<?php echo $urlApi; ?>";
  var id  = "<?php echo $id; ?>";
  new Vue({
      el: '#app',
      data () {
        return {
          detail: null,
          header: null
        }
      },
      mounted () {
        axios
        .post(url+'/index', {
              "action": "viewHeaderDetail",
              "data": [
                  "HEADER",
                  "DETAIL"
              ],
              "HEADER": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_hdr_rpp",
                  "PK": [
                      "RPP_HDR_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_rpp",
                  "FK": [
                      "RPP_HDR_ID",
                      "RPP_HDR_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })
  </script>
</html>
