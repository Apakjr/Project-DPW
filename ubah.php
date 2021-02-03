<?php 

session_start();

if ( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'functions.php';

//ambil data di url
$id = $_GET["id"];

//query data pesanan  berdasarkan idnya
$pesanan = query("SELECT * FROM pesanan WHERE id = $id")[0];


if (isset($_POST["submit"]) ){

	
	if (ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah');
				document.location.href = 'admin.php';
			</script>
		";
	} else {
		echo ("Error description:" .$conn -> error);
	}

 }	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data pesanan</title>
	<link rel="stylesheet" type="text/css" href="ubah.css">
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
				<h1>Data Pesanan</h1>

				<form action="" method="post" enctype="multipart/form-data">
	
					<input type="hidden" name="id" value="<?= $pesanan["id"]; ?>">
					<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
					<input type="hidden" name="gambarLama2" value="<?= $mhs["gambar2"]; ?>">
					
					<input type="text" name="nama" id="nama"
					required="required" class="form-order" value="<?php echo $pesanan["nama"]; ?>" >
						
					<input type="text" name="wa" id="wa"
					required="required" class="form-order" value="<?php echo $pesanan["wa"]; ?>">
					
					<input type="text" name="email" id="email"
					required="required" class="form-order" value="<?php echo $pesanan["email"]; ?>">
					
					<label for="jenis">Mau Desain Apa :</label>
					<select name="jenis" id="jenis" required="required" class="form-order" value="<?php echo $pesanan["jenis"]; ?>">
						<option>Baner</option>
						<option>Logo</option>
						<option>Kaos</option>
						<option>Vektor</option>
						<option>Edit</option>
					</select>
					
					<label for="type">Type :</label>
					<select name="type" id="type" required="required" class="form-order" value="<?php echo $pesanan["type"]; ?>">
						<option>Type 1</option>
						<option>Type 2</option>
						<option>Type 3</option>
					</select>
					
					<input type="text" name="tujuan" id="tujuan"
					required="required" class="form-order" value="<?php echo $pesanan["tujuan"]; ?>">
					
					<input type="text" name="warna" id="warna"
					required="required" class="form-order" value="<?php echo $pesanan["warna"]; ?>">
					
					<label for="gambar">Referensi Desain (optional)</label>
					<img style="width: 100px;" src="img/<?php echo $pesanan["gambar"]; ?>">
					<input type="file" name="gambar" id="gambar" class="form-order" >
					
					<label for="gambar2">Referensi Desain (optional)</label>
					<img style="width: 100px;" src="img/<?php echo $pesanan["gambar2"]; ?>">
					<input type="file" name="gambar2" id="gambar2" class="form-order" >
					
					<input type="textarea" name="keterangan" id="keterangan" class="form-order, ket" value="<?php echo $pesanan["keterangan"] ?>">
					
					<button type="submit" name="submit" class="tombol-submit">Perbaiki</button>
					
				</form>
				<a href="logout.php" class="logout">Logout</a>

			</div>
		</div>
	</div>
	<a href="halaman3.php" class="order">wkkwwk</a>
</body>
</html>