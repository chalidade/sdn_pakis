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
  $data      = $_REQUEST["data"];
  $query     = mysqli_query($mysqli, "SELECT * FROM `tx_hdr_rpp` as A LEFT JOIN `tx_dtl_rpp` as B ON A.RPP_HDR_ID = B.RPP_HDR_ID WHERE A.RPP_HDR_ID = '$data'");
  $rpp       = json_decode(json_encode(mysqli_fetch_assoc($query)),TRUE);
   ?>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary" style="padding:10px;">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title" style="text-transform:uppercase"><b>Rencana Pelaksanaan Pembelajaran</b></h3>
            </center>
          </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="app/model/RppModel.php?id=update" method="post" enctype="multipart/form-data">
                  <div class="box-body table-responsive">
                    <table width="100%" id="myTable" class="table order-list">
                      <tr>
                        <td width="15%"><b>Satuan Pendidikan<b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="RPP_HDR_SATUAN_PENDIDIKAN" value="<?php echo $rpp["RPP_HDR_SATUAN_PENDIDIKAN"]; ?>">
                          <input type="hidden" name="RPP_HDR_NO_PENGAJUAN" value="<?php echo $rpp["RPP_HDR_NO_PENGAJUAN"]; ?>">
                          <input type="hidden" name="RPP_HDR_ID" value="<?php echo $rpp["RPP_HDR_ID"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Muatan Terpadu</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="RPP_HDR_MUATAN_TERPADU" value="<?php echo $rpp["RPP_HDR_MUATAN_TERPADU"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Kelas</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="RPP_HDR_KELAS" value="<?php echo $rpp["RPP_HDR_KELAS"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Semester</b></td>
                        <td width="2%">:</td>
                        <td>
                          <select required class="form-control" name="RPP_HDR_SEMESTER" id="SEMESTER">
                              <?php if ($rpp["RPP_HDR_SEMESTER"] == '1') { ?>
                                <option value="1">Semester Ganjil</option>
                                <option value="2">Semester Genap</option>
                              <?php } else { ?>
                                <option value="2">Semester Genap</option>
                                <option value="1">Semester Ganjil</option>
                              <?php } ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Tema</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="RPP_HDR_TEMA" value="<?php echo $rpp["RPP_HDR_TEMA"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Sub Tema</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="RPP_HDR_SUB_TEMA" value="<?php echo $rpp["RPP_HDR_SUB_TEMA"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Pembelajaran</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="RPP_HDR_PEMBELAJARAN" value="<?php echo $rpp["RPP_HDR_PEMBELAJARAN"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Materi Pokok</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="RPP_HDR_MATERI_POKOK" value="<?php echo $rpp["RPP_HDR_MATERI_POKOK"]; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td width="15%"><b>Alokasi Waktu</b></td>
                        <td width="2%">:</td>
                        <td>
                          <input required type="text" class="form-control border-bottom-only" name="RPP_HDR_ALOKASI_WAKTU" value="<?php echo $rpp["RPP_HDR_ALOKASI_WAKTU"]; ?>">
                          <input type="hidden" name="RPP_HDR_UPDATE_BY" value="<?php echo $session["USER_ID"]; ?>">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>A. Kompetensi Inti</b></h4>
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <textarea id="KOMPETENSI_INTI" name="RPP_DTL_KOMPETENSI_INTI" rows="8" style="width:100%;padding:20px"><?php echo $rpp["RPP_DTL_KOMPETENSI_INTI"]; ?></textarea>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>B. Kompetensi Dasar dan Indikator Pencapaian Kompetensi</b></h4>
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <textarea id="KOMPETENSI_DASAR" name="RPP_DTL_KOMPETENSI_DASAR" rows="8" style="width:100%;padding:20px"><?php echo $rpp["RPP_DTL_KOMPETENSI_DASAR"]; ?></textarea>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <br>
                    <h4><b>C. Tujuan Pembelajaran</b></h4>
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <textarea id="TUJUAN_PEMBELAJARAN" name="RPP_DTL_TUJUAN_PEMBELAJARAN" rows="8" style="width:100%;padding:20px"><?php echo $rpp["RPP_DTL_TUJUAN_PEMBELAJARAN"]; ?></textarea>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>D. Materi Pembelajaran</b></h4>
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <textarea id="MATERI_PEMBELAJARAN" name="RPP_DTL_MATERI_PEMBELAJARAN" rows="8" style="width:100%;padding:20px"><?php echo $rpp["RPP_DTL_MATERI_PEMBELAJARAN"]; ?></textarea>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>E. Pendekatan, Model, dan Metode Pembelajaran</b></h4>
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <textarea id="METODE_PEMBELAJARAN" name="RPP_DTL_METODE_PEMBELAJARAN" rows="8" style="width:100%;padding:20px"><?php echo $rpp["RPP_DTL_METODE_PEMBELAJARAN"]; ?></textarea>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>F. Media / Alat, Bahan dan Sumber Belajar</b></h4>
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <textarea id="SUMBER_PEMBELAJARAN" name="RPP_DTL_SUMBER_BELAJAR" rows="8" style="width:100%;padding:20px"><?php echo $rpp["RPP_DTL_SUMBER_BELAJAR"]; ?></textarea>
                        </td>
                      </tr>
                    </table>
                    <h4><b>G. Kegiatan Pembelajaran</b></h4>
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <textarea id="KEGIATAN_PEMBELAJARAN" name="RPP_DTL_KEGIATAN_PEMBELAJARAN" rows="8" style="width:100%;padding:20px"><?php echo $rpp["RPP_DTL_KEGIATAN_PEMBELAJARAN"]; ?></textarea>
                        </td>
                      </tr>
                    </table>
                    <br>
                    <h4><b>H. Penilaian</b></h4>
                    <table width="100%" border="0">
                      <tr>
                        <td>
                          <textarea id="PENILAIAN" name="RPP_DTL_PENILAIAN" rows="8" style="width:100%;padding:20px"><?php echo $rpp["RPP_DTL_PENILAIAN"]; ?></textarea>
                          <input type="hidden" name="RPP_DTL_UPDATE_BY" value="<?php echo $session['USER_ID']; ?>">
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
<!-- /.content-wrapper -->
