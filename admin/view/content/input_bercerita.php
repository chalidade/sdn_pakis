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
                  <h2 class="page-header">Bercerita</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <?php if ($session["USER_ROLE"] != 1 || $session["USER_ROLE"] == 4) { ?>
                          <li class="active"><a href="#tab_1" data-toggle="tab">Data Bercerita</a></li>
                        <?php }  if ($session["USER_ROLE"] == 1 || $session["USER_ROLE"] == 4) { ?>
                          <li class="active"><a href="#tab_2" data-toggle="tab">Laporan Bercerita</a></li>
                        <?php } ?>
                        </ul>
                        <div class="tab-content">
                          <?php if ($session["USER_ROLE"] != 1 || $session["USER_ROLE"] == 4) { ?>
                          <div class="tab-pane active" id="tab_1">
                            <?php
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                             ?>
                           <div class="table-responsive">
                            <table id="app" class="table table-border">
                              <tr>
                                <th width="5%" style="text-align:center">Id</th>
                                <th width="25%">Nama Siswa</th>
                                <th width="15%">NIS</th>
                                <th width="20%">Tgl Baca</th>
                                <th width="20%">Status</th>
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td style="text-align:center">{{ data.MEMBACA_ID }}</td>
                                  <td>{{ data.MEMBACA_SISWA }}</td>
                                  <td>{{ data.MEMBACA_JUDUL }}</td>
                                  <td>{{ data.MEMBACA_SISWA }}</td>
                                  <td>{{ data.MEMBACA_TANGGAL }}</td>
                                  <td style="text-align:center">
                                    <button type="button" onclick="VIEW_MEMBACA('tx_hdr_buku_membaca', 2,'MEMBACA_ID',<?php echo $start; ?>,<?php echo $page; ?>)" class="btn btn-primary option"><i class="fa fa-eye"></i></button>
                                    <button type="button" v-bind:onclick="'reject(' + data.PROTA_ID + ')'"/ class="btn btn-danger option"> <i class="fa fa-times"></i></button>
                                    <button type="button" v-bind:onclick="'approve(' + data.PROTA_ID + ')'"/ class="btn btn-success option"> <i class="fa fa-check"></i></button>
                                  </td>
                                </tr>
                              </template>
                              <tr>
                                <td colspan="3">
                                  <?php
                                    $prev = $start-25;
                                    if ($prev < 0) $prev = 0;
                                    $next = $start+25;
                                   ?>
                                  <a href="<?php echo $urlPageMembaca.$prev; ?>" type="button" name="button" class="btn btn-primary"><</a>
                                </td>
                                <td colspan="3">
                                  <a href="<?php echo $urlPageMembaca.$next; ?>" style="float:right" type="button" class="btn btn-primary">></a>
                                </td>
                              </tr>
                            </table>
                          </div>
                          </div>
                        <?php } ?>
                          <!-- /.tab-pane -->
                          <?php if ($session["USER_ROLE"] == 1 || $session["USER_ROLE"] == 4) { ?>
                          <div class="tab-pane active" id="tab_2">
                            <div class="row">
                              <form action="app/model/BerceritaModel.php?id=insert" method="post" enctype="multipart/form-data">
                              <div class="col-md-12 table-responsive">
                                <table class="table">
                                  <tr>
                                    <td width="15%">Nama</td>
                                    <td width="2%">:</td>
                                    <td> <input type="text" disabled value="<?php echo $session["USER_NAME"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td>
                                      <input type="text" disabled value="<?php echo $session["DTL_NIS"]; ?>" class="form-control">
                                      <td> <input type="hidden" name="BERCERITA_NIS" value="<?php echo $session["DTL_NIS"]; ?>"> </td>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Januari</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_JAN" value="<?php echo $session["BERCERITA_JAN"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Februari</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_FEB" value="<?php echo $session["BERCERITA_FEB"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Maret</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_MAR" value="<?php echo $session["BERCERITA_MAR"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>April</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_APR" value="<?php echo $session["BERCERITA_APR"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Mei</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_MEI" value="<?php echo $session["BERCERITA_MEI"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Juni</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_JUN" value="<?php echo $session["BERCERITA_JUN"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Juli</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_JUL" value="<?php echo $session["BERCERITA_JUL"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Agustus</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_AUG" value="<?php echo $session["BERCERITA_AUG"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>September</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_SEP" value="<?php echo $session["BERCERITA_SEP"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Oktober</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_OKT" value="<?php echo $session["BERCERITA_OKT"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>November</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_NOV" value="<?php echo $session["BERCERITA_NOV"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Desember</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_DES" value="<?php echo $session["BERCERITA_DES"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>STATUS</td>
                                    <td>:</td>
                                    <td>
                                      <font color="red"><b>Disetujui</b></font>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-success" name="button" style="width:100%;margin-top:20px">Simpan</button>
                              </div>
                            </form>
                            </div>
                          </div>
                          <?php } ?>
                          <!-- /.tab-pane -->
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

<?php if ($session["USER_ROLE"] == "1") { ?>
  <script type="text/javascript">
    start   = <?php echo $start; ?>;
    var url = "<?php echo $urlApi; ?>";
    new Vue({
        el: '#app',
        data () {
          return {
            info: null
          }
        },
        mounted () {
          axios
          .post(url+'/index', {
            action: 'list',
            db: 'sdnpakis',
            table: 'tx_hdr_buku_membaca',
            where : [['MEMBACA_SISWA','=', '<?php echo $siswa["DTL_NIS"]; ?>']],
            start: start,
            orderBy: ['MEMBACA_ID', 'DESC'],
            limit: 25
          })
          .then(response => (this.info = response["data"]["result"]))
        }
      })
  </script>
<?php } else {?>
  <script type="text/javascript">
    start   = <?php echo $start; ?>;
    var url = "<?php echo $urlApi; ?>";
    new Vue({
        el: '#app',
        data () {
          return {
            info: null
          }
        },
        mounted () {
          axios
          .post(url+'/index', {
            action: 'list',
            db: 'sdnpakis',
            table: 'tx_hdr_buku_membaca',
            start: start,
            orderBy: ['MEMBACA_ID', 'DESC'],
            limit: 25
          })
          .then(response => (this.info = response["data"]["result"]))
        }
      })
  </script>
<?php } ?>


<script type="text/javascript">
function DELETE_MEMBACA(id, start, page) {
  var url = "<?php echo $urlApi; ?>";
  new Vue({
      el: '#app',
      data () {
        return {
          info: null
        }
      },
      mounted () {
        axios
        .post(url+'/store', {
          action: 'simpleDelete',
          db: 'sdnpakis',
          table: 'tx_hdr_buku_membaca',
          where : ["MEMBACA_ID", id]
        })
        .then(response => (alert(this.info = response["data"])))
        .then(response=>(window.location = "<?php echo $urlPageMembaca; ?>"+start+"&page="+page));
      }
    })
}

function EDIT_MEMBACA(id, start, page) {
  alert(id);
}
</script>
