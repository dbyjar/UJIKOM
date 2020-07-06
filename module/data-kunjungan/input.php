<?php

	include '../../function/koneksi.php';
	include '../../function/pembantu.php'; 
	
	$kode_pasien= $_POST['kode_pasien'];
	$tanggal_tamu= $_POST['tanggal_tamu'];
	$keterangan= $_POST['keterangan'];
	$no_tamu= $_POST['no_tamu'];
	$button = $_POST['button'];

	if ($button == 'Input') {
		mysqli_query($koneksi, "INSERT INTO daftar_kunjungan VALUES('$no_tamu','$tanggal_tamu','$keterangan','')");
	}
	elseif ($button == 'Update') {
		$kode_pasien = $_GET['kode_pasien'];

		mysqli_query($koneksi, "UPDATE daftar_kunjungan SET no_tamu='$no_tamu', tanggal_tamu='$tanggal_tamu', keterangan='$keterangan' WHERE kode_pasien='$kode_pasien'");
	}

	header("location: ".BASE_URL."module/data-kunjungan/list.php");

?>