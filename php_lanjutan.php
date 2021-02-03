<?php 

$keluarga[0] = "sarpan";
$keluarga[1] = "yeni umartin";
$keluarga[2] = "achmad farid alfa waid";
$keluarga[3] = "ilma dina nur rosidah";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Keluarga</title>
</head>
<body>

<h1>Daftar Keluarga</h1>

<ul>
<?php foreach ( $keluarga as $mhs ) : ?>
	<li> <?php 	echo $mhs; ?></li>
	<li> <?php echo "Jumlah kata: ".str_word_count($mhs); ?></li>
	<li> <?php echo "Jumlah huruf: ".strlen($mhs); ?></li>
	<li> 
		<?php $hasil = strrev($mhs);
	 			echo $hasil; ?>
	 </li>
	 <li>
	 	<?php 
	 		$cur = str_split($mhs);
		  	$vocal = 0;
		  	$konstanta = 0;
		 

			foreach ($cur as $row) {
			 if(preg_match('/^[aiueo]/', $row[0]))
			  {
			   $vocal += 1;
			  }
			  else
			  {
			  $konstanta += 1;
			 }
			}
			
	 	 ?>
	 <li> <?php echo($vocal) ?></li>
	 <li> <?php echo($konstanta) ?></li>
	 </li>
	<br>
<?php endforeach ?>	


</ul>
</body>
</html>