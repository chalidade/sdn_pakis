<div class="site-section">
  <div class="container">
    <div class="row mb-1">
      <div class="col-md-12" data-aos="fade">
        <h2 class="site-section-heading text-center text-uppercase">Rangking Aku Suka Membaca</h2>
      </div>
    </div>
    <div class="row table-responsive">
      <table width="100%" class="table" style="margin-top:20px;color:#000">
        <tr>
          <th style="text-align:center">Rangking</th>
          <th style="text-align:center">Foto</th>
          <th>Nama</th>
          <th style="text-align:center">Kelas</th>
          <th style="text-align:center">Bercerita</th>
          <th style="text-align:center">Menulis</th>
          <th style="text-align:center">Kata Ilmu Pengetahuan</th>
          <th style="text-align:center">Total Bintang</th>

        </tr>
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
      $count   = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT count(DISTINCT DTL_NIS) as TOTAL_DATA FROM `tx_dtl_user_siswa`"))), TRUE);
      $count   = $count["TOTAL_DATA"];
      $limit   = 25;
      $pagi    = ceil($count/$limit);
      $sql     = "
                 SELECT *
                 FROM tx_dtl_user_siswa as B
                 JOIN tx_hdr_user as C ON B.DTL_HDR_ID = C.USER_ID
                 LIMIT $start, $limit
                 ";
       $query  = mysqli_query($mysqli, $sql);
       $no     = $start+1;
       while ($siswa = mysqli_fetch_array($query)) {
        $sqlBaca    = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT count('MEMBACA_SISWA') as TOTAL_MEMBACA FROM tx_hdr_buku_membaca WHERE MEMBACA_SISWA = ".$siswa['DTL_NIS'].""))), TRUE);
        $sqlCerita  = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM tx_hdr_buku_bercerita WHERE BERCERITA_NIS = ".$siswa['DTL_NIS'].""))), TRUE);
        $sqlTahu    = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT count('PENGETAHUAN_NIS') as TOTAL_PENGETAHUAN FROM tx_hdr_buku_pengetahuan WHERE PENGETAHUAN_STATUS = '2' AND PENGETAHUAN_NIS = ".$siswa['DTL_NIS'].""))), TRUE);

        $jmlCerita  = $sqlCerita["BERCERITA_JAN"]+$sqlCerita["BERCERITA_FEB"]+$sqlCerita["BERCERITA_MAR"]+$sqlCerita["BERCERITA_APR"]+$sqlCerita["BERCERITA_MEI"]+$sqlCerita["BERCERITA_JUN"]+$sqlCerita["BERCERITA_JUL"]+$sqlCerita["BERCERITA_AUG"]+$sqlCerita["BERCERITA_SEP"]+$sqlCerita["BERCERITA_OKT"]+$sqlCerita["BERCERITA_NOV"]+$sqlCerita["BERCERITA_DES"];

         if (!empty($sqlBaca["TOTAL_MEMBACA"])) {
           $bercerita   = $sqlBaca["TOTAL_MEMBACA"];
         } else {
           $bercerita   = 0;
         }

         if (!empty($jmlCerita)) {
           $menulis   = $jmlCerita;
         } else {
           $menulis   = 0;
         }

         if (!empty($sqlTahu["TOTAL_PENGETAHUAN"])) {
           $kip   = $sqlTahu["TOTAL_PENGETAHUAN"];
         } else {
           $kip   = 0;
         }

         $sum       = $bercerita+$menulis+$kip;
       ?>
        <tr>
          <?php if ($no > 3) { ?>
            <td style="vertical-align:top;width:10%"><h4 style="text-align:center"><?php echo $no.".";$no++; ?></h4></td>
          <?php } else { ?>
            <td style="vertical-align:top;width:10%;">
              <img src="public/images/rate-star.gif" alt="" width="100%" style="z-index:1;margin-left:40px">
                <h1 style="text-align:center;font-size:42px;margin-top:-50px"><?php echo $no."";$no++; ?></h1>
            </td>
          <?php } ?>
          <td style="vertical-align:top;width:10%">
            <center>
              <img onerror="this.onerror=null; this.src='public/images/user.png'" src="admin/resource/public/USER/<?php echo $siswa["USER_PHOTO"]; ?>" class="img-fluid mb-4" style="border-radius:50px;width:60px;height: 60px;"></td>
            </center>
          <td  style="vertical-align:top;color:#000;"><b><?php echo $siswa["USER_NAME"]; ?></b><br><font style="font-size:14px"><?php echo $siswa["DTL_NIS"]; ?></font></td>
          <td style="text-align:center"><?php echo $siswa["DTL_TINGKAT"]." ".$siswa["DTL_KELAS"]; ?></td>
          <td style="text-align:center"><?php echo $bercerita; ?></td>
          <td style="text-align:center"><?php echo $menulis; ?></td>
          <td style="text-align:center"><?php echo $kip; ?></td>
          <td style="text-align:center"><?php echo $sum; ?></td>
        </tr>
      <?php } ?>
    </table>
    </div>
    <div class="row" style="margin-top:20px">
      <div class="col-12 text-center">
        <div class="custom-pagination">
          <?php
          for ($i=0; $i < $pagi; $i++) {
            $pagination = $i+1;
            if ($i == $page-1) {
              echo '<span class="current">'.$pagination.'</span>';
            } else {
              echo '<a href="?id=membaca&start='.$pagination.'&page='.$pagination.'">'.$pagination.'</a>';
            }
            ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
