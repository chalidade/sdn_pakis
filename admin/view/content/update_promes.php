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
  $data = $_REQUEST['data'];
  $hdrQuery           = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_promes` WHERE `PROMES_ID` = '$data' ");
  $hdrPromes          = json_decode(json_encode(mysqli_fetch_assoc($hdrQuery)),TRUE);
  $dtlPromes          = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_promes` WHERE `DTL_HDR_ID` = '$data'");
   ?>
  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title"><b>PROGRAM SEMESTER</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="app/model/PromesModel.php?id=update" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Satuan Pendidikan<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="hidden" name="PROMES_ID" value="<?php echo $hdrPromes['PROMES_ID']; ?>">
                          <input type="text" required class="form-control border-bottom-only" name="PROMES_SATUAN_PENDIDIKAN" value="<?php echo $hdrPromes['PROMES_SATUAN_PENDIDIKAN']; ?>">
                          <input type="hidden" class="form-control border-bottom-only" name="PROMES_NO_PENGAJUAN" value="<?php echo $hdrPromes['PROMES_NO_PENGAJUAN']; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tahun Ajaran</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROMES_TAHUN_AJARAN" value="<?php echo $hdrPromes['PROMES_TAHUN_AJARAN']; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="PROMES_KELAS" value="<?php echo $hdrPromes['PROMES_KELAS']; ?>">
                          <input type="hidden" name="PROMES_USER_ID" value="<?php echo $session['USER_ID']; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Semester</b></td>
                        <td width="2%">:</td>
                        <td>
                          <select class="form-control" name="PROMES_SEMESTER" id="SEMESTER">
                              <?php if ($hdrPromes['PROMES_SEMESTER'] == 1) { ?>
                                <option value="1">Semester Ganjil</option>
                                <option value="2">Semester Genap</option>
                              <?php } else { ?>
                                <option value="2">Semester Genap</option>
                                <option value="1">Semester Ganjil</option>

                              <?php } ?>
                          </select>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <table class="text-center" border="1" width="100%">
                      <!-- Semester Genap -->
                      <?php if ($hdrPromes['PROMES_SEMESTER'] == 1) { ?>

                      <tr>
                        <th rowspan="2" width='10%'>Tema</th>
                        <th rowspan="2" width='14%'>Sub Tema<br>Kompetensi Dasar</th>
                        <th rowspan="2" width='10%'>Alokasi Waktu</th>
                        <th colspan="5" width="10%">Juli</th>
                        <th colspan="5" width="10%">Agustus</th>
                        <th colspan="5" width="10%">September</th>
                        <th colspan="5" width="10%">Oktober</th>
                        <th colspan="5" width="10%">November</th>
                        <th colspan="5" width="10%">Desember</th>
                        <th width="6%">Option</th>

                      </tr>
                    <?php } else { ?>
                      <!-- Semester Ganjil -->
                      <tr>
                        <th rowspan="2" width='10%'>Tema</th>
                        <th rowspan="2" width='14%'>Sub Tema<br>Kompetensi Dasar</th>
                        <th rowspan="2" width='10%'>Alokasi Waktu</th>
                        <th colspan="5" width="10%">January</th>
                        <th colspan="5" width="10%">February</th>
                        <th colspan="5" width="10%">Maret</th>
                        <th colspan="5" width="10%">April</th>
                        <th colspan="5" width="10%">Mei</th>
                        <th colspan="5" width="10%">Juni</th>
                        <th width="6%">Option</th>

                      </tr>
                    <?php } ?>
                      <tr>
                        <th width="2%">1</th>
                        <th width="2%">2</th>
                        <th width="2%">3</th>
                        <th width="2%">4</th>
                        <th width="2%">5</th>
                        <th width="2%">1</th>
                        <th width="2%">2</th>
                        <th width="2%">3</th>
                        <th width="2%">4</th>
                        <th width="2%">5</th>
                        <th width="2%">1</th>
                        <th width="2%">2</th>
                        <th width="2%">3</th>
                        <th width="2%">4</th>
                        <th width="2%">5</th>
                        <th width="2%">1</th>
                        <th width="2%">2</th>
                        <th width="2%">3</th>
                        <th width="2%">4</th>
                        <th width="2%">5</th>
                        <th width="2%">1</th>
                        <th width="2%">2</th>
                        <th width="2%">3</th>
                        <th width="2%">4</th>
                        <th width="2%">5</th>
                        <th width="2%">1</th>
                        <th width="2%">2</th>
                        <th width="2%">3</th>
                        <th width="2%">4</th>
                        <th width="2%">5</th>
                      </tr>
                    </table>
                      <table class="text-center" border="1" width="100%" id="tableSemester1">
                      <?php $no = 0; while ($detail = mysqli_fetch_array($dtlPromes)) { ?>
                        <tr  class='protasem2' id='protarow<?php echo $no; ?>'>
                          <td width='10%'><input required type='text' name='DTL_TEMA[]'         style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_TEMA']; ?>"></input></td>
                          <td width='14%'><input required type='text' name='DTL_KOMPETENSI[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_KOMPETENSI']; ?>"></input></td>
                          <td width='10%'><input required type='text' name='DTL_ALOKASI_WAKTU[]'style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_ALOKASI_WAKTU']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_SATU_A[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_SATU_A']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_SATU_B[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_SATU_B']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_SATU_C[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_SATU_C']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_SATU_D[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_SATU_D']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_SATU_E[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_SATU_E']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_DUA_A[]'    style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_DUA_A']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_DUA_B[]'    style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_DUA_B']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_DUA_C[]'    style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_DUA_C']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_DUA_D[]'    style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_DUA_D']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_DUA_E[]'    style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_DUA_E']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_TIGA_A[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_TIGA_A']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_TIGA_B[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_TIGA_B']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_TIGA_C[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_TIGA_C']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_TIGA_D[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_TIGA_D']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_TIGA_E[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_TIGA_E']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_EMPAT_A[]'  style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_EMPAT_A']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_EMPAT_B[]'  style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_EMPAT_B']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_EMPAT_C[]'  style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_EMPAT_C']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_EMPAT_D[]'  style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_EMPAT_D']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_EMPAT_E[]'  style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_EMPAT_E']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_LIMA_A[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_LIMA_A']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_LIMA_B[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_LIMA_B']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_LIMA_C[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_LIMA_C']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_LIMA_D[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_LIMA_D']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_LIMA_E[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_LIMA_E']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_ENAM_A[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_ENAM_A']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_ENAM_B[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_ENAM_B']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_ENAM_C[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_ENAM_C']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_ENAM_D[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_ENAM_D']; ?>"></input></td>
                          <td width="2%"><input type='text' name='DTL_BLN_ENAM_E[]'   style='width:100%;border:none;text-align:center' value="<?php echo $detail['DTL_BLN_ENAM_E']; ?>"></input></td>
                          <td width='6%'><button type='button' class='btn btn-danger remove' id='<?php echo $no;$no++; ?>' name='button' style='width:100%;border-radius:0px;height:30px'><i class='fa fa-trash'></i></button></td>
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
  $("#SEMESTER").change(function() {
    var semester = $("#SEMESTER").val();
    if (semester == 1) {
      $("#ganjil").show();
      $("#genap").hide();
    } else {
      $("#ganjil").hide();
      $("#genap").show();
    }
  });

  $(".addprota").click(function() {
    var btnid = $(this).attr('id');
    // Count Element
    var total_element = $(".protasem"+btnid).length;
    $("#rmrowthis"+btnid).remove();
    $("#tableSemester"+btnid).append(
        "<tr class='protasem"+btnid+"' id='protarow"+total_element+"'>"+
        "<td width='10%'><input required type='text' name='DTL_TEMA[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='14%'><input required type='text' name='DTL_KOMPETENSI[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='10%'><input required type='text' name='DTL_ALOKASI_WAKTU[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_SATU_A[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_SATU_B[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_SATU_C[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_SATU_D[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_SATU_E[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_DUA_A[]'   style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_DUA_B[]'   style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_DUA_C[]'   style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_DUA_D[]'   style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_DUA_E[]'   style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_TIGA_A[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_TIGA_B[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_TIGA_C[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_TIGA_D[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_TIGA_E[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_EMPAT_A[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_EMPAT_B[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_EMPAT_C[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_EMPAT_D[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_EMPAT_E[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_LIMA_A[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_LIMA_B[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_LIMA_C[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_LIMA_D[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_LIMA_E[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_ENAM_A[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_ENAM_B[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_ENAM_C[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_ENAM_D[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td style='width:2%'><input type='text' name='DTL_BLN_ENAM_E[]'  style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='6%'><button type='button' class='btn btn-danger remove' id='"+total_element+"' name='button' style='width:100%;border-radius:0px;height:30px'><i class='fa fa-trash'></i></button></td>"+
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
