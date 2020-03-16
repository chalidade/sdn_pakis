<?php
error_reporting(0);
$id        = $_REQUEST["id"];

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
        <td width="10%"><b>Nama Sekolah<b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].SARPRAS_HDR_NAMA_SEKOLAH}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Alamat Sekolah</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].SARPRAS_HDR_ALAMAT_SEKOLAH}}
        </td>
      </tr>
      <tr>
        <td width="10%"><b>Kecamatan</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].SARPRAS_HDR_KECAMATAN}}
        </td>
      </tr>
    </table>
    <br>
    <table class="text-center" border="1" width="100%">
      <tr>
        <th rowspan="2" width="20%">Jenis Barang</th>
        <th rowspan="2" width="10%">Jumlah Barang</th>
        <th rowspan="2" width="10%">Satuan</th>
        <th colspan="2" width="20%">Jumlah Kondisi Barang</th>
        <th rowspan="2" width="20%">Keterangan</th>
      </tr>
      <tr>
        <th width="10%">Baik</th>
        <th width="10%">Rusak</th>
      </tr>
      <template  v-for="data in detail">
      <tr>
        <td>{{data.SARPRAS_DTL_JENIS_BARANG}}</td>
        <td style="text-align:center">{{data.SARPRAS_DTLJUMLAH_BARANG}}</td>
        <td style="text-align:center">{{data.SARPRAS_DTL_SATUAN}}</td>
        <td style="text-align:center">{{data.SARPRAS_DTL_KONDISI_BAIK}}</td>
        <td style="text-align:center">{{data.SARPRAS_DTL_KONDISI_RUSAK}}</td>
        <td>{{data.SARPRAS_DTL_KETERANGAN}}</td>
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
                  "TABLE": "tx_hdr_sarpras",
                  "PK": [
                      "SARPRAS__HDR_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_sarpras",
                  "FK": [
                      "SARPRAS_HDR_ID",
                      "SARPRAS__HDR_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })
  </script>
</html>
