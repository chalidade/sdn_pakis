
<div class="slide-one-item home-slider owl-carousel" id="slider">
  <?php
    $sql = mysqli_query($mysqli, "SELECT * FROM `tx_home_slider`");
    while ($slider = mysqli_fetch_array($sql)) {
    $sliderImg = $slider["SLIDER_IMG"];
  ?>
  <div class="site-blocks-cover inner-page overlay" style="background:url('admin/resource/public/Slider/<?php echo $sliderImg; ?>');background-size:cover" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6 text-center" data-aos="fade">
          <h1 class="font-secondary font-weight-bold text-uppercase" style="color:#fff"><?php echo $slider["SLIDER_TITLE"]; ?></h1>
          <h6 style="color:#fff"><?php echo $slider["SLIDER_DESC"]; ?></h6>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>
