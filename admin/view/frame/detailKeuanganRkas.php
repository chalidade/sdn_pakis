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
      <h1 style="text-align:center">Rencana Kegiatan dan Anggaran Sekolah (RKAS)<br>
        <!-- <font style="font-size:20px;">TAHUN AJARAN {{header[0].KEUANGAN_RKAS_TGL_UPDATE}}</font> <br>
        <font style="font-size:16px">KELAS : </font> -->

      </h1>
    <br>
    <table width="100%" id="myTable" class="table order-list">
      <tr>
        <td width="15%"><b>Nama Sekolah<b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" required class="form-control" style="border:none" name="KEUANGAN_RKAS_NAMA_SEKOLAH" v-bind:value="header[0].KEUANGAN_RKAS_NAMA_SEKOLAH">
        </td>
      </tr>
      <tr>
        <td width="15%"><b>Tahun Anggaran</b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" required class="form-control border-bottom-only" style="border:none" name="KEUANGAN_RKAS_TAHUN_ANGGARAN" v-bind:value="header[0].KEUANGAN_RKAS_TAHUN_ANGGARAN">
        </td>
      </tr>
      <tr>
        <td width="15%"><b>Sumber Dana</b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" required class="form-control border-bottom-only" style="border:none" name="KEUANGAN_RKAS_SUMBER_DANA" v-bind:value="header[0].KEUANGAN_RKAS_SUMBER_DANA">
        </td>
      </tr>
    </table>
    <br>
    <table class="text-center" border="1" width="100%" style="font-size:12px">
      <tr>
        <th rowspan="2" width="4%">No</th>
        <th rowspan="2" width="9%">No Kode</th>
        <th rowspan="2" width="16%">Uraian</th>
        <th rowspan="2" width="8%">Koefisien</th>
        <th rowspan="2" width="5%">Harga</th>
        <th rowspan="2" width="5%">Jumlah / Tahun</th>
        <th colspan="12">Periode Bulan</th>
      </tr>
      <tr>
        <th width="4%">I</th>
        <th width="4%">II</th>
        <th width="4%">III</th>
        <th width="4%">IV</th>
        <th width="4%">V</th>
        <th width="4%">VI</th>
        <th width="4%">VII</th>
        <th width="4%">VIII</th>
        <th width="4%">IX</th>
        <th width="4%">X</th>
        <th width="4%">XI</th>
        <th width="4%">XII</th>
      </tr>
      <template v-for="rkas in detail">
      <tr style="text-align:center">
        <td>{{rkas.RKAS_DTL_ID}}</td>
        <td>{{rkas.RKAS_DTL_KODE}}</td>
        <td>{{rkas.RKAS_DTL_URAIAN}}</td>
        <td>{{rkas.RKAS_DTL_KOEFISIEN}}</td>
        <td>{{rkas.RKAS_DTL_HARGA}}</td>
        <td>{{rkas.RKAS_DTL_JUMLAH}}</td>
        <td>{{rkas.RKAS_DTL_I}}</td>
        <td>{{rkas.RKAS_DTL_II}}</td>
        <td>{{rkas.RKAS_DTL_III}}</td>
        <td>{{rkas.RKAS_DTL_VI}}</td>
        <td>{{rkas.RKAS_DTL_V}}</td>
        <td>{{rkas.RKAS_DTL_VI}}</td>
        <td>{{rkas.RKAS_DTL_VII}}</td>
        <td>{{rkas.RKAS_DTL_VIII}}</td>
        <td>{{rkas.RKAS_DTL_XI}}</td>
        <td>{{rkas.RKAS_DTL_X}}</td>
        <td>{{rkas.RKAS_DTL_XI}}</td>
        <td>{{rkas.RKAS_DTL_XII}}</td>
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
                  "TABLE": "tx_hdr_keuangan_rkas",
                  "PK": [
                      "KEUANGAN_RKAS_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_keuangan_rkas",
                  "FK": [
                      "RKAS_HDR_ID",
                      "KEUANGAN_RKAS_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })
  </script>
</html>
