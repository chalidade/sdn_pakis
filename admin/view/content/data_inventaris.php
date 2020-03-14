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
                  <h2 class="page-header">Data Inventaris</h2>

                  <div class="row">
                    <div class="col-md-12">
                      <!-- Custom Tabs -->
                      <div class="nav-tabs-custom">
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_1">
                            <div class="table-responsive">
                            <?php
                            $start  = $_REQUEST['start'];
                            $page   = 1;
                             ?>
                            <table cellpadding="10" id="app" class="table table-border" width="100%">
                              <tr>
                                <th width="6%">No</th>
                                <th width="25%">Nama Sekolah</th>
                                <th width="10%" style="text-align:center">Staff</th>
                                <th width="10%" style="text-align:center">Tanggal</th>
                                <th width="20%" style="text-align:center">Option</th>
                              </tr>
                              <template  v-for="data in info">
                                <tr>
                                  <td width="6%">{{ data.SARPRAS__HDR_ID }}</td>
                                  <td width="25%">
                                    {{data.SARPRAS_HDR_NAMA_SEKOLAH}}
                                  </td>
                                  <td width="10%" style="text-align:center">{{ data.USER_NAME }}</td>
                                  <td width="10%" style="text-align:center">{{ data.SARPRAS_HDR_UPDATE_DATE }}</td>
                                  <td width="20%" style="text-align:center">
                                  <button type="button"  data-toggle="modal" v-bind:data-target="'#modal-default' + data.PROTA_ID" class="btn btn-primary option"><i class="fa fa-eye"></i></button>

                                    <div class="modal fade" v-bind:id="'modal-default' + data.PROTA_ID">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{data.USER_NAME}}</h4>
                                          </div>
                                          <div class="modal-body" style="text-align:left">
                                            <form action="app/model/SiswaModel.php?id=insert" method="post" enctype="multipart/form-data">
                                            <div class="table-responsive">
                                              <table class="table table-border">
                                                <tr>
                                                  <td rowspan="7" width="40%" style="vertical-align:middle">
                                                    <label class="" for="imgSlider1">
                                                      <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicSiswa ?>' + data.DTL_PHOTO"/ style='width:100%;padding:5px' alt=''>
                                                      <input type="file" id="imgSlider1" name="DTL_PHOTO" style="display:none">
                                                      <input type="hidden" name="DTL_PHOTO_BACKUP" v-bind:value="data.DTL_PHOTO">
                                                      <div class="sliderChangePicture" style="border:1px solid;background: white;width:100%;margin-top:0px;padding:0px 10px;">
                                                        <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                                                      </div>
                                                    </label>
                                                  </td>
                                                  <td width="20%" style="font-weight:800">NIS</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" name="DTL_NIS" v-bind:value="data.DTL_NIS" style="width:100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Nama Lengkap</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" name="DTL_NIS" v-bind:value="data.USER_NAME" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Email</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" name="DTL_NIS" v-bind:value="data.USER_EMAIL" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Alamat</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" name="DTL_NIS" v-bind:value="data.USER_ADDRESS" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">TTL</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" name="DTL_NIS" v-bind:value="data.USER_BIRTHPLACE" style="width: 35%;border:none;">, <input type="text" name="DTL_NIS" v-bind:value="data.USER_BIRTHDATE" style="width: 50%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Nama Ayah</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" name="DTL_NIS" v-bind:value="data.DTL_AYAH" style="width: 100%;border:none;"></td>
                                                </tr>
                                                <tr>
                                                  <td width="20%" style="font-weight:800">Nama Ibu</td>
                                                  <td width="1%">:</td>
                                                  <td><input type="text" name="DTL_NIS" v-bind:value="data.DTL_IBU" style="width: 100%;border:none;"></td>
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
                                                        <td><button type="submit" class="btn btn-success" name="button" style="width:100%">Edit</button></td>
                                                        <td width="1%"></td>
                                                        <td width="10%"><button type="button" v-bind:onclick="'DELETE_USER(' + data.PROTA_ID + ',<?php echo $start; ?>,<?php echo $page; ?>)'"/ class="btn btn-danger" style="width:100%"><i class="fa fa-trash"></i></button></td>
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
            "action": "list",
            "db": "sdnpakis",
            "table": "tx_hdr_sarpras as A",
            "innerJoin": [
                {
                    "table": "tx_hdr_user as B",
                    "field1": "A.SARPRAS_HDR_UPDATE_BY",
                    "field2": "B.USER_ID"
                }
            ],
            "start": start,
            "limit": 25
        })
        .then(response => (this.info = response["data"]["result"]))
      }
    })
</script>
