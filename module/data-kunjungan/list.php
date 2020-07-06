<?php
	include '../../function/koneksi.php';
	include '../../function/pembantu.php';

	$kode_get = isset($_GET['kode_pasien']) ? $_GET['kode_pasien'] : false;

	$kode_pasien ="";
	$no_tamu ="";
	$tanggal_tamu ="";
	$keterangan ="";
	$button ="Input";

	if ($kode_get) {

		$query = mysqli_query($koneksi, "SELECT * FROM daftar_kunjungan
										 WHERE kode_pasien='$kode_get'");
		$row = mysqli_fetch_assoc($query);

		$no_tamu = $row['no_tamu'];
		$kode_pasien = $row['kode_pasien'];
		$tanggal_tamu = $row['tanggal_tamu'];
		$keterangan = $row['keterangan'];
		$button = "Update";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Data Kunjungan</title>
		
		<link href="<?php echo BASE_URL."bootstrap/css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo BASE_URL."bootstrap/js/bootstrap.min.js"; ?>" type="text/css" rel="stylesheet" />
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
				<button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon navbar-light"></span>
				</button>
				<a href="#" class="navbar-brand">
					<span>RS Medika</span>
				</a>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav ml-auto">
						<a href="<?= BASE_URL?>" class="nav-item nav-link">Beranda</a>
						<a href="<?php echo BASE_URL."module/data-dokter/list.php"; ?>" class="nav-item nav-link">Data Dokter</a>
						<a href="<?php echo BASE_URL."module/data-pasien/list.php"; ?>" class="nav-item nav-link">Data Pasien</a>
						<a href="<?php echo BASE_URL."module/data-kunjungan/list.php"; ?>" class="nav-item nav-link active">Data Kunjungan<span class="sr-only">(current)</span></a>
						<a href="<?php echo BASE_URL."module/rekam-medis/list.php"; ?>" class="nav-item nav-link">Rekam Medis</a>
						<a href="<?php echo BASE_URL."logout.php"; ?>" class="nav-item nav-link">Logout</a>
					</div>
				</div>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<div class="row">
					<div class="col-lg display-4">
						<span>Data Kunjungan RS Medika</span><br>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			
		<div class="text-center">
			<h3 style="margin-top: 50px; margin-bottom: 20px;">Form Input Data Kunjungan</h3>
		</div>

		<form action="<?php echo BASE_URL."module/data-kunjungan/input.php?kode_pasien=$kode_pasien"; ?>" method="POST">
				<div class="form-group">
					<label>Kode Pasien</label>
					<input type="text" class="form-control" value="<?= ($kode_pasien); ?>" name="kode_pasien" readonly>
				</div>
				<div class="form-group">
					<label>No Tamu</label>
					<input type="text" name="no_tamu" class="form-control" placeholder="XX-123" value="<?php echo($no_tamu); ?>">
				</div>
				<div class="form-group">
					<label>Tanggal Tamu</label>
					<input type="date" name="tanggal_tamu" class="form-control" value="<?php echo($tanggal_tamu); ?>">
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo($keterangan); ?></textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="button" value="<?php echo($button); ?>" class="btn btn-success tombol ml-auto">
				</div>
		</form>

		<div class="text-center">
			<h3 style="margin-top: 50px; margin-bottom: 20px;">Table Data Kunjungan</h3>
		</div>

		<div class="container">
			<form class="form-group" method="GET" action="<?php echo BASE_URL."module/data-kunjungan/list.php"; ?>">
				<input type="search" name="cari" class="form-control" placeholder="Cari Nomor Tamu" aria-label="Search" style="width: 500px;">
				<button class="btn btn-outline-success" type="submit" style="margin-top: 10px;">Cari</button>
			</form>
		</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<td>No</td>
					<td>Kode Pasien</td>
					<td>No Tamu</td>
					<td>Tanggal Tamu</td>
					<td>Keterangan</td>
					<td colspan="2" align="center">Action</td>
				</tr>
			</thead>
			<?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $data = mysqli_query($koneksi, "SELECT * FROM daftar_kunjungan WHERE no_tamu LIKE '%".$cari."%'");
                }
                else {
                	$data = mysqli_query($koneksi, "SELECT * FROM daftar_kunjungan");
                }

                $no = 1;
                while ($d = mysqli_fetch_array($data)) {

                    echo "<tbody>
							<tr>
								<th scope='row'>".$no++."</th>
								<td>".$d['kode_pasien']."</td>
								<td>".$d['no_tamu']."</td>
								<td>".$d['tanggal_tamu']."</td>
								<td>".$d['keterangan']."</td>
								<td align='center'><a href='".BASE_URL."module/data-kunjungan/list.php?kode_pasien=$d[kode_pasien]'>Update</a></td>
								<td align='center'><a href='".BASE_URL."module/data-kunjungan/hapus.php?kode_pasien=$d[kode_pasien]'>Hapus</a></td>
							</tr>
						</tbody>";
                }

            ?>
		</table>
			</div>
	</body>
</html>