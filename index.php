<?php
	include 'function/koneksi.php';
	include 'function/helper.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Koperasi Fajar Sejahtera</title>
		
		<link href="<?php echo BASE_URL."bootstrap/css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />

		<!-- <style type="text/css">
        	.card {
        		padding: 20px 20px;
        		text-align: center;
        		border-radius: 5px;
        		margin: 0px 5px;
        		box-sizing: border-box;
        		color: white;
        	}

        	.card a {
        		padding: 10px 0px;
        		margin-top: 20px;
        		border-top: 1px solid white;
        		text-decoration: none;
        		color: white;
        	}
        </style> -->

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
					<div class="navbar-nav ml-auto">
						<a href="#" class="nav-item nav-link active">
							Beranda<span class="sr-only">(current)</span>
						</a>
						<a href="<?php echo BASE_URL."module/data-anggota/list.php"; ?>" class="nav-item nav-link">Data Anggota</a>
						<a href="<?php echo BASE_URL."module/data-pasien/list.php"; ?>" class="nav-item nav-link">Data Kasir</a>
						<a href="<?php echo BASE_URL."module/data-kunjungan/list.php"; ?>" class="nav-item nav-link">Data Login</a>
						<a href="<?php echo BASE_URL."module/data-kunjungan/list.php"; ?>" class="nav-item nav-link">Transaksi</a>
						<a href="<?php echo BASE_URL."logout.php"; ?>" class="btn btn-danger ml-3">Logout</a>
					</div>
				</div>
			</div>
		</nav>

		<!-- card -->
		<!-- <div class="container mt-5">
		<div class="row">
		  <div class="col-sm-6">
		    <div class="card text-center">
		      <div class="card-body">
		        <h5 class="card-title">Master Data</h5>
		        <p class="card-text">Berisi Data-data Anggota, Kasir, dan Login</p>
		        <a href="#" class="btn btn-primary">Go</a>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6">
		    <div class="card text-center">
		      <div class="card-body">
		        <h5 class="card-title">Menu Transaksi</h5>
		        <p class="card-text">Menu untuk melakukan transaksi Simpan dan Pinjam</p>
		        <a href="#" class="btn btn-primary">Go</a>
		      </div>
		    </div>
		  </div>
		</div>
		</div> -->
        
        <script src="<?php echo BASE_URL."bootstrap/js/bootstrap.min.js"; ?>"></script>
	</body>
</html>