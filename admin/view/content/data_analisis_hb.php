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
                                <th width="15%" style="text-align:center">Muatan Terpadu</th>
                                <th width="25%">Tema</th>
                                <th width="25%">Sub Tema</th>
                                <th width="10%" style="text-align:center">Pembelajaran</th>
                              </tr>
                            </table>
                            <?php
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                             ?>
                            <table cellpadding="10" id="app" class="table table-border">
                              <template  v-for="data in info">
                                <tr>
                                  <td width="5%" style="text-align:center">{{ data.ANALISIS_HB_HDR_ID }}</td>
                                  <td width="15%" style="text-align:center">
                                    {{data.ANALISIS_HB_HDR_MUATAN_TERPADU}}
                                  </td>
                                  <td width="20%">{{ data.ANALISIS_HB_HDR_TEMA }}</td>
                                  <td width="25%">{{ data.ANALISIS_HB_HDR_SUB_TEMA }}</td>
                                  <td width="10%" style="text-align:center">{{ data.ANALISIS_HB_HDR_PEMBELAJARAN }}</td>
                                  <td width="20%" style="text-align:center">
                                    <button type="button" v-bind:onclick="'EDIT_USER(' + data.USER_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-warning" style="width:35px"> <i class="fa fa-pencil"></i> </button>
                                    <button type="button" v-bind:onclick="'DELETE_USER(' + data.USER_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-danger" style="width:35px"><i class="fa fa-trash"></i></button>
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
                                  <a href="<?php echo $urlAnalisisHB.$prev; ?>" type="button" name="button" class="btn btn-primary"><</a>
                                </td>
                                <td colspan="3">
                                  <a href="<?php echo $urlAnalisisHB.$next; ?>" style="float:right" type="button" class="btn btn-primary">></a>
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
          info: null
        }
      },
      mounted () {
        axios
        .post(url+'/index', {
          	"action"       : "list",
          	"db"           : "sdnpakis",
          	"table"        : "tx_hdr_analisis_hb",
          	"start"        : start,
          	"limit"        : "25"

          })
        .then(response => (this.info = response["data"]["result"]))
      }
    })
</script>
