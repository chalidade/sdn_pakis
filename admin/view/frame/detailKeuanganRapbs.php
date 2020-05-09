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
      <h1 style="text-align:center">Rencana Anggaran Pendapatan Belanja Sekolah (RAPBS)<br>
        <!-- <font style="font-size:20px;">TAHUN AJARAN {{header[0].KEUANGAN_RKAS_TGL_UPDATE}}</font> <br>
        <font style="font-size:16px">KELAS : </font> -->

      </h1>
    <br>
    <table width="100%" id="myTable" class="table order-list">
      <tr>
        <td width="15%"><b>Nama Sekolah<b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" required class="form-control border-bottom-only" style="border:none" name="KEUANGAN_RAPBS_NAMA_SEKOLAH" v-bind:value="header[0].KEUANGAN_RAPBS_NAMA_SEKOLAH">
          <input type="hidden" class="form-control border-bottom-only" style="border:none" name="KEUANGAN_RAPBS_NO_PENGAJUAN" v-bind:value="header[0].KEUANGAN_RAPBS_NO_PENGAJUAN">
          <input type="hidden" style="border:none" name="KEUANGAN_RAPBS_ID" v-bind:value="header[0].KEUANGAN_RAPBS_ID">
        </td>
      </tr>
      <tr>
        <td width="15%"><b>Desa / Kecamatan</b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" required class="form-control border-bottom-only" style="border:none" name="KEUANGAN_RAPBS_DESA" v-bind:value="header[0].KEUANGAN_RAPBS_DESA">
        </td>
      </tr>
      <tr>
        <td width="15%"><b>Kabupaten / Kota</b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" required class="form-control border-bottom-only" style="border:none" name="KEUANGAN_RAPBS_KABUPATEN" v-bind:value="header[0].KEUANGAN_RAPBS_KABUPATEN">
        </td>
      </tr>
      <tr>
        <td width="15%"><b>Provinsi</b></td>
        <td width="2%">:</td>
        <td>
          <input type="text" required class="form-control border-bottom-only" style="border:none" name="KEUANGAN_RAPBS_PROVINSI" v-bind:value="header[0].KEUANGAN_RAPBS_PROVINSI">
        </td>
      </tr>
    </table>
    <br>
    <table class="text-center" border="1" width="100%" style="font-size:12px">
      <tr>
        <th colspan="5">PENERIMAAN</th>
        <th colspan="4">PENGELUARAN</th>
      </tr>
      <tr>
        <th width="5%">No Urut</th>
        <th width="15%">No Kode</th>
        <th width="20%">Uraian</th>
        <th width="15%">Anggaran</th>
        <th width="5%">No</th>
        <th width="5%">No Kode</th>
        <th width="20%">Uraian</th>
        <th width="15%">Anggaran</th>
      </tr>
      <template v-for="rapbs in detail">
      <tr class="protasem1">
      <td width='5%'>{{rapbs.RAPBS_DTL_PENERIMAAN_URUT}}</td>
      <td width='15%'>{{rapbs.RAPBS_DTL_PENERIMAAN_KODE}}</td>
      <td width='20%'>{{rapbs.RAPBS_DTL_PENERIMAAN_URAIAN}}</td>
      <td width='15%'>{{rapbs.RAPBS_DTL_PENERIMAAN_ANGGARAN}}</td>
      <td width='5%'>{{rapbs.RAPBS_DTL_PENERIMAAN_NO}}</td>
      <td width='5%'>{{rapbs.RAPBS_DTL_PENGELUARAN_KODE}}</td>
      <td width='20%'>{{rapbs.RAPBS_DTL_PENGELUARAN_URAIAN}}
      <td width='20%'>{{rapbs.RAPBS_DTL_PENGELUARAN_ANGGARAN}}</td>
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
                  "TABLE": "tx_hdr_keuangan_rapbs",
                  "PK": [
                      "KEUANGAN_RAPBS_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_keuangan_rapbs",
                  "FK": [
                      "RAPBS_DTL_HDR_ID",
                      "KEUANGAN_RAPBS_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })
  </script>
</html>
