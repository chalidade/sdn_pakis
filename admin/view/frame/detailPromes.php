<?php
include "../../app/config/setting.php";
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
    <div id="app" style="width:100%" class="Section1">
      <h1 style="text-align:center">PROGRAM SEMESTER<br>
        <font style="font-size:20px;">TAHUN AJARAN {{header[0].PROMES_TAHUN_AJARAN}}</font> <br>
        <font style="font-size:16px">KELAS : {{header[0].PROMES_KELAS}} SEMESTER : {{header[0].PROMES_SEMESTER}}</font>

      </h1>
    <br>
    <table class="text-center" border="1" width="100%">
      <!-- Semester Genap -->
      <tr id="ganjil" v-if="header[0].PROMES_SEMESTER == 1">
        <th rowspan="2" width='10%'>Tema</th>
        <th rowspan="2" width='20%'>Sub Tema<br>Kompetensi Dasar</th>
        <th rowspan="2" width='10%'>Alokasi Waktu (Jam)</th>
        <th colspan="5" width="10%">Juli</th>
        <th colspan="5" width="10%">Agustus</th>
        <th colspan="5" width="10%">September</th>
        <th colspan="5" width="10%">Oktober</th>
        <th colspan="5" width="10%">November</th>
        <th colspan="5" width="10%">Desember</th>
      </tr>
      <!-- Semester Ganjil -->
      <tr id="genap" v-if="header[0].PROMES_SEMESTER == 2">
        <th rowspan="2" width='10%'>Tema</th>
        <th rowspan="2" width='20%'>Sub Tema<br>Kompetensi Dasar</th>
        <th rowspan="2" width='10%'>Alokasi Waktu (Jam)</th>
        <th colspan="5" width="10%">January</th>
        <th colspan="5" width="10%">February</th>
        <th colspan="5" width="10%">Maret</th>
        <th colspan="5" width="10%">April</th>
        <th colspan="5" width="10%">Mei</th>
        <th colspan="5" width="10%">Juni</th>
      </tr>
      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
      </tr>
      <template  v-for="data in detail">
        <tr style="text-align:center">
          <td width="10%">{{data.DTL_TEMA}}</td>
          <td width="20%">{{data.DTL_KOMPETENSI}}</td>
          <td width="10%">{{data.DTL_ALOKASI_WAKTU}}</td>
          <td width="2%">{{data.DTL_BLN_SATU_A}}</td>
          <td width="2%">{{data.DTL_BLN_SATU_B}}</td>
          <td width="2%">{{data.DTL_BLN_SATU_C}}</td>
          <td width="2%">{{data.DTL_BLN_SATU_D}}</td>
          <td width="2%">{{data.DTL_BLN_SATU_E}}</td>
          <td width="2%">{{data.DTL_BLN_DUA_A}}</td>
          <td width="2%">{{data.DTL_BLN_DUA_B}}</td>
          <td width="2%">{{data.DTL_BLN_DUA_C}}</td>
          <td width="2%">{{data.DTL_BLN_DUA_D}}</td>
          <td width="2%">{{data.DTL_BLN_DUA_E}}</td>
          <td width="2%">{{data.DTL_BLN_TIGA_A}}</td>
          <td width="2%">{{data.DTL_BLN_TIGA_B}}</td>
          <td width="2%">{{data.DTL_BLN_TIGA_C}}</td>
          <td width="2%">{{data.DTL_BLN_TIGA_D}}</td>
          <td width="2%">{{data.DTL_BLN_TIGA_E}}</td>
          <td width="2%">{{data.DTL_BLN_EMPAT_A}}</td>
          <td width="2%">{{data.DTL_BLN_EMPAT_B}}</td>
          <td width="2%">{{data.DTL_BLN_EMPAT_C}}</td>
          <td width="2%">{{data.DTL_BLN_EMPAT_D}}</td>
          <td width="2%">{{data.DTL_BLN_EMPAT_E}}</td>
          <td width="2%">{{data.DTL_BLN_LIMA_A}}</td>
          <td width="2%">{{data.DTL_BLN_LIMA_B}}</td>
          <td width="2%">{{data.DTL_BLN_LIMA_C}}</td>
          <td width="2%">{{data.DTL_BLN_LIMA_D}}</td>
          <td width="2%">{{data.DTL_BLN_LIMA_E}}</td>
          <td width="2%">{{data.DTL_BLN_ENAM_A}}</td>
          <td width="2%">{{data.DTL_BLN_ENAM_B}}</td>
          <td width="2%">{{data.DTL_BLN_ENAM_C}}</td>
          <td width="2%">{{data.DTL_BLN_ENAM_D}}</td>
          <td width="2%">{{data.DTL_BLN_ENAM_E}}</td>
        </tr>
    </template>
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
                  "TABLE": "tx_hdr_promes",
                  "PK": [
                      "PROMES_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_promes",
                  "FK": [
                      "DTL_HDR_ID",
                      "PROMES_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })
  </script>
</html>
