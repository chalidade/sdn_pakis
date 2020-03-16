<?php
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
      <h1 style="text-align:center">SILABUS TEMATIK KELAS {{header[0].SILABUS_HDR_KELAS}}
      </h1>
    <br>
      <table width="100%" id="myTable" class="table order-list">
        <tr>
          <td width="15%"><b>Satuan Pendidikan<b></td>
          <td width="2%">:</td>
          <td>
            {{header[0].SILABUS_HDR_SATUAN_PENDIDIKAN}}
          </td>
        </tr>
        <tr>
          <td width="15%"><b>Kelas</b></td>
          <td width="2%">:</td>
          <td>
            {{header[0].SILABUS_HDR_KELAS}}
          </td>
        </tr>
        <tr>
          <td><b>Kompetensi Inti</b></td>
          <td>:</td>
        </tr>
        <tr>
          <td colspan="3">
              <?php
                include "../../app/config/connection.php";
                $sql = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_silabus` WHERE `SILABUS_HDR_ID` = '$id'");
                while ($data = mysqli_fetch_array($sql)) {
                  echo $data["SILABUS_HDR_KOMPETENSI_INTI"];
                }
               ?>
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
      <template  v-for="data in detail">
        <tr>
          <td width="15%">{{data.SILABUS_DTL_MUATAN_PELAJARAN}}</td>
          <td width="15%">{{data.SILABUS_DTL_KOMPETENSI_DASAR}}</td>
          <td width="15%">{{data.SILABUS_DTL_TEMA}}</td>
          <td width="15%">{{data.SILABUS_DTL_PEMBELAJARAN}}</td>
          <td width="12%" style="text-align:center">{{data.SILABUS_DTL_PENLAIAN}}</td>
          <td width="11%" style="text-align:center">{{data.SILABUS_DTL_ALOKASI_WAKTU}}</td>
          <td width="12%">{{data.SILABUS_DTL_SUMBER_BELAJAR}}</td>
        </tr>
    </template>
    </table>
    </div>
  </body>

  <script type="text/javascript">
  var url = "http://localhost/uapi";
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
                  "TABLE": "tx_hdr_silabus",
                  "PK": [
                      "SILABUS_HDR_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_silabus",
                  "FK": [
                      "SILABUS_HDR_ID",
                      "SILABUS_HDR_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })
  </script>
</html>
