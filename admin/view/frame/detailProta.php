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
      <h1 style="text-align:center">PROGRAM TAHUNAN</h1>
      <table width="100%" id="myTable" class="table order-list">
      <tr>
        <td width="10%"><b>Satuan Pendidikan<b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" style="width:50%;border:none;" name="PROTA_SATUAN_PENDIDIKAN" v-bind:value="header[0].PROTA_SATUAN_AJAR">
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Tahun Ajaran</b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" style="width:50%;border:none;" name="PROTA_TAHUN_AJARAN"  v-bind:value="header[0].PROTA_TAHUN_AJAR">
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Kelas</b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" style="width:50%;border:none;" name="PROTA_KELAS"  v-bind:value="header[0].PROTA_KELAS">
          <input type="hidden" name="PROTA_USER_ID" value="<?php echo $session['USER_ID']; ?>">
        </td>
      </tr>
    </table>
    <br>
    <table width="100%" border="1">
      <!-- Semester Ganjil -->
      <tr>
        <th width="10%">Semester</th>
        <th width="10%">No</th>
        <th width="30%">Tema/Sub Tema</th>
        <th width="10%">Alokasi Waktu</th>
        <th width="40%">Keterangan</th>
      </tr>
      <template  v-for="data in detail">
        <tr>
          <td style="text-align:center">{{data.DTL_SEMESTER}}</td>
          <td style="text-align:center">{{data.DTL_NO}}</td>
          <td>{{data.DTL_TEMA}}</td>
          <td style="text-align:center">{{data.DTL_ALOKASI_WAKTU}}</td>
          <td>{{data.DTL_KETERANGAN}}</td>
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
                  "TABLE": "tx_hdr_prota",
                  "PK": [
                      "PROTA_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_prota",
                  "FK": [
                      "DTL_HDR_ID",
                      "PROTA_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })
  </script>
</html>
