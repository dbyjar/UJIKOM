<?php

	include '../../function/koneksi.php';
	include '../../function/helper.php'; 
	
	$Nama= $_POST['Nama'];
	$Wajib= $_POST['Wajib'];
	$Pokok= $_POST['Pokok'];
	$Saldo= $_POST['Saldo'];
	$button = $_POST['button'];

	// kondisi jika button formnya Input
	if ($button == 'Input') {
		mysqli_query($koneksi, "INSERT INTO tblanggota VALUES('','$Nama','$Wajib','$Pokok','$Saldo')");
	}
	// kondisi jika button formnya Update
	elseif ($button == 'Update') {
		$No_Anggota = $_GET['No_Anggota'];

		mysqli_query($koneksi, "UPDATE tblanggota SET Nama='$Nama', Wajib='$Wajib', Pokok='$Pokok', Saldo='$Saldo' WHERE No_Anggota='$No_Anggota'");
	}

	header("location: ".BASE_URL."module/data-anggota/list.php");

?>