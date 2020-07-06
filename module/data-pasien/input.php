<?php

	include '../../function/koneksi.php';
	include '../../function/pembantu.php'; 
	
	$nama_pasien= $_POST['nama_pasien'];
	$tempat_lahir= $_POST['tempat_lahir'];
	$tanggal_lahir= $_POST['tanggal_lahir'];
	$alamat= $_POST['alamat'];
	$no_hp= $_POST['no_hp'];
	$button = $_POST['button'];

	if ($button == 'Input') {
		mysqli_query($koneksi, "INSERT INTO data_pasien VALUES('','$nama_pasien','$tempat_lahir','$tanggal_lahir','$alamat','$no_hp')");
	}
	elseif ($button == 'Update') {
		$kode_pasien = $_GET['kode_pasien'];

		mysqli_query($koneksi, "UPDATE data_pasien SET nama_pasien='$nama_pasien', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir' ,alamat='$alamat', no_hp='$no_hp' WHERE kode_pasien='$kode_pasien'");
	}

	header("location: ".BASE_URL."module/data-pasien/list.php");

?>