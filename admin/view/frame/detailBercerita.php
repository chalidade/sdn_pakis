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
       $sql       = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_buku_bercerita` as A JOIN `tx_dtl_user_siswa` as B ON B.`DTL_NIS` = A.`BERCERITA_NIS` JOIN `tx_hdr_user` as C ON C.`USER_ID` = B.`DTL_HDR_ID` WHERE `BERCERITA_ID` = '1'");
       $bercerita = json_decode(json_encode(mysqli_fetch_assoc($sql)), TRUE);
       $jumlah    = $bercerita["BERCERITA_JAN"]+$bercerita["BERCERITA_FEB"]+$bercerita["BERCERITA_MAR"]+$bercerita["BERCERITA_APR"]+$bercerita["BERCERITA_MEI"]+$bercerita["BERCERITA_JUN"]+$bercerita["BERCERITA_JUL"]+$bercerita["BERCERITA_AUG"]+$bercerita["BERCERITA_SEP"]+$bercerita["BERCERITA_OKT"]+$bercerita["BERCERITA_NOV"]+$bercerita["BERCERITA_DES"];
        ?>
       <table width="30%" align="center" cellpadding="5" cellspacing="5">
         <tr>
           <td width="40%">Nama</td>
           <td width="10%">:</td>
           <td> <input style="border:none" type="text" value="<?php echo $bercerita["USER_NAME"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>NIS</td>
           <td>:</td>
           <td>
             <input style="border:none" type="text" value="<?php echo $bercerita["DTL_NIS"]; ?>" class="form-control">
           </td>
         </tr>
         <tr>
           <td>Januari</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_JAN" value="<?php echo $bercerita["BERCERITA_JAN"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>Februari</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_FEB" value="<?php echo $bercerita["BERCERITA_FEB"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>Maret</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_MAR" value="<?php echo $bercerita["BERCERITA_MAR"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>April</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_APR" value="<?php echo $bercerita["BERCERITA_APR"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>Mei</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_MEI" value="<?php echo $bercerita["BERCERITA_MEI"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>Juni</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_JUN" value="<?php echo $bercerita["BERCERITA_JUN"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>Juli</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_JUL" value="<?php echo $bercerita["BERCERITA_JUL"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>Agustus</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_AUG" value="<?php echo $bercerita["BERCERITA_AUG"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>September</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_SEP" value="<?php echo $bercerita["BERCERITA_SEP"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>Oktober</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_OKT" value="<?php echo $bercerita["BERCERITA_OKT"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>November</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_NOV" value="<?php echo $bercerita["BERCERITA_NOV"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td>Desember</td>
           <td>:</td>
           <td> <input style="border:none" type="text" name="BERCERITA_DES" value="<?php echo $bercerita["BERCERITA_DES"]; ?>" class="form-control"> </td>
         </tr>
         <tr>
           <td style="border-top: solid thin;"><b>Total</b></td>
           <td style="border-top: solid thin;">:</td>
           <td style="border-top: solid thin;"> <b><?php echo $jumlah; ?></b> </td>
         </tr>
       </table>
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
