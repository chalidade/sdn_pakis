<?php
$id        = $_REQUEST["data"];
$sql       = mysqli_query($mysqli, "SELECT * FROM `tx_home_berita` JOIN `tx_hdr_user` ON `tx_home_berita`.`BERITA_USER` = `tx_hdr_user`.`USER_ID` WHERE `BERITA_ID` = '$id'");
$berita    = json_decode(json_encode(mysqli_fetch_assoc($sql)), TRUE);
 ?>
<div class="first-section" style="margin-top:50px">
    <div class="container">
      <div class="row">
        <div class="col-md-8 blog-content" style="text-align:justify">
          <h1><?php echo $berita["BERITA_JUDUL"]; ?></h1>
          <span class="d-block mb-3" style="font-size:10px;">By <?php echo $berita["USER_NAME"]; ?> &mdash; <?php echo date('M. d, Y', strtotime($berita["BERITA_UPDATE"]));?></span>
          <p><img onerror="this.onerror=null; this.src='../img/unavailable.png'" src='admin/resource/public/Berita/<?php echo $berita["BERITA_IMAGE"]; ?>' alt="Image" class="img-fluid" style="width:100%"></p>
          <p><?php echo $berita["BERITA_DESKRIPSI"]; ?></p>
        </div>
        <div class="col-md-4 sidebar">
          <div class="sidebar-box">
            <div class="row">
              <div class="col-md-4">
                <img onerror="this.onerror=null; this.src='../img/unavailable.png'" src="admin/resource/public/USER/<?php echo $berita["USER_PHOTO"]; ?>" alt="Image placeholder" class="img-fluid mb-4" style="border-radius:50px;width:80px;">
              </div>
              <div class="col-md-8">
                <h5>Biodata Penulis</h5>
                <p style="font-size:12px"><?php echo $berita["USER_NAME"]; ?><br><?php echo $berita["USER_EMAIL"]; ?></p>
              </div>
            </div>
          </div>
          <div class="sidebar-box" style="margin-top:-50px">
            <h3 class="text-uppercase">Rangking Membaca Siswa</h3>
            <table width="100%">
            <?php
             $sql   = "
                       SELECT COUNT(A.MEMBACA_SISWA) AS total, B.*, C.*
                       FROM tx_hdr_buku_membaca as A
                       JOIN tx_dtl_user_siswa as B ON B.DTL_NIS = A.MEMBACA_SISWA
                       JOIN tx_hdr_user as C ON B.DTL_HDR_ID = C.USER_ID
                       GROUP BY A.MEMBACA_SISWA
                       ORDER BY total DESC
                       LIMIT 10
                       ";
             $query = mysqli_query($mysqli, $sql);
             $no    = 1;
             while ($siswa = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <?php if ($no > 3) { ?>
                  <td style="vertical-align:top;width:5%"><h3 style="padding-right:20px;text-align:center"><?php echo $no.".";$no++; ?></h3></td>
                <?php } else { ?>
                  <td style="vertical-align:top;width:5%"><h1 style="padding-right:20px;text-align:center"><?php echo $no.".";$no++; ?></h1></td>
                <?php } ?>
                <td style="vertical-align:top;width:25%"><img onerror="this.onerror=null; this.src='../img/unavailable.png'" src="admin/resource/public/USER/<?php echo $siswa["USER_PHOTO"]; ?>" class="img-fluid mb-4" style="border-radius:50px;width:50px;"></td>
                <td  style="vertical-align:top;color:#000;font-size:14px"><b><?php echo $siswa["USER_NAME"]; ?></b><br><font style="font-size:12px"><?php echo $siswa["DTL_NIS"]; ?> | <?php echo $siswa["DTL_TINGKAT"]."-".$siswa["DTL_KELAS"]; ?></font></td>
              </tr>
            <?php } ?>
          </table>
          </div>
        </div>
      </div>
      <div class="col-md-12">
      <div class="pt-5">
        <h3 class="mb-5">Baca Berita Lainya</h3>
        <div class="row">
          <?php
          $sql       = mysqli_query($mysqli, "SELECT * FROM `tx_home_berita` JOIN `tx_hdr_user` ON `tx_home_berita`.`BERITA_USER` = `tx_hdr_user`.`USER_ID` ORDER BY RAND() LIMIT 4 ");
          while($berita    = mysqli_fetch_array($sql)) {
          ?>
          <div class="col-md-6 col-lg-3 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-image">
              <a href="index.php?id=single&data=<?php echo $berita["BERITA_ID"];?>"><div alt="Image"  onerror="this.onerror=null; this.src='../img/unavailable.png'"  class="img-fluid" style='height: 200px;width:100%;background:url("admin/resource/public/Berita/<?php echo $berita["BERITA_IMAGE"]; ?>");background-size:cover'></div></a>
              <div class="media-image-body" style="padding:15px">
                <h2 class="font-secondary text-uppercase" style="height:80px;font-size:15px"><a href="index.php?id=single&data=<?php echo $berita["BERITA_ID"];?>"><?php echo $berita["BERITA_JUDUL"]; ?></a></h2>
                <span class="d-block mb-3" style="font-size:10px;">By <?php echo $berita["USER_NAME"]; ?> &mdash; <?php echo date('M. d, Y', strtotime($berita["BERITA_UPDATE"]));?></span>
                <p style="font-size:14px"> <?php echo mb_strimwidth($berita["BERITA_DESKRIPSI"], 0, 100, "..."); ?> </p>
                <p><a href="index.php?id=single&data=<?php echo $berita["BERITA_ID"];?>">Read More</a></p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    </div>
  </div>
