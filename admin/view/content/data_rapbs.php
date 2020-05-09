<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
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
                  <h2 class="page-header">Rencana Anggaran Pendapatan Belanja Sekolah (RAPBS)</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="table-responsive">
                            <?php
                            $menu   = $_REQUEST["menu"];
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                            if ($menu == 1) {
                              echo '<a class="btn btn-primary" href="index.php?id=input_rapbs" style="margin-bottom:20px"><i class="fa fa-book"></i> Buat Pengajuan</a>';
                            }
                             ?>
                            <table cellpadding="10" id="app" class="table table-border" width="100%">
                              <tr>
                                <th width="6%">No</th>
                                <th width="15%">Nomor Pengajuan</th>
                                <th width="15%">Nama Sekolah</th>
                                <th width="20%" style="text-align:center">Tanggal</th>
                                <th width="15%" style="text-align:center">Remark</th>
                                <th width="15%" style="text-align:center">Status</th>
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template v-for="data in info">
                                <tr>
                                  <td width="6%">{{ data.KEUANGAN_RAPBS_ID }}</td>
                                  <td width="15%">{{ data.KEUANGAN_RAPBS_NO_PENGAJUAN }}</td>
                                  <td width="15%">{{data.KEUANGAN_RAPBS_NAMA_SEKOLAH}}</td>
                                  <td width="20%" style="text-align:center">{{ data.KEUANGAN_RAPBS_TGL_UPDATE }}</td>
                                  <td width="15%" style="text-align:center;font-weight:800;color:red">{{ data.KEUANGAN_RAPBS_REMARK }}</td>
                                  <td width="15%" style="text-align:center;font-weight:800;color:red">{{ data.STATUS }}</td>
                                  <td width="20%" style="text-align:center">
                                    <?php if ($menu == 1) { ?>
                                      <button type="button" v-bind:onclick="'send(' + data.KEUANGAN_RAPBS_ID +  ', ' + data.KEUANGAN_RAPBS_STATUS +  ')'"/ class="btn btn-success option"> <i class="fa fa-send"></i> </button>
                                      <a v-bind:href="'?id=update_rapbs&menu=1&data=' + data.KEUANGAN_RAPBS_ID"  class="btn btn-warning option"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.KEUANGAN_RAPBS_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>
                                    <div class="modal fade" v-bind:id="'modal-default' + data.KEUANGAN_RAPBS_ID">
                                      <div class="modal-dialog" style="width:80%">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{data.KEUANGAN_RAPBS_NO_PENGAJUAN}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                              <div class="box-body" style="margin-bottom:30px">
                                                <iframe v-bind:src="'view/frame/detailKeuanganRapbs.php?id=' + data.KEUANGAN_RAPBS_ID" width="100%" height="400" style="border:none;overflow:hidden;"></iframe>
                                              </div>
                                              <!-- /.box-body -->

                                              <div class="box-footer">
                                                <?php if($menu != 1) { ?>
                                                  <table width="100%">
                                                  <tr>
                                                    <td><button type="button" v-bind:onclick="'reject(' + data.KEUANGAN_RAPBS_ID + ')'"/ class="btn btn-danger"  style="width:100%"> <i class="fa fa-times"></i> Reject </button></td>
                                                    <td><button type="button" v-bind:onclick="'approve(' + data.KEUANGAN_RAPBS_ID + ')'"/ class="btn btn-success"  style="width:100%"> <i class="fa fa-check"></i> Approve </button></td>
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
                                  <a href="<?php echo $urlKeuanganRapbs.$prev; ?>&menu=1" type="button" name="button" class="btn btn-primary"><</a>
                                </td>
                                <td colspan="3">
                                  <a href="<?php echo $urlKeuanganRapbs.$next; ?>&menu=1" style="float:right" type="button" class="btn btn-primary">></a>
                                </td>
                              </tr>
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
function DELETE_USER(id, start, page) {
  var url   = "<?php echo $urlApi; ?>";
  var dbapi = "<?php echo $databaseApi; ?>";
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
          "action" : "delHeaderDetail",
          "data"   : ["HEADER", "DETAIL"],
          "HEADER" : {
          	"DB"     : dbapi,
          	"TABLE"  : "tx_hdr_keuangan_rapbs",
          	"PK"     : ["KEUANGAN_RAPBS_ID",id]
          },

          "DETAIL": {
          	"DB"     : dbapi,
        	"TABLE"  : "tx_dtl_keuangan_rabs",
        	"FK"     : ["RAPBS_DTL_HDR_ID","KEUANGAN_RAPBS_ID"]
          }
        })
        .then(response => (alert(this.info = response["data"])))
        .then(response=>(window.location = "<?php echo $urlKeuanganRapbs; ?>"+start+"&page="+page));
      }
    })
}

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
              "table"  : "tx_hdr_keuangan_rapbs",
              "update" :
              {
                 "KEUANGAN_RAPBS_STATUS" : "1"
              },
               "where" :
               {
                "KEUANGAN_RAPBS_ID" : id
               }
            })
        }
      })

      alert("Pengajuan Dikirim");
      window.setTimeout(function(){
      window.location = "<?php echo $urlKeuanganRapbs; ?>0&menu=1"}, 1000);
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
            "table"  : "tx_hdr_keuangan_rapbs",
            "update" :
          	{
          		 "KEUANGAN_RAPBS_STATUS" : "3",
               "KEUANGAN_RAPBS_REMARK" : remark
          	},
             "where" :
             {
          		"KEUANGAN_RAPBS_ID" : id
             }
          })
      }
    })

    alert("Pengajuan Ditolak");
    window.setTimeout(function(){
    window.location = "<?php echo $urlKeuanganRapbs; ?>0&menu=2"}, 1000);
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
            "table"  : "tx_hdr_keuangan_rapbs",
            "update" :
          	{
          		 "KEUANGAN_RAPBS_STATUS" : "2"
          	},
             "where" :
             {
          		"KEUANGAN_RAPBS_ID" : id
             }
          })
      }
    })

    alert("Pengajuan Diterima");
    window.setTimeout(function(){
    window.location = "<?php echo $urlKeuanganRapbs; ?>0&menu=2"}, 1000);
}

var menu    = <?php echo $menu; ?>;
var start   = <?php echo $start; ?>;
var url = "<?php echo $urlApi; ?>";

if (menu == 1) {
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
            "action"    : "list",
            "db"        : "sdnpakis",
            "table"     : "tx_hdr_keuangan_rapbs as A",
            "innerJoin" : [{
              "table"   : "tm_reff as B",
              "field1"  : "B.REFF_ID",
              "field2"  : "A.KEUANGAN_RAPBS_STATUS"
            }],
            "where"     : [
              ["B.REFF_TR_ID", "=", "2"]

            ],
            "orderBy": ["KEUANGAN_RAPBS_ID", "DESC"],
            "selectraw" : "A.*, B.REFF_NAME as STATUS",
            "start": start,
            "limit": 25
        })
      .then(response => (this.info = response["data"]["result"]))
    }
  })
} else {
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
              "action"    : "list",
              "db"        : "sdnpakis",
              "table"     : "tx_hdr_keuangan_rapbs as A",
              "innerJoin" : [{
                "table"   : "tm_reff as B",
                "field1"  : "B.REFF_ID",
                "field2"  : "A.KEUANGAN_RAPBS_STATUS"
              }],
              "where"     : [
                ["B.REFF_TR_ID", "=", "2"],
                ["A.KEUANGAN_RAPBS_STATUS", "=", "1"]

              ],
              "orderBy": ["KEUANGAN_RAPBS_ID", "DESC"],
              "selectraw" : "A.*, B.REFF_NAME as STATUS",
              "start": start,
              "limit": 25
          })
        .then(response => (this.info = response["data"]["result"]))
      }
    })
}
</script>
