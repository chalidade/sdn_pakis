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
                  <h2 class="page-header">Aku Suka Membaca</h2>

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
                              <?php
                              include "proses/show.php";
                              $json   = json_encode(["table"=>"tx_hdr_buku_membaca","start"=>0,"orderby"=>"ASC"]);
                              $data   = json_decode(showAll($json));
                              $count  = json_decode(countAll($json));
                              print_r($count[0]->total);
                               ?>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="row">
                              <div class="col-md-12">
                                <label class="container" for="imgSlider1" style="height:200px; width:100%;border:1px solid #d4d4d4;margin-bottom:20px">
                                  <input type="file" id="imgSlider1" name="BUKU_COVER" value="" style="display:none">
                                  <div class="sliderChangePicture" style="border:1px solid;width:100%;margin-top:150px;padding:5px 10px;">
                                    <center>
                                      <i class="fa fa-camera"></i> <font style="font-weight:100;margin-left:5px;"> Change Picture</font>
                                    </center>
                                  </div>
                                </label>
                              </div>
                              <div class="col-md-12">
                                  <label for="title" style="width:100%">
                                    Tanggal Baca
                                    <input type="date" id="title" class="form-control" name="BUKU_TANGGAL" value="" style="line-height:15px">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Nama Siswa
                                    <input type="input" id="title" class="form-control" name="BUKU_SISWA" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Nama Guru
                                    <input type="input" id="title" class="form-control" name="BUKU_GURU" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Judul
                                    <input type="text" id="title" class="form-control" name="BUKU_JUDUL" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Pengarang
                                    <input type="text" id="title" class="form-control" name="BUKU_PENGARANG" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Penerbit
                                    <input type="text" id="title" class="form-control" name="BUKU_PENERBIT" value="">
                                  </label>
                                  <label for="title" style="width:100%">
                                    Tokoh
                                    <input type="text" id="title" class="form-control" name="BUKU_TOKOH" value="">
                                  </label>
                                  <label for="desc" style="width:100%">
                                    Rangkuman
                                    <textarea type="text" id="desc" class="form-control" name="BUKU_RANGKUMAN" style="height:150px"></textarea>
                                  </label>
                                  <label for="desc" style="width:100%">
                                    Saran
                                    <textarea type="text" id="desc" class="form-control" name="BUKU_SARAN" style="height:150px"></textarea>
                                  </label>
                              </div>
                              <div class="col-md-12">
                                <button type="button" class="btn btn-success" name="button" style="width:100%;margin-top:20px">Simpan</button>
                              </div>
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
