<div class="site-section" id="berita">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12" data-aos="fade">
        <h2 class="site-section-heading text-center text-uppercase">Berita Terbaru</h2>
      </div>
    </div>
    <div class="row">
      <?php
      $sql       = mysqli_query($mysqli, "SELECT * FROM `tx_home_berita` JOIN `tx_hdr_user` ON `tx_home_berita`.`BERITA_USER` = `tx_hdr_user`.`USER_ID` ORDER BY `BERITA_ID` DESC LIMIT 3 ");
      while($berita    = mysqli_fetch_array($sql)) {
      ?>
      <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="media-image">
          <a href="index.php?id=single&data=<?php echo $berita["BERITA_ID"];?>"><div alt="Image" class="img-fluid" style='height: 345px;width:100%;background:url("admin/resource/public/Berita/<?php echo $berita["BERITA_IMAGE"]; ?>");background-size:cover'></div></a>
          <div class="media-image-body">
            <h2 class="font-secondary text-uppercase" style="height:80px"><a href="single.html"><?php echo $berita["BERITA_JUDUL"]; ?></a></h2>
            <span class="d-block mb-3" style="font-size:12px;">By <?php echo $berita["USER_NAME"]; ?> &mdash; <?php echo date('M. d, Y', strtotime($berita["BERITA_UPDATE"]));?></span>
            <p style="font-size:14px"> <?php echo mb_strimwidth($berita["BERITA_DESKRIPSI"], 0, 100, "..."); ?> </p>
            <p><a href="index.php?id=single&data=<?php echo $berita["BERITA_ID"];?>">Read More</a></p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
