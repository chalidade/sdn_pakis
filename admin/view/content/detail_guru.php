<?php
error_reporting(0);
include "../../app/config/setting.php";
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
        font-size:14px;
        font-family: "Arial"
      }
    </style>
  </head>

 <body style="padding:10px;height:500px">
   <center>
    <div id="app" style="width:100%" class="Section1">
      <?php if ($session["USER_ROLE"] == 2) { ?>
        <form action="../../app/model/GuruModel.php?id=update" method="post" enctype="multipart/form-data">
      <?php } else { ?>
        <form action="../../app/model/GuruModel.php?id=update&ext=true" method="post" enctype="multipart/form-data">
      <?php } ?>
    <table width="100%">
      <tr>
        <td width="50%" style="font-weight:800;vertical-align:top">
          <p>Nama Lengkap : <br><input type="text" name="USER_NAME" v-bind:value="data[0].USER_NAME" style="border:none"></p>
          <p>Alamat : <br><input type="text" name="USER_ADDRESS" v-bind:value="data[0].USER_ADDRESS" style="border:none"></p>
          <p>Tempat, Tanggal Lahir : <br>
            <table>
              <tr>
                <td><input type="text" name="USER_BIRTHPLACE" v-bind:value="data[0].USER_BIRTHPLACE" style="border:none"></td>
                <td><input type="text" name="USER_BIRTHDATE" v-bind:value="data[0].USER_BIRTHDATE" style="border:none"></td>
              </tr>
            </table>
          </p>
          <p>Email : <br><input type="email" name="USER_EMAIL" v-bind:value="data[0].USER_EMAIL" style="border:none"></p>
          <p>Password : <br><input type="password" name="USER_PASSWORD" v-bind:value="data[0].USER_PASSWORD" style="border:none" placeholder="Isi Password Anda"></p>

        </td>
        <td rowspan="18" width="50%" style="vertical-align:top;">
          <label class="" for="imgSlider1" style="margin:auto">
            <center><img onerror="this.onerror=null; this.src='../../../img/unavailable.png'" v-bind:src="'../../<?php echo $publicUser ?>' + data[0].USER_PHOTO" style='width:80%;padding:5px' alt=''>
              <input type="file" id="imgSlider1" name="USER_PHOTO" style="display:none">
              <input type="hidden" name="USER_PHOTO_BACKUP" v-bind:value="data[0].USER_PHOTO">
            <div style="border:1px solid;background: white;width:70%;margin:auto">
              <font style="font-weight:100;"> Change Picture</font></center>
            </div>
          </label>
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="60%">
        <p><font style="font-weight:800">NIP</font> : <br>
        <input type="text" name="USER_NIP" v-bind:value="data[0].USER_NIP" style="border:none">
        <input type="hidden" name="USER_ID" v-bind:value="data[0].USER_ID" style="border:none"></p>
        <p><font style="font-weight:800">NUPTK</font> : <br><input type="text" name="DTL_NUPTK" v-bind:value="data[0].DTL_NUPTK" style="border:none"></p>
        <p><font style="font-weight:800">Jabatan </font>: <br><input type="text" name="DTL_JABATAN" v-bind:value="data[0].DTL_JABATAN" style="border:none"></p>
        <p><font style="font-weight:800">Status</font> : <br><input type="text" name="DTL_STATUS" v-bind:value="data[0].DTL_STATUS" style="border:none"><input type="hidden" name="USER_ROLE" value="2"></p>
        <p><font style="font-weight:800">Golongan</font> : <br><input type="text" name="DTL_GOL" v-bind:value="data[0].DTL_GOL" style="border:none"></p>
      </td>
      <td width="40%" >
        <p><font style="font-weight:800">Pendidikan Terakhir</font> : <br><input type="text" name="DTL_IJAZAH" v-bind:value="data[0].DTL_IJAZAH" style="border:none"></p>
        <p><font style="font-weight:800">Tahun Lulus</font> : <br><input type="text" name="DTL_IJAZAH_TAHUN" v-bind:value="data[0].DTL_IJAZAH_TAHUN" style="border:none"></p>
        <p><font style="font-weight:800">Prodi / Jurusan</font> : <br><input type="text" name="DTL_IJAZAH_JURUSAN" v-bind:value="data[0].DTL_IJAZAH_JURUSAN" style="border:none"></p>
        <p><font style="font-weight:800">Tanggal Mulai Mengajar</font> : <br><input type="text" name="DTL_TANGGAL_MULAI" v-bind:value="data[0].DTL_TANGGAL_MULAI" style="border:none"></p>
        <p><font style="font-weight:800">Nomor Telpon</font> : <br><input type="text" name="DTL_TELPON" v-bind:value="data[0].DTL_TELPON" style="border:none"></p>
      </td>
      </tr>
      </table>
        </td>
      </tr>
    </table>
    <table width="100%" style="margin-top:20px">
      <tr>
        <td><input type="submit" name="" value="Simpan" style="width:100%;border:none;background:#3c8dbc;color:#fff;padding:10px;"></td>
      </tr>
    </table>
  </form>
    </div>
  </center>
  </body>

  <script type="text/javascript">
  var url   = "<?php echo $urlApi; ?>";
  var id  = "<?php echo $id; ?>";
    new Vue({
        el: '#app',
        data () {
          return {
            data: null
          }
        },
        mounted () {
          axios
          .post(url+'/index', {
              "action": "list",
              "db": "sdnpakis",
              "table": "tx_hdr_user as A",
              "innerJoin": [
                  {
                      "table": "tx_dtl_user_guru as B",
                      "field1": "A.USER_ID",
                      "field2": "B.DTL_HDR_ID"
                  },
                  {
                      "table": "tm_reff as C",
                      "field1": "A.USER_ROLE",
                      "field2": "C.REFF_ID"
                  }
              ],
              "where": [
                  [
                      "C.REFF_TR_ID",
                      "=",
                      "1"
                  ],
                  [
                      "A.USER_ID",
                      "=",
                      id
                  ]
              ],
              "start": "",
              "limit": 25
          })
          .then(response => (this.data = response["data"]["result"]))
        }
      })
  </script>
</html>
