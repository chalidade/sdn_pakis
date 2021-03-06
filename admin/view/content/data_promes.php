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
                  <h2 class="page-header">Data Program Semester</h2>

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
                             ?>
                             <table width="100%">
                               <tr>
                                 <td width="70%">
                                   <?php
                                   if ($menu == 1) {
                                     echo '<a class="btn btn-primary" href="index.php?id=input_promes"><i class="fa fa-book"></i> Buat Pengajuan</a>';
                                   }
                                   ?>
                                 </td>
                                 <td>
                                   <!-- search form -->
                                    <!-- <form action="#" method="get"class="sidebar-form" style="background-color:#fff">
                                      <div class="input-group">
                                        <input type="text" name="q" class="form-control" placeholder="Search..." style="background: #fff;">
                                            <span class="input-group-btn" style="width: 50%;">
                                              <select class="form-control" style="border:none;border-left:solid thin #242424">
                                                <option value="PROMES_NO_PENGAJUAN">No Pengajuan</option>
                                                <option value="PROMES_SATUAN_PENDIDIKAN">Satuan Pendidikan</option>
                                                <option value="PROMES_KELAS">Kelas</option>
                                                <option value="SEMESTER">Semester</option>
                                                <option value="PROMES_TAHUN_AJARAN">Tahun</option>
                                              </select>
                                              </button>
                                            </span>
                                      </div>
                                    </form> -->
                                    <!-- /.search form -->
                                 </td>
                               </tr>
                             </table>
                            <table cellpadding="10" id="app" class="table table-border" width="100%" style="margin-top:20px">
                              <tr>
                                <!-- <th width="3%">No</th> -->
                                <th width="15%">No Pengajuan</th>
                                <th width="20%">Satuan Pendidikan</th>
                                <th width="5%" style="text-align:center">Kelas/Semester</th>
                                <th width="10%">Tahun</th>
                                <th width="15%" style="text-align:center">Remark</th>
                                <th width="15%" style="text-align:center">Status</th>
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <!-- <td width="3%">{{ data.PROMES_ID }}</td> -->
                                  <td>{{data.PROMES_NO_PENGAJUAN}}</td>
                                  <td width="20%">
                                    {{data.PROMES_SATUAN_PENDIDIKAN}}
                                  </td>
                                  <td width="5%" style="text-align:center">{{ data.DTL_TINGKAT }} {{ data.PROMES_KELAS }} / {{ data.SEMESTER }}</td>
                                  <td width="10%" style="text-align:center"> {{ data.PROMES_TAHUN_AJARAN }}</td>
                                  <td width="15%" style="text-align:left;">{{data.PROMES_REMARK}}</td>
                                  <td style="text-align:center;color:red"><b>{{ data.STATUS }}</b></td>
                                  <td width="20%" style="text-align:center">
                                    <?php if ($menu == 1) { ?>
                                      <button type="button" v-bind:onclick="'send(' + data.PROMES_ID +  ', ' + data.PROMES_STATUS +  ')'"/ class="btn btn-success option"> <i class="fa fa-send"></i> </button>
                                    <?php } ?>
                                    <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.PROMES_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>
                                    <a target="_blank" v-bind:href="'?id=update_promes&menu=1&data=' + data.PROMES_ID"  class="btn btn-warning option"><i class="fa fa-edit"></i></a>
                                    <div class="modal fade" v-bind:id="'modal-default' + data.PROMES_ID">
                                      <div class="modal-dialog" style="width:80%">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{data.PROMES_NO_PENGAJUAN}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                              <div class="box-body" style="margin-bottom:30px">
                                                <iframe v-bind:src="'view/frame/detailPromes.php?id=' + data.PROMES_ID" width="100%" height="400" style="border:none;overflow:hidden;"></iframe>
                                              </div>
                                              <!-- /.box-body -->

                                              <div class="box-footer">
                                                <?php if($menu != 1) { ?>
                                                  <table width="100%">
                                                  <tr>
                                                    <td><button type="button" v-bind:onclick="'reject(' + data.PROMES_ID + ')'"/ class="btn btn-danger"  style="width:100%"> <i class="fa fa-times"></i> Reject </button></td>
                                                    <td><button type="button" v-bind:onclick="'approve(' + data.PROMES_ID + ')'"/ class="btn btn-success"  style="width:100%"> <i class="fa fa-check"></i> Approve </button></td>
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
                                <td colspan="6">
                                  <?php
                                    $prev = $start-25;
                                    if ($prev < 0) $prev = 0;
                                    $next = $start+25;
                                   ?>
                                  <a href="<?php echo $urlDataSiswa.$prev; ?>" type="button" name="button" class="btn btn-primary"><</a>
                                </td>
                                <td colspan="3">
                                  <a href="<?php echo $urlDataSiswa.$next; ?>" style="float:right" type="button" class="btn btn-primary">></a>
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
          	"TABLE"  : "tx_hdr_user",
          	"PK"     : ["PROTA_ID",id]
          },

          "DETAIL": {
          	"DB"     : dbapi,
        	"TABLE"  : "tx_dtl_user_siswa",
        	"FK"     : ["DTL_HDR_ID","PROTA_ID"]
          }
        })
        .then(response => (alert(this.info = response["data"])))
        .then(response=>(window.location = "<?php echo $urlDataSiswa; ?>"+start+"&page="+page));
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
              "table"  : "tx_hdr_promes",
              "update" :
              {
                 "PROMES_STATUS" : "1"
              },
               "where" :
               {
                "PROMES_ID" : id
               }
            })
        }
      })

      alert("Pengajuan Dikirim");
      window.setTimeout(function(){
      window.location = "<?php echo $urlPromes; ?>0&menu=1"}, 1000);
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
            "table"  : "tx_hdr_promes",
            "update" :
          	{
          		 "PROMES_STATUS" : "3",
               "PROMES_REMARK" : remark
          	},
             "where" :
             {
          		"PROMES_ID" : id
             }
          })
      }
    })

    alert("Pengajuan Ditolak");
    window.setTimeout(function(){
    window.location = "<?php echo $urlPromes; ?>0&menu=2"}, 1000);
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
            "table"  : "tx_hdr_promes",
            "update" :
          	{
          		 "PROMES_STATUS" : "2"
          	},
             "where" :
             {
          		"PROMES_ID" : id
             }
          })
      }
    })

    alert("Pengajuan Diterima");
    window.setTimeout(function(){
    window.location = "<?php echo $urlPromes; ?>0&menu=2"}, 1000);
}


  var start   = <?php echo $start; ?>;
  var url     = "<?php echo $urlApi; ?>";
  var menu    = <?php echo $menu; ?>;

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
          "table"     : "tx_hdr_promes as A",
          "innerJoin" : [{
            "table"   : "tm_reff as B",
            "field1"  : "B.REFF_ID",
            "field2"  : "A.PROMES_STATUS"
          }],
          "leftJoin" : [{
            "table"   : "tm_reff as C",
            "field1"  : "C.REFF_ID",
            "field2"  : "A.PROMES_SEMESTER"
          }],
          "orderBy"   : ["PROMES_ID", "DESC"],
          "where"     : [
            ["B.REFF_TR_ID", "=", "2"],
            ["C.REFF_TR_ID", "=", "3"]
          ],
          "selectraw" : "A.*, B.REFF_NAME as STATUS, C.REFF_NAME as SEMESTER",
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
          "table"     : "tx_hdr_promes as A",
          "whereIn"   : ["PROMES_STATUS", ["0","1"]],
          "orderBy"   : ["PROMES_ID", "DESC"],
          "innerJoin" : [{
            "table"   : "tm_reff as B",
            "field1"  : "B.REFF_ID",
            "field2"  : "A.PROMES_STATUS"
          }],
          "leftJoin" : [{
            "table"   : "tm_reff as C",
            "field1"  : "C.REFF_ID",
            "field2"  : "A.PROMES_SEMESTER"
          }],
          "where"     : [
            ["B.REFF_TR_ID", "=", "2"],
            ["C.REFF_TR_ID", "=", "3"],
            ["PROMES_STATUS", "=", "1"]
          ],
          "selectraw" : "A.*, B.REFF_NAME as STATUS, C.REFF_NAME as SEMESTER",
          "start": start,
          "limit": 25
        })
        .then(response => (this.info = response["data"]["result"]))
      }
    })
  }
</script>
