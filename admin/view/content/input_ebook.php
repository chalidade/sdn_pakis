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
                  <h2 class="page-header">Electronic Book</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Data Ebook</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Input Ebook</a></li>
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
                                <th width="15%">Pengarang</th>
                                <th width="15%">Penerbit</th>
                                <th width="15%">Tahun</th>
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td width="5%" style="text-align:center">{{ data.BOOK_ID }}</td>
                                  <td width="15%" style="text-align:center">
                                      <img onerror="this.onerror=null; this.src='../public/images/photo.png'" v-bind:src="'<?php echo $publicMembaca ?>' + data.BOOK_COVER"/ style='width:80px;padding:5px' alt=''>
                                  </td>
                                  <td width="20%">{{ data.BOOK_JUDUL }}</td>
                                  <td width="25%">{{ data.BOOK_PENGARANG }}</td>
                                  <td width="25%">{{ data.BOOK_PENERBIT }}</td>
                                  <td width="15%">{{ data.BOOK_TAHUN }}</td>
                                  <td width="20%" style="text-align:center">
                                    <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.BOOK_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>

                                    <div class="modal fade" v-bind:id="'modal-default' + data.BOOK_ID">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" style="text-transform:uppercase">{{data.BOOK_JUDUL}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                            <iframe v-bind:src="'<?php echo $publicMembaca ?>' + data.BOOK_FILE" width="100%" height="500px"></iframe>
                                          </div>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
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
                                  <a href="<?php echo $urlEbook.$prev; ?>" type="button" name="button" class="btn btn-primary"><</a>
                                </td>
                                <td colspan="3">
                                  <a href="<?php echo $urlEbook.$next; ?>" style="float:right" type="button" class="btn btn-primary">></a>
                                </td>
                              </tr>
                            </table>
                          </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="row">
                              <div class="col-md-12">
                                <form action="app/model/EbookModel.php?id=insert" method="post" enctype="multipart/form-data">
                                <label class="container" for="imgSlider1" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                                  <input type="file" id="imgSlider1" name="BOOK_COVER" value="" style="display:none">
                                  <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:150px;padding:5px 10px;">
                                    <center>
                                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Cover</font>
                                    </center>
                                  </div>
                                </label>
                              </div>
                              <div class="col-md-12">
                                  <label for="title" style="width:100%">
                                    Judul
                                    <input type="hidden" id="title" class="form-control" name="BOOK_ID" value="" style="line-height:15px">
                                    <input type="text" id="title" class="form-control" name="BOOK_JUDUL" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Pengarang
                                    <input type="text" id="title" class="form-control" name="BOOK_PENGARANG" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Penerbit
                                    <input type="text" id="title" class="form-control" name="BOOK_PENERBIT" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Tahun
                                    <input type="text" id="title" class="form-control" name="BOOK_TAHUN" value="">
                                  </label>
                                  <label for="ebook" style="width:100%">
                                    Upload Ebook
                                    <input type="file" id="ebook" class="form-control" name="BOOK_FILE" value="">
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
            table: 'tx_hdr_ebook',
            start: start,
            orderBy: ['BOOK_ID', 'DESC'],
            limit: 25
          })
          .then(response => (this.info = response["data"]["result"]))
        }
      })
  </script>

<script type="text/javascript">
function DELETE_BOOK(id, start, page) {
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
          table: 'tx_hdr_ebook',
          where : ["BOOK_ID", id]
        })
        .then(response => (alert(this.info = response["data"])))
        .then(response=>(window.location = "<?php echo $urlEbook; ?>"+start+"&page="+page));
      }
    })
}

function EDIT_BOOK(id, start, page) {
  alert(id);
}
</script>
