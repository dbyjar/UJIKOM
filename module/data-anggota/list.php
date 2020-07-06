<?php
	include '../../function/koneksi.php';
	include '../../function/helper.php';

	$No_Anggota = isset($_GET['No_Anggota']) ? $_GET['No_Anggota'] : false;

	$Nama ="";
	$Wajib ="";
	$Pokok ="";
	$Saldo ="";
	$button ="Input";

	if ($No_Anggota) {
		$query = mysqli_query($koneksi, "SELECT * FROM tblanggota WHERE No_Anggota='$No_Anggota'");
		$row = mysqli_fetch_assoc($query);

		$Nama = $row['Nama'];
		$Wajib = $row['Wajib'];
		$Pokok = $row['Pokok'];
		$Saldo = $row['Saldo'];
		$button = "Update";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Data Anggota</title>
		
		<link href="<?= BASE_URL."bootstrap/css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />

		<style type="text/css">
			.jumbotron {
				background: transparent;
			}
		</style>
	</head>
	<body>
		<?php

			session_start();
			if($_SESSION['status']!="login")
			{
				header("location:login.php?pesan=belum_login");
			}

		?>

		<nav class="navbar nav-vector navbar-expand-lg navbar-light">
			<div class="container">
				<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon navbar-dark"></span>
				</button>
				<a href="#" class="navbar-brand">
					<span>Koperasi Fajar Sejahtera</span>
				</a>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav mx-auto">
						<a href="#" class="nav-item nav-link active">
							Beranda<span class="sr-only">(current)</span>
						</a>
						<a href="<?= BASE_URL."module/data-anggota/list.php"; ?>" class="nav-item nav-link">Data Anggota</a>
						<a href="<?= BASE_URL."module/data-pasien/list.php"; ?>" class="nav-item nav-link">Data Kasir</a>
						<a href="<?= BASE_URL."module/data-kunjungan/list.php"; ?>" class="nav-item nav-link">Data Login</a>
						<a href="<?= BASE_URL."module/data-kunjungan/list.php"; ?>" class="nav-item nav-link">Transaksi</a>
					</div>
						<a href="<?= BASE_URL."logout.php"; ?>" class="btn btn-danger">Logout</a>
				</div>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<div class="row">
					<div class="col-lg display-4">
						<span>Data Aggota Koperasi Fajar Sejahtera</span><br>
					</div>
				</div>
			</div>
		</div>

		<div class="text-center">
			<h3 style="margin-top: 50px; margin-bottom: 20px;">Form Input Data Anggota</h3>
		</div>

			<div class="container">
		<form action="<?= BASE_URL."module/data-anggota/input.php?No_Anggota=$No_Anggota"; ?>" method="POST">
				<div class="form-group">
					<label>Nama Anggota</label>
					<input type="text" name="Nama" class="form-control" placeholder="Nama" value="<?=($Nama); ?>">
				</div>
				<div class="form-group">
					<label>Wajib</label>
					<input type="text" name="Wajib" class="form-control" value="<?=($Wajib); ?>">
				</div>
				<div class="form-group">
					<label>Pokok</label>
					<input type="text" name="Pokok" class="form-control" value="<?=($Pokok); ?>">
				</div>
				<div class="form-group">
					<label>Saldo</label>
					<input type="text" name="Saldo" class="form-control" value="<?=($Saldo); ?>">
				</div>
				<div class="form-group">
					<input type="submit" name="button" value="<?=($button); ?>" class="btn btn-success tombol ml-auto">
				</div>
		</form>

		<div class="text-center">
			<h3 style="margin-top: 50px; margin-bottom: 20px;">Table Data Anggota</h3>
		</div>

		<!-- <div class="container">
			<form class="form-group" method="GET" action="<?php //echo BASE_URL."module/data-anggota/list.php"; ?>">
				<input type="search" name="cari" class="form-control" placeholder="Cari Nama Dokter" aria-label="Search" style="width: 500px;">
				<button class="btn btn-outline-success" type="submit" style="margin-top: 10px;">Cari</button>
			</form>
		</div> -->

		<table class="table table-striped">
			<thead>
				<tr>
					<td>No</td>
					<td>Nama</td>
					<td>Wajib</td>
					<td>Pokok</td>
					<td>Saldo</td>
					<td colspan="2" align="center">Action</td>
				</tr>
			</thead>
			<?php
                // if (isset($_GET['cari'])) {
                //     $cari = $_GET['cari'];
                //     $data = mysqli_query($koneksi, "SELECT * FROM tblanggota WHERE nama_anggota LIKE '%".$cari."%'");
                // }
                // else {
                    $data = mysqli_query($koneksi, "SELECT * FROM tblanggota");
                //}

                $no = 1;
                while ($d = mysqli_fetch_array($data)) {

                    echo "<tbody>
							<tr>
								<th scope='row'>".$no++."</th>
								<td>".$d['Nama']."</td>
								<td>".$d['Wajib']."</td>
								<td>".$d['Pokok']."</td>
								<td>".$d['Saldo']."</td>
								<td align='center'><a href='".BASE_URL."module/data-anggota/list.php?No_Anggota=$d[No_Anggota]'>Update</a></td>
								<td align='center'><a href='".BASE_URL."module/data-anggota/hapus.php?No_Anggota=$d[No_Anggota]'>Hapus</a></td>
							</tr>
						</tbody>";
                }
            ?>
		</table>
			</div>

		<script src="<?php echo BASE_URL."bootstrap/js/bootstrap.min.js"; ?>"></script>
	</body>
</html>