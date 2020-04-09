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
                          <li><a href="#tab_1" data-toggle="tab">Data KIP</a></li>
                          <li class="active"><a href="#tab_2" data-toggle="tab">Laporan KIP</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane" id="tab_1">
                            <?php
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                             ?>
                           <div class="table-responsive">
                            <table id="app" class="table table-border">
                              <tr>
                                <th width="5%" style="text-align:center">Id</th>
                                <th width="15%" style="text-align:center">Nama Siswa</th>
                                <th width="10%">NIS</th>
                                <th width="15%">Tgl Laporan</th>
                                <th width="15%" style="text-align:center">Status</th>
                                <th width="20%" style="text-align:center">Remark</th>
                                <th width="10%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td style="text-align:center">{{ data.PENGETAHUAN_ID }}</td>
                                  <td style="text-align:center">{{ data.USER_NAME }}</td>
                                  <td>{{ data.DTL_NIS }}</td>
                                  <td>{{ data.PENGETAHUAN_TGL_UPDATE }}</td>
                                  <td style="text-align:center"><font style="font-weight:800;color:red">{{ data.REFF_NAME }}</font></td>
                                  <td style="text-align:center"><font style="font-weight:800;color:red">{{ data.PENGETAHUAN_REMARK }}</font></td>
                                  <td style="text-align:center">
                                    <?php if (!empty($session["DTL_NIS"])) { ?>
                                    <button type="button" v-bind:onclick="'send(' + data.PENGETAHUAN_ID +  ', ' + data.PENGETAHUAN_STATUS +  ')'"/ class="btn btn-success option"> <i class="fa fa-send"></i> </button>
                                    <a v-bind:href="'?id=update_pengetahuan&menu=1&data=' + data.PENGETAHUAN_ID"  class="btn btn-warning option"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.PENGETAHUAN_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>
                                    <div class="modal fade" v-bind:id="'modal-default' + data.PENGETAHUAN_ID">
                                      <div class="modal-dialog" style="width:80%">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{data.USER_NAME}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                              <div class="box-body" style="margin-bottom:30px">
                                                <iframe v-bind:src="'view/frame/detailPengatahuan.php?id=' + data.PENGETAHUAN_ID" width="100%" height="400" style="border:none;overflow:hidden;"></iframe>
                                              </div>
                                              <!-- /.box-body -->

                                              <div class="box-footer">
                                                <?php if(empty($session["DTL_NIS"])) { ?>
                                                  <table width="100%">
                                                  <tr>
                                                    <td style="padding:0px 10px"><button type="button" v-bind:onclick="'reject(' + data.PENGETAHUAN_ID + ')'"/ class="btn btn-danger"  style="width:100%"> <i class="fa fa-times"></i> Reject </button></td>
                                                    <td style="padding:0px 10px"><button type="button" v-bind:onclick="'approve(' + data.PENGETAHUAN_ID + ')'"/ class="btn btn-success"  style="width:100%"> <i class="fa fa-check"></i> Approve </button></td>
                                                  </tr>
                                                </table>
                                               <?php } else { ?>
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:100%">Close</button>
                                               <?php } ?>
                                              </div>
                                            </form>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
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
                          <div class="tab-pane active" id="tab_2">
                            <div class="row">
                              <div class="col-md-12">
                                <form action="app/model/PengetahuanModel.php?id=update" method="post" enctype="multipart/form-data">
                                  <table class="table table-responsive">
                                    <tr>
                                      <th width="5%">No</th>
                                      <th>Kalimat Pengetahuan</th>
                                      <th>Sumber Buku</th>
                                      <th>Halaman</th>
                                    </tr>
                                  <?php
                                  $id   = $_REQUEST["data"];
                                  $no   = 1;
                                  $data = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_buku_pengetahuan` as A JOIN `tx_dtl_buku_pengetahuan` as B ON A.PENGETAHUAN_ID = B.DTL_HDR_ID WHERE A.PENGETAHUAN_ID = '$id'");
                                  while ($pengetahuan = mysqli_fetch_array($data)) {
                                  ?>
                                  <tr>
                                    <td width="5%" style="vertical-align:middle;text-align:center">
                                      <?php echo $no;$no++; ?>
                                    </td>
                                    <td width="45%">
                                      <input type="hidden" name="PENGETAHUAN_ID" value="<?php echo $pengetahuan["PENGETAHUAN_ID"]; ?>">
                                      <input type="hidden" name="PENGETAHUAN_NIS" value="<?php echo $session["DTL_NIS"]; ?>">
                                      <input type="text" required class="form-control" name="DTL_KALIMAT_PENGETAHUAN[]" value="<?php echo $pengetahuan["DTL_KALIMAT_PENGETAHUAN"]; ?>">
                                    </td>
                                    <td width="35%">
                                      <input type="text" required class="form-control" name="DTL_SUMBER_BUKU[]" value="<?php echo $pengetahuan["DTL_SUMBER_BUKU"]; ?>">
                                    </td>
                                    <td width="15%">
                                      <input type="text" required class="form-control" name="DTL_HALAMAN[]" value="<?php echo $pengetahuan["DTL_HALAMAN"]; ?>">
                                    </td>
                                  </tr>
                                  <?php } ?>
                                  </table>
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
function send(id, status) {
  if (status == 0 || status == 3) {
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
              "action" : "update",
              "db"     : "sdnpakis",
              "table"  : "tx_hdr_buku_pengetahuan",
              "update" :
              {
                 "PENGETAHUAN_STATUS" : "1"
              },
               "where" :
               {
                "PENGETAHUAN_ID" : id
               }
            })
        }
      })

      alert("Pengajuan Dikirim");
      window.setTimeout(function(){
      window.location = "<?php echo $urlPengetahuan; ?>0&menu=1"}, 1000);
  } else {
    alert("Pengajuan Sudah Pernah Dikirim");
  }
}

function reject(id) {
  var remark = prompt("Alasan Penolakan:", "Data Tidak Lengkap");
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
            "action" : "update",
            "db"     : "sdnpakis",
            "table"  : "tx_hdr_buku_pengetahuan",
            "update" :
            {
               "PENGETAHUAN_STATUS" : "3",
               "PENGETAHUAN_REMARK" : remark
            },
             "where" :
             {
              "PENGETAHUAN_ID" : id
             }
          })
      }
    })

    alert("Pengajuan Ditolak");
    window.setTimeout(function(){
    window.location = "<?php echo $urlPengetahuan; ?>0&menu=2"}, 1000);
}

function approve(id) {
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
            "action" : "update",
            "db"     : "sdnpakis",
            "table"  : "tx_hdr_buku_pengetahuan",
            "update" :
            {
               "PENGETAHUAN_STATUS" : "2",
               "PENGETAHUAN_REMARK" : ""
            },
             "where" :
             {
              "PENGETAHUAN_ID" : id
             }
          })
      }
    })

    alert("Pengajuan Diterima");
    window.setTimeout(function(){
    window.location = "<?php echo $urlPengetahuan; ?>0&menu=2"}, 1000);
}

</script>
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
              table: 'tx_hdr_buku_pengetahuan as A',
              innerJoin :[
                  {
                  table : 'tx_dtl_user_siswa as B',
                  field1 : 'B.DTL_NIS',
                  field2 : 'A.PENGETAHUAN_NIS'
                  },
                  {
                     table : "tx_hdr_user as C",
                     field1 : "B.DTL_HDR_ID",
                     field2 : "C.USER_ID"
                   },
                  {
                   table  : "TM_REFF as D",
                   field1 : "D.REFF_ID",
                   field2 : "A.PENGETAHUAN_STATUS"
                }
              ],
              where : [
                ["D.REFF_TR_ID", "=", "2"],
                ["C.USER_ID", "=", "<?php echo $session["USER_ID"]; ?>"]
              ],
              start: start,
              orderBy: ['A.PENGETAHUAN_ID', 'DESC'],
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
              table: 'tx_hdr_buku_pengetahuan as A',
              innerJoin :[
                  {
                  table : 'tx_dtl_user_siswa as B',
                  field1 : 'B.DTL_NIS',
                  field2 : 'A.PENGETAHUAN_NIS'
                  },
                  {
                     table : "tx_hdr_user as C",
                     field1 : "B.DTL_HDR_ID",
                     field2 : "C.USER_ID"
                   },
                  {
                   table  : "TM_REFF as D",
                   field1 : "D.REFF_ID",
                   field2 : "A.PENGETAHUAN_STATUS"
                }
              ],
              where : [
                ["D.REFF_TR_ID", "=", "2"]
              ],
              start: start,
              orderBy: ['A.PENGETAHUAN_ID', 'DESC'],
              limit: 25
              })
          .then(response => (this.info = response["data"]["result"]))
        }
      })
  </script>
<?php } ?>
