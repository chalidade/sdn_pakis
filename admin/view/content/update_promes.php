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
  <section class="content container-fluid" id="promesapi">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title"><b>PROGRAM SEMESTER</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="app/model/PromesModel.php?id=update" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Satuan Pendidikan<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="hidden" name="PROMES_ID" v-bind:value="header[0].PROMES_ID">
                          <input type="text" required class="form-control border-bottom-only" name="PROMES_SATUAN_PENDIDIKAN" v-bind:value="header[0].PROMES_SATUAN_PENDIDIKAN">
                          <input type="hidden" class="form-control border-bottom-only" name="PROMES_NO_PENGAJUAN" v-bind:value="header[0].PROMES_NO_PENGAJUAN">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tahun Ajaran</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROMES_TAHUN_AJARAN" v-bind:value="header[0].PROMES_TAHUN_AJARAN">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROMES_KELAS" v-bind:value="header[0].PROMES_KELAS">
                          <input type="hidden" name="PROMES_USER_ID" value="<?php echo $session['USER_ID']; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Semester</b></td>
                        <td width="2%">:</td>
                        <td>
                          <select class="form-control" name="PROMES_SEMESTER" id="SEMESTER">
                              <option v-bind:value="header[0].PROMES_SEMESTER" v-if="header[0].PROMES_SEMESTER == 1">Semester Ganjil</option>
                              <option v-bind:value="header[0].PROMES_SEMESTER" v-if="header[0].PROMES_SEMESTER == 2">Semester Genap</option>
                          </select>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <table class="text-center" border="1" width="100%">
                      <!-- Semester Genap -->
                      <tr v-if="header[0].PROMES_SEMESTER == 1">
                        <th rowspan="2" width='10%'>Tema</th>
                        <th rowspan="2" width='20%'>Sub Tema<br>Kompetensi Dasar</th>
                        <th rowspan="2" width='10%'>Alokasi Waktu</th>
                        <th colspan="5" width="10%">Juli</th>
                        <th colspan="5" width="10%">Agustus</th>
                        <th colspan="5" width="10%">September</th>
                        <th colspan="5" width="10%">Oktober</th>
                        <th colspan="5" width="10%">November</th>
                        <th colspan="5" width="10%">Desember</th>
                      </tr>
                      <!-- Semester Ganjil -->
                      <tr v-if="header[0].PROMES_SEMESTER == 2">
                        <th rowspan="2" width='10%'>Tema</th>
                        <th rowspan="2" width='20%'>Sub Tema<br>Kompetensi Dasar</th>
                        <th rowspan="2" width='10%'>Alokasi Waktu</th>
                        <th colspan="5" width="10%">January</th>
                        <th colspan="5" width="10%">February</th>
                        <th colspan="5" width="10%">Maret</th>
                        <th colspan="5" width="10%">April</th>
                        <th colspan="5" width="10%">Mei</th>
                        <th colspan="5" width="10%">Juni</th>
                      </tr>
                      <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                      </tr>
                      <template v-for="data in detail">
                        <tr>
                          <td><input required type='text' name='DTL_TEMA[]'          style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_TEMA"></input></td>
                          <td><input required type='text' name='DTL_KOMPETENSI[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_KOMPETENSI"></input></td>
                          <td><input required type='text' name='DTL_ALOKASI_WAKTU[]' style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_ALOKASI_WAKTU"></input></td>
                          <td><input required type='text' name='DTL_BLN_SATU_A[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SATU_A"></input></td>
                          <td><input required type='text' name='DTL_BLN_SATU_B[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SATU_B"></input></td>
                          <td><input required type='text' name='DTL_BLN_SATU_C[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SATU_C"></input></td>
                          <td><input required type='text' name='DTL_BLN_SATU_D[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SATU_D"></input></td>
                          <td><input required type='text' name='DTL_BLN_SATU_E[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SATU_E"></input></td>
                          <td><input required type='text' name='DTL_BLN_DUA_A[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_DUA_A"></input></td>
                          <td><input required type='text' name='DTL_BLN_DUA_B[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_DUA_B"></input></td>
                          <td><input required type='text' name='DTL_BLN_DUA_C[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_DUA_C"></input></td>
                          <td><input required type='text' name='DTL_BLN_DUA_D[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_DUA_D"></input></td>
                          <td><input required type='text' name='DTL_BLN_DUA_E[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_DUA_E"></input></td>
                          <td><input required type='text' name='DTL_BLN_TIGA_A[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_TIGA_A"></input></td>
                          <td><input required type='text' name='DTL_BLN_TIGA_B[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_TIGA_B"></input></td>
                          <td><input required type='text' name='DTL_BLN_TIGA_C[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_TIGA_C"></input></td>
                          <td><input required type='text' name='DTL_BLN_TIGA_D[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_TIGA_D"></input></td>
                          <td><input required type='text' name='DTL_BLN_TIGA_E[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_TIGA_E"></input></td>
                          <td><input required type='text' name='DTL_BLN_EMPAT_A[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_EMPAT_A"></input></td>
                          <td><input required type='text' name='DTL_BLN_EMPAT_B[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_EMPAT_B"></input></td>
                          <td><input required type='text' name='DTL_BLN_EMPAT_C[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_EMPAT_C"></input></td>
                          <td><input required type='text' name='DTL_BLN_EMPAT_D[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_EMPAT_D"></input></td>
                          <td><input required type='text' name='DTL_BLN_EMPAT_E[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_EMPAT_E"></input></td>
                          <td><input required type='text' name='DTL_BLN_LIMA_A[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SLIMAA"></input></td>
                          <td><input required type='text' name='DTL_BLN_LIMA_B[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SLIMAB"></input></td>
                          <td><input required type='text' name='DTL_BLN_LIMA_C[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SLIMAC"></input></td>
                          <td><input required type='text' name='DTL_BLN_LIMA_D[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SLIMAD"></input></td>
                          <td><input required type='text' name='DTL_BLN_LIMA_E[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_SLIMAE"></input></td>
                          <td><input required type='text' name='DTL_BLN_ENAM_A[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_ENAM_A"></input></td>
                          <td><input required type='text' name='DTL_BLN_ENAM_B[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_ENAM_B"></input></td>
                          <td><input required type='text' name='DTL_BLN_ENAM_C[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_ENAM_C"></input></td>
                          <td><input required type='text' name='DTL_BLN_ENAM_D[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_ENAM_D"></input></td>
                          <td><input required type='text' name='DTL_BLN_ENAM_E[]'    style='width:100%;border:none;text-align:center' v-bind:value="data.DTL_BLN_ENAM_E"></input></td>

                        </tr>
                      </template>
                    </table>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success" style="width:100%">Simpan</button>
                  </div>
                </form>
              </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<script type="text/javascript">
var url     = "<?php echo $urlApi; ?>";
var data    = "<?php echo $data; ?>";
new Vue({
  el: '#promesapi',
  data () {
    return {
      header: null,
      detail : null
    }
  },
  mounted () {
    axios
    .post(url+'/index', {
      "action" : "viewHeaderDetail",
      "data"   : ["HEADER", "DETAIL"],
      "HEADER" : {
      	"DB"     : "sdnpakis",
      	"TABLE"  : "tx_hdr_promes",
      	"PK"     : ["PROMES_ID",data]
      },
      "DETAIL" : {
      	"DB"     : "sdnpakis",
      	"TABLE"  : "tx_dtl_promes",
      	"FK"     : ["DTL_HDR_ID","PROMES_ID"]
      }
    })
    .then(response => (this.header = response["data"]["HEADER"],this.detail = response["data"]["DETAIL"]))
  }
})
</script>
<!-- /.content-wrapper -->
