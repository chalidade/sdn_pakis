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
          <div class="box box-warning content" id="bercerita">

            <!-- START CUSTOM TABS -->
                  <h2 class="page-header">Bercerita</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <?php if ($session["USER_ROLE"] != 1 || $session["USER_ROLE"] == 4) { ?>
                          <li class="active"><a href="#tab_1" data-toggle="tab">Data Bercerita</a></li>
                        <?php }  if ($session["USER_ROLE"] == 1) { ?>
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
                            <table class="table table-border">
                              <tr>
                                <th width="5%" style="text-align:center">Id</th>
                                <th width="25%">Nama Siswa</th>
                                <th width="15%">NIS</th>
                                <th width="20%">Tgl Report</th>
                                <th width="20%">Status</th>
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td style="text-align:center">{{ data.BERCERITA_ID }}</td>
                                  <td>{{ data.USER_NAME }}</td>
                                  <td>{{ data.DTL_NIS }}</td>
                                  <td>{{ data.BERCERITA_UPDATE }}</td>
                                  <td><font style="font-weight:800;color:red">{{ data.REFF_NAME }}</font></td>
                                  <td style="text-align:center">
                                    <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.BERCERITA_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>
                                    <div class="modal fade" v-bind:id="'modal-default' + data.BERCERITA_ID">
                                      <div class="modal-dialog" style="width:80%">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{data.USER_NAME}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                              <div class="box-body" style="margin-bottom:30px">
                                                <iframe v-bind:src="'view/frame/detailBercerita.php?id=' + data.BERCERITA_ID" width="100%" height="400" style="border:none;overflow:hidden;"></iframe>
                                              </div>
                                              <!-- /.box-body -->

                                              <div class="box-footer">
                                                <?php if($menu != 1) { ?>
                                                  <table width="100%">
                                                  <tr>
                                                    <td><button type="button" v-bind:onclick="'reject(' + data.BERCERITA_ID + ')'"/ class="btn btn-danger"  style="width:100%"> <i class="fa fa-times"></i> Reject </button></td>
                                                    <td><button type="button" v-bind:onclick="'approve(' + data.BERCERITA_ID + ')'"/ class="btn btn-success"  style="width:100%"> <i class="fa fa-check"></i> Approve </button></td>
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
                          <?php
                          if ($session["USER_ROLE"] == 1) {
                            $nis       = $session["DTL_NIS"];
                            $sql       = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_buku_bercerita` WHERE `BERCERITA_NIS` = '$nis'");
                            $bercerita = json_decode(json_encode(mysqli_fetch_assoc($sql)), TRUE);
                           ?>
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
                                      <input type="text" disabled value="<?php echo $nis; ?>" class="form-control">
                                      <td>
                                        <input type="hidden" name="BERCERITA_NIS" value="<?php echo $session["DTL_NIS"]; ?>">
                                        <input type="hidden" name="BERCERITA_ID" value="<?php echo $bercerita["BERCERITA_ID"]; ?>">
                                       </td>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Januari</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_JAN" value="<?php echo $bercerita["BERCERITA_JAN"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Februari</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_FEB" value="<?php echo $bercerita["BERCERITA_FEB"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Maret</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_MAR" value="<?php echo $bercerita["BERCERITA_MAR"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>April</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_APR" value="<?php echo $bercerita["BERCERITA_APR"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Mei</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_MEI" value="<?php echo $bercerita["BERCERITA_MEI"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Juni</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_JUN" value="<?php echo $bercerita["BERCERITA_JUN"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Juli</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_JUL" value="<?php echo $bercerita["BERCERITA_JUL"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Agustus</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_AUG" value="<?php echo $bercerita["BERCERITA_AUG"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>September</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_SEP" value="<?php echo $bercerita["BERCERITA_SEP"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Oktober</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_OKT" value="<?php echo $bercerita["BERCERITA_OKT"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>November</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_NOV" value="<?php echo $bercerita["BERCERITA_NOV"]; ?>" class="form-control"> </td>
                                  </tr>
                                  <tr>
                                    <td>Desember</td>
                                    <td>:</td>
                                    <td> <input type="text" name="BERCERITA_DES" value="<?php echo $bercerita["BERCERITA_DES"]; ?>" class="form-control"> </td>
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
<script type="text/javascript">
  start   = <?php echo $start; ?>;
  var url = "<?php echo $urlApi; ?>";
  new Vue({
      el: '#bercerita',
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
              table: 'tx_hdr_buku_bercerita as A',
              innerJoin : [
                {
                  table : 'tx_dtl_user_siswa as B',
                  field1 : 'B.DTL_NIS',
                  field2 : 'A.BERCERITA_NIS'
                },
                {
                  table : 'tx_hdr_user as C',
                  field1 : 'B.DTL_HDR_ID',
                  field2 : 'C.USER_ID'
                },
                {
                  table : 'TM_REFF as D',
                  field1 : 'A.BERCERITA_STATUS',
                  field2 : 'D.REFF_ID'
                }
              ],
              where : [
                ["REFF_TR_ID", "=", "2"]
              ],
              start: start,
              selectraw : 'A.*, B.*, C.*, D.*',
              orderBy: ['A.BERCERITA_ID', 'DESC'],
              limit: 25
            })
        .then(response => (this.info = response["data"]["result"]))
      }
    })
</script>
