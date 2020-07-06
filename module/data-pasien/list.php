<?php
	include '../../function/koneksi.php';
	include '../../function/pembantu.php';

	$kode_pasien = isset($_GET['kode_pasien']) ? $_GET['kode_pasien'] : false;

	$nama_pasien ="";
	$tempat_lahir ="";
	$tanggal_lahir ="";
	$alamat ="";
	$no_hp ="";
	$button ="Input";

	if ($kode_pasien) {
		$query = mysqli_query($koneksi, "SELECT * FROM data_pasien WHERE kode_pasien='$kode_pasien'");
		$row = mysqli_fetch_assoc($query);

		$nama_pasien = $row['nama_pasien'];
		$tempat_lahir = $row['tempat_lahir'];
		$tanggal_lahir = $row['tanggal_lahir'];
		$alamat = $row['alamat'];
		$no_hp = $row['no_hp'];
		$button = "Update";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Data Pasien</title>
		
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
						<a href="<?php echo BASE_URL."module/data-pasien/list.php"; ?>" class="nav-item nav-link active">Data Pasien<span class="sr-only">(current)</span></a>
						<a href="<?php echo BASE_URL."module/data-kunjungan/list.php"; ?>" class="nav-item nav-link">Data Kunjungan</a>
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
						<span>Data Pasien RS Medika</span><br>
					</div>
				</div>
			</div>
		</div>

		<div class="text-center">
			<h3 style="margin-top: 50px; margin-bottom: 20px;">Form Input Data Pasien</h3>
		</div>

			<div class="container">
		<form action="<?php echo BASE_URL."module/data-pasien/input.php?kode_pasien=$kode_pasien"; ?>" method="POST">
				<div class="form-group">
					<label>Nama Pasien</label>
					<input type="text" name="nama_pasien" class="form-control" placeholder="Nama" value="<?php echo($nama_pasien); ?>">
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control" placeholder="Jonggol" value="<?php echo($tempat_lahir); ?>">
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo($tanggal_lahir); ?>">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" class="form-control" placeholder="Jl. xxx" value="<?php echo($alamat); ?>">
				</div>
				<div class="form-group">
					<label>No. Handphone/Telp</label>
					<input type="text" name="no_hp" class="form-control" placeholder="+6285xxx" value="<?php echo($no_hp); ?>">
				</div>
				<div class="form-group">
					<input type="submit" name="button" value="<?php echo($button); ?>" class="btn btn-success tombol ml-auto">
				</div>
		</form>

		<div class="text-center">
			<h3 style="margin-top: 50px; margin-bottom: 20px;">Table Data Pasien</h3>
		</div>

		<div class="container">
			<form class="form-group" method="GET" action="<?php echo BASE_URL."module/data-pasien/list.php"; ?>">
				<input type="search" name="cari" class="form-control" placeholder="Cari Nama Pasien" aria-label="Search" style="width: 500px;">
				<button class="btn btn-outline-success" type="submit" style="margin-top: 10px;">Cari</button>
			</form>
		</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<td>No</td>
					<td>Nama</td>
					<td>TTL</td>
					<td>Alamat</td>
					<td>No. Handphone/Telp</td>
					<td colspan="2" align="center">Action</td>
				</tr>
			</thead>
			<?php
                if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $data = mysql_query("SELECT * FROM data_pasien WHERE nama_pasien LIKE '%".$cari."%'");
                }
                else {
                    $data = mysqli_query($koneksi, "SELECT * FROM data_pasien");
                }

                $no = 1;
                while ($d = mysqli_fetch_array($data)) {

                    echo "<tbody>
							<tr>
								<th scope='row'>".$no++."</th>
								<td>".$d['nama_pasien']."</td>
								<td>".$d['tempat_lahir'].", ".$d['tanggal_lahir']."</td>
								<td>".$d['alamat']."</td>
								<td>".$d['no_hp']."</td>
								<td align='center'><a href='".BASE_URL."module/data-pasien/list.php?kode_pasien=$d[kode_pasien]'>Update</a></td>
								<td align='center'><a href='".BASE_URL."module/data-pasien/hapus.php?kode_pasien=$d[kode_pasien]'>Hapus</a></td>
							</tr>
						</tbody>";
                }

                /*$tot = mysql_num_rows($data);
                echo "<tr class='total'>
                            <td colspan='4'>Total Bunga</td>
                            <td colspan='2' align='center'>$tot</td>
                        </tr>";*/
            ?>
		</table>
			</div>
	</body>
</html>