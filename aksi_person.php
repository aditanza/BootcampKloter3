<?php
include 'koneksi.php';

if($_GET['proses']=='entri'){
	if (isset($_POST['simpan'])) {
		$entri= mysql_query("INSERT INTO person(name,region_id,address,income) VALUES ('$_POST[name]','$_POST[region]','$_POST[address]','$_POST[income]')");
		if($entri) header("location:index.php?p=person");
		else{
?>
    	<script type="text/javascript">alert('Gagal Input Data')</script>
<?php
		}
	}
}

if($_GET['proses']=='hapus'){
	$hapus= mysql_query("DELETE FROM person WHERE id='$_GET[id_hapus]'");
	if($hapus){
		header('location:index.php?p=person');
	}
}

if($_GET['proses']=='ubah'){
	if (isset($_POST['edit'])) {
		$ubah= mysql_query("UPDATE person SET name='$_POST[name]',region_id='$_POST[region]',address='$_POST[address]',income='$_POST[income]' WHERE id='$_GET[id_ubah]'");
		if($ubah) header("location:index.php?p=person");
		else{
?>
    	<script type="text/javascript">alert('Gagal Edit Data')</script>
<?php
		}
	}
}
?>