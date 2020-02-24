<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Message Menu
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
              <h3 class="box-title">Data Message</h3>
            </div>

                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">No</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Name</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Phone Number</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Option</th>
                    </thead>
                    <tbody>
                      <?php
                        include "proses/koneksi.php";
                        $no = 1;
                        $query = mysqli_query($connect, "SELECT * FROM `message`");
                        while ($user = mysqli_fetch_array($query)) {
                          $id =  $user['id'];
                      ?>
                      <tr role="row" class="odd">
                      <td class=""><?php echo $no;$no++; ?></td>
                      <td class=""><?php echo $user["nama"]; ?></td>
                      <td class=""><?php echo $user["email"]; ?></td>
                      <td class=""><?php echo $user["phone"]; ?></td>
                      <td class="">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default<?php echo $id; ?>">View</button>
                        <div class="modal fade" id="modal-default<?php echo $id; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Detail Message</h4>
                            </div>
                            <div class="modal-body" style="padding:20px">
                              <div class="row">
                                <div class="col-md-6">
                                  <img src="proses/image/message.png" style="width:100%">
                                </div>
                                <div class="col-md-6">
                                    <h2 style="margin-top: 0px;"><?php echo $user["nama"]; ?></h2>
                                    <p><?php echo $user["email"]; ?> | <?php echo $user["phone"]; ?></p>
                                    <p><?php echo $user["keterangan"]; ?></p>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    </div>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="proses/delete.php?data=message&id=<?php echo $user['id']; ?>&page=message" type="button" class="btn btn-danger" name="button">Delete</a>
                      </td>
                    </tr>
                      <?php
                        }
                       ?>
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
