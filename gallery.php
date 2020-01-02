<?php
error_reporting(0);
 ?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link type="text/css" rel="stylesheet" href="css/main.css"/>
      <link type="text/css" rel="stylesheet" href="css/slideshow.css"/>
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/lightpick.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

<!-- Navigation -->
<div class="nav2" style="z-index: 99; height: 70px; background: rgb(1, 87, 155);">
  <div class="row" style="margin-bottom:0px">
    <div class="col s2">
      <img src="img/logo.png" style="width:120px;margin-top:10px" alt="">
      <!-- <h1 class="nav-title" style="font-family:lato;font-size:20px;margin:10px;padding:5px;">Travel Anda</h1> -->
    </div>
    <div class="col s3">

    </div>
    <a href="index.php" style="color:#fff">
      <div class="nav-item col s1 waves-effect" style="margin:10px;padding:5px">
        Home
      </div>
    </a>
    <a href="package.php" style="color:#fff">
    <div class="nav-item col s1 waves-effect" style="margin:10px;padding:5px">
      Package
    </div>
    </a>
    <a href="gallery.php" style="color:#fff">
    <div class="nav-item col s1 waves-effect" style="margin:10px;padding:5px">
       Gallery
    </div>
     </a>
    <a href="contacus.php" style="color:#fff">
    <div class="nav-item col s1 waves-effect" style="margin:10px;padding:5px">
       Contact Us
    </div>
    </a>
    <div class="col s1">
      <table style="margin-top: -2px; width:100%">
        <tr>
          <td><img src="img/bendera.png" style="width:18px" alt=""></td>
          <td>(Bahasa)</td>
          <td><i class="material-icons" style="font-size:18px">keyboard_arrow_down</i></td>
        </tr>
      </table>
    </div>
    <div class="col s1" style="margin:10px">
        <a href="admin/index.php" class="nav-item waves-effect" style="padding:5px;width: 80%;height: 25px;color:#fff">Login</a>
    </div>
  </div>
</div>
<!-- End Navigation -->

<div class="" style="margin-top:160px"></div>
<div class="tour-package" style="text-align:center;margin-top:50px">
  <h5 style="font-weight:800">Our Happy Customers</h5>
  <hr style="width:30%;color:grey;border:1px thin">
  <div class="row" style="margin-top:70px;padding:80px;padding-top:0px">
    <?php
    include "admin/proses/koneksi.php";
    $query = mysqli_query($connect, "SELECT * FROM `gallery`");
    while ($data = mysqli_fetch_array($query)) {
     ?>
    <div class="col s4" style="border-radius:10px;margin-top:10px;margin-bottom:10px">
      <div class="package" style="border-radius:10px" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">
        <div id="dest" name="destination" class="modal-trigger" href="#destination" class="fotoPaket" style="height:250px;border-radius: 10px;background:url('admin/proses/<?php echo $data['photo']; ?>');background-size:cover"></div>
      </div>
      </a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog" style="margin-top:50px;display:table;padding-top:5px">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" style="z-index:999">&times;</button>
            <div class="row" style="margin-top:50px">
            <div class="col s6">
              <img src="admin/proses/<?php echo $data["photo"]; ?>" alt="" style="width:100%">
            </div>
            <div class="col s6">
              <h4 class="modal-title" style="font-size:20px;font-weight:800;text-align:left"><?php echo $data["nama"]; ?></h4>
              <p style="text-align:left;margin-top:10px;font-size:12px"><?php echo $data["deskripsi"]; ?></p>
            </div>
          </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<?php include "component/footer.php"; ?>
