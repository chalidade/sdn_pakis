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
              <h3 class="box-title"><b>PROGRAM SEMESTER</b></h3>
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
                        <td width="15%"><b>Tahun Ajaran</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" class="form-control border-bottom-only" name="" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" class="form-control border-bottom-only" name="" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Seester</b></td>
                        <td width="2%">:</td>
                        <td>
                          <select class="form-control" name="SEMESTER" id="SEMESTER">
                              <option value="1">Semster Ganjil</option>
                              <option value="2">Semester Genap</option>
                          </select>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <table class="text-center" border="1" width="100%">
                      <!-- Semester Genap -->
                      <tr>
                        <th rowspan="2" width='10%'>Tema</th>
                        <th rowspan="2" width='20%'>Sub Tema<br>Kompetensi Dasar</th>
                        <th rowspan="2" width='10%'>Alokasi Waktu</th>
                        <th colspan="5" width="9%">Juli</th>
                        <th colspan="5" width="9%">Agustus</th>
                        <th colspan="5" width="9%">September</th>
                        <th colspan="5" width="9%">Oktober</th>
                        <th colspan="5" width="9%">November</th>
                        <th colspan="5" width="9%">Desember</th>
                        <th width="6%">Option</th>
                      </tr>
                      <!-- Semester Ganjil -->
                      <!-- <tr>
                        <th rowspan="2" width='10%'>Tema</th>
                        <th rowspan="2" width='20%'>Sub Tema<br>Kompetensi Dasar</th>
                        <th rowspan="2" width='10%'>Alokasi Waktu</th>
                        <th colspan="5" width="9%">January</th>
                        <th colspan="5" width="9%">February</th>
                        <th colspan="5" width="9%">Maret</th>
                        <th colspan="5" width="9%">April</th>
                        <th colspan="5" width="9%">Mei</th>
                        <th colspan="5" width="9%">Juni</th>
                        <th width="6%">Option</th>
                      </tr> -->
                      <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
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
        "<td width='10%'><input type='text' name='DTL_NO[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='20%'><input type='text' name='DTL_TEMA[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='10%'><input type='text' name='DTL_ALOKASI_WAKTU[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td><input type='text' name='DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
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
