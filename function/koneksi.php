<?php

	$server ="localhost";
	$username ="root";
	$password ="";
	$database ="penjualan";

	$koneksi =mysqli_connect($server, $username, $password, $database)
	or die("Koneksi ke database Gagal!");

