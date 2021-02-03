<?php 
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;		

}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Layanan Desain Online</title>
	<link rel="stylesheet" type="text/css" href="hal5.css">
</head>
<body>
	<div class="top-bar">
		<p>Tertarik dengan jasa kami? Langsung <a href="halaman3.php">ORDER</a> aja kuy :)</p>
	</div>
	<div class="container">

		<div class="header">
			<div class="navigasi">
				<a href="halaman1.php">Beranda</a><a href="halaman2.php">Galery</a><a href="halaman3.php">Order</a><a href="halaman4.php">about us</a><a href="halaman5.php">Member Area</a>
			</div>
		</div>
		<div class="content cf">
			<div class="main">
				<h1>Member Area</h1>
				<h4>Hello, selamat datang</h4>
				<p>Harap menghubungi admin <a href="https://www.google.com/"><img src="wa.jpg"></a> untuk detail harga dan permintaan anda yang lebih detail!</p>
			<a href="logout.php" class="logout">Logout</a>	
			</div>
					
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>