<?php
include 'koneksi.php';
  ?>          
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="text-center">Region Table</h3>
      </div>
<!-- /.box-header -->
      <div class="box-header">
<!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">
          <i class="fa fa-plus-circle"></i> Add Data
        </button>
      </div>
<!-- Modal -->
      <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Input Region Data</h3>
            </div>
            <div class="modal-body">
              <form action="aksi_region.php?proses=entri" method="post" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Region Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                      <button type="submit" name="simpan" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-sm-5"></div>
                  </div>
                </div><!-- /.box-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div><!-- /.box-footer -->
              </form>
            </div>
          </div>
        </div>
      </div><!-- end modal -->
      <div class="box-body">
        <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Region Name</center></th>
              <th><center>Created At</center></th>
              <th><center>Action</center></th>
            </tr>
          </thead>
        <tbody>
<?php
  $nomor=1;
  $sql=mysql_query("SELECT * from regions order by region_name");
  while($data=mysql_fetch_array($sql)){
?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $data['region_name'] ?></td>
              <td><?php echo $data['created_at'] ?></td>
              <td>
<!-- Button trigger modal -->
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editdata<?php echo $data['region_id'];?>"><i class="fa fa-edit"></i> Edit </button>  <a href="aksi_region.php?proses=hapus&id_hapus=<?php echo $data['region_id']?>" onclick="return confirm('Yakin akan menghapus data?')"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
              </td>
            </tr>
<?php
  $nomor++;
  }
?>
        </tbody>
        </table>
<?php
  $sql= mysql_query("SELECT * FROM regions");
  while($data=mysql_fetch_array($sql)){
?>
<!-- Modal -->
      <div class="modal fade" id="editdata<?php echo $data['region_id'];?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Edit Region Data</h3>
            </div>
            <div class="modal-body">
              <form action="aksi_region.php?proses=ubah&id_ubah=<?php echo $data['region_id']?>" method="post" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Region Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" required value="<?php echo $data['region_name']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                      <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                    <div class="col-sm-5"></div>
                  </div>
                </div><!-- /.box-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div><!-- /.box-footer -->
              </form>
            </div>
          </div>
        </div>
      </div><!-- end modal -->
<?php } ?>
      </div><!-- /.box-body -->               
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->