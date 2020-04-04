<?php
// error_reporting(0);
include "admin/app/config/setting.php";

if (!isset($_REQUEST['id'])) {
  $file = "home.php";
} else {
  $file  = $_REQUEST['id'].".php";
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SD NEGERI 5 PAKIS SURABAYA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="public/fonts/icomoon/style.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/magnific-popup.css">
    <link rel="stylesheet" href="public/css/jquery-ui.css">
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/css/animate.css">
    <link rel="stylesheet" href="public/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="public/css/aos.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/axios.min.js"></script>
    <script src="public/js/vue.js"></script>
  </head>
  <body>
    <div class="site-wrap">
      <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div> <!-- .site-mobile-menu -->
