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
                  <h2 class="page-header">Kata Ilmu Pengetahuan</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Data Kata Ilmu Pengetahuan</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Laporan Kata Ilmu Pengetahuan</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <?php
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                             ?>
                           <div class="table-responsive">
                            <table id="app" class="table table-border">
                              <tr>
                                <th width="5%" style="text-align:center">Id</th>
                                <th width="15%" style="text-align:center">Foto Buku</th>
                                <th width="25%">Judul</th>
                                <th width="25%">Siswa</th>
                                <th width="10%" style="text-align:center">Tgl Baca</th>
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td width="5%" style="text-align:center">{{ data.MEMBACA_ID }}</td>
                                  <td width="15%" style="text-align:center">
                                      <img onerror="this.onerror=null; this.src='../public/images/photo.png'" v-bind:src="'<?php echo $publicMembaca ?>' + data.MEMBACA_COVER"/ style='width:80px;padding:5px' alt=''>
                                  </td>
                                  <td width="20%">{{ data.MEMBACA_JUDUL }}</td>
                                  <td width="25%">{{ data.MEMBACA_SISWA }}</td>
                                  <td width="10%" style="text-align:center">{{ data.MEMBACA_TANGGAL }}</td>
                                  <td width="20%" style="text-align:center">
                                    <button type="button" onclick="VIEW_MEMBACA('tx_hdr_buku_membaca', 2,'MEMBACA_ID',<?php echo $start; ?>,<?php echo $page; ?>)" class="btn btn-primary option"><i class="fa fa-eye"></i></button>
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
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="row">
                              <div class="col-md-12">
                                <form action="app/model/MembacaModel.php?id=modalMembaca" method="post" enctype="multipart/form-data">
                                <label class="container" for="imgSlider1" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                                  <input type="file" id="imgSlider1" name="MEMBACA_COVER" value="" style="display:none">
                                  <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:150px;padding:5px 10px;">
                                    <center>
                                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                                    </center>
                                  </div>
                                </label>
                              </div>
                              <div class="col-md-12">
                                  <label for="title" style="width:100%">
                                    Tanggal Baca
                                    <input type="hidden" id="title" class="form-control" name="MEMBACA_ID" value="" style="line-height:15px">
                                    <input type="date" id="title" class="form-control" name="MEMBACA_TANGGAL" value="" style="line-height:15px">
                                  </label>
                                  <label for="title" style="width:100%">
                                    NIS
                                    <?php if ($session["USER_ROLE"] == 1) { ?>
                                      <input type="input" id="title" class="form-control" disabled value="<?php echo $siswa["DTL_NIS"]; ?>">
                                      <input type="hidden" id="title" class="form-control" name="MEMBACA_SISWA" value="<?php echo $siswa["DTL_NIS"]; ?>">
                                    <?php } else { ?>
                                      <input type="input" id="title" class="form-control" name="MEMBACA_SISWA" value="">
                                    <?php } ?>
                                  </label>
                                  <!-- <label for="title" style="width:100%">
                                    Nama Guru
                                    <input type="input" id="title" class="form-control" name="MEMBACA_GURU" value="">
                                  </label> -->
                                  <label for="title" style="width:100%">
                                    Judul
                                    <input type="text" id="title" class="form-control" name="MEMBACA_JUDUL" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Pengarang
                                    <input type="text" id="title" class="form-control" name="MEMBACA_PENGARANG" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Penerbit
                                    <input type="text" id="title" class="form-control" name="MEMBACA_PENERBIT" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Tokoh
                                    <input type="text" id="title" class="form-control" name="MEMBACA_TOKOH" value="">
                                  </label>
                                  <label for="desc" style="width:100%">
                                    Rangkuman
                                    <textarea type="text" id="desc" class="form-control" name="MEMBACA_RANGKUMAN" style="height:150px"></textarea>
                                  </label>
                                  <label for="desc" style="width:100%">
                                    Pesan Moral
                                    <textarea type="text" id="desc" class="form-control" name="MEMBACA_SARAN" style="height:150px"></textarea>
                                  </label>
                              </div>
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-success" name="button" style="width:100%;margin-top:20px">Simpan</button>
                              </div>
                            </form>
                            </div>
                          </div>
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
