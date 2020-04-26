<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <!-- Program Tahunan -->
      <!-- <small>New Hotel</small> -->
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <!-- Kata Pengantar  -->
        <div class="col-lg-12 col-xs-12">
          <div class="box box-warning content">

            <!-- START CUSTOM TABS -->
                  <h2 class="page-header">Rangking Membaca Siswa</h2>
                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Data Siswa</a></li>
                          <!-- <li><a href="#tab_2" data-toggle="tab">Tambah Data Siswa</a></li> -->
                        </ul>
                        <div class="tab-content" id="app">
                          <div class="tab-pane active" id="tab_1">
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
                              $count   = json_decode(json_encode(mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT count(DTL_NIS) as TOTAL_DATA FROM `tx_dtl_user_siswa`"))), TRUE);
                              $count   = $count["TOTAL_DATA"];
                              $limit   = 25;
                              $pagi    = ceil($count/$limit);
                              $sql     = "
                                         SELECT * FROM `ts_rangking` as A
                                         JOIN tx_dtl_user_siswa as B ON B.DTL_NIS = A.RANGKING_NIS
                                         JOIN tx_hdr_user as C ON B.DTL_HDR_ID = C.USER_ID
                                         ORDER BY RANGKING_TOTAL DESC
                                         LIMIT $start, $limit
                                         ";
                               $query  = mysqli_query($mysqli, $sql);
                               $no     = $start+1;
                               while ($siswa = mysqli_fetch_array($query)) {
                               ?>
                                <tr>
                                  <?php if ($no > 3) { ?>
                                    <td style="vertical-align:top;width:10%"><h4 style="text-align:center"><?php echo $no.".";$no++; ?></h4></td>
                                  <?php } else { ?>
                                    <td style="vertical-align:top;width:10%;">
                                      <img src="../public/images/rate-star.gif" alt="" width="100%" style="z-index:1;margin-left:40px">
                                        <h1 style="text-align:center;font-size:42px;margin-top:-50px"><?php echo $no."";$no++; ?></h1>
                                    </td>
                                  <?php } ?>
                                  <td style="vertical-align:top;width:10%">
                                    <center>
                                      <img onerror="this.onerror=null; this.src='../public/images/user.png'" src="resource/public/USER/<?php echo $siswa["USER_PHOTO"]; ?>" class="img-fluid mb-4" style="border-radius:50px;width:60px;height: 60px;"></td>
                                    </center>
                                  <td  style="vertical-align:top;color:#000;"><b><?php echo $siswa["USER_NAME"]; ?></b><br><font style="font-size:14px"><?php echo $siswa["DTL_NIS"]; ?></font></td>
                                  <td style="text-align:center"><?php echo $siswa["DTL_TINGKAT"]." ".$siswa["DTL_KELAS"]; ?></td>
                                  <td style="text-align:center"><?php echo $siswa["RANGKING_MEMBACA"]; ?></td>
                                  <td style="text-align:center"><?php echo $siswa["RANGKING_BERCERITA"]; ?></td>
                                  <td style="text-align:center"><?php echo $siswa["RANGKING_PENGETAHUAN"]; ?></td>
                                  <td style="text-align:center"><?php echo $siswa["RANGKING_TOTAL"]; ?></td>
                                </tr>
                              <?php } ?>
                            </table>
                            </div>
                          </div>
                        </div>
                        <!-- /.tab-content -->
                      </div>
                      <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <!-- END CUSTOM TABS -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- End Kata Pengantar -->


    </div>

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
start     = <?php echo $start; ?>;
var url   = "<?php echo $urlApi; ?>";
var nomor = 0;
new Vue({
    el: '#app',
    data () {
      return {
        rangking: null
      }
    },
    mounted () {
      axios
      .post(url+'/index', {
          action: 'list',
          db: 'sdnpakis',
          table: 'tx_hdr_buku_membaca as A',
          innerJoin: [
            {
              table: 'tx_dtl_user_siswa as B',
              field1: 'B.DTL_NIS',
              field2: 'A.MEMBACA_SISWA'
            },
            {
              table: 'tx_hdr_user as C',
              field1: 'B.DTL_HDR_ID',
              field2: 'C.USER_ID'
            }
          ],
          selectraw: 'COUNT(A.MEMBACA_SISWA) AS total, B.*, C.*',
          groupbyraw: 'A.MEMBACA_SISWA',
          orderBy: [
              'total',
              'DESC'
          ],
          start: start,
          limit: '25'
      })
      .then(response => (this.rangking = response["data"]["result"]))
    }
  })
</script>
