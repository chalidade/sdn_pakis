<div class="slant-1"></div>
<div class="site-section first-section" data-aos="fade">
    <div class="container">
      <div class="row mb-5" data-aos="fade-up">
        <?php
        if (isset($_REQUEST["start"])) {
          if ($_REQUEST["start"] == 1) {
            $start = 0;
            $page  = 1;
          } else {
            $start = $_REQUEST["start"];
            $page  = $_REQUEST["page"];
          }
        } else {
          $start = 0;
          $page  = 1;
        }
        $count   = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT count('BOOK_ID') as total FROM `tx_hdr_ebook`"))), TRUE);
        $count   = $count["total"];
        $limit   = 24;
        $pagi    = ceil($count/$limit);
        $sql     = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_ebook` ORDER BY `BOOK_ID` DESC LIMIT $start, $limit");
        while($berita    = mysqli_fetch_array($sql)) {
          ?>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-image">
              <div alt="Image" class="img-fluid" style='height: 345px;width:100%;background:url("admin/resource/public/Membaca/<?php echo $berita["BOOK_COVER"]; ?>");background-size:cover'></div>
              <div class="media-image-body">
                <h2 class="font-secondary text-uppercase"><a href="index.php?id=single&data=<?php echo $berita["BOOK_ID"];?>"><?php echo $berita["BOOK_JUDUL"]; ?></a></h2>
                <span class="d-block mb-3" style="font-size:12px;"><?php echo $berita["BOOK_PENGARANG"]; ?> &mdash; <?php echo $berita["BOOK_PENERBIT"]; ?></span>
                <p><a target="_blank" href="admin/resource/public/Membaca/<?php echo $berita["BOOK_FILE"];?>" class='btn btn-success' style="width:100%;color:#fff">Baca</a></p>
              </div>
            </div>
          </div>
      <?php } ?>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <div class="custom-pagination">
            <?php
            for ($i=0; $i < $pagi; $i++) {
              $pagination = $i+1;
              if ($i == $page-1) {
                echo '<span class="current">'.$pagination.'</span>';
              } else {
                echo '<a href="?id=berita&start='.$pagination.'&page='.$pagination.'">'.$pagination.'</a>';
              }
              ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
