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
            <div class="blue lighten-2" style="color:#fff;padding:5px;width:23px;padding-right: 5px;font-size:9px;border-radius:20px;">3</div>
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
  <div style="padding:20px;padding-left:100px;padding-right:100px;padding-bottom: 0px;">
    <h3 style="font-size:18px;font-weight:800">Payment</h3>
    <p style="font-size:10px;color:grey;margin-top: -10px;margin-bottom: 20px;">Complete Payment in 01:15:40</p>
    <div class="row">
      <?php
      session_start();
      include "admin/proses/koneksi.php";
      $destination          = $_SESSION["desti"];
      $_SESSION["adname"]   = $adname   = $_POST["adname"];
      $_SESSION["ademail"]  = $ademail  = $_POST["ademail"];
      $_SESSION["adphone"]  = $adphone  = $_POST["adphone"];
      $_SESSION["chname"]   = $chname   = $_POST["chname"];
      $_SESSION["chage"]    = $chage    = $_POST["chage"];
       ?>
      <div class="col s8 white" style="padding:20px;border-radius:10px;padding-left: 40px;">
        <h6 style="font-size:14px;color:#40c4ff;text-transform:capitalize;font-weight:800">Payment Method</h6>
        <input type="text" name="ban" placeholder="Your Bank Account Number" style="width:95%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
        <p style="color:#cfd8dc;margin-top:-2px;margin-left:10px;font-size:10px">You can transfer from any banking channel (M-Banking, Internet Banking)</p>
        <div class="row" style="margin-top:20px;">
          <div class="col s12">
            <h6 style="font-size:14px;color:#40c4ff;text-transform:capitalize;font-weight:800">Select Destination Account</h6>
            <div style="width:98%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
              <table>
                <tr style="border:none">
                  <td style="padding: 0px;padding-top: 7px;"></td>
                  <td style="padding: 0px;padding-top: 7px;"><font style="font-weight: 800;">BCA : 12333123231 a/n Indra</font> </td>
                  <td style="padding: 0px;padding-top: 7px;"></td>
                </tr>
              </table>
            </div>
            <div style="width:98%;margin-top:5px;background:#f5f5f5;border-radius:20px; padding-left:20px;font-size:10px;height: 30px;border: none;">
              <table>
                <tr style="border:none">
                  <td style="padding: 0px;padding-top: 7px;"></td>
                  <td style="padding: 0px;padding-top: 7px;"><font style="font-weight: 800;">BRI : 12333123231 a/n Indra</font></td>
                  <td style="padding: 0px;padding-top: 7px;"></td>
                </tr>
              </table>

            </div>
          </div>
        </div>
      </div>
      <div class="col s1">
      </div>
      <div class="col s3 white" style="padding:20px;border-radius:10px">
        <h6 style="font-size:16px;color:#40c4ff;text-transform:uppercase;font-weight:800">Booking ID</h6>
        <p style="font-size:12px"><a href="detail_booking.php"><?php $_SESSION["booking_id"] = $bookingid = date('dmy').rand(10,100); echo $bookingid; ?></a></p>
      </div>
    </div>
  </div>


  <div style="padding:20px;padding-left:100px;padding-right:100px;padding-top: 0px;padding-bottom:0px">
    <h3 style="font-size:18px;font-weight:800">Price Detail</h3>
    <div class="row">
      <div class="col s8 white" style="padding:20px;border-radius:10px;padding-left: 40px;">
      <table width="100%" style="font-size:12px">
        <?php
        foreach ($destination as $value) {
        $query = mysqli_query($connect, "SELECT * FROM `package` WHERE `id` = '$value'");
        while ($data = mysqli_fetch_array($query)) {
         ?>
        <tr>
          <td style="padding:0px;font-weight: 800;"><?php echo $data["name"]; ?></td>
          <td style="padding:0px;font-weight: 800;padding-right:20px;text-align:right"><?php echo $data["price"]; ?></td>
        </tr>
        <?php }} ?>
      </table>
      <table style="font-size:12px">
        <tr style="border:none">
          <td style="padding:0px;font-weight: 800;padding-top:20px">Total price</td>
          <td style="padding:0px;font-weight: 800;padding-right:20px;text-align:right"><?php echo $_SESSION["bayar"]; ?></td>
        </tr>
      </table>
    </div>
      <div class="col s4"></div>
    </div>
    </div>

      <div style="padding:20px;padding-left:100px;padding-right:100px;padding-top: 20px;">
        <p style="font-size:10px;color:#cfd8dc ;margin-top: -10px;margin-bottom: 20px;">By clicking the button below, you agree to Travel Anda's Term & Conditional and Privacy</p>
        <a href="detail_booking.php" type="button" class="light-blue accent-3" name="button" style="border:none;padding:10px;border-radius:30px;color:#fff;font-size:12px;padding-left: 40px;padding-right: 40px;">Pay Now</a>
      </div>
  </div>
</div>
