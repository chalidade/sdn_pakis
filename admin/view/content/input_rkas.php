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
  $query              = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_keuangan_rkas` ORDER BY `KEUANGAN_RKAS_ID` DESC LIMIT 1");
  $lastId             = json_decode(json_encode(mysqli_fetch_assoc($query)),TRUE);
  $lastId             = $lastId["KEUANGAN_RKAS_ID"]+1;
   ?>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title" style="text-transform:uppercase"><b>Rencana Kegiatan dan Anggaran Sekolah</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="app/model/KeuanganModel.php?id=rkasInsert" method="post" enctype="multipart/form-data">
                  <div class="box-body table-responsive">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Nama Sekolah<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="KEUANGAN_RKAS_NAMA_SEKOLAH" value="">
                          <input type="hidden" class="form-control border-bottom-only" name="KEUANGAN_RKAS_NO_PENGAJUAN" value="RKAS<?php echo date('my').$lastId; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tahun Anggaran</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="KEUANGAN_RKAS_TAHUN_ANGGARAN" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Sumber Dana</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="KEUANGAN_RKAS_SUMBER_DANA" value="">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <table class="text-center" border="1" width="100%" style="font-size:12px">
                      <tr>
                        <th rowspan="2" width="4%">No</th>
                        <th rowspan="2" width="9%">No Kode</th>
                        <th rowspan="2" width="16%">Uraian</th>
                        <th rowspan="2" width="8%">Koefisien</th>
                        <th rowspan="2" width="5%">Harga</th>
                        <th rowspan="2" width="5%">Jumlah / Tahun</th>
                        <th colspan="13">Periode Bulan</th>
                      </tr>
                      <tr>
                        <th width="4%">I</th>
                        <th width="4%">II</th>
                        <th width="4%">III</th>
                        <th width="4%">IV</th>
                        <th width="4%">V</th>
                        <th width="4%">VI</th>
                        <th width="4%">VII</th>
                        <th width="4%">VIII</th>
                        <th width="4%">IX</th>
                        <th width="4%">X</th>
                        <th width="4%">XI</th>
                        <th width="4%">XII</th>
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
        "<td width='4%'><input type='text' required name='RKAS_DTL_NO[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='9%'><input type='text' required name='RKAS_DTL_KODE[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='16%'><input type='text' required name='RKAS_DTL_URAIAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='8%'><input type='text' required name='RKAS_DTL_KOEFISIEN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='5%'><input type='text' required name='RKAS_DTL_HARGA[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='5%'><input type='text' required name='RKAS_DTL_JUMLAH[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_I[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_II[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_III[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_IV[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_V[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_VI[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_VII[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_VIII[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_IX[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_X[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_XI[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='4%'><input type='text' required name='RKAS_DTL_XII[]' style='width:100%;border:none;text-align:center'></input><input type='hidden' name='RKAS_DTL_USER_ID' value='<?php echo $userId; ?>'></input></td>"+
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
