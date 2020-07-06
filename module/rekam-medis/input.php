<?php

	include '../../function/koneksi.php';
	include '../../function/pembantu.php'; 
	
	$tanggal= $_POST['tanggal'];
	$diagnosa= $_POST['diagnosa'];
	$obat= $_POST['obat'];
	$keterangan= $_POST['keterangan'];
	$kode_dokter= $_POST['kode_dokter'];
	$kode_pasien= $_POST['kode_pasien'];
	$button = $_POST['button'];

	if ($button == 'Input') {
		mysqli_query($koneksi, "INSERT INTO transaksi_reka_medis VALUES('$tanggal','$diagnosa','$obat','$keterangan','$kode_dokter','')");
	}
	elseif ($button == 'Update') {
		$kode_pasien = $_GET['kode_pasien'];

		mysqli_query($koneksi, "UPDATE transaksi_reka_medis SET tanggal='$tanggal', diagnosa='$diagnosa', obat='$obat' ,keterangan='$keterangan', kode_dokter='$kode_dokter' WHERE kode_pasien='$kode_pasien'");
	}

	header("location: ".BASE_URL."module/rekam-medis/list.php");

?>