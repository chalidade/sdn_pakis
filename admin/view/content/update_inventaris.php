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
  $data           = $_REQUEST['data'];
  $hdr            = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_sarpras` WHERE `SARPRAS__HDR_ID` = '$data'");
  $hdrInventaris  = json_decode(json_encode(mysqli_fetch_assoc($hdr)),TRUE);
  $dtlInventaris  = mysqli_query($mysqli, "SELECT * FROM `tx_dtl_sarpras` WHERE `SARPRAS_HDR_ID` = '$data'");
   ?>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title" style="text-transform:uppercase"><b>FORMAT PENDATAAN SARANA DAN PRASARANA SEKOLAH</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="app/model/SarpasModel.php?id=update" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Nama Sekolah<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="SARPRAS_HDR_NAMA_SEKOLAH" value="<?php echo $hdrInventaris["SARPRAS_HDR_NAMA_SEKOLAH"]; ?>">
                          <input type="hidden" name="SARPRAS_HDR_NO_PENGAJUAN" value="<?php echo $hdrInventaris["SARPRAS_HDR_NO_PENGAJUAN"]; ?>">
                          <input type="hidden" name="SARPRAS__HDR_ID" value="<?php echo $hdrInventaris["SARPRAS__HDR_ID"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Alamat Sekolah</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="SARPRAS_HDR_ALAMAT_SEKOLAH" value="<?php echo $hdrInventaris["SARPRAS_HDR_ALAMAT_SEKOLAH"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kecamatan</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="SARPRAS_HDR_KECAMATAN" value="<?php echo $hdrInventaris["SARPRAS_HDR_KECAMATAN"]; ?>">
                          <input type="hidden" name="SARPRAS_HDR_UPDATE_BY" value="<?php $userId = $session["USER_ID"]; echo $userId; ?>">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <table class="text-center" border="1" width="100%">
                      <tr>
                        <th rowspan="2" width="20%">Jenis Barang</th>
                        <th rowspan="2" width="10%">Jumlah Barang</th>
                        <th rowspan="2" width="10%">Satuan</th>
                        <th colspan="2" width="20%">Jumlah Kondisi Barang</th>
                        <th rowspan="2" width="20%">Keterangan</th>
                        <th rowspan="2" width="10%">Option</th>
                      </tr>
                      <tr>
                        <th width="10%">Baik</th>
                        <th width="10%">Rusak</th>
                      </tr>
                    </table>
                    <table class="text-center" border="1" width="100%" id="tablesarpas">
                      <?php
                      $no = 0;
                      while ($detail = mysqli_fetch_array($dtlInventaris)) {
                      ?>
                      <tr class='sarpas' id='protarow<?php echo $no; ?>'>
                        <td width='20%'><input value="<?php echo $detail["SARPRAS_DTL_JENIS_BARANG"]; ?>" required type='text' name='SARPRAS_DTL_JENIS_BARANG[]' style='width:100%;border:none;text-align:center'></input></td>
                        <td width='10%'><input value="<?php echo $detail["SARPRAS_DTLJUMLAH_BARANG"]; ?>" required type='text' name='SARPRAS_DTLJUMLAH_BARANG[]' style='width:100%;border:none;text-align:center'></input></td>
                        <td width='10%'><input value="<?php echo $detail["SARPRAS_DTL_SATUAN"]; ?>" required type='text' name='SARPRAS_DTL_SATUAN[]' style='width:100%;border:none;text-align:center'></input></td>
                        <td width='10%'><input value="<?php echo $detail["SARPRAS_DTL_KONDISI_BAIK"]; ?>" required type='text' name='SARPRAS_DTL_KONDISI_BAIK[]' style='width:100%;border:none;text-align:center'></input></td>
                        <td width='10%'><input value="<?php echo $detail["SARPRAS_DTL_KONDISI_RUSAK"]; ?>" required type='text' name='SARPRAS_DTL_KONDISI_RUSAK[]' style='width:100%;border:none;text-align:center'></input></td>
                        <td width='20%'><input value="<?php echo $detail["SARPRAS_DTL_KETERANGAN"]; ?>" required type='text' name='SARPRAS_DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input><input type='hidden' name='SARPRAS_DTL_UPDATE_BY' value='<?php echo $userId; ?>'></input></td>
                        <td width='10%'><button type='button' class='btn btn-danger remove' id='<?php echo $no;$no++; ?>' name='button' style='width:100%;border-radius:0px;height:30px'>Hapus</button></td>
                      </tr>
                      <?php } ?>
                    </table>
                    <table width="100%">
                      <tr>
                        <td>
                          <button type="button" class="btn btn-primary addinventaris" id="1" name="button" style="width:100%;height:30px;border-radius:0">Tambah Data</button>
                        </td>
                      </tr>
                    </table>
                    <br>
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
<!-- /.content-wrapper -->

<script>
$(".addinventaris").click(function() {
    var total_element = $(".sarpas").length;
    $("#rmrowthis").remove();
    $("#tablesarpas").append(
        "<tr class='sarpas' id='protarow"+total_element+"'>"+
        "<td width='20%'><input required type='text' name='SARPRAS_DTL_JENIS_BARANG[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='10%'><input required type='text' name='SARPRAS_DTLJUMLAH_BARANG[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='10%'><input required type='text' name='SARPRAS_DTL_SATUAN[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='10%'><input required type='text' name='SARPRAS_DTL_KONDISI_BAIK[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='10%'><input required type='text' name='SARPRAS_DTL_KONDISI_RUSAK[]' style='width:100%;border:none;text-align:center'></input></td>"+
        "<td width='20%'><input required type='text' name='SARPRAS_DTL_KETERANGAN[]' style='width:100%;border:none;text-align:center'></input><input type='hidden' name='SARPRAS_DTL_UPDATE_BY' value='<?php echo $userId; ?>'></input></td>"+
        "<td width='10%'><button type='button' class='btn btn-danger remove' id='"+total_element+"' name='button' style='width:100%;border-radius:0px;height:30px'>Hapus</button></td>"+
        "</tr>"
      );
  });

  $("#tablesarpas").on('click','.remove',function(){
    var id = $(this).attr('id');
    console.log(id);
    $("#tablesarpas #protarow"+id).remove();
  });
</script>
