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
                  <h2 class="page-header">Data RPP</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <?php
                            $menu   = $_REQUEST["menu"];
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                            if ($menu == 1) {
                              echo '<a class="btn btn-primary" href="index.php?id=input_rpp" style="margin-bottom:20px"><i class="fa fa-book"></i> Buat Pengajuan</a>';
                            }
                             ?>
                            <table cellpadding="10" id="app" class="table table-border">
                              <tr>
                                <th width="5%" style="text-align:center">Id</th>
                                <th width="12%">No Pengajuan</th>
                                <th width="15%">Muatan Terpadu</th>
                                <th width="10%">Tema</th>
                                <th width="15%">Sub Tema</th>
                                <th width="15%">Remark</th>
                                <th width="12%">Status</th>
                                <th width="20%">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td width="5%" style="text-align:center">{{ data.RPP_HDR_ID }}</td>
                                  <td width="12%">{{data.RPP_HDR_NO_PENGAJUAN}}</td>
                                  <td width="15%">
                                    {{data.RPP_HDR_MUATAN_TERPADU}}
                                  </td>
                                  <td width="15%">{{ data.RPP_HDR_TEMA }}</td>
                                  <td width="15%">{{ data.RPP_HDR_SUB_TEMA }}</td>
                                  <td width="15%">{{ data.RPP_HDR_REMARK }}</td>
                                  <td width="12%" style="font-weight:800;color:red">{{ data.STATUS }}</font></td>
                                  <td width="20%">
                                    <?php if ($menu == 1) { ?>
                                      <button type="button" v-bind:onclick="'send(' + data.RPP_HDR_ID +  ', ' + data.RPP_HDR_STATUS +  ')'"/ class="btn btn-success option"> <i class="fa fa-send"></i> </button>
                                    <?php } ?>
                                    <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.RPP_HDR_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>
                                    <a target="_blank" v-bind:href="'view/frame/detailRpp.php?print=1&id=' + data.RPP_HDR_ID"  class="btn btn-warning option"><i class="fa fa-print"></i></a>
                                    <div class="modal fade" v-bind:id="'modal-default' + data.RPP_HDR_ID">
                                      <div class="modal-dialog" style="width:80%">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" style="text-align:center">{{data.RPP_HDR_NO_PENGAJUAN}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                              <div class="box-body" style="margin-bottom:30px">
                                                <iframe v-bind:src="'view/frame/detailRpp.php?id=' + data.RPP_HDR_ID" width="100%" height="400" style="border:none;overflow:hidden;"></iframe>
                                              </div>
                                              <!-- /.box-body -->

                                              <div class="box-footer">
                                                <?php if($menu != 1) { ?>
                                                  <table width="100%">
                                                  <tr>
                                                    <td><button type="button" v-bind:onclick="'reject(' + data.RPP_HDR_ID + ')'"/ class="btn btn-danger"  style="width:100%"> <i class="fa fa-times"></i> Reject </button></td>
                                                    <td><button type="button" v-bind:onclick="'approve(' + data.RPP_HDR_ID + ')'"/ class="btn btn-success"  style="width:100%"> <i class="fa fa-check"></i> Approve </button></td>
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
                                  <a href="<?php echo $urlPageRpp.$prev; ?>" type="button" name="button" class="btn btn-primary"><</a>
                                </td>
                                <td colspan="3">
                                  <a href="<?php echo $urlPageRpp.$next; ?>" style="float:right" type="button" class="btn btn-primary">></a>
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

function DELETE_RPP(id, start, page) {
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
          table: 'tx_hdr_rpp',
          where : ["RPP_HDR_ID", id]
        })
        .then(response => (alert(this.info = response["data"])))
        .then(response=>(window.location = "<?php echo $urlPageRpp; ?>"+start+"&page="+page));
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
              "table"  : "tx_hdr_rpp",
              "update" :
              {
                 "RPP_HDR_STATUS" : "1"
              },
               "where" :
               {
                "RPP_HDR_ID" : id
               }
            })
        }
      })

      alert("Pengajuan Dikirim");
      window.setTimeout(function(){
      window.location = "<?php echo $urlRpp; ?>0&menu=1"}, 1000);
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
            "table"  : "tx_hdr_rpp",
            "update" :
          	{
          		 "RPP_HDR_STATUS" : "3",
               "RPP_HDR_REMARK" : remark
          	},
             "where" :
             {
          		"RPP_HDR_ID" : id
             }
          })
      }
    })

    alert("Pengajuan Ditolak");
    window.setTimeout(function(){
    window.location = "<?php echo $urlRpp; ?>0&menu=2"}, 1000);
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
            "table"  : "tx_hdr_rpp",
            "update" :
          	{
          		 "RPP_HDR_STATUS" : "2"
          	},
             "where" :
             {
          		"RPP_HDR_ID" : id
             }
          })
      }
    })

    alert("Pengajuan Diterima");
    window.setTimeout(function(){
    window.location = "<?php echo $urlRpp; ?>0&menu=2"}, 1000);
}


  var start   = <?php echo $start; ?>;
  var url = "<?php echo $urlApi; ?>";
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
          	"action"       : "list",
          	"db"           : "sdnpakis",
          	"table"        : "tx_hdr_rpp as A",
            "innerJoin" : [{
              "table"   : "tm_reff as B",
              "field1"  : "B.REFF_ID",
              "field2"  : "A.RPP_HDR_STATUS"
            }],
            "where"     : [
              ["B.REFF_TR_ID", "=", "2"]
            ],
            "orderBy"   : ["RPP_HDR_ID", "DESC"],
            "selectraw" : "A.*, B.REFF_NAME as STATUS",
          	"start"        : start,
          	"limit"        : "25"

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
            	"action"       : "list",
            	"db"           : "sdnpakis",
            	"table"        : "tx_hdr_rpp as A",
              "innerJoin" : [{
                "table"   : "tm_reff as B",
                "field1"  : "B.REFF_ID",
                "field2"  : "A.RPP_HDR_STATUS"
              }],
              "where"     : [
                ["B.REFF_TR_ID", "=", "2"],
                ["RPP_HDR_STATUS", "=", "1"]
              ],
              "orderBy"   : ["RPP_HDR_ID", "DESC"],
              "selectraw" : "A.*, B.REFF_NAME as STATUS",
            	"start"        : start,
            	"limit"        : "25"

            })
          .then(response => (this.info = response["data"]["result"]))
        }
      })
  }
</script>
