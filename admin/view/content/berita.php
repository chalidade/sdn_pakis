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
                  <h2 class="page-header">Berita</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Semua Berita</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Tambah Berita</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <?php
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                             ?>
                            <table class="table table-border" id="app">
                              <tr>
                                <th width="5%" style="text-align:center">No</th>
                                <th width="15%" style="text-align:center">Foto</th>
                                <th width="20%">Judul</th>
                                <th width="10%">Tanggal Posting</th>
                                <th width="20%">Penulis</th>
                                <th width="10%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in berita">
                                <tr>
                                  <td width="5%" style="text-align:center">{{ data.BERITA_ID }}</td>
                                  <td width="15%" style="text-align:center">
                                      <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicBerita ?>' + data.BERITA_IMAGE"/ style='width:80px;padding:5px' alt=''>
                                  </td>
                                  <td width="20%">{{ data.BERITA_JUDUL }}</td>
                                  <td width="15%">{{ data.BERITA_UPDATE }}</td>
                                  <td width="20%">{{ data.USER_NAME }}</td>
                                  <td width="10%" style="text-align:center">
                                    <button type="button" v-bind:onclick="'DELETE_BERITA(' + data.BERITA_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-danger option"><i class="fa fa-trash"></i></button>
                                    <button type="button" onclick="VIEW_BERITA('tx_home_berita', 2,'BERITA_ID',<?php echo $start; ?>,<?php echo $page; ?>)" class="btn btn-primary option"><i class="fa fa-eye"></i></button>
                                  </td>
                                </tr>
                              </template>
                            </table>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="row">
                              <div class="col-md-12">
                                <form action="app/model/BeritaModel.php?id=modalBerita" method="post"  enctype="multipart/form-data">
                                <label class="container" for="BERITA_IMAGE" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                                  <input type="file" id="BERITA_IMAGE" name="BERITA_IMAGE" value="" style="display:none">
                                  <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:150px;padding:5px 10px;">
                                    <center>
                                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                                    </center>
                                  </div>
                                </label>
                              </div>
                              <div class="col-md-12">
                                  <label for="title" style="width:100%">
                                    Judul
                                    <input type="text" id="title" class="form-control" name="BERITA_JUDUL" value="">
                                    <input type="hidden" name="BERITA_USER" value="<?php echo $session["USER_ID"]; ?>">
                                  </label>
                                  <label for="desc" style="width:100%">
                                    Deskripsi
                                    <textarea type="text" id="desc" class="form-control" name="BERITA_DESKRIPSI" style="height:150px"></textarea>
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

<script type="text/javascript">
function DELETE_BERITA(id, start, page) {

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
          table: 'tx_home_berita',
          where : ["BERITA_ID", id]
        })
        .then(response => (alert(this.info = response["data"])))
        .then(response=>(window.location = "<?php echo $urlPageBerita; ?>"+start+"&page="+page));
      }
    })
}

start   = <?php echo $start; ?>;
var url = "<?php echo $urlApi; ?>";
new Vue({
    el: '#app',
    data () {
      return {
        berita: null
      }
    },
    mounted () {
      axios
      .post(url+'/index', {
        action: 'list',
        db: 'sdnpakis',
        table: 'tx_home_berita as A',
        innerJoin : [{
          table: 'tx_hdr_user as B',
          field1: 'B.user_id',
          field2: 'A.berita_user'
        }],
        start: start,
        orderBy: ['A.BERITA_ID', 'DESC'],
        limit: 25
      })
      .then(response => (this.berita = response["data"]["result"]))
    }
  })
</script>
