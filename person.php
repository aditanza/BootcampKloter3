<?php
include 'koneksi.php';
  ?>          
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="text-center">Person Table</h3>
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
              <h3 class="modal-title">Input Person Data</h3>
            </div>
            <div class="modal-body">
              <form action="aksi_person.php?proses=entri" method="post" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Person Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Region</label>
                    <div class="col-sm-10">
                      <select name="region" class="form-control-sm">
<?php
  $ambil=mysql_query("SELECT * FROM regions");
?>
                        <option value="">--Select Region--</option>
<?php
  while ($data=mysql_fetch_array($ambil)){
?>
                        <option value="<?php echo $data['region_id']?>"><?php echo $data['region_name'] ?></option>
<?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="address" required style="resize: none;"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Income</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="income" required placeholder="Ex:3000000">
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
              <th><center>Person Name</center></th>
              <th><center>Region</center></th>
              <th><center>Address</center></th>
              <th><center>Income</center></th>
              <th><center>Created At</center></th>
              <th><center>Action</center></th>
            </tr>
          </thead>
        <tbody>
<?php
  $nomor=1;
  $sql= mysql_query("SELECT person.id, person.name, person.region_id, person.address, person.income, person.created_at, regions.region_id, regions.region_name FROM person INNER JOIN regions ON person.region_id=regions.region_id ORDER BY person.name");
  while($data=mysql_fetch_array($sql)){
?>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['region_name'] ?></td>
              <td><?php echo $data['address'] ?></td>
              <td><?php echo $data['income'] ?></td>
              <td><?php echo $data['created_at'] ?></td>
              <td>
<!-- Button trigger modal -->
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editdata<?php echo $data['id'];?>"><i class="fa fa-edit"></i> Edit </button>  <a href="aksi_person.php?proses=hapus&id_hapus=<?php echo $data['id']?>" onclick="return confirm('Yakin akan menghapus data?')"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button></a>
              </td>
            </tr>
<?php
  $nomor++;
  }
?>
        </tbody>
        </table>
<?php
  $sql= mysql_query("SELECT person.id, person.name, person.region_id, person.address, person.income, person.created_at, regions.region_id, regions.region_name FROM person INNER JOIN regions ON person.region_id=regions.region_id");
  while($data=mysql_fetch_array($sql)){
?>
<!-- Modal -->
      <div class="modal fade" id="editdata<?php echo $data['id'];?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Edit Person Data</h3>
            </div>
            <div class="modal-body">
              <form action="aksi_person.php?proses=ubah&id_ubah=<?php echo $data['id']?>" method="post" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Person Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" required value="<?php echo $data['name']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Region</label>
                    <div class="col-sm-10">
                      <select name="region" class="form-control-sm">
                      <option value="<?php echo $data['region_id']?>"><?php echo $data['region_name'] ?></option>
<?php
  $panggil=mysql_query("SELECT * FROM regions order by region_name");
  while ($baru=mysql_fetch_array($panggil)){
    if($data['region_id']==$baru['region_id']) continue;
    else{
?>
                      <option value="<?php echo $baru['region_id']?>"><?php echo $baru['region_name'] ?></option>
<?php
    }
  }
?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="address" required style="resize: none;"><?php echo $data['address']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-form-label">Income</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="income" required value="<?php echo $data['income']?>">
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