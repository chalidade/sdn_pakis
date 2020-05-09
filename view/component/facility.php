<div class="slant-1"></div>
<div class="site-section first-section" id="fasilitas">
<div id="sliderMobile">
<div class="wrapper">
  <div class="slider-wrapper">
    <div class="w3-content w3-display-container" style="margin-top: -65px;">
      <?php
        $sql = mysqli_query($mysqli, "SELECT * FROM `tx_home_slider`");
        while ($slider = mysqli_fetch_array($sql)) {
        $sliderImg = $slider["SLIDER_IMG"];
      ?>
          <img class="mySlides w3-animate-opacity" src="admin/resource/public/Slider/<?php echo $sliderImg; ?>" style="width: 100%;height:auto">
    <?php } ?>

    <button class="w3-button w3-display-left" onclick="plusDivs(-1)" style="height: 300px;background: none;"></button>
    <button class="w3-button w3-display-right" onclick="plusDivs(1)" style="height: 300px;background: none;"></button>
  </div>
  </div>
  <!-- .slider-wrapper -->

  <div class="slider-prev-next-control" style="background:none">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
    <label for=slide4></label>
    <label for=slide5></label>
  </div>
  <!-- .slider-prev-next-control -->

  <div class="slider-dot-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
    <label for=slide4></label>
    <label for=slide5></label>
  </div>
  <!-- .slider-dot-control -->
</div>
</div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center" data-aos="fade">
        <!-- <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span> -->
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Fasilitas Sekolah</h2>
      </div>
    </div>
    <div class="row border-responsive">
      <?php
        $sql    = mysqli_query($mysqli, "SELECT * FROM `tx_home_fasilitas`");
        $title  = [];
        $desc   = [];

        while ($fasilitas = mysqli_fetch_array($sql)) {
        $title[] = $fasilitas["FASILITAS_TITLE"];
        $desc[]  = $fasilitas["FASILITAS_DESC"];
        }
      ?>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
        <div class="text-center">
          <!-- <span class="flaticon-box display-4 d-block mb-3 text-primary"></span> -->
          <center><img src="public/images/aula.png" alt="" style="height:60px;margin-bottom:40px"></center>
          <h3 class="text-uppercase h4 mb-3"><?php echo $title[0]; ?></h3>
          <p style="text-align:justify;"><?php echo $desc[0]; ?></p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
        <div class="text-center">
          <!-- <span class="flaticon-line-chart display-4 d-block mb-3 text-primary"></span> -->
          <center><img src="public/images/uks.png" alt="" style="height:50px;margin-bottom:40px"></center>
          <h3 class="text-uppercase h4 mb-3"><?php echo $title[1]; ?></h3>
          <p style="text-align:justify;"><?php echo $desc[1]; ?></p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
          <!-- <span class="flaticon-bar-chart display-4 d-block mb-3 text-primary"></span> -->
          <center><img src="public/images/computer.png" alt="" style="height:50px;margin-bottom:40px"></center>
          <h3 class="text-uppercase h4 mb-3"><?php echo $title[2]; ?></h3>
          <p style="text-align:justify;"><?php echo $desc[2]; ?></p>
        </div>
      </div>
    </div>
    <div class="row border-responsive" style="margin-top:30px;">
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
        <div class="text-center">
          <!-- <span class="flaticon-target display-4 d-block mb-3 text-primary"></span> -->
          <center><img src="public/images/perpus.png" alt="" style="height:50px;margin-bottom:40px"></center>
          <h3 class="text-uppercase h4 mb-3"><?php echo $title[3]; ?></h3>
          <p style="text-align:justify;"><?php echo $desc[3]; ?></p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
        <div class="text-center">
          <!-- <span class="flaticon-settings display-4 d-block mb-3 text-primary"></span> -->
          <center><img src="public/images/masjid.png" alt="" style="height:50px;margin-bottom:40px"></center>
          <h3 class="text-uppercase h4 mb-3"><?php echo $title[4]; ?></h3>
          <p style="text-align:justify;"><?php echo $desc[4]; ?></p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
          <!-- <span class="flaticon-medal display-4 d-block mb-3 text-primary"></span> -->
          <center><img src="public/images/ketrampilan.png" alt="" style="height:50px;margin-bottom:40px"></center>
          <h3 class="text-uppercase h4 mb-3"><?php echo $title[5]; ?></h3>
          <p style="text-align:justify;"><?php echo $desc[5]; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  if (screen.width < 1011) {
    document.getElementById("sliderMobile").style.display = "block";
  } else {
    document.getElementById("sliderMobile").style.display = "none";
  }
</script>

<script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 5000);
}
</script>
