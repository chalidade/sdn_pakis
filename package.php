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
  <h5 style="font-weight:800">Choose Your Package</h5>
  <hr style="width:30%;color:grey;border:1px thin">
  <div class="row" style="margin-top:70px;padding:80px;padding-top:0px">
    <?php
    include "admin/proses/koneksi.php";
    $query = mysqli_query($connect, "SELECT * FROM `package`");
    while ($data = mysqli_fetch_array($query)) {
     ?>
    <div id="dest" name="destination" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>" class="col s3 " style="border-radius:10px;">
        <div class="package" id="myPkg" style="border-radius:10px">
        <div class="fotoPaket" style="height:250px;border-top-left-radius: 10px;border-top-right-radius: 10px;background:url('admin/proses/<?php echo $data['photo']; ?>');background-size:cover"></div>
        <div class="deskripsiPaket" style="padding:2px">
          <p style="font-weight:800;font-size:12px;margin-top:10px"><?php echo $data["name"]; ?></p>
          <table style="margin-top:-20px">
            <tr style="font-size:10px;border:none">
              <td><i class="material-icons" style="color:orange;font-size:14px">star</i></td>
              <td>4,5</td>
              <td><i class="material-icons" style="color:gray;font-size:14px">people</i></td>
              <td><font style="font-size:9px"><?php echo $data["person"]; ?> Person</font></td>
              <td>IDR</td>
              <td><font style="font-weight: 800;font-size:9px"><?php echo $data["price"]; ?>K</font></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog" style="margin-top:50px;display: none;padding-top:5px">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" style="z-index:999">&times;</button>
            <div class="row">
            <div class="col s6" style="background:url('admin/proses/<?php echo $data['photo']; ?>');background-size:cover;height:400px">
            </div>
            <div class="col s6">
              <h4 class="modal-title"><?php echo $data["nama"]; ?></h4>
              <h2 style="font-size:20px;text-align:left;font-weight:800"><?php echo $data["name"]; ?></h2>
              <table style="margin-top:-20px">
                <tr style="font-size:10px;border:none">
                  <td><i class="material-icons" style="color:orange;font-size:14px">star</i></td>
                  <td>4,5</td>
                  <td><i class="material-icons" style="color:gray;font-size:14px">people</i></td>
                  <td><font style="font-size:9px"><?php echo $data["person"]; ?> Person</font></td>
                  <td>IDR</td>
                  <td><font style="font-weight: 800;font-size:9px"><?php echo $data["price"]; ?>K</font></td>
                </tr>
              </table>
              <p style="text-align:left;margin-top:0px;font-size:12px"><?php echo $data["description"]; ?></p>
              <hr>
              <h4 style="font-size:14px;font-weight:800">Form Booking</h4>
              <div class="row">
                <form class="" action="form_pemesanan.php" method="post">
                <div class="col s12">
                  <input type="text" disabled value="<?php echo $data["name"]; ?>" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                  <input type="hidden" name="desti[]" value="<?php echo $data["id"]; ?>" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                </div>
                <div class="col s12">
                  <input type="text" name="penjemputan" placeholder="Penjemputan" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                </div>
                <div class="col s6">
                  <input type="date" name="go" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                </div>
                <div class="col s6">
                  <input type="date" name="home" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                </div>
                <div class="col s6">
                  <input type="text" name="adult" placeholder="Adult" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                </div>
                <div class="col s6">
                  <input type="text" name="child" placeholder="Child" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                </div>
                <div class="col s12">
                  <input type="submit" name="duration" value="Book Now" style="margin-top:20px;text-align:center;margin-top:5px;background:#42a5f5 ;color:#fff;border-radius:20px;font-size:10px;height: 30px;border: none;width:100%">
                </div>
              </div>
            </form>

            </div>
          </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<?php include "component/footer.php"; ?>
