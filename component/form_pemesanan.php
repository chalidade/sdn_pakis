<div class="white" style="height:50px">
  <center style="padding-top:10px;">
    <div class="row" style="margin-left:auto;width:570px">
      <div class="col s3 ">
        <div class="row">
          <div class="col s3">
            <div class="blue lighten-2" style="color:#fff;padding:5px;width:23px;padding-right: 5px;font-size:9px;border-radius:20px;">1</div>
          </div>
          <div class="col s5" style="text-align:left;font-size:12px;">
            <p style="margin-top:3px;">BOOK</p>
          </div>
          <div class="col s3">
            <center>
              <i class="material-icons">trending_flat</i>
            </center>
          </div>
        </div>
      </div>
      <div class="col s3 ">
        <div class="row">
          <div class="col s3">
            <div class="blue lighten-2" style="color:#fff;padding:5px;width:23px;padding-right: 5px;font-size:9px;border-radius:20px;">2</div>
          </div>
          <div class="col s6" style="text-align:left;font-size:12px;">
            <p style="margin-top:3px;">PAYMENT</p>
          </div>
          <div class="col s3">
            <center>
              <i class="material-icons">trending_flat</i>
            </center>
          </div>
        </div>
      </div>
      <div class="col s3 ">
        <div class="row">
          <div class="col s3">
            <div class="grey lighten-2" style="color:#fff;padding:5px;width:23px;padding-right: 5px;font-size:9px;border-radius:20px;">3</div>
          </div>
          <div class="col s6" style="text-align:left;font-size:12px;">
            <p style="margin-top:3px;">PROCESS</p>
          </div>
          <div class="col s3">
            <center>
              <i class="material-icons">trending_flat</i>
            </center>
          </div>
        </div>
      </div>
      <div class="col s3 ">
        <div class="row">
          <div class="col s3">
            <div class="grey lighten-2" style="color:#fff;padding:5px;width:23px;padding-right: 5px;font-size:9px;border-radius:20px;">4</div>
          </div>
          <div class="col s6" style="text-align:left;font-size:12px;">
            <p style="margin-top:3px;">DONE</p>
          </div>
        </div>
      </div>
  </div>
  </center>
</div>

<div class="grey lighten-5">
  <form action="form_payment.php" method="post">
  <?php
    session_start();
    include "admin/proses/koneksi.php";
    $_SESSION["desti"]        = $destination = $_POST["desti"];
    if ($_POST['go'] != '') {
      $_SESSION["berangkat"]  = $berangkat = $_POST['go']."-".$_POST['home'];
    } else {
      $_SESSION["berangkat"]  = $berangkat   = $_POST["berangkat"];
    }
    $_SESSION["penjemputan"]  = $penjemputan = $_POST["penjemputan"];
    $_SESSION["durasi"]       = $duration    = $_POST["durasi"];
    $_SESSION["adult"]        = $adult       = $_POST["adult"];
    $_SESSION["child"]        = $child       = $_POST["child"];
    $_SESSION["person"]       = $person      = $adult + $child;
    $bayar = 0;

    foreach ($destination as $value) {
    $query = mysqli_query($connect, "SELECT * FROM `package` WHERE `id` = '$value'");
    while ($data = mysqli_fetch_array($query)) {
    $bayar = $bayar+$data['price'];
    }}
   ?>
  <div style="padding:20px;padding-left:100px;padding-right:100px;padding-bottom: 0px;">
    <h3 style="font-size:18px;font-weight:800">Your Booking</h3>
    <p style="font-size:10px;color:grey;margin-top: -10px;margin-bottom: 20px;">Fill in your detail and review your booking</p>
    <div class="row">
      <div class="col s8 white" style="padding:20px;border-radius:10px;padding-left: 40px;">
        <h6 style="font-size:16px;color:#40c4ff;text-transform:uppercase;font-weight:800">Invoice</h6>
        <div class="row">
          <div class="col s10">
            <table style="font-size:12px;border:none">
              <tr style="border:none;">
                <td style="padding:5px;width:120px"><font style="color:grey;">Date</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"><font style="font-weight:800"><?php echo $berangkat; ?></td>
              </tr>
              <tr style="border:none;">
                <td style="padding:5px;"><font style="color:grey;">Total Travelers</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"><font style="font-weight:800"><?php echo $person; ?> (<?php echo $adult; ?> Adult, <?php echo $child; ?> Child)</td>
              </tr>
              <tr style="border:none;">
                <td style="padding:5px;"><font style="color:grey;">Penjemputan</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"><font style="font-weight:800"><?php echo $penjemputan; ?></td>
              </tr>
              <tr style="border:none;">
                <td style="padding:5px;"><font style="color:grey;">Total Prices</td>
                <td style="padding:5px;"></td>
                <td style="padding:5px;"><font style="font-weight:800"><?php $_SESSION["bayar"] = $bayar;echo $_SESSION["bayar"];?>K</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col s12" style="padding:10px">
            <font style="color:#40c4ff;font-weight:800">Destination</font>
          </div>
          <?php
          foreach ($destination as $value) {
          $query = mysqli_query($connect, "SELECT * FROM `package` WHERE `id` = '$value'");
          while ($data = mysqli_fetch_array($query)) {
           ?>
          <div class="row">
            <div class="col s2">
                <div class="" style="width:100px;height: 100px;border-radius:10px;background:url('admin/proses/<?php echo $data['photo']; ?>');background-size:cover"></div>
            </div>
            <div class="col s10">
              <table style="font-size:12px;border:none">
                <tr style="border:none;">
                  <td style="padding:5px;">
                    <font style="color:black;">
                      <h3 style="font-size:16px;margin: 0px;font-weight: 800;"><?php echo $data['name']; ?></h3>
                      <p style="font-size:10px"><?php echo $data['description']; ?></p>
                    </td>
                </tr>
              </table>
            </div>
          </div>
        <?php }} ?>
        </div>
      </div>
      <div class="col s1">
      </div>
      <div class="col s3 white" style="padding:20px;border-radius:10px">
        <h6 style="font-size:16px;color:#40c4ff;text-transform:uppercase;font-weight:800">Information</h6>
        <p style="font-size:12px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
    </div>
  </div>


  <div style="padding:20px;padding-left:100px;padding-right:100px;padding-top: 0px;padding-bottom:0px">
    <h3 style="font-size:18px;font-weight:800">Contact Detail</h3>
    <div class="row">
      <div class="col s8 white" style="padding:20px;border-radius:10px;padding-left: 40px;">
        <h6 style="font-size:14px;color:#40c4ff;text-transform:capitalize;font-weight:800">Full Name</h6>
        <input required type="text" name="adname[]" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
        <p style="color:#cfd8dc;margin-top:-2px;margin-left:10px;font-size:10px">As on ID Card/passport/driving license (without degree or special characters)</p>
        <div class="row" style="margin-top:20px;">
          <div class="col s5">
            <h6 style="font-size:12px;color:#40c4ff;text-transform:capitalize;font-weight:800">Mobile Number</h6>
            <div class="row">
              <!-- <div class="col s4">
                <div style="width:100%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:10px;padding-top:8px;font-size:10px;height: 30px;border: none;">
                  <img src="img/bendera.png" alt="" style="width:20px;float:left;margin-right: 10px;margin-left: 0px;">
                  <div style="font-size:11px;font-weight:800;margin-top: -3px;">+62</div>
                </div>
              </div> -->
              <div class="col s12" style="padding-left: 0px;">
                <input required type="text" name="adphone[]" style="width:90%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
              </div>
            </div>
            <p style="color:#cfd8dc;margin-top:-20px;margin-left:10px;font-size:10px">e.g. +6285784566511, for Country Code (+62) and Mobile No. 085784566511</p>
          </div>
          <div class="col s7">
            <h6 style="font-size:12px;color:#40c4ff;text-transform:capitalize;font-weight:800">Email</h6>
            <input required type="text" name="ademail[]" style="width:90%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
            <p style="color:#cfd8dc;margin-top:0px;margin-left:10px;font-size:10px">e.g. travelanda@gmail.com</p>
          </div>
        </div>
      </div>
      <div class="col s4"></div>
    </div>
    </div>

    <?php for ($i=0; $i < $adult-1; $i++) { ?>
      <div style="padding:20px;padding-left:100px;padding-right:100px;padding-top: 0px;">
        <h3 style="font-size:18px;font-weight:800">Travelers Details - Adult <?php echo $i+1; ?></h3>
        <div class="row">
          <div class="col s8 white" style="padding:20px;border-radius:10px;padding-left: 40px;">
            <h6 style="font-size:14px;color:#40c4ff;text-transform:capitalize;font-weight:800">Full Name</h6>
            <input required type="text" name="adname[]" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
            <p style="color:#cfd8dc;margin-top:-2px;margin-left:10px;font-size:10px">As on ID Card/passport/driving license (without degree or special characters)</p>
            <div class="row" style="margin-top:20px;">
              <div class="col s5">
                <h6 style="font-size:12px;color:#40c4ff;text-transform:capitalize;font-weight:800">Mobile Number</h6>
                <div class="row">
                  <!-- <div class="col s4">
                    <div style="width:100%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:10px;padding-top:8px;font-size:10px;height: 30px;border: none;">
                      <img src="img/bendera.png" alt="" style="width:20px;float:left;margin-right: 10px;margin-left: 0px;">
                      <div style="font-size:11px;font-weight:800;margin-top: -3px;">+62</div>
                    </div>
                  </div> -->
                  <div class="col s12" style="padding-left: 0px;">
                    <input required type="text" name="adphone[]" style="width:90%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                  </div>
                </div>
                <p style="color:#cfd8dc;margin-top:-20px;margin-left:10px;font-size:10px">e.g. +6285784566511, for Country Code (+62) and Mobile No. 085784566511</p>
              </div>
              <div class="col s7">
                <h6 style="font-size:12px;color:#40c4ff;text-transform:capitalize;font-weight:800">Email</h6>
                <input required type="text" name="ademail[]" style="width:90%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
                <p style="color:#cfd8dc;margin-top:0px;margin-left:10px;font-size:10px">e.g. travelanda@gmail.com</p>
              </div>
            </div>
          </div>
          <div class="col s4"></div>
        </div>
        </div>
      <?php } ?>
      <?php for ($i=0; $i < $child; $i++) { ?>
        <div style="padding:20px;padding-left:100px;padding-right:100px;padding-top: 0px;">
          <h3 style="font-size:18px;font-weight:800">Travelers Details - Child <?php echo $i+1; ?></h3>
          <div class="row">
            <div class="col s8 white" style="padding:20px;border-radius:10px;padding-left: 40px;">
              <h6 style="font-size:14px;color:#40c4ff;text-transform:capitalize;font-weight:800">Full Name</h6>
              <input required type="text" name="chname[]" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
              <p style="color:#cfd8dc;margin-top:-2px;margin-left:10px;font-size:10px">As on ID Card/passport/driving license (without degree or special characters)</p>
              <h6 style="font-size:14px;color:#40c4ff;text-transform:capitalize;font-weight:800">Age</h6>
              <input required type="text" name="chage[]" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
            </div>
            <div class="col s4"></div>
          </div>
          </div>
        <?php } ?>

      <div style="padding:20px;padding-left:100px;padding-right:100px;padding-top: 0px;">
        <input required type="submit" class="light-blue accent-3" name="button" style="border:none;padding:10px;border-radius:30px;color:#fff;font-size:12px;padding-left: 40px;padding-right: 40px;" value="Continue">
      </div>
  </div>
</div>
