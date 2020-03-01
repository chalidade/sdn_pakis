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
                            <table class="table table-border" width="100%">
                              <tr>
                                <th style="text-align:center">Rangking</th>
                                <th width="15%" style="text-align:center">Foto</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th >Kelas</th>
                                <th style="text-align:center;width:15%">Total Bintang</th>
                                <th>Detail</th>
                              </tr>
                              <template v-for="data in rangking">
                              <tr>
                                <td style="font-size:30px;font-weight:800;text-align:center;vertical-align:middle">{{no++}}</td>
                                <td>
                                  <center>
                                    <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicSiswa ?>' + data.DTL_PHOTO"/ style='width:100px;padding:5px' alt=''>
                                  </center>
                                </td>
                                <td> {{data.USER_NAME}}</td>
                                <td>{{data.DTL_NIS}}</td>
                                <td>{{data.DTL_TINGKAT}} {{data.DTL_KELAS}}</td>
                                <td style="text-align:center;width:10%;font-size:18px;font-weight:800;color:orange">{{data.total}}</td>
                                <td>
                                  <button type="button" class="btn btn-warning" name="button"> <i class="fa fa-star"></i> </button>
                                </td>
                              </tr>
                            </template>
                            <tr>
                              <td colspan="5">
                                <?php
                                  $prev = $start-25;
                                  if ($prev < 0) $prev = 0;
                                  $next = $start+25;
                                 ?>
                                <a href="<?php echo $urlPageRangking.$prev; ?>" type="button" name="button" class="btn btn-primary"><</a>
                              </td>
                              <td colspan="3">
                                <a href="<?php echo $urlPageRangking.$next; ?>" style="float:right" type="button" class="btn btn-primary">></a>
                              </td>
                            </tr>
                            </table>
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
start   = <?php echo $start; ?>;
var url = "<?php echo $urlApi; ?>";
new Vue({
    el: '#app',
    data () {
      return {
        rangking: null,
        no: start-2499,
      }
    },
    mounted () {
      axios
      .post(url+'/index', {
          action: 'list',
          db: 'sdnpakis',
          table: 'tx_hdr_buku_membaca as A',
          selectraw: 'COUNT(A.MEMBACA_SISWA) AS total, B.*, C.*',
          groupbyraw: 'A.MEMBACA_SISWA',
          orderBy: [
              'total',
              'DESC'
          ],
          leftJoin: [
              {
                  table: 'tx_hdr_user as B',
                  field1: 'B.USER_ID',
                  field2: 'A.MEMBACA_SISWA'
              },
              {
                  table: 'tx_dtl_user_siswa as C',
                  field1: 'B.USER_ID',
                  field2: 'C.DTL_HDR_ID'
              }
          ],
          start: start,
          limit: '25'
      })
      .then(response => (this.rangking = response["data"]["result"]))
    }
  })
</script>
