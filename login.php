<?php
	include 'function/koneksi.php';
	include 'function/helper.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
		
		<link href="<?php echo BASE_URL."bootstrap/css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />
	</head>
	<body>
			<?php
				if(isset($_GET['pesan']))
				{
					if($_GET['pesan']=="gagal")
					{
						echo "<div class='alert text-center'>Username dan Password belum sesuai !</div>";
					}
					else if($_GET['pesan']=="logout")
					{
						echo "<div class='alert text-center'>Anda sudah berhasil Logout</div>";
					}
					else if($_GET['pesan']=="belum_login")
					{
						echo "<div class='alert text-center'>Anda harus Login untuk mengakses situs ini !</div>";
					}
				}
			?>
			
		<div class="container">
			<div class="content mt-5"></div>
			<h2 class="text-center">Form Login Koperasi Fajar Sejahtera</h2>
			<form action="cek-login.php" method="POST" style="padding: 30px 300px;">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<center>
						<input type="submit" name="button" value="Login" class="btn btn-success">
					</center>
				</div>
			</form>
		</div>

		<script src="<?php echo BASE_URL."bootstrap/js/bootstrap.min.js"; ?>"></script>
	</body>
</html>