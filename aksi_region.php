<?php
include 'koneksi.php';

if($_GET['proses']=='entri'){
	if (isset($_POST['simpan'])) {
		$entri= mysql_query("INSERT INTO regions(region_name) VALUES ('$_POST[nama]')");
		if($entri) header("location:index.php?p=region");
		else{
?>
    	<script type="text/javascript">alert('Gagal Input Data')</script>
<?php
		}
	}
}

if($_GET['proses']=='hapus'){
	$hapus= mysql_query("DELETE FROM regions WHERE region_id='$_GET[id_hapus]'");
	if($hapus){
		header('location:index.php?p=region');
	}
}

if($_GET['proses']=='ubah'){
	if (isset($_POST['edit'])) {
		$ubah= mysql_query("UPDATE regions SET region_name='$_POST[nama]' WHERE region_id='$_GET[id_ubah]'");
		if($ubah) header("location:index.php?p=region");
		else{
?>
    	<script type="text/javascript">alert('Gagal Edit Data')</script>
<?php
		}
	}
}
?>