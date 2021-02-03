<?php 
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"]) ){
	echo "<script>
			alert('Anda Harus Login Terlebih Dahulu!')
		</script>";
	echo "<script>
			window.location.href='login.php'
		</script";
}

$conn = mysqli_connect("localhost", "root", "", "tugasdpw");

if (isset($_POST["submit"])){
	
	if (tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Pesanan Anda akan Diproses!');
				document.location.href = 'halaman3.php';
			</script>
		";
	} else {
		echo "	
			<script>
				alert('Permintaan Gagal!');
				document.location.href = 'halaman3.php';
			</script>
		";
	}

 }

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="halaman3.css">
</head>
<body>
	<div class="top-bar">
		<p>Tertarik dengan jasa kami? Langsung <a href="halaman3.php">ORDER</a> aja kuy :)</p>
	</div>
	<div class="container">
		<div class="header">
			<div class="navigasi">
				<a class="satu" href="halaman1.php">Beranda</a><a href="halaman2.php">Galery</a><a href="#">Order</a><a href="halaman4.php">about us</a><a class="lima" href="halaman5.php">Member Area</a>
			</div>
		</div>
		<div class="gambar"></div>
		<div class="content cf">
			<div class="main">
				<h1>Data Pesanan</h1>

				<form action="" method="post" enctype="multipart/form-data">
					<p class="tulisan-pesanan">Silakan isi sesuia keperluan anda!</p>
						<input type="text" name="nama" id="nama"
						required="required" autofocus placeholder="Nama Anda" autocomplete="off" class="form-order">
					
						<input type="text" name="wa" id="wa"
						required="required" autofocus placeholder="No. Whatsapp Anda" class="form-order">
				
						<input type="text" name="email" id="email"
						required="required" autofocus placeholder="Email Anda" class="form-order">
					
						<label for="jenis">Mau Desain Apa :</label>
						<select name="jenis" id="jenis" required="required" class="form-order">
							<option>Baner</option>
							<option>Logo</option>
							<option>Kaos</option>								<option>Vektor</option>
							<option>Edit</option>
						</select>
					
						<label for="type">Type :</label>
						<select name="type" id="type" required="required" class="form-order">
							<option>Type 1</option>
							<option>Type 2</option>
							<option>Type 3</option>
						</select>
					
						<input type="text" name="tujuan" id="tujuan"
						required="required" autofocus placeholder="Tujuan Pembuatan" class="form-order">
					
						<input type="text" name="warna" id="warna"
						required="required" autofocus placeholder="Rekomendasi Warna" class="form-order">
					
						<label for="gambar">Referensi Desain (optional)</label>
						<input type="file" name="gambar" id="gambar" class="form-order">
					
						<label for="gambar2">Referensi Desain (optional)</label>
						<input type="file" name="gambar2" id="gambar2" class="form-order">
					
						<input type="textarea" name="keterangan" id="keterangan" autofocus placeholder="keterangan" class="form-order, ket">
				
						<button type="submit" name="submit" class="tombol-submit">Submit</button>
			
				</form>
				<a href="logout.php" class="logout">Logout</a>

			</div>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>