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
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Sekolah</h3>
              <div class="box-tools pull-right">
                <!-- Collapse Button -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="app/model/ProfileModel.php?id=profileModel" method="post" enctype="multipart/form-data">
              <div class="row content" id="profil">
                <div class="col-md-12">
                  <template  v-for="data in profil">
                  <label class="container" for="PROFILE_IMAGE" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                    <input type="file" id="PROFILE_IMAGE" name="PROFILE_IMAGE" v:bind:value="data.PROFILE_IMAGE" style="display:none">
                    <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:150px;padding:5px 10px;">
                      <center>
                        <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                      </center>
                    </div>
                  </label>
                </div>
                <div class="col-md-6" style="margin-top:10px;">
                    <label for="desc" style="width:100%">
                      Visi
                      <textarea type="text" id="desc" class="form-control" name="PROFILE_VISI" style="height:250px">{{ data.PROFILE_VISI }}</textarea>
                    </label>
                </div>
                <div class="col-md-6" style="margin-top:10px;">
                    <label for="desc" style="width:100%">
                      Misi
                      <textarea type="text" id="desc" class="form-control" name="PROFILE_MISI" style="height:250px">{{ data.PROFILE_MISI }}</textarea>
                    </label>
                </div>
                <div class="col-md-6" style="margin-top:20px;">
                    <label for="desc" style="width:100%">
                      Informasi Sekolah
                      <textarea type="text" id="desc" class="form-control" name="PROFILE_INFORMASI" style="height:270px">{{ data.PROFILE_INFORMASI }}</textarea>
                    </label>
                </div>
                <div class="col-md-6" style="margin-top:20px;">
                    <label for="desc" style="width:100%">
                      Maps
                      <input type="text"  class="form-control" name="PROFILE_MAPS" v-bind:value="data.PROFILE_MAPS"> <br>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6293869796755!2d112.7198922143711!3d-7.282940773596742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf17c39f8d7%3A0x2cad596bbf531e5e!2sSekolah%20Dasar%20Negeri%20Pakis%20V%20Surabaya!5e0!3m2!1sid!2sid!4v1577937045449!5m2!1sid!2sid" width="100%" height="200" style="border-radius:5px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </label>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-success" name="button" style="width:100%;margin-top:20px">Simpan</button>
                </div>
              </div>
            </div>
            </template>
          </form>
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
var url = "<?php echo $urlApi; ?>";
new Vue({
    el: '#profil',
    data () {
      return {
        profil: null
      }
    },
    mounted () {
      axios
      .post(url+'/index', {
        action: 'list',
        db: 'sdnpakis',
        table: 'tx_home_profile',
        start: 0
      })
      .then(response => (this.profil = response["data"]["result"]))
    }
  })
</script>
