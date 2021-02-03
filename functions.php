<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tugasdpw");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if ( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('Username sudah terdaftar!');
				</script>";
		return false;
	}

	// untuk mengatasi username kosong
	if (empty(trim($username))){
		echo "<script>
				alert('Dimohon untuk mengisi username');
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ( $password !== $password2 ) {
		echo "<script>
				alert ('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enskripsi password 
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password', '')");
	
	return mysqli_affected_rows($conn);
}

 function tambah ($data){
 	global $conn;
 	$nama = htmlspecialchars( $data["nama"]);
	$wa = htmlspecialchars( $data["wa"]);
	$email = htmlspecialchars($data["email"]);
	$jenis = htmlspecialchars($data["jenis"]);
	$type = htmlspecialchars($data["type"]);
	$tujuan = htmlspecialchars($data["tujuan"]);
	$warna = htmlspecialchars($data["warna"]);
	//upload gambar
	$gambar = upload();
	if (!$gambar){
		return false;
	}
	$gambar2 = upload2();
	if (!$gambar2){
		return false;
	}
	$keterangan = htmlspecialchars($data["keterangan"]);

$query = "INSERT INTO pesanan
			VALUES
		('', '$nama', '$wa', '$email', '$jenis', '$type', '$tujuan', '$warna', '$gambar', '$gambar2', '$keterangan')
		";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
 }

 function upload(){

 	$namaFile = $_FILES['gambar']['name'];
 	$ukuranFile = $_FILES['gambar']['size'];
 	$error = $_FILES['gambar']['error'];
 	$tmpName = $_FILES['gambar']['tmp_name'];

 	//cek apakah tidak ada gambar yang diupload
 	if ($error == 4){
 		echo "<script>
 				alert('Pilih gambar terlebih dahulu!');
 			  </script>";
 		return false;
 	}

 	//cek apakah yang diupload gambar
 	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
 	$ekstensiGambar = explode('.', $namaFile);
 	$ekstensiGambar = strtolower(end($ekstensiGambar));
 	if (!in_array($ekstensiGambar, $ekstensiGambarValid) ) {
 		echo "<script>
 				alert('Yang anda upload bukan gambar!');
 			  </script>";
 		return false;
 	}

 	//cek jika ukurannya terlalu besar
 	if ($ukuranFile > 2000000) {
 		echo "<script>
 				alert('Ukuran gambar terlaliu besar!');
 			  </script>";
 		return false;
 	}

 	//lolos penngecekan gambar, siap diupload
 	$namaFileBaru = uniqid();
 	$namaFileBaru .= '.';
 	$namaFileBaru .= $ekstensiGambar;
 	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
 	return $namaFileBaru;

 }

 function upload2(){

 	$namaFile = $_FILES['gambar2']['name'];
 	$ukuranFile = $_FILES['gambar2']['size'];
 	$error = $_FILES['gambar2']['error'];
 	$tmpName = $_FILES['gambar2']['tmp_name'];

 	//cek apakah tidak ada gambar yang diupload
 	if ($error == 4){
 		echo "<script>
 				alert('Pilih gambar terlebih dahulu!');
 			  </script>";
 		return false;
 	}

 	//cek apakah yang diupload gambar
 	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
 	$ekstensiGambar = explode('.', $namaFile);
 	$ekstensiGambar = strtolower(end($ekstensiGambar));
 	if (!in_array($ekstensiGambar, $ekstensiGambarValid) ) {
 		echo "<script>
 				alert('Yang anda upload bukan gambar!');
 			  </script>";
 		return false;
 	}

 	//cek jika ukurannya terlalu besar
 	if ($ukuranFile > 2000000) {
 		echo "<script>
 				alert('Ukuran gambar terlaliu besar!');
 			  </script>";
 		return false;
 	}

 	//lolos penngecekan gambar, siap diupload
 	$namaFileBaru = uniqid();
 	$namaFileBaru .= '.';
 	$namaFileBaru .= $ekstensiGambar;
 	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
 	return $namaFileBaru;

 }

 function cari($keyword){
	$query = "SELECT * FROM pesanan WHERE
				nama LIKE '%$keyword%' OR
				wa LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				jenis LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				type LIKE '%$keyword%' OR
				tujuan LIKE '%$keyword%' OR
				warna LIKE '%$keyword%' OR
				gambar LIKE '%$keyword%' OR
				gambar2 LIKE '%$keyword%' OR
				keterangan LIKE '%$keyword%'

			";
	return query($query);
}

function ubah($data) {

	global $conn;

	$id = $data["id"];
 	$nama = htmlspecialchars( $data["nama"]);
	$wa = htmlspecialchars( $data["wa"]);
	$email = htmlspecialchars($data["email"]);
	$type = htmlspecialchars($data["type"]);
	$tujuan = htmlspecialchars($data["tujuan"]);
	$warna = htmlspecialchars($data["warna"]);
	$gambar = htmlspecialchars($data["gambar"]);
	$gambar2 = htmlspecialchars($data["gambar2"]);
	$keterangan = htmlspecialchars($data["keterangan"]);

	$query ="UPDATE pesanan SET 
				nama = '$nama',
				wa = '$wa',
				email = '$email',
				jenis = '$jenis',
				type = '$type',
				tujuan = '$tujuan',
				warna = '$warna',
				keterangan = '$keterangan'
			WHERE id = '$id'
		";
	mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}

 function hapus($id){
 	global $conn;
 	mysqli_query($conn, "DELETE FROM pesanan WHERE id = $id");
 	return mysqli_affected_rows($conn);
 }

?>