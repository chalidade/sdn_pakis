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
  $id       = $_REQUEST['data'];
  $header   = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_keuangan_rapbs` WHERE `KEUANGAN_RAPBS_ID` = '$id'");
  $header   = json_decode(json_encode(mysqli_fetch_assoc($header)),TRUE);
  $detailQ  = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_keuangan_rapbs` WHERE `RAPBS_DTL_HDR_ID` = '$id'");
   ?>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title" style="text-transform:uppercase"><b>Rencana Anggaran Pendapatan Belanja Sekolah</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="app/model/KeuanganModel.php?id=rapbsUpdate" method="post" enctype="multipart/form-data">
                  <div class="box-body table-responsive">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Nama Sekolah<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="KEUANGAN_RAPBS_NAMA_SEKOLAH" value="<?php echo $header["KEUANGAN_RAPBS_NAMA_SEKOLAH"]; ?>">
                          <input type="hidden" class="form-control border-bottom-only" name="KEUANGAN_RAPBS_NO_PENGAJUAN" value="<?php echo $header["KEUANGAN_RAPBS_NO_PENGAJUAN"]; ?>">
                          <input type="hidden" name="KEUANGAN_RAPBS_ID" value="<?php echo $header["KEUANGAN_RAPBS_ID"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Desa / Kecamatan</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="KEUANGAN_RAPBS_DESA" value="<?php echo $header["KEUANGAN_RAPBS_DESA"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kabupaten / Kota</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="KEUANGAN_RAPBS_KABUPATEN" value="<?php echo $header["KEUANGAN_RAPBS_KABUPATEN"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Provinsi</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input type="text" required class="form-control border-bottom-only" name="KEUANGAN_RAPBS_PROVINSI" value="<?php echo $header["KEUANGAN_RAPBS_PROVINSI"]; ?>">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <table class="text-center" border="1" width="100%" style="font-size:12px">
                      <tr>
                        <th colspan="5">PENERIMAAN</th>
                        <th colspan="4">PENGELUARAN</th>
                      </tr>
                      <tr>
                        <th width="5%">No Urut</th>
                        <th width="15%">No Kode</th>
                        <th width="20%">Uraian</th>
                        <th width="15%">Anggaran</th>
                        <th width="5%">No</th>
                        <th width="5%">No Kode</th>
                        <th width="20%">Uraian</th>
                        <th width="15%">Anggaran</th>
                        <th width="5%">Option</th>
                      </tr>
                    </table>
                    <table class="text-center" border="1" width="100%" id="tableSemester1">
                      <?php $no = 0; while ($detail = mysqli_fetch_array($detailQ)) { ?>
                      <tr class="protasem1" id='protarow<?php echo $no; ?>'>
                      <td width='5%'><input type='text' value="<?php echo $detail["RAPBS_DTL_PENERIMAAN_URUT"]; ?>" required name='RAPBS_DTL_PENERIMAAN_URUT[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='15%'><input type='text' value="<?php echo $detail["RAPBS_DTL_PENERIMAAN_KODE"]; ?>" required name='RAPBS_DTL_PENERIMAAN_KODE[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='20%'><input type='text' value="<?php echo $detail["RAPBS_DTL_PENERIMAAN_URAIAN"]; ?>" required name='RAPBS_DTL_PENERIMAAN_URAIAN[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='15%'><input type='text' value="<?php echo $detail["RAPBS_DTL_PENERIMAAN_ANGGARAN"]; ?>" required name='RAPBS_DTL_PENERIMAAN_ANGGARAN[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='5%'><input type='text' value="<?php echo $detail["RAPBS_DTL_PENERIMAAN_NO"]; ?>" required name='RAPBS_DTL_PENERIMAAN_NO[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='5%'><input type='text' value="<?php echo $detail["RAPBS_DTL_PENGELUARAN_KODE"]; ?>" required name='RAPBS_DTL_PENGELUARAN_KODE[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='20%'><input type='text' value="<?php echo $detail["RAPBS_DTL_PENGELUARAN_URAIAN"]; ?>" required name='RAPBS_DTL_PENGELUARAN_URAIAN[]' style='width:100%;border:none;text-align:center'></input><input type='hidden' name='KEUANGAN_RAPBS_USER' value='<?php echo $userId; ?>'></input></td>
                      <td width='20%'><input type='text' value="<?php echo $detail["RAPBS_DTL_PENGELUARAN_ANGGARAN"]; ?>" required name='RAPBS_DTL_PENGELUARAN_ANGGARAN[]' style='width:100%;border:none;text-align:center'></input></td>
                      <td width='5%'><button type='button' class='btn btn-danger remove' id='<?php echo $no;$no++; ?>' name='button' style='width:100%;border-radius:0px;height:30px'><i class='fa fa-trash'></i></button></td>
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
  $(".addprota").click(function() {
    var btnid = $(this).attr('id');
    // Count Element
    var total_element = $(".protasem"+btnid).length;
    $("#rmrowthis"+btnid).remove();
    $("#tableSemester"+btnid).append(
        "<tr class='protasem1' id='protarow"+total_element+"'>"+
        "<td width='5%'><input type='text' required name='RAPBS_DTL_PENERIMAAN_URUT[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='15%'><input type='text' required name='RAPBS_DTL_PENERIMAAN_KODE[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='20%'><input type='text' required name='RAPBS_DTL_PENERIMAAN_URAIAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='15%'><input type='text' required name='RAPBS_DTL_PENERIMAAN_ANGGARAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='5%'><input type='text' required name='RAPBS_DTL_PENERIMAAN_NO[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='5%'><input type='text' required name='RAPBS_DTL_PENGELUARAN_KODE[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='20%'><input type='text' required name='RAPBS_DTL_PENGELUARAN_URAIAN[]' style='width:100%;border:none;text-align:center'></input><input type='hidden' name='KEUANGAN_RAPBS_USER' value='<?php echo $userId; ?>'></input></td>"+
        "<td width='20%'><input type='text' required name='RAPBS_DTL_PENGELUARAN_ANGGARAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
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
