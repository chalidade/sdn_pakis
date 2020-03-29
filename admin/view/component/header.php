<?php
// $my_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $file   = substr($my_url, strrpos($my_url, '/' )+1);
error_reporting(0);
session_start();
include "app/config/setting.php";
include "app/config/connection.php";
$session     = json_decode($_SESSION['USER'], TRUE);
$file        = $_REQUEST['id'].".php";
$uid         = $session["USER_ID"];
$role        = $session["USER_ROLE"];

if ($session["USER_ROLE"] == 1) {
  $userId = $session["USER_ID"];
  $query  = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_user_siswa` WHERE `DTL_HDR_ID`= '$userId'");
  $siswa  = mysqli_fetch_assoc($query);
}

if (empty($session)) echo "<script type='text/javascript'> alert('You Must Login First'); window.location.href = '../login.php'; </script>";
 ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SDN PAKIS 5 SURABAYA</title>
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/dist/css/skins/skin-blue.min.css">
  <script src="assets/js/axios.min.js"></script>
  <script src="assets/js/vue.js"></script>

  <style type="text/css" media="screen">
    .option {
      width:25px;
      font-size:10px;
      padding:5px;
    }
  </style>



  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <div class="modal fade" id="detail">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="text-align:center"><?php echo $session["USER_NAME"]; ?></h4>
        </div>
        <div class="modal-body" style="text-align:left">
          <div class="table-responsive">
            <?php
            if ($session["USER_ROLE"] == 1) {
              echo '<iframe src="view/content/detailSiswa.php?id='.$session["USER_ID"].'" width="100%" height="500" style="border:none"></iframe>';
            } else if ($session["USER_ROLE"] == 2 || $session["USER_ROLE"] == 3) {
              echo '<iframe src="view/content/detailGuru.php?id='.$session["USER_ID"].'" width="100%" height="500" style="border:none"></iframe>';
            }?>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
