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
                  <h2 class="page-header">Raport Siswa</h2>
                  <?php $role = $session["USER_ROLE"]; ?>
                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Data Raport</a></li>
                          <?php if ($role != 1) { ?>
                            <li><a href="#tab_2" data-toggle="tab">Input Raport</a></li>
                          <?php } ?>
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
                                <th width="15%" style="text-align:center">NIS</th>
                                <th width="25%">Nama Siswa</th>
                                <th width="15%">Kelas</th>
                                <th width="15%">Guru</th>
                                <!-- <th width="15%">Tahun Ajaran</th> -->
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td width="5%" style="text-align:center">{{ data.RAPORT_ID }}</td>
                                  <td width="15%" style="text-align:center">{{ data.RAPORT_NIS }}</td>
                                  <td width="15%">
                                    {{ data.USER_NAME }}
                                  </td>
                                  <td width="20%">{{ data.DTL_TINGKAT }} {{ data.DTL_KELAS }}</td>
                                  <td width="25%">{{ data.RAPORT_GURU }}</td>
                                  <!-- <td width="25%">{{ data.RAPORT_TAHUN }}</td> -->
                                  <td width="20%" style="text-align:center">
                                    <button type="button" v-bind:onclick="'DELETE_RAPORT(' + data.RAPORT_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-danger option"><i class="fa fa-trash"></i></button>
                                    <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.RAPORT_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>

                                    <div class="modal fade" v-bind:id="'modal-default' + data.RAPORT_ID">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" style="text-transform:uppercase">{{data.RAPORT_JUDUL}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                            <iframe v-bind:src="'<?php echo $publicReport ?>' + data.RAPORT_FILE" width="100%" height="500px"></iframe>
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
                                    if ($role == 1) {
                                      $nis = $siswa["DTL_NIS"];
                                    } else {
                                      $nip = $session["USER_ID"];
                                    }
                                    $prev = $start-25;
                                    if ($prev < 0) $prev = 0;
                                    $next = $start+25;
                                   ?>
                                  <a href="<?php echo $urlRaport.$prev; ?>&menu=1" type="button" name="button" class="btn btn-primary"><</a>
                                </td>
                                <td colspan="3">
                                  <a href="<?php echo $urlRaport.$next; ?>&menu=1" style="float:right" type="button" class="btn btn-primary">></a>
                                </td>
                              </tr>
                            </table>
                          </div>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="row">
                              <div class="col-md-12">
                                <form action="app/model/RaportModel.php?id=insert" method="post" enctype="multipart/form-data">
                              </div>
                              <div class="col-md-12">
                                  <label for="title" style="width:100%">
                                    NIS
                                    <input type="hidden" id="title" class="form-control" name="RAPORT_ID" value="" style="line-height:15px">
                                    <input type="text" placeholder="3124" required  id="title" class="form-control" name="RAPORT_NIS" value="">
                                    <input type="hidden" required id="title" class="form-control" name="RAPORT_USER_ID" value="<?php echo $session["USER_ID"]; ?>">
                                    <input type="hidden" id="title" class="form-control" name="RAPORT_GURU" value="<?php echo $session["USER_NAME"]; ?>">
                                  </label>
                                  <!-- <label for="title" style="width:100%">
                                    Nama Siswa
                                    <input type="text" placeholder="Anisa" required id="title" class="form-control" name="RAPORT_NAMA_SISWA" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Kelas
                                    <input type="text" placeholder="1A" required id="title" class="form-control" name="RAPORT_KELAS" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Mata Pelajaran
                                    <input type="text" placeholder="Bahasa Indonesia" required id="title" class="form-control" name="RAPORT_MAPEL" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Tahun
                                    <input type="text" placeholder="2020" id="title" class="form-control" name="RAPORT_TAHUN" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Guru
                                    <input type="text" required class="form-control" disabled value="<?php echo $session["USER_NAME"]; ?>">
                                  </label> -->
                                  <label for="raport" style="width:100%;margin-top:10px">
                                    Upload Raport
                                    <input type="file" required id="raport" class="form-control" name="RAPORT_FILE" value="">
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
    var role = "<?php echo $role; ?>";
    start   = <?php echo $start; ?>;
    var url = "<?php echo $urlApi; ?>";

    function DELETE_RAPORT(id, start, page) {
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
              table: 'tx_hdr_raport',
              where : ["RAPORT_ID", id]
            })
            .then(response => (alert(this.info = response["data"])))
          }
        })
        window.location = "<?php echo $urlRaport; ?>"+start+"&page="+page;
    }

    if (role === "1") {
      var nis  = "<?php echo $nis; ?>";
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
            table: 'tx_hdr_raport as A',
            start: start,
            innerJoin: [
                {
                    "table": "tx_dtl_user_siswa as B",
                    "field1": "B.DTL_NIS",
                    "field2": "A.RAPORT_NIS"
                },
                {
                    "table": "tx_hdr_user as C",
                    "field1": "C.USER_ID",
                    "field2": "B.DTL_HDR_ID"
                }
            ],
            where: [["RAPORT_NIS", "=", nis]],
            orderBy: ['RAPORT_ID', 'DESC'],
            limit: 25
          })
          .then(response => (this.info = response["data"]["result"]))
        }
      })
    } else {
      var nip  = "<?php echo $nip; ?>";
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
            table: 'tx_hdr_raport as A',
            innerJoin: [
                {
                    "table": "tx_dtl_user_siswa as B",
                    "field1": "B.DTL_NIS",
                    "field2": "A.RAPORT_NIS"
                },
                {
                    "table": "tx_hdr_user as C",
                    "field1": "C.USER_ID",
                    "field2": "B.DTL_HDR_ID"
                }
            ],
            start: start,
            where: [["RAPORT_USER_ID", "=", nip]],
            orderBy: ['RAPORT_ID', 'DESC'],
            limit: 25
          })
          .then(response => (this.info = response["data"]["result"]))
        }
      })
    }
</script>
