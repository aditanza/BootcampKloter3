<?php
include 'koneksi.php';
  ?>          
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="text-center">Data Daerah</h3>
      </div>
<!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th><center>Id</center></th>
              <th><center>Nama Daerah</center></th>
              <th><center>Jumlah Penduduk</center></th>
              <th><center>Total Pendapatan</center></th>
              <th><center>Rata-Rata Pendapatan</center></th>
              <th><center>Status</center></th>
            </tr>
          </thead>
        <tbody>
<?php
  $sql=mysql_query("SELECT * from regions");
  while($data=mysql_fetch_array($sql)){
?>
            <tr>
              <td><?php echo $data['region_id'] ?></td>
              <td><?php echo $data['region_name'] ?></td>
              <td>
<?php
  $cek= mysql_query("SELECT * FROM person WHERE region_id='$data[region_id]'");
    $penduduk= mysql_num_rows($cek);
  echo $penduduk;
?>
              </td>
              <td>
<?php
  $cek= mysql_query("SELECT * FROM person WHERE region_id='$data[region_id]'");
    $total=0;
    while($pendapatan=mysql_fetch_array($cek)){
      $total=$total+$pendapatan['income'];
    }
  echo $total;
?>
              </td>
              <td>
<?php
  $ratarata=$total/$penduduk;
  echo $ratarata;
?>
              </td>
              <td>
<?php
  if ($ratarata<"1700000") {
?>
<font size="3" style="background-color: red;">Merah</font>
<?php
  }
  elseif ($ratarata>"2200000") {
?>
<font size="3" style="background-color: green;">Hijau</font>
<?php
  }
  else{
?>
<font size="3" style="background-color: yellow;">Kuning</font>
<?php
  }
?>
              </td>
            </tr>
<?php
  }
?>
        </tbody>
        </table>
      </div><!-- /.box-body -->               
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->