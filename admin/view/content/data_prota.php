<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Booking Menu
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
              <h3 class="box-title">Data Booking</h3>
            </div>

                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">No</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Package Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Person</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Duration</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Price</th>
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column descending" aria-sort="ascending">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        include "proses/koneksi.php";
                        $no = 1;
                        $query = mysqli_query($connect, "SELECT * FROM `package`");
                        while ($package = mysqli_fetch_array($query)) {
                          $id = $package["id"];
                      ?>
                      <tr role="row" class="odd">
                      <td class=""><?php echo $no;$no++; ?></td>
                      <td class=""><?php echo $package["name"]; ?> </td>
                      <td class=""><?php echo $package["person"]; ?> Person</td>
                      <td class=""> <?php echo $package["duration"]; ?> Days</td>
                      <td class="sorting_1">Rp <?php echo $package["price"]; ?></td>
                      <td class="">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default<?php echo $id; ?>">View</button>
                            <div class="modal fade" id="modal-default<?php echo $id; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Detail Package</h4>
                                </div>
                                <div class="modal-body" style="padding:20px">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <img src="proses/<?php echo $package["photo"]; ?>" style="width:100%">
                                    </div>
                                    <div class="col-md-6">
                                        <h2 style="margin-top: 0px;"><?php echo $package["name"]; ?></h2>
                                        <p style="font-size:12px"><?php echo $package["duration"]; ?> Day | <?php echo $package["person"]; ?> Person</p>
                                        <p><?php echo $package["description"]; ?></p>
                                        <h4>Rp <?php echo $package["price"]; ?></h4>
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                        </div>
                        <button type="button" class="btn btn-primary" name="button"> Edit</button>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="proses/delete.php?data=package&id=<?php echo $package['id']; ?>&page=data_paket" type="button" class="btn btn-danger" name="button">Delete</a>
                      </td>
                    </tr>
                      <?php
                        }
                       ?>
                     </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <!-- /.box -->
            </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
