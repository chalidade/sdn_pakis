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
      <h1 style="text-align:center">Absensi Siswa<br>
        <font style="font-size:14px;font-weight:100">{{header[0].ABSEN_UPDATE_DATE}}</font>
      </h1>
    <br>
    <table width="100%" class="table order-list">
      <tr>
        <td width="15%"><b>Nama Guru<b></td>
        <td width="2%">:</td>
        <td colspan="2">
          {{header[0].ABSEN_GURU}}
        </td>
      </tr>
      <tr>
        <td width="15%"><b>Tingkat / Kelas</b></td>
        <td width="2%">:</td>
        <td>
          {{header[0].ABSEN_TINGKAT}} {{header[0].ABSEN_KELAS}}
        </td>
        <td>

        </td>
      </tr>
    </table>
    <div class="table-responsive">
    <table id="app" style="margin-top:20px;width:100%" border="1">
      <tr style="text-align:center;background:#d4d4d4">
        <th rowspan="2" style="vertical-align:middle;">NIS</th>
        <th rowspan="2" style="vertical-align:middle;">Nama Siswa</th>
        <th colspan="4">Absensi</th>
        <th rowspan="2" style="vertical-align:middle;">Keterangan</th>
      </tr>
      <tr style="text-align:center;background:#d4d4d4">
        <th>Hadir</th>
        <th>Izin</th>
        <th>Sakit</th>
        <th>Alfa</th>
      </tr>
      <template v-for="data in detail">
        <tr>
          <td width="6%">{{data.DTL_NIS}}</td>
          <td width="25%">{{data.DTL_NAMA_SISWA}}</td>
          <td><center><img src="../../resource/public/tick.png" width="15px" v-if="data.DTL_ABSENSI == 0"></center></td>
          <td><center><img src="../../resource/public/tick.png" width="15px" v-if="data.DTL_ABSENSI == 1"></center></td>
          <td><center><img src="../../resource/public/tick.png" width="15px" v-if="data.DTL_ABSENSI == 2"></center></td>
          <td><center><img src="../../resource/public/tick.png" width="15px" v-if="data.DTL_ABSENSI == 3"></center></td>
          <td></td>
        </tr>
      </template>
    </form>
    <tr style="background:#d4d4d4">
      <td colspan="8"><br></td>
    </tr>
    <!-- <tr>
      <td>#</td>
      <td>Jumlah</td>
      <td style="text-align:center">2</td>
      <td style="text-align:center">2</td>
      <td style="text-align:center">2</td>
      <td style="text-align:center">0</td>
      <td>
        <table width="100%">
          <tr>
            <td width="10%">Total Siswa</td>
            <td width="10%">: 2</td>
            <td width="3%">Hadir</td>
            <td width="10%">: 2</td>
            <td width="3%">Izin</td>
            <td width="10%">: 2</td>
            <td width="3%">Sakit</td>
            <td width="10%">: 2</td>
            <td width="3%">Alfa</td>
            <td width="10%">: 0</td>
          </tr>
        </table>
      </td>
    </tr> -->
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
                  "TABLE": "tx_hdr_absen_siswa",
                  "PK": [
                      "ABSEN_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_absen_siswa",
                  "FK": [
                      "DTL_HDR_ID",
                      "ABSEN_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })

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
                    "TABLE": "tx_hdr_absen_siswa",
                    "PK": [
                        "ABSEN_ID",
                        id
                    ]
                },
                "DETAIL": {
                    "DB": "sdnpakis",
                    "TABLE": "tx_dtl_absen_siswa",
                    "FK": [
                        "DTL_HDR_ID",
                        "ABSEN_ID"
                    ]
                }
            })
          .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
        }
      })
  </script>
</html>
