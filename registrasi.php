<?php 
	
require 'functions.php';

	if(isset($_POST["register"]) ) {

		if ( registrasi($_POST) > 0 ){
			echo "<script>
					alert('User baru berhasil ditambahkan!');
				  </script>";
			echo "<script>
					window.location.href='login.php'
				</script";
		} else {
			echo mysqli_error($conn);
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" type="text/css" href="registrasi.css">
</head>
<body>
	<div class="top-bar">
		<p>Tertarik dengan jasa kami? Langsung <a href="halaman3.php">ORDER</a> aja kuy :)</p>
	</div>
	<div class="container">
		<div class="header">
			<div class="navigasi">
				<a class="satu" href="halaman1.php">Beranda</a><a href="halaman2.php">Galery</a><a href="halaman3.php">Order</a><a href="halaman4.php">about us</a><a class="lima" href="login.php">Member Area</a>
			</div>
		</div>
		<div class="gambar"></div>
		<div class="content cf">
			<div class="main">

				<h1>Halaman Registrasi</h1>
				<h3>Sudah mempunyai akun? silakan <a class="regis" href="login.php">Login</a> disini</h3>

				<div class="kotak-regis">
					<form action="" method="post">
						<p class="tulisan-regis">Silakan buat akun disini!</p>
						<label for="username" > Username :</label>
						<input type="text" name="username" id="username" class="form-regis" autocomplete="off">
						
						<label for="password" > Password :</label>
						<input type="password" name="password" id="password" class="form-regis">
							
						<label for="password2" > Konfirmasi Password :</label>
						<input type="password" name="password2" id="password2" class="form-regis">
							
						<button type="submit" name="register" class="tombol-submit">Register!</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>