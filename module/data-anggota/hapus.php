<?php 
	
	include '../../function/koneksi.php';
	include '../../function/pembantu.php';

	$kode_dokter=$_GET['kode_dokter'];

	mysqli_query($koneksi, "DELETE FROM data_dokter WHERE kode_dokter='$kode_dokter'");
	
	header("location: ".BASE_URL."module/data-dokter/list.php");
	
?>
