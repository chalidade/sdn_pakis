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
      <center>
        <h1>{{berita.BERITA_JUDUL}}</h1>
        <p style="margin-top:-10px;font-size:10px">{{berita.BERITA_UPDATE}} | {{berita.USER_NAME}} </p>
        <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'../../<?php echo $publicBerita ?>' + berita.BERITA_IMAGE"/ style='width:100%;margin-top:20px;border-radius:10px' alt=''>
      </center>
        <p style="margin-top:20px;text-align:justify;font-size:14px">
          {{berita.BERITA_DESKRIPSI}}
        </p>
    </div>
  </body>

  <script type="text/javascript">
  var url = "<?php echo $urlApi; ?>";
  var id  = "<?php echo $id; ?>";
  new Vue({
      el: '#app',
      data () {
        return {
          berita: null
        }
      },
      mounted () {
        axios
        .post(url+'/index', {
          action: 'list',
          db: 'sdnpakis',
          table: 'tx_home_berita as A',
          innerJoin : [{
            table: 'tx_hdr_user as B',
            field1: 'B.user_id',
            field2: 'A.berita_user'
          }],
          where : [
            ['A.BERITA_ID', '=', id]
          ],
          start: '',
          orderBy: ['A.BERITA_ID', 'DESC'],
          limit: 25
        })
        .then(response => (this.berita = response["data"]["result"][0]))
      }
    })
  </script>
</html>
