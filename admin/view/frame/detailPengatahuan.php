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
     <form action="app/model/BerceritaModel.php?id=insert" method="post" enctype="multipart/form-data">
       <?php
       $id        = $_REQUEST["id"];
        ?>
      <div  id="app">
       <table width="100%" align="center" cellpadding="5" cellspacing="5">
         <tr>
           <td width="10%">NIS</td>
           <td width="1%"> :</td>
           <td>
             <input style="border:none" type="text" v-bind:value="header[0].PENGETAHUAN_NIS" class="form-control">
           </td>
         </tr>
         <tr>
           <td width="10%">Tanggal</td>
           <td width="1%"> :</td>
           <td>
             <input style="border:none" type="text" v-bind:value="header[0].PENGETAHUAN_TGL_UPDATE" class="form-control">
           </td>
         </tr>
       </table>
       <table width="100%" style="margin-top:20px" border="1" cellpadding="5" cellspacing="5">
         <tr>
           <th style="text-align:left">Kalimat Pengetahuan</th>
           <th style="text-align:left">Sumber Buku</th>
           <th style="text-align:left">Halaman</th>
         </tr>
         <template v-for="data in detail">
           <tr>
             <td>{{data.DTL_KALIMAT_PENGETAHUAN}}</td>
             <td>{{data.DTL_SUMBER_BUKU}}</td>
             <td>{{data.DTL_HALAMAN}}</td>
           </tr>
         </template>
       </table>
       </div>
   </form>
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
                  "TABLE": "tx_hdr_buku_pengetahuan",
                  "PK": [
                      "PENGETAHUAN_ID",
                      id
                  ]
              },
              "DETAIL": {
                  "DB": "sdnpakis",
                  "TABLE": "tx_dtl_buku_pengetahuan",
                  "FK": [
                      "DTL_HDR_ID",
                      "PENGETAHUAN_ID"
                  ]
              }
          })
        .then(response => (this.detail = response["data"]["DETAIL"],this.header = response["data"]["HEADER"]))
      }
    })
  </script>
</html>
