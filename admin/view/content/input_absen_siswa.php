<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <!-- Program Tahunan -->
      <!-- <small>New Hotel</small> -->
    </h1>
  </section>

  <?php
  $query              = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_absen_siswa` ORDER BY `ABSEN_ID` DESC LIMIT 1");
  $lastId             = json_decode(json_encode(mysqli_fetch_assoc($query)),TRUE);
  $lastId             = $lastId["ABSEN_ID"]+1;
  if (empty($query)) {
    $lastId = 1;
  }
   ?>

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
                <form role="form" action="app/model/AbsenModel.php?id=siswa" method="post" enctype="multipart/form-data">
                  <div class="box-body table-responsive">
                    <table width="100%" class="table order-list">
                      <tr>
                        <td width="15%"><b>Nama Guru<b></td>
                        <td width="2%">:</td>
                        <td colspan="2">
                          <?php if (isset($_REQUEST['guru'])) { ?>
                            <input type="text" class="form-control border-bottom-only" name="ABSEN_GURU" id="guru" value="<?php echo $_REQUEST['guru']; ?>">
                          <?php } else { ?>
                            <input type="text" class="form-control border-bottom-only" name="ABSEN_GURU" id="guru" value="">
                          <?php } ?>
                          <input type="hidden" class="form-control border-bottom-only" name="ABSEN_NO_PENGAJUAN" value="ABSEN<?php echo date('dmy').$lastId; ?>">
                          <input type="hidden" class="form-control border-bottom-only" name="ABSEN_USER_ID" value="<?php echo $session["USER_ID"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tingkat / Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <select class="form-control" id="tingkat" name="ABSEN_TINGKAT">
                            <?php if (isset($_REQUEST['tingkat'])) { ?>
                              <option  selected value="<?php $tingkat = $_REQUEST['tingkat']; echo $tingkat; ?>"><?php echo $tingkat; ?></option>
                            <?php } else { ?>
                              <option selected>-- Tingkat --</option>
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
                          <select class="form-control" id="kelas" onchange="Kelas()" name="ABSEN_KELAS">
                            <?php if (isset($_REQUEST['kelas'])) { ?>
                              <option selected value="<?php $kelas = $_REQUEST['kelas']; echo $kelas; ?>"><?php echo $kelas; ?></option>
                            <?php } else { ?>
                              <option selected>-- Kelas --</option>
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
                        <td colspan="4">Absensi</td>
                        <td rowspan="2" style="vertical-align:middle;">Keterangan</td>
                      </tr>
                      <tr style="text-align:center">
                        <td>Hadir</td>
                        <td>Izin</td>
                        <td>Sakit</td>
                        <td>Alfa</td>
                      </tr>
                      <template v-for="data in info">
                        <tr>
                          <td width="6%"><input type="input" name="nis[]" v-bind:value="data.DTL_NIS" style="border:none"></td>
                          <td width="25%">
                            <input type="input" name="username[]" v-bind:value="data.USER_NAME" style="border:none">
                          </td>
                          <td><center><input type="checkbox" name="absen[]" value="0"></center> </td>
                          <td><center><input type="checkbox" name="absen[]" value="1"></center></td>
                          <td><center><input type="checkbox" name="absen[]" value="2"></center></td>
                          <td><center><input type="checkbox" name="absen[]" value="3"></center></td>
                          <td><input type="text" class="form-control" name="keterangan[]"></td>
                        </tr>
                      </template>
                    </form>
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
  window.location = "<?php echo $urlAbsenSiswa; ?>"+guru+"&tingkat="+tingkat+"&kelas="+kelas;
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
        ["DTL_KELAS", "=",kelasA]
      ],
      "start": 0,
      "limit": 25
    })
    .then(response => (this.info = response["data"]["result"]))
  }
})
</script>
