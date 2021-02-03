<?php 

$mahasiswa = [
	[
		"nama" => "achmad farid alfa waid",
		"nim" => 190411100073,
 		"alamat" => "Tarik"
 	],
 	[
		"nama" => "Farid",
		"nim" => 190411100074,
 		"alamat" => "Mliriprowo"
 	],
 	[
		"nama" => "Achamd",
		"nim" => 190411100075,
 		"alamat" => "Pilang"
 	],
 	[
		"nama" => "Alfa",
		"nim" => 190411100076,
 		"alamat" => "Sidoarjo"
 	],
 	[
		"nama" => "Waid",
		"nim" => 190411100077,
 		"alamat" => "Indonesia"
 	],
];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<ul>
<?php foreach ( $mahasiswa as $mhs ) : ?>
	<li> <?php 	echo $mhs['nama']; ?></li>
	<li> <?php 	echo $mhs['nim']; ?></li>
	<li> <?php 	echo $mhs['alamat']; ?></li>
	<br>
<?php endforeach ?>	


</ul>
</body>
</html>