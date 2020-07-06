<?php 
	
	include '../../function/koneksi.php';
	include '../../function/pembantu.php';

	$kode_pasien=$_GET['kode_pasien'];

	mysqli_query($koneksi, "DELETE FROM data_pasien WHERE kode_pasien='$kode_pasien'");
	
	header("location: ".BASE_URL."module/data-pasien/list.php");
	
?>
