<?php
include "component/header.php";
?>
<div class="grey lighten-5">
  <?php
    session_start();
    include "admin/proses/koneksi.php";
    $destination = $_SESSION["desti"];
    $person      = $_SESSION["person"];
    $penjemputan = $_SESSION["penjemputan"];
    $duration    = $_SESSION["durasi"];
    $berangkat   = $_SESSION["berangkat"];
    $adult       = $_SESSION["adult"];
    $child       = $_SESSION["child"];
    $bayar       = $_SESSION["bayar"];
    $adname      = $_SESSION["adname"];
    $ademail     = $_SESSION["ademail"];
    $adphone     = $_SESSION["adphone"];
    $chname      = $_SESSION["chname"];
    $chage       = $_SESSION["chage"];

    $data        = ["destination" => $destination, "person" => $person, "penjemputan" => $penjemputan, "duration" => $duration, "berangkat" => $berangkat, "adult" => $adult, "child" => $child, "bayar" => $bayar, "adult_name" => $adname, "adult_email" => $ademail, "adult_phone" => $adphone, "child_name" => $chname, "child_age" => $chage];
    $encode      = json_encode($data);

    $insert     = mysqli_query($connect, "INSERT INTO `dtl_order` (`id`, `json`) VALUES (NULL, '$encode');");

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
            <font style="color:#40c4ff;font-weight:800;font-size:16px">Destination</font>
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
        <div class="row">
          <div class="col s12">
            <h4 style="font-size:16px;font-weight:800;color:#40c4ff">Detail Person</h4>
            <table style="font-size:12px;">
              <tr style="border:none;">
                <th style="padding:5px;">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
              </tr>
              <?php
              $no = 1;
              for ($i=0; $i < $adult; $i++) {
              ?>
              <tr style="border:none;">
                <td style="padding:5px;"><?php echo $no;$no++; ?></td>
                <td><?php echo $adname[$i]; ?></td>
                <td><?php echo $ademail[$i]; ?></td>
                <td><?php echo $adphone[$i]; ?></td>
                <td>Adult</td>
              </tr>
            <?php } ?>
            <?php
            for ($i=0; $i < $child; $i++) {
            ?>
            <tr style="border:none;">
              <td style="padding:5px;"><?php echo $no;$no++; ?></td>
              <td><?php echo $adname[$i]; ?></td>
              <td> - </td>
              <td> - </td>
              <td> Child </td>
            </tr>
          <?php } ?>
            </table>
          </div>
        </div>
        </div>
      </div>
      <div class="col s1">
      </div>
      <div class="col s3 white" style="padding:20px;border-radius:10px">
        <h6 style="font-size:16px;color:#40c4ff;text-transform:uppercase;font-weight:800">Information</h6>
        <p style="font-size:12px">
          Silahkan Segera melakukan pembayaran pada rekening : <br><br>
          <font style="font-weight:800;">BCA </font> : 123123123 a/n Indra <br>
          <font style="font-weight:800;">BRI </font> : 123123123 a/n Indra <br><br>
          <?php
          $date =  date('m-d-Y');
          $date1 = str_replace('-', '/', $date);
          $tomorrow = date('d-m-Y',strtotime($date1 . "+2 days"));
           ?>
          Sebelum tanggal <b><?php echo $tomorrow; ?></b>
        </p>
      </div>
    </div>
  </div>
      <div style="padding:20px;padding-left:100px;padding-right:100px;padding-top: 0px;">
        <a target="_blank" href="print_booking.php" class="light-blue accent-3" style="border:none;padding:10px;border-radius:30px;color:#fff;font-size:12px;padding-left: 40px;padding-right: 40px;" value="Print">Print<a>
      </div>
  </div>
</div>
