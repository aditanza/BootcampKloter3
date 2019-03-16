<?php
include 'koneksi.php';
  ?>          
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="text-center">Data Penduduk</h3>
        <form action="" method="post" class="form-horizontal">
          <h6 class="box-title">Daerah : </h6>
          <select name="region" class="form-control-sm">
<?php
  $ambil=mysql_query("SELECT * FROM regions");
?>
          <option value="all">Semua Daerah</option>
<?php
  while ($filter=mysql_fetch_array($ambil)){
?>
          <option value="<?php echo $filter['region_id']?>"><?php echo $filter['region_name'] ?></option>
<?php } ?>
          </select>
          <button type="submit" name="filter" class="btn btm-xs btn-primary">Filter</button>
        </form>
      </div>
<!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th><center>Id</center></th>
              <th><center>Nama Penduduk</center></th>
              <th><center>Gaji</center></th>
              <th><center>Daerah</center></th>
            </tr>
          </thead>
        <tbody>
<?php

if (isset($_POST['filter'])) {

  if ($_POST['region']=="all") {
  $sql= mysql_query("SELECT person.id, person.name, person.region_id, person.address, person.income, person.created_at, regions.region_id, regions.region_name FROM person INNER JOIN regions ON person.region_id=regions.region_id ORDER BY person.id");
  while($data=mysql_fetch_array($sql)){
?>
            <tr>
              <td><?php echo $data['id'] ?></td>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['income'] ?></td>
              <td><?php echo $data['region_name'] ?></td>
            </tr>
<?php
  }
}
else{
  $sql= mysql_query("SELECT person.id, person.name, person.region_id, person.address, person.income, person.created_at, regions.region_id, regions.region_name FROM person INNER JOIN regions ON person.region_id=regions.region_id WHERE person.region_id='$_POST[region]' ORDER BY person.id");
  while($data=mysql_fetch_array($sql)){
?>
            <tr>
              <td><?php echo $data['id'] ?></td>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['income'] ?></td>
              <td><?php echo $data['region_name'] ?></td>
            </tr>
<?php
  }
}
}
?>
        </tbody>
        </table>
      </div><!-- /.box-body -->               
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->