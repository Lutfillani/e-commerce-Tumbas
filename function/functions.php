<?php error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "kreanova");
// Insert Produk

function tambahproduk($dataproduk) {
	global $conn;

	$admin = $dataproduk["admin"];
	$namaProduk = $dataproduk["namaproduk"];
	$deskripsiProduk = $dataproduk["deskripsiproduk"];
	$harga = $dataproduk["harga"];
	$kategori = $dataproduk["kategori"];
	$stok = $dataproduk["stok"];
	$berat = $dataproduk["berat"];

	// upload gambar

	$gambar = upload();

	 if ( !$gambar ) {

	 	return false;
	 }

	$input = "INSERT INTO insertproduk VALUES ('', '$admin', '$namaProduk', '$deskripsiProduk', '$harga', '$kategori', '$stok', '$berat', '$gambar')";

	$query = mysqli_query($conn, $input);

	return mysqli_affected_rows($conn);
}

function upload() {
	

	$namaFile = $_FILES['gbrproduk']['name'];
	$ukuran = $_FILES['gbrproduk']['size'];
	$error = $_FILES['gbrproduk']['error'];
	$tmpName = $_FILES['gbrproduk']['tmp_name'];

	if ($error === 4) {
		echo "<script>
				alert('Anda belum memilih gambar');
				</script>";

				return false;
	}

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'mp4'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Type file tidak valid');
				</script>";

				return false;
	}

	if ( $ukuran > 1000000 ) {
		echo "<script>
				alert('Ukuran gambar terlalu besar');
			</script>";

			return false;
	}

	$namaFilebaru = uniqid();
	$namaFilebaru .= '.';
	$namaFilebaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../tumbas/img/sent/' . $namaFilebaru);

	return $namaFilebaru;
}

function tampilproduk($tampilproduk) {
	global $conn;

	$result = mysqli_query($conn, $tampilproduk);
	$wadah = [];
	while ($cup = mysqli_fetch_assoc($result)) {
		$wadah[] = $cup;
	}
	return $wadah;
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$confirmpassword = mysqli_real_escape_string($conn, $data['confirmpassword']);

	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username telah terdaftar')
				</script>";
				return false;
	}

	if ($password !== $confirmpassword) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai')
				</script>";
				return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO users VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}

function tampilpesanan($query) {
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];

	while($row = mysqli_fetch_assoc($result)) {
	$rows[] = $row;

	return $rows;
	} 
}

?>