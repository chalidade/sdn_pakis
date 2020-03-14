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
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title" style="text-transform:uppercase"><b>Absensi Siswa</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="proses/route.php?page=input_booking" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table width="100%" class="table order-list">
                      <tr>
                        <td width="15%"><b>Nama Guru<b></td>
                        <td width="2%">:</td>
                        <td colspan="2">
                          <?php if (isset($_REQUEST['guru'])) { ?>
                            <input type="text" class="form-control border-bottom-only" name="" id="guru" value="<?php echo $_REQUEST['guru']; ?>">
                          <?php } else { ?>
                            <input type="text" class="form-control border-bottom-only" name="" id="guru" value="">
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tingkat / Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <select class="form-control" id="tingkat" name="tingkat">
                            <?php if (isset($_REQUEST['tingkat'])) { ?>
                              <option  disabled selected value="<?php $tingkat = $_REQUEST['tingkat']; echo $tingkat; ?>"><?php echo $tingkat; ?></option>
                            <?php } else { ?>
                              <option selected disabled>-- Tingkat --</option>
                            <?php } ?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" id="kelas" onchange="Kelas()" name="kelas">
                            <?php if (isset($_REQUEST['kelas'])) { ?>
                              <option disabled selected value="<?php $kelas = $_REQUEST['kelas']; echo $kelas; ?>"><?php echo $kelas; ?></option>
                            <?php } else { ?>
                              <option selected disabled>-- Kelas --</option>
                            <?php } ?>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                          </select>
                        </td>
                      </tr>
                    </table>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="app" style="margin-top:20px">
                      <tr style="text-align:center;">
                        <td rowspan="2" style="vertical-align:middle;">NIS</td>
                        <td rowspan="2" style="vertical-align:middle;">Nama Siswa</td>
                        <td colspan="2">Absensi</td>
                        <td rowspan="2" style="vertical-align:middle;">Keterangan</td>
                      </tr>
                      <tr style="text-align:center">
                        <td>Hadir</td>
                        <td>Absen</td>
                      </tr>
                      <template v-for="data in info">
                        <tr>
                          <td width="6%">{{ data.DTL_NIS }}</td>
                          <td width="25%">
                            {{data.USER_NAME}}
                          </td>
                          <td><center><input type="checkbox" name="absen[]" value="1"></center> </td>
                          <td><center><input type="checkbox" name="absen[]" value="0"></center></td>
                          <td><input type="text" class="form-control" name="keterangan[]"></td>
                        </tr>
                      </template>
                    <!-- <tr>
                      <td>#</td>
                      <td>Jumlah</td>
                      <td style="text-align:center">2</td>
                      <td style="text-align:center">0</td>
                      <td>
                        <table width="100%">
                          <tr>
                            <td>Total Siswa</td>
                            <td width="20%">: 2</td>
                            <td>Hadir</td>
                            <td width="20%">: 2</td>
                            <td>Absen</td>
                            <td width="20%">: 0</td>
                          </tr>
                        </table>
                      </td>
                    </tr> -->
                  </table>
                  </div>
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
<!-- /.content-wrapper -->

<script type="text/javascript">
var url         = "<?php echo $urlApi; ?>";
var tingkatA    = "<?php echo $tingkat;?>";
var kelasA      = "<?php echo $kelas;?>";

function Kelas() {
  var guru      = document.getElementById("guru").value;
  var tingkat   = document.getElementById("tingkat").value;
  var kelas     = document.getElementById("kelas").value;
window.location = "http://localhost/sdn_pakis_baru/admin/index.php?id=input_absen_siswa&guru="+guru+"&tingkat="+tingkat+"&kelas="+kelas;
}

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
      "table"     : "tx_hdr_user as A",
      "innerJoin" : [
        {
          "table": "tx_dtl_user_siswa as B",
          "field1": "A.USER_ID",
          "field2": "B.DTL_HDR_ID"
        }
      ],
      "where": [
        [
          "A.USER_ROLE",
          "=",
          "1"
        ],
        ["DTL_TINGKAT", "=",tingkatA],
        ["DTL_KELAS", "=","A"]
      ],
      "start": 0,
      "limit": 25
    })
    .then(response => (this.info = response["data"]["result"]))
  }
})
</script>
