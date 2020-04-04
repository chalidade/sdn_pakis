<?php
error_reporting(0);
session_start();
include "../../app/config/setting.php";
$id     = $_REQUEST["id"];
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SDN PAKIS 5 SURABAYA</title>
  <script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../assets/css/main.css">
  <link rel="stylesheet" href="../../assets/dist/css/skins/skin-blue.min.css">
  <script src="../../assets/js/axios.min.js"></script>
  <script src="../../assets/js/vue.js"></script>

  <style type="text/css" media="screen">
    .option {
      width:25px;
      font-size:10px;
      padding:5px;
    }

    input {
      font-weight: 400;
    }
  </style>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

 <body style="padding:10px;height:500px">
   <center>
    <div id="app" style="width:100%" class="Section1">
      <form action="../../app/model/BeritaModel.php?id=update" method="post"  enctype="multipart/form-berita">
      <div class="row">
        <div class="col-md-12">
          <label class="container" for="image" style="border:1px solid #d4d4d4;padding:10px;width:100%">
            <img onerror="this.onerror=null; this.src='../../img/unavailable.png'" v-bind:src="'../../<?php echo $publicBerita ?>' + berita.BERITA_IMAGE"/ style='width:100%;' alt=''>
            <input type="file" id="image" name="BERITA_IMAGE" style="display:none">
            <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:10px;padding:5px 10px;">
              <center>
                <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
              </center>
            </div>
          </label>
          <input type="hidden" name="BERITA_IMAGE_BACKUP" v-bind:value="berita.BERITA_IMAGE" style="display:none">
        </div>
        <div class="col-md-12" style="margin-top:15px">
            <label for="title" style="width:100%;text-align:left">
              Judul
              <input type="text" id="title" class="form-control" name="BERITA_JUDUL" style="font-weight:400" v-bind:value="berita.BERITA_JUDUL">
              <input type="hidden" name="BERITA_USER" v-bind:value="berita.BERITA_USER">
              <input type="hidden" name="BERITA_ID" v-bind:value="berita.BERITA_ID">
            </label>
            <label for="desc" style="width:100%;margin-top:20px;text-align:left">
              Deskripsi
              <textarea id="KOMPETENSI_INTI" class="form-control" name="BERITA_DESKRIPSI" style="height:150px;font-weight:400">
                {{berita.BERITA_DESKRIPSI}}
              </textarea>
            </label>
        </div>
        <div class="col-md-12">
          <input type="submit" class="btn btn-success" name="button" style="width:100%;margin-top:20px" value="Simpan"></button>
        </div>
      </form>
      </div>
    </div>
  </center>
  <!-- jQuery 3 -->
  <script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- CK Editor -->
  <script src="../../assets/bower_components/ckeditor/ckeditor.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>
  </body>

  <script type="text/javascript">
  $(function () {
    CKEDITOR.replace('KOMPETENSI_INTI');
  })
  </script>


  <script type="text/javascript">
  var url   = "<?php echo $urlApi; ?>";
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
              field1: 'B.USER_ID',
              field2: 'A.BERITA_USER'
            }],
            where : [
              ['A.BERITA_ID', '=', id]
            ],
            start: "",
            orderBy: ['A.BERITA_ID', 'DESC'],
            limit: 25
          })
          .then(response => (this.berita = response["data"]["result"][0]))
        }
      })
  </script>
</html>
