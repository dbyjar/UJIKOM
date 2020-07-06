<?php 
	
	include '../../function/koneksi.php';
	include '../../function/pembantu.php';

	$kode_pasien=$_GET['kode_pasien'];

	mysqli_query($koneksi, "DELETE FROM transaksi_reka_medis WHERE kode_pasien='$kode_pasien'");
	
	header("location: ".BASE_URL."module/rekam-medis/list.php");
	
?>
