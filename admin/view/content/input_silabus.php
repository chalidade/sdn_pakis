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
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title" style="text-transform:uppercase"><b>Silabus</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="proses/route.php?page=input_booking" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Satuan Pendidikan<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" class="form-control border-bottom-only" name="" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kelas / Semester</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" class="form-control border-bottom-only" name="" value="">
                        </td>
                      </tr>
                      <tr>
                        <td><b>A. Kompetensi Inti</b></td>
                        <td>:</td>
                      </tr>
                      <tr>
                        <td colspan="3">
                          <textarea name="name" rows="8" style="width:100%;padding:20px"></textarea>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>Semester 1</b></h4>
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
        "<input type='text' name='DTL_SEMESTER[]' value='"+btnid+"' style='width:100%;border:none;text-align:center'></input>"+
        "<td width='15%'><input type='text' name='DTL_NO[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='15%'><input type='text' name='DTL_TEMA[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='15%'><input type='text' name='DTL_ALOKASI_WAKTU[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='15%'><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='12%'><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='11%'><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='12%'><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
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
