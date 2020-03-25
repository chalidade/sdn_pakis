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
  $data               = $_REQUEST["data"];
  $hdrQuery           = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_prota` WHERE `PROTA_ID` = '$data' ");
  $hdrProta           = json_decode(json_encode(mysqli_fetch_assoc($hdrQuery)),TRUE);

  $semesterGanjil     = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_prota` WHERE `DTL_HDR_ID` = '$data' AND `DTL_SEMESTER` = '1'");
  $semesterGenap      = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_prota` WHERE `DTL_HDR_ID` = '$data' AND `DTL_SEMESTER` = '2'");
   ?>

  <!-- Main content -->
  <section class="content container-fluid" id="protaapi">
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
                <form role="form" action="app/model/ProtaModel.php?id=update" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table width="100%" class="table order-list">
                      <tr>
                        <td width="15%"><b>Satuan Pendidikan<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROTA_SATUAN_AJAR" value="<?php echo $hdrProta["PROTA_SATUAN_AJAR"]; ?>">
                          <input type="hidden" name="PROTA_NO_PENGAJUAN" value="<?php echo $hdrProta["PROTA_NO_PENGAJUAN"]; ?>">
                          <input type="hidden" name="PROTA_ID" value="<?php echo $hdrProta["PROTA_ID"]; ?>">

                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tahun Ajaran</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROTA_TAHUN_AJAR" value="<?php echo $hdrProta["PROTA_TAHUN_AJAR"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROTA_KELAS" value="<?php echo $hdrProta["PROTA_KELAS"]; ?>">
                          <input type="hidden" name="PROTA_USER_ID" value="<?php echo $session["USER_ID"]; ?>">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>Semester 1</b></h4>
                    <table class="text-center" border="1" width="100%">
                      <tr>
                        <th width="10%">No</th>
                        <th width="40%">Tema/Sub Tema</th>
                        <th width="10%">Alokasi Waktu</th>
                        <th width="30%">Keterangan</th>
                        <th width="10%">Option</th>
                      </tr>
                    </table>
                    <table class="text-center" border="1" width="100%" id="tableSemester1">
                      <?php
                        $no = 0;
                        while ($dataGanjil = mysqli_fetch_array($semesterGanjil)) {
                      ?>
                      <tr class='protasem1' id='protarow<?php echo $no; ?>'>
                      <td width='10%'>
                        <input type='hidden' name='DTL_SEMESTER[]' value='1' style='width:100%;border:none;text-align:center'></input>
                        <input value="<?php echo $dataGanjil["DTL_NO"]; ?>" required type='text' name='DTL_NO[]' style='width:100%;border:none;text-align:center'></input>
                      </td>
                      <td width='40%'><input value="<?php echo $dataGanjil["DTL_TEMA"]; ?>" required type='text' name='DTL_TEMA[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='10%'><input value="<?php echo $dataGanjil["DTL_ALOKASI_WAKTU"]; ?>" required type='text' name='DTL_ALOKASI_WAKTU[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='30%'><input value="<?php echo $dataGanjil["DTL_KETERANGAN"]; ?>" required type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='10%'><button type='button' class='btn btn-danger remove' id='<?php echo $no;$no++; ?>' name='button' style='width:100%;border-radius:0px;height:30px'>Hapus</button></td>
                      </tr>
                    <?php } ?>
                    </table>
                    <table width="100%">
                      <tr>
                        <td>
                          <button type="button" class="btn btn-primary addprota" id="1" name="button" style="width:100%;height:30px;border-radius:0">Tambah Data</button>
                        </td>
                      </tr>
                    </table>
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
                      <?php
                        $no = 0;
                        while ($dataGenap = mysqli_fetch_array($semesterGenap)) {
                      ?>
                      <tr class='protasem2' id='protarow<?php echo $no; ?>'>
                      <td width='10%'>
                        <input type='hidden' name='DTL_SEMESTER[]' value='1' style='width:100%;border:none;text-align:center'></input>
                        <input value="<?php echo $dataGenap["DTL_NO"]; ?>" required type='text' name='DTL_NO[]' style='width:100%;border:none;text-align:center'></input>
                      </td>
                      <td width='40%'><input value="<?php echo $dataGenap["DTL_TEMA"]; ?>" required type='text' name='DTL_TEMA[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='10%'><input value="<?php echo $dataGenap["DTL_ALOKASI_WAKTU"]; ?>" required type='text' name='DTL_ALOKASI_WAKTU[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='30%'><input value="<?php echo $dataGenap["DTL_KETERANGAN"]; ?>" required type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='10%'><button type='button' class='btn btn-danger remove' id='<?php echo $no;$no++; ?>' name='button' style='width:100%;border-radius:0px;height:30px'>Hapus</button></td>
                      </tr>
                    <?php } ?>
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
<!-- /.content-wrapper -->
