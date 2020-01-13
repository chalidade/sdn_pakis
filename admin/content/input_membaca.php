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
                            <table class="table table-border">
                              <tr>
                                <th style="text-align:center">Id</th>
                                <th style="text-align:center">Foto Buku</th>
                                <th>Judul</th>
                                <th>Siswa</th>
                                <th style="text-align:center">Tgl Baca</th>
                                <th style="text-align:center">Option</th>
                              </tr>
                              <?php
                                // error_reporting(0);
                                $start  = $_REQUEST['start'];
                                if (empty($start)) $start = 0;

                                $json   = json_encode(
                                          [
                                            "table"=>"tx_hdr_buku_membaca",
                                            "start"=>$start,
                                            "orderby"=>["MEMBACA_ID", "DESC"]
                                          ]
                                        );
                                include "proses/show.php";
                                $count  = json_decode(countAll($json));
                                $data   = json_decode(showAll($json));
                                $no     = 1;
                                foreach ($data as $data) {
                              ?>
                              <tr>
                                <td style="text-align:center"><?php echo $data->MEMBACA_ID ?></td>
                                <td>
                                  <center>
                                  <?php
                                    if (empty($data->MEMBACA_COVER)) {
                                      echo "<img src='../img/unavailable.png' style='width:50px' alt=''>";
                                    } else {
                                      // Cek if page 404 https://stackoverflow.com/questions/408405/easy-way-to-test-a-url-for-404-in-php
                                      $header = get_headers("http://localhost/sdn_pakis/admin/img/$data->MEMBACA_COVER", 1);
                                      if ($header[0] == "HTTP/1.1 404 Not Found") {
                                        echo "<img src='../img/unavailable.png' style='width:50px' alt=''>";
                                      } else {
                                        echo "<img src='img/<?php echo $data->MEMBACA_COVER; ?>' style='width:50px' alt=''>";
                                      }
                                    }
                                   ?>
                                 </center>
                                </td>
                                <td><?php echo $data->MEMBACA_JUDUL; ?> </td>
                                <td><?php echo $data->MEMBACA_SISWA; ?></td>
                                <td style="text-align:center"><?php echo $data->MEMBACA_TANGGAL; ?></td>
                                <td style="text-align:center" width="15%">
                                  <button type="button" onclick="EDIT_MEMBACA('tx_hdr_buku_membaca', <?php echo $data->MEMBACA_ID ?>,'MEMBACA_ID')" class="btn btn-warning" name="button"> <i class="fa fa-pencil"></i> </button>
                                  <button type="button" onclick="DELETE_MEMBACA('tx_hdr_buku_membaca', <?php echo $data->MEMBACA_ID ?>,'MEMBACA_ID')" class="btn btn-danger" name="button"><i class="fa fa-trash"></i></button>
                                  <button type="button" onclick="VIEW_MEMBACA('tx_hdr_buku_membaca', <?php echo $data->MEMBACA_ID ?>,'MEMBACA_ID')" class="btn btn-primary" name="button"><i class="fa fa-eye"></i></button>
                                </td>
                              </tr>
                            <?php } ?>
                            <tr>
                              <td>Pages</td>
                              <td colspan="5">
                                <?php
                                  $total  = $count[0]->total;
                                  $pages  = ceil($total/50);
                                  for ($i = 1; $i<=$pages ; $i++){
                                    $ke   = ($i-1)*50+1;
                                    if ($i == 1) {
                                      if ($_REQUEST['page'] == $i) {
                                        echo "<a href='?id=input_membaca&start=0&page=1' class='btn btn-small btn-primary' style='padding: 0px 6px;margin: 2px;'> $i </a>";
                                      } else {
                                        echo "<a href='?id=input_membaca&start=0&page=1' class='btn btn-small btn-default' style='padding: 0px 6px;margin: 2px;'> $i </a>";
                                      }
                                    } else if($i > 1) {
                                      if ($_REQUEST['page'] == $i) {
                                      echo "<a href='?id=input_membaca&start=$ke&page=$i' class='btn btn-small btn-primary' style='padding: 0px 6px;margin: 2px;'> $i </a>";
                                      } else {
                                        echo "<a href='?id=input_membaca&start=$ke&page=$i' class='btn btn-small btn-default' style='padding: 0px 6px;margin: 2px;'> $i </a>";
                                      }
                                    }
                                 }
                                ?>
                              </td>
                            </tr>
                            </table>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="tab_2">
                            <div class="row">
                              <div class="col-md-12">
                                <form action="proses/save.php" method="post">
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
function DELETE_MEMBACA(table, id, field) {
  alert("DELETE "+table+" "+field+" = "+id);
}

function EDIT_MEMBACA(table, id, field) {
  alert("EDIT "+table+" "+field+" = "+id);
}

function VIEW_MEMBACA(table, id, field) {
  alert("VIEW "+table+" "+field+" = "+id);
}
</script>
