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
                  <h2 class="page-header">Data Siswa</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab_1" data-toggle="tab">Data Siswa</a></li>
                          <li><a href="#tab_2" data-toggle="tab">Tambah Data Siswa</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="table-responsive">
                            <?php
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                             ?>
                            <table cellpadding="10" id="app" class="table table-border" width="100%">
                              <tr>
                                <th width="6%">Nis</th>
                                <th width="25%">Nama Siswa</th>
                                <th width="15%">Kelas</th>
                                <th width="10%" style="text-align:center">Telpon</th>
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td width="6%">{{ data.DTL_NIS }}</td>
                                  <td width="25%">
                                    {{data.USER_NAME}}
                                  </td>
                                  <td width="15%">{{ data.DTL_TINGKAT }} {{ data.DTL_KELAS }}</td>
                                  <td width="10%" style="text-align:center">{{ data.DTL_PHONE }}</td>
                                  <td width="20%" style="text-align:center">
                                    <!-- <button type="button" v-bind:onclick="'EDIT_USER(' + data.USER_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-warning option"> <i class="fa fa-pencil"></i> </button> -->
                                    <!-- <button type="button" v-bind:onclick="'DELETE_USER(' + data.USER_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-danger option"><i class="fa fa-trash"></i></button> -->
                                    <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.USER_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>

                                    <div class="modal fade" v-bind:id="'modal-default' + data.USER_ID">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{data.USER_NAME}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                            <div class="table-responsive">
                                              <table class="table table-border">
                                                <tr>
                                                  <td rowspan="8" width="40%" style="vertical-align:middle;vertical-align:top">
                                                    <label class="" for="imgSlider1">
                                                      <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicUser ?>' + data.USER_PHOTO"/ style='width:100%;padding:5px' alt=''>
                                                      <div class="sliderChangePicture" style="border:1px solid;background: white;width:100%;margin-top:0px;padding:0px 10px;">
                                                        <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                                                      </div>
                                                    </label>
                                                  </td>
                                                  <td width="20%" style="font-weight:800">NIS</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" v-bind:value="data.DTL_NIS" style="width:100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Nama Lengkap</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" v-bind:value="data.USER_NAME" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Email</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="email" v-bind:value="data.USER_EMAIL" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Nomor Telpon</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" v-bind:value="data.DTL_PHONE" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Alamat</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" v-bind:value="data.USER_ADDRESS" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">TTL</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" v-bind:value="data.USER_BIRTHPLACE" style="width: 35%;border:none;">, <input type="text" v-bind:value="data.USER_BIRTHDATE" style="width: 50%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Nama Ayah</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" v-bind:value="data.DTL_AYAH" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Nama Ibu</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" v-bind:value="data.DTL_IBU" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4" style="font-weight:800"> Rincian Prestasi : </td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4">
                                                    <textarea name="name" rows="8" cols="60" style="border:none">{{data.DTL_PRESTASI}}</textarea>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4">
                                                    <table width="100%">
                                                      <tr>
                                                        <td><button class="btn btn-success" name="button" style="width:100%">Edit</button></td>
                                                        <td width="1%"></td>
                                                        <td width="10%"><button type="button" v-bind:onclick="'DELETE_USER(' + data.USER_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-danger" style="width:100%"><i class="fa fa-trash"></i></button></td>
                                                      </tr>
                                                    </table>
                                                  </td>
                                                </tr>
                                              </table>
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
                                <td colspan="3">
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
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="row">
                              <div class="col-md-12">
                                <form action="app/model/SiswaModel.php?id=insert" method="post" enctype="multipart/form-data">
                                <label class="container" for="imgSlider1" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                                  <input type="file" id="imgSlider1" name="DTL_PHOTO" value="" style="display:none">
                                  <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:150px;padding:5px 10px;">
                                    <center>
                                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                                    </center>
                                  </div>
                                </label>
                              </div>
                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  NIS
                                  <input required type="text" id="title" class="form-control" name="DTL_NIS" value="">
                                </label>
                              </div>

                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  Nama Lengkap
                                  <input required type="text" id="title" class="form-control" name="USER_NAME" value="">
                                </label>
                              </div>

                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  Email
                                  <input required type="text" id="title" class="form-control" name="USER_EMAIL" value="">
                                </label>
                              </div>

                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  Nomor Telpon
                                  <input required type="text" id="title" class="form-control" name="DTL_PHONE" value="">
                                </label>
                              </div>

                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  Alamat
                                  <input required type="text" id="title" class="form-control" name="USER_ADDRESS" value="">
                                </label>
                              </div>

                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  Tempat, Tanggal Lahir
                                  <table width="100%">
                                    <tr>
                                      <td width="30%"><input required type="text" id="title" class="form-control" name="USER_BIRTHPLACE" value=""></td>
                                      <td><input required type="date" id="title" class="form-control" name="USER_BIRTHDAY" value="" style="padding:0px;padding-left:10px"></td>
                                    </tr>
                                  </table>
                                </label>
                              </div>

                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  Kelas
                                  <table width="100%">
                                    <tr>
                                      <td width="30%">
                                        <select class="form-control" id="tingkat" name="DTL_TINGKAT">
                                          <option selected>-- Tingkat --</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                        </select>
                                      </td>
                                      <td>
                                        <select class="form-control" id="title" onchange="Kelas()" name="DTL_KELAS">
                                          <option selected>-- Kelas --</option>
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
                                </label>
                              </div>

                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  Nama Ayah
                                  <input required type="text" id="title" class="form-control" name="DTL_AYAH" value="">
                                </label>
                              </div>

                              <div class="col-md-12">
                                <label for="title" style="width:100%">
                                  Nama Ibu
                                  <input required type="text" id="title" class="form-control" name="DTL_IBU" value="">
                              </label>
                              </div>

                              <div class="col-md-12">
                                <button type="submit" class="btn btn-success" name="button" style="width:100%;margin-top:20px">Simpan</button>
                              </div>
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
          	"PK"     : ["USER_ID",id]
          },

          "DETAIL": {
          	"DB"     : dbapi,
        	"TABLE"  : "tx_dtl_user_siswa",
        	"FK"     : ["DTL_HDR_ID","USER_ID"]
          }
        })
        .then(response => (alert(this.info = response["data"])))
        .then(response=>(window.location = "<?php echo $urlDataSiswa; ?>"+start+"&page="+page));
      }
    })
}

function EDIT_USER(id, start, page) {
  alert(id);
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
                  ]
              ],
              "start": start,
              "limit": 25
          })
        .then(response => (this.info = response["data"]["result"]))
      }
    })
</script>
