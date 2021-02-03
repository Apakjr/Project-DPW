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

$pesanan = query("SELECT * FROM pesanan ORDER BY id DESC");
//untuk mencari data
if (isset($_POST["cari"])){
	$pesanan = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<div class="top-bar">
		<p>Tertarik dengan jasa kami? Langsung <a href="halaman3.php">ORDER</a> aja kuy :)</p>
	</div>
	<div class="container">
		<div class="header">
			<div class="navigasi">
				<a class="satu" href="halaman1.php">Beranda</a><a href="halaman2.php">Galery</a><a href="halaman3.php">Order</a><a href="halaman4.php">about us</a><a class="lima" href="#">Member Area</a>
			</div>
		</div>
		<div class="gambar"></div>
		<div class="content cf">
			<div class="main">

				<h1>Data Pembeli</h1>
				<a href="logout.php">Logout</a>

				<form action="" method="post">
					<input type="text" name="keyword" size="50" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
					<button type="submit" name="cari">Cari</button>
				</form>
				<br>

				<table border="1" cellpadding="10" cellspacing="0">
	
					<tr>
						<th>No.</th>
						<th>Aksi</th>
						<th>Nama</th>
						<th>WA</th>
						<th>Email</th>
						<th>Jenis</th>
						<th>Type</th>
						<th>Tujuan</th>
						<th>Warna</th>
						<th>Gambar</th>
						<th>Gambar 2</th>
						<th>Keterangan</th>
					</tr>

					<?php $i = 1; ?>
					<?php foreach ( $pesanan as $row)  : ?>
					<tr>
						<td><?php echo $i;  ?></td>
						<td>
							<a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> |
							<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
						</td>
						<td><?php echo $row["nama"]; ?></td>
						<td><?php echo $row["wa"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["jenis"]; ?></td>
						<td><?php echo $row["type"]; ?></td>
						<td><?php echo $row["tujuan"]; ?></td>
						<td><?php echo $row["warna"]; ?></td>
						<td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
						<td><img src="img/<?php echo $row["gambar2"]; ?>" width="50"></td>
						<td><?php echo $row["keterangan"]; ?></td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>

				</table>
			</div>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>