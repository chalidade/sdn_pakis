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
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Data RPP</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <table class="table table-border">
                              <tr>
                                <th width="5%" style="text-align:center">Id</th>
                                <th width="15%">Muatan Terpadu</th>
                                <th width="15%">Tema</th>
                                <th width="15%">Sub Tema</th>
                                <th width="15%">Pembelajaran</th>
                                <th width="25%">Option</th>
                              </tr>
                            </table>
                            <?php
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                             ?>
                            <table cellpadding="10" id="app" class="table table-border">
                              <template  v-for="data in info">
                                <tr>
                                  <td width="5%" style="text-align:center">{{ data.RPP_HDR_ID }}</td>
                                  <td width="12%">
                                    {{data.RPP_HDR_MUATAN_TERPADU}}
                                  </td>
                                  <td width="12%">{{ data.RPP_HDR_TEMA }}</td>
                                  <td width="13%">{{ data.RPP_HDR_SUB_TEMA }}</td>
                                  <td width="13%">{{ data.RPP_HDR_PEMBELAJARAN }}</td>
                                  <td width="20%">
                                    <button type="button" v-bind:onclick="'EDIT_USER(' + data.USER_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-warning" style="width:35px"> <i class="fa fa-pencil"></i> </button>
                                    <button type="button" v-bind:onclick="'DELETE_RPP(' + data.RPP_HDR_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-danger" style="width:35px"><i class="fa fa-trash"></i></button>
                                    <button type="button" onclick="VIEW_USER('tx_hdr_buku_membaca', 2,'USER_ID',<?php echo $start; ?>,<?php echo $page; ?>)" class="btn btn-primary" style="width:35px"><i class="fa fa-eye"></i></button>
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
          	"action"       : "list",
          	"db"           : "sdnpakis",
          	"table"        : "tx_hdr_rpp",
          	"start"        : start,
          	"limit"        : "25"

          })
        .then(response => (this.info = response["data"]["result"]))
      }
    })
</script>
