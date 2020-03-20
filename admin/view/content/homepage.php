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
        <div class="box box-primary collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Slider</h3>
            <div class="box-tools pull-right">
              <!-- Collapse Button -->
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row" id="slider">
              <form class="" action="app/model/HomeModel.php?id=slider" method="post" enctype="multipart/form-data">
              <div class="col-md-3">
                  <label class="" for="imgSlider1" style="height:150px;border:solid thin #000;width:100%">
                    <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Slider/' + info[0].SLIDER_IMG"/ style="width: 100%; z-index: -10;height: 150px;" alt=''>
                    <input type="file" id="imgSlider1" name="SLIDER_IMG_A" style="display:none">
                    <input type="hidden" name="SLIDER_IMG_A_BACKUP" v-bind:value="info[0].SLIDER_IMG">
                    <div class="sliderChangePicture" style="border:1px solid;background: white;width:100%;margin-top:0px;padding:0px 10px;">
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </div>
                  </label>
                  <label for="title" style="width:100%;margin-top:10px">
                    ID
                    <input type="hidden" id="title" class="form-control" name="SLIDER_ID[0]" value="1">
                    <input type="text" style="font-weight: 300;" id="title" class="form-control" disabled name="SLIDER_ID[0]" value="1">
                  </label>
                  <label for="title" style="width:100%">
                    Judul
                    <input type="text" style="font-weight: 300;" id="title" class="form-control" name="SLIDER_TITLE[0]" v-bind:value="info[0].SLIDER_TITLE"/>
                  </label>
                  <label for="desc" style="width:100%">
                    Deskripsi
                    <textarea type="text" style="font-weight: 300;" id="desc" class="form-control" name="SLIDER_DESC[0]">{{info[0].SLIDER_DESC}}</textarea>
                  </label>
              </div>
              <div class="col-md-3">
                  <label class="" for="imgSlider2" style="height:150px;border:solid thin #000;width:100%">
                    <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Slider/' + info[1].SLIDER_IMG"/ style="width: 100%; z-index: -10;height: 150px;" alt=''>
                    <input type="file" id="imgSlider2" name="SLIDER_IMG_B" value="" style="display:none">
                    <input type="hidden" name="SLIDER_IMG_B_BACKUP" v-bind:value="info[1].SLIDER_IMG">
                    <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:0px;padding:0px 10px;">
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </div>
                  </label>
                  <label for="title" style="width:100%;margin-top:10px">
                    ID
                    <input type="hidden" id="title" class="form-control" name="SLIDER_ID[1]" value="2">
                    <input type="text" style="font-weight: 300;" id="title" class="form-control" disabled name="SLIDER_ID[1]" value="2">
                  </label>
                  <label for="title" style="width:100%">
                    Judul
                    <input type="text" style="font-weight: 300;" id="title" class="form-control" name="SLIDER_TITLE[1]" v-bind:value="info[1].SLIDER_TITLE"/>
                  </label>
                  <label for="desc" style="width:100%">
                    Deskripsi
                    <textarea type="text" style="font-weight: 300;" id="desc" class="form-control" name="SLIDER_DESC[1]">{{info[1].SLIDER_DESC}}</textarea>
                  </label>
              </div>
              <div class="col-md-3">
                  <label class="" for="imgSlider3" style="height:150px;border:solid thin #000;width:100%">
                    <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Slider/' + info[2].SLIDER_IMG"/ style="width: 100%; z-index: -10;height: 150px;" alt=''>
                    <input type="file" id="imgSlider3" name="SLIDER_IMG_C" value="" style="display:none">
                    <input type="hidden" name="SLIDER_IMG_C_BACKUP" v-bind:value="info[2].SLIDER_IMG">
                    <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:0px;padding:0px 10px;">
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </div>
                  </label>
                  <label for="title" style="width:100%;margin-top:10px">
                    ID
                    <input type="hidden" id="title" class="form-control" name="SLIDER_ID[2]" value="3">
                    <input type="text" style="font-weight: 300;" id="title" class="form-control" disabled name="SLIDER_ID[2]" value="3">
                  </label>
                  <label for="title" style="width:100%">
                    Judul
                    <input type="text" style="font-weight: 300;" id="title" class="form-control" name="SLIDER_TITLE[2]" v-bind:value="info[2].SLIDER_TITLE"/>
                  </label>
                  <label for="desc" style="width:100%">
                    Deskripsi
                    <textarea type="text" style="font-weight: 300;" id="desc" class="form-control" name="SLIDER_DESC[2]">{{info[2].SLIDER_DESC}}</textarea>
                  </label>
              </div>
              <div class="col-md-3">
                  <label class="" for="imgSlider4" style="height:150px;border:solid thin #000;width:100%">
                    <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Slider/' + info[3].SLIDER_IMG"/ style="width: 100%; z-index: -10;height: 150px;" alt=''>
                    <input type="file" id="imgSlider4" name="SLIDER_IMG_D" value="" style="display:none">
                    <input type="hidden" name="SLIDER_IMG_D_BACKUP" v-bind:value="info[3].SLIDER_IMG">
                    <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:0px;padding:0px 10px;">
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </div>
                  </label>
                  <label for="title" style="width:100%;margin-top:10px">
                    ID
                    <input type="hidden" id="title" class="form-control" name="SLIDER_ID[3]" value="4">
                    <input type="text" style="font-weight: 300;" id="title" class="form-control" disabled name="SLIDER_ID[3]" value="4">
                  </label>
                  <label for="title" style="width:100%">
                    Judul
                    <input type="text" style="font-weight: 300;" id="title" class="form-control" name="SLIDER_TITLE[3]" v-bind:value="info[3].SLIDER_TITLE"/>
                  </label>
                  <label for="desc" style="width:100%">
                    Deskripsi
                    <textarea type="text" style="font-weight: 300;" id="desc" class="form-control" name="SLIDER_DESC[3]">{{info[3].SLIDER_DESC}}</textarea>
                  </label>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-success" name="button" style="width:100%;margin-top:20px">Simpan</button>
              </div>
            </form>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

    <!-- Kata Pengantar  -->
      <div class="col-lg-12 col-xs-12">
        <div class="box box-warning collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Kata Pengantar</h3>
            <div class="box-tools pull-right">
              <!-- Collapse Button -->
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row" class="container" id="pengantar">
              <form class="" action="app/model/HomeModel.php?id=kataPengantar" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                <label class="" for="imgPengantar" style="height:350px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                  <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Pengantar/' + pengantar[0].PENGANTAR_IMG"/ style="width: 100%; z-index: -10;height: auto;" alt=''>
                  <input type="file" id="imgPengantar" name="PENGANTAR_IMG" value="" style="display:none">
                  <input type="hidden" name="PENGANTAR_IMG_BACKUP" v-bind:value="pengantar[0].PENGANTAR_IMG">
                  <div class="sliderChangePicture" style="border:1px solid;width:100%;padding:5px 10px;">
                    <center>
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </center>
                  </div>
                </label>
              </div>
              <div class="col-md-12">
                  <label for="title" style="width:100%;margin-top:20px;">
                    Judul
                    <input type="text" id="title" class="form-control" name="PENGANTAR_TITLE" v-bind:value="pengantar[0].PENGANTAR_TITLE" style="font-weight: 300;">
                  </label>
                  <label for="desc" style="width:100%">
                    Deskripsi
                    <textarea type="text" id="desc" class="form-control" name="PENGANTAR_DESC" style="height:150px;font-weight: 300;">{{pengantar[0].PENGANTAR_DESC}}</textarea>
                  </label>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-success" name="button" style="width:100%;margin-top:20px">Simpan</button>
              </form>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- End Kata Pengantar -->

    <!-- Fasilitas Sekolah  -->
      <div class="col-lg-12 col-xs-12">
        <div class="box box-warning collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Sarana Prasarana Sekolah</h3>
            <div class="box-tools pull-right">
              <!-- Collapse Button -->
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row" id="fasilitas">
              <form class="" action="app/model/HomeModel.php?id=fasilitasHomepage" method="post" enctype="multipart/form-data">
              <div class="col-md-4" style="margin:10px 0px;">
                <h4 style="text-align:center;font-weight:800">FASILITAS 1</h4>
                <hr>
                <!-- <label class="" for="imgFasilitas1" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                  <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Fasilitas/' + fasilitas[0].FASILITAS_IMG"/ style="width: 100%; z-index: -10;height: 200px;" alt=''>
                  <input type="file" id="imgFasilitas1" name="FASILITAS_IMG_A" style="display:none">
                  <input type="hidden" name="FASILITAS_IMG_A_BACKUP" v-bind:value="fasilitas[0].FASILITAS_IMG">
                  <div class="sliderChangePicture" style="border:1px solid;width:100%;padding:5px 10px;">
                    <center>
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </center>
                  </div>
                </label> -->
                <label for="title" style="width:100%;text-align:center;margin-top:20px">
                  Judul
                  <input type="text" id="title" class="form-control" style="text-align:center;font-weight:100" name="FASILITAS_TITLE[0]" v-bind:value="fasilitas[0].FASILITAS_TITLE">
                </label>
                <label for="desc" style="width:100%;text-align:center">
                  Deskripsi
                  <textarea type="text" id="desc" class="form-control" name="FASILITAS_DESC[0]" style="text-align:center;font-weight: 300;height:150px">{{fasilitas[0].FASILITAS_DESC}}</textarea>
                </label>
              </div>

              <div class="col-md-4" style="margin:10px 0px;">
                <h4 style="text-align:center;font-weight:800">FASILITAS 2</h4>
                <hr>
                <!-- <label class="" for="imgFasilitas2" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                  <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Fasilitas/' + fasilitas[1].FASILITAS_IMG"/ style="width: 100%; z-index: -10;height: 200px;" alt=''>
                  <input type="file" id="imgFasilitas2" name="FASILITAS_IMG_B" style="display:none">
                  <input type="hidden" name="FASILITAS_IMG_B_BACKUP" v-bind:value="fasilitas[1].FASILITAS_IMG">
                  <div class="sliderChangePicture" style="border:1px solid;width:100%;padding:5px 10px;">
                    <center>
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </center>
                  </div>
                </label> -->
                <label for="title" style="width:100%;text-align:center;margin-top:20px">
                  Judul
                  <input type="text" id="title" class="form-control" style="text-align:center;font-weight:100" name="FASILITAS_TITLE[1]" v-bind:value="fasilitas[1].FASILITAS_TITLE">
                </label>
                <label for="desc" style="width:100%;text-align:center">
                  Deskripsi
                  <textarea type="text" id="desc" class="form-control" name="FASILITAS_DESC[1]" style="text-align:center;font-weight: 300;height:150px">{{fasilitas[1].FASILITAS_DESC}}</textarea>
                </label>
              </div>
              <div class="col-md-4" style="margin:10px 0px;">
                <h4 style="text-align:center;font-weight:800">FASILITAS 3</h4>
                <hr>
                <!-- <label class="" for="imgFasilitas3" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                  <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Fasilitas/' + fasilitas[2].FASILITAS_IMG"/ style="width: 100%; z-index: -10;height: 200px;" alt=''>
                  <input type="file" id="imgFasilitas3" name="FASILITAS_IMG_C" value="" style="display:none">
                  <input type="hidden" name="FASILITAS_IMG_C_BACKUP" v-bind:value="fasilitas[2].FASILITAS_IMG">
                  <div class="sliderChangePicture" style="border:1px solid;width:100%;padding:5px 10px;">
                    <center>
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </center>
                  </div>
                </label> -->
                <label for="title" style="width:100%;text-align:center;margin-top:20px">
                  Judul
                  <input type="text" id="title" class="form-control" style="text-align:center;font-weight:100" name="FASILITAS_TITLE[2]" v-bind:value="fasilitas[2].FASILITAS_TITLE">
                </label>
                <label for="desc" style="width:100%;text-align:center">
                  Deskripsi
                  <textarea type="text" id="desc" class="form-control" name="FASILITAS_DESC[2]" style="text-align:center;font-weight: 300;height:150px">{{fasilitas[2].FASILITAS_DESC}}</textarea>
                </label>
              </div>
              <div class="col-md-4" style="margin:10px 0px;">
                <h4 style="text-align:center;font-weight:800">FASILITAS 4</h4>
                <hr>
                <!-- <label class="" for="imgFasilitas4" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                  <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Fasilitas/' + fasilitas[3].FASILITAS_IMG"/ style="width: 100%; z-index: -10;height: 200px;" alt=''>
                  <input type="file" id="imgFasilitas4" name="FASILITAS_IMG_D" style="display:none">
                  <input type="hidden" name="FASILITAS_IMG_D_BACKUP" v-bind:value="fasilitas[3].FASILITAS_IMG">
                  <div class="sliderChangePicture" style="border:1px solid;width:100%;padding:5px 10px;">
                    <center>
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </center>
                  </div>
                </label> -->
                <label for="title" style="width:100%;text-align:center;margin-top:20px">
                  Judul
                  <input type="text" id="title" class="form-control" style="text-align:center;font-weight:100" name="FASILITAS_TITLE[3]" v-bind:value="fasilitas[3].FASILITAS_TITLE">
                </label>
                <label for="desc" style="width:100%;text-align:center">
                  Deskripsi
                  <textarea type="text" id="desc" class="form-control" name="FASILITAS_DESC[3]" style="text-align:center;font-weight: 300;height:150px">{{fasilitas[3].FASILITAS_DESC}}</textarea>
                </label>
              </div>
              <div class="col-md-4" style="margin:10px 0px;">
                <h4 style="text-align:center;font-weight:800">FASILITAS 5</h4>
                <hr>
                <!-- <label class="" for="imgFasilitas5" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                  <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Fasilitas/' + fasilitas[4].FASILITAS_IMG"/ style="width: 100%; z-index: -10;height: 200px;" alt=''>
                  <input type="file" id="imgFasilitas5" name="FASILITAS_IMG_E" style="display:none">
                  <input type="hidden" name="FASILITAS_IMG_E_BACKUP" v-bind:value="fasilitas[4].FASILITAS_IMG">
                  <div class="sliderChangePicture" style="border:1px solid;width:100%;padding:5px 10px;">
                    <center>
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </center>
                  </div>
                </label> -->
                <label for="title" style="width:100%;text-align:center;margin-top:20px">
                  Judul
                  <input type="text" id="title" class="form-control" style="text-align:center;font-weight:100" name="FASILITAS_TITLE[4]" v-bind:value="fasilitas[4].FASILITAS_TITLE">
                </label>
                <label for="desc" style="width:100%;text-align:center">
                  Deskripsi
                  <textarea type="text" id="desc" class="form-control" name="FASILITAS_DESC[4]" style="text-align:center;font-weight: 300;height:150px">{{fasilitas[4].FASILITAS_DESC}}</textarea>
                </label>
              </div>
              <div class="col-md-4" style="margin:10px 0px;">
                <h4 style="text-align:center;font-weight:800">FASILITAS 6</h4>
                <hr>
                <!-- <label class="" for="imgFasilitas6" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                  <img onerror="this.onerror=null; this.src='../img/unavailable.png'" v-bind:src="'<?php echo $publicFolder; ?>/Fasilitas/' + fasilitas[5].FASILITAS_IMG"/ style="width: 100%; z-index: -10;height: 200px;" alt=''>
                  <input type="file" id="imgFasilitas6" name="FASILITAS_IMG_F" style="display:none">
                  <input type="hidden" name="FASILITAS_IMG_F_BACKUP" v-bind:value="fasilitas[5].FASILITAS_IMG">
                  <div class="sliderChangePicture" style="border:1px solid;width:100%;padding:5px 10px;">
                    <center>
                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                    </center>
                  </div>
                </label> -->
                <label for="title" style="width:100%;text-align:center;margin-top:20px">
                  Judul
                  <input type="text" id="title" class="form-control" style="text-align:center;font-weight:100" name="FASILITAS_TITLE[5]" v-bind:value="fasilitas[5].FASILITAS_TITLE">
                </label>
                <label for="desc" style="width:100%;text-align:center">
                  Deskripsi
                  <textarea type="text" id="desc" class="form-control" name="FASILITAS_DESC[5]" style="text-align:center;font-weight: 300;height:150px">{{fasilitas[5].FASILITAS_DESC}}</textarea>
                </label>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-success" name="button" style="width:100%;margin-top:20px">Simpan</button>
              </div>
            </form>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- End Fasilitas Sekolah -->

    </div>

    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Vue -->
<script type="text/javascript">
var url = "<?php echo $urlApi; ?>";
new Vue({
    el: '#slider',
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
        table: 'tx_home_slider',
        start: 0
      })
      .then(response => (this.info = response["data"]["result"]))
    }
  })

new Vue({
    el: '#pengantar',
    data () {
      return {
        pengantar: null
      }
    },
    mounted () {
      axios
      .post(url+'/index', {
        action: 'list',
        db: 'sdnpakis',
        table: 'tx_home_pengantar',
        start: 0
      })
      .then(response => (this.pengantar = response["data"]["result"]))
    }
  })

  new Vue({
      el: '#fasilitas',
      data () {
        return {
          fasilitas: null
        }
      },
      mounted () {
        axios
        .post(url+'/index', {
          action: 'list',
          db: 'sdnpakis',
          table: 'tx_home_fasilitas',
          start: 0
        })
        .then(response => (this.fasilitas = response["data"]["result"]))
      }
    })
</script>
