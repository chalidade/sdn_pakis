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
  $query              = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_silabus` ORDER BY `SILABUS_HDR_ID` DESC LIMIT 1");
  $lastId             = json_decode(json_encode(mysqli_fetch_assoc($query)),TRUE);
  $lastId             = $lastId["SILABUS_HDR_ID"]+1;
   ?>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title" style="text-transform:uppercase"><b>Silabus</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="app/model/SilabusModel.php?id=insert" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Satuan Pendidikan<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" class="form-control border-bottom-only" name="SILABUS_HDR_SATUAN_PENDIDIKAN" value="">
                          <input type="hidden" class="form-control border-bottom-only" name="SILABUS_HDR_NO_PENGAJUAN" value="SILABUS<?php echo date('my').$lastId; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" class="form-control border-bottom-only" name="SILABUS_HDR_KELAS" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Semester</b></td>
                        <td width="2%">:</td>
                        <td>
                          <select class="form-control" name="SILABUS_HDR_SEMESTER" id="SEMESTER">
                              <option value="1">Semester Ganjil</option>
                              <option value="2">Semester Genap</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><b>A. Kompetensi Inti</b></td>
                        <td>:</td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <textarea name="SILABUS_HDR_KOMPETENSI_INTI" id="KOMPETENSI_INTI" rows="8" style="width:100%;padding:20px"></textarea>
                          <input type="hidden" name="SILABUS_HDR_UPDATE_BY" value="<?php $userId = $session['USER_ID']; echo $userId; ?>">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <table class="text-center" border="1" width="100%">
                      <tr>
                        <th width="15%">Muatan Pelajaran</th>
                        <th width="15%">Kompetensi Dasar</th>
                        <th width="15%">Tema</th>
                        <th width="15%">Pembelajaran</th>
                        <th width="12%">Penilaian</th>
                        <th width="11%">Alokasi Waktu</th>
                        <th width="12%">Sumber Belajar</th>
                        <th width="5%">Option</th>
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
        "<td width='15%'><input type='text' name='SILABUS_DTL_MUATAN_PELAJARAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='15%'><input type='text' name='SILABUS_DTL_KOMPETENSI_DASAR[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='15%'><input type='text' name='SILABUS_DTL_TEMA[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='15%'><input type='text' name='SILABUS_DTL_PEMBELAJARAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='12%'><input type='text' name='SILABUS_DTL_PENLAIAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='11%'><input type='text' name='SILABUS_DTL_ALOKASI_WAKTU[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='12%'><input type='text' name='SILABUS_DTL_SUMBER_BELAJAR[]' style='width:100%;border:none;text-align:center'></input><input type='hidden' name='SILABUS_DTL_UPDATE_BY' value='<?php echo $userId; ?>'></input></td>"+
        "<td width='5%'><button type='button' class='btn btn-danger remove' id='"+total_element+"' name='button' style='width:100%;border-radius:0px;height:30px'><i class='fa fa-trash'></i></button></td>"+
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
