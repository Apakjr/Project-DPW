<?php
session_start();
require 'functions.php';

//cek cookie
if ( isset($_COOKIE['login']) ){
	if ( $_COOKIE['login'] == 'true' ){
		$_SESSION['login'] = true;
	}
}

if ( isset($_SESSION["login"]) ){
	header("Location: halaman3.php");
	exit;
}


	if ( isset($_POST["login"]) ){

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

		// cek username 
		if ( mysqli_num_rows($result) === 1 ){

			// cek password
			$row = mysqli_fetch_assoc($result);
			if ( password_verify($password, $row["password"]) ){
				//set session
				$_SESSION["login"] = true;

				//cek remember me
				if ( isset($_POST['remember']) ){
					//buat cookie
					setcookie('login', 'true', time()+60);
				}

				//cek admin atau bukan
				if ( $row['level'] == "admin"){
					$_SESSION['username'] = $username;
					$_SESSION['level'] = "admin";
					header("Location: admin.php");
					exit;
				} else{
					header("Location: halaman3.php");
					exit;
				}
			} 
		}

		$error = true;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="top-bar">
		<p>Tertarik dengan jasa kami? Langsung <a href="halaman3.php">ORDER</a> aja kuy :)</p>
	</div>
	<div class="container">
		<div class="header">
			<div class="navigasi">
				<a class="satu" href="halaman1.php">Beranda</a><a href="halaman2.php">Galery</a><a href="halaman3.php">Order</a><a href="halaman4.php">about us</a><a class="lima" href="halaman5.php">Member Area</a>
			</div>
		</div>
		<div class="gambar"></div>
		<div class="content cf">
			<div class="main">
				<h1>Halaman Login</h1>
				<h3>Belum mempunyai akun? Silakan <a class="regis" href="registrasi.php">REGISTRASI</a> disini!</h3>

				<?php if( isset($error)) : ?>
					<p class="alert">Username / Password salah</p>
					<?php echo mysqli_error($conn); ?>
				<?php endif; ?>

				<div class="kotak-login">
					<p class="tulisan-login">Silakan Login</p>

					<form action="" method="post">
						<label for="username">Username :</label>
						<input type="text" name="username" id="username" class="form-login" autocomplete="off">
				
						<label for="password">Password :</label>
						<input type="password" name="password" id="password" class="form-login">
							
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Remember me</label>
					
						<button type="submit" name="login" class="tombol-login">Login</button>
					</form>
				</div>			
			</div>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>