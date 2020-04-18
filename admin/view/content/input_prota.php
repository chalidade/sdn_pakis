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
  $query              = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_prota` ORDER BY `PROTA_ID` DESC LIMIT 1");
  $lastId             = json_decode(json_encode(mysqli_fetch_assoc($query)),TRUE);
  $lastId             = $lastId["PROTA_ID"]+1;
   ?>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title"><b>PROGRAM TAHUNAN</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="app/model/ProtaModel.php?id=insert" method="post" enctype="multipart/form-data">
                  <div class="box-body table-responsive">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Satuan Pendidikan<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROTA_SATUAN_AJAR" value="">
                          <input type="hidden" class="form-control border-bottom-only" name="PROTA_NO_PENGAJUAN" value="PROTA<?php echo date('my').$lastId; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tahun Ajaran</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROTA_TAHUN_AJAR" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROTA_KELAS" value="">
                          <input type="hidden" name="PROTA_USER_ID" value="<?php echo $session["USER_ID"]; ?>">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>Semester 1</b></h4>
                    <div class="table-responsive">
                    <table class="text-center" border="1" width="100%">
                      <tr>
                        <th width="10%">No</th>
                        <th width="40%">Tema/Sub Tema</th>
                        <th width="10%">Waktu</th>
                        <th width="30%">Keterangan</th>
                        <th width="10%">Option</th>
                      </tr>
                    </table>
                    <table class="text-center" border="1" width="100%" id="tableSemester1">
                      <tr>
                        <td colspan="4" style="text-align:left;padding-left:20px" id="rmrowthis1">Data Kosong</td>
                      </tr>
                    </table>
                    <table width="100%">
                      <tr>
                        <td>
                          <button type="button" class="btn btn-primary addprota" id="1" name="button" style="width:100%;height:30px;border-radius:0">Tambah Data</button>
                        </td>
                      </tr>
                    </table>
                  </div>
                    <br>
                    <h4><b>Semester 2</b></h4>
                    <table class="text-center" border="1" width="100%">
                      <tr>
                        <th width="10%">No</th>
                        <th width="40%">Tema/Sub Tema</th>
                        <th width="10%">Alokasi Waktu</th>
                        <th width="30%">Keterangan</th>
                        <th width="10%">Option</th>
                      </tr>
                    </table>
                    <table class="text-center" border="1" width="100%" id="tableSemester2">
                      <tr>
                        <td colspan="4" style="text-align:left;padding-left:20px" id="rmrowthis2">Data Kosong</td>
                      </tr>
                    </table>
                    <table width="100%">
                      <tr>
                        <td>
                          <button type="button" class="btn btn-primary addprota" id="2" name="button" style="width:100%;height:30px;border-radius:0">Tambah Data</button>
                        </td>
                      </tr>
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
<script>
  $(".addprota").click(function() {
    var btnid = $(this).attr('id');
    // Count Element
    var total_element = $(".protasem"+btnid).length;
    $("#rmrowthis"+btnid).remove();
    $("#tableSemester"+btnid).append(
        "<tr class='protasem"+btnid+"' id='protarow"+total_element+"'>"+
        "<td width='10%'><input type='hidden' name='DTL_SEMESTER[]' value='"+btnid+"' style='width:100%;border:none;text-align:center'></input><input required type='text' name='DTL_NO[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='40%'><input required type='text' name='DTL_TEMA[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='10%'><input required type='text' name='DTL_ALOKASI_WAKTU[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='30%'><input required type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='10%'><button type='button' class='btn btn-danger remove' id='"+total_element+"' name='button' style='width:100%;border-radius:0px;height:30px'>Hapus</button></td>"+
        "</tr>"
      );
  });

  $("#tableSemester1").on('click','.remove',function(){
    var id = $(this).attr('id');
    console.log(id);
    $("#tableSemester1 #protarow"+id).remove();
  });

  $("#tableSemester2").on('click','.remove',function(){
    var id = $(this).attr('id');
    console.log(id);
    $("#tableSemester2 #protarow"+id).remove();
  });
</script>
<!-- /.content-wrapper -->
