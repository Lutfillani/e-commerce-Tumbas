<?php  
session_start();
if ( !isset($_SESSION['login'])) {
	header('Location: login.php');
}

$admin = $_SESSION['username'];

require '../function/functions.php';

	if (isset($_POST['postproduk'])) {
		if (tambahproduk($_POST) > 0) {
			echo "<script>
			alert('Produk berhasil ditambahkan.')
					</script>";
		} else {
			echo "<script>
			alert('Produk gagal ditambahkan.')
					</script>";
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="ua-compatible ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tumbas</title>
	<link rel="stylesheet" type="text/css" href="../code.css">
	<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
	<link rel="manifest" href="../site.webmanifest">
	<link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.menu').click(function(){
			$('.menu').toggleClass('active')
			$('.menu-bar').toggleClass('active')
			})
		})

		$("option[value='Kategori'].attr")
	</script>
</head>
<body>

<div class="menu-bar">
	<ul>
		<li>Tumbas</li>
		<li><a href="index.php">Home</a></li>
		<li><a href="index.php#categori">Kategori</a></li>
		<li><a href="account.php">Akun Saya</a></li>
		<li><a href="logout.php">Keluar</a></li>
		<li>
			<input type="text" name="cari" placeholder="search here"></input>
			<img class="icon" src="img/search-icon.png">
		</li>
		<li><a href=""><img class="icon" src="img/cart.png"></a></li>
		<li><div class="sosmed">
			<a href=""><img src="img/fb.png"></a>
			<a href=""><img src="img/twit.png"></a>
			<a href=""><img src="img/ig.png"></a>
	</div></li>
	</ul>
</div>

<div class="menu">
	<span></span>
	<span></span>
	<span></span>
</div>
<div class="lead-banner">
	<img src="../img/header/header.png">
</div>

<br>

<p class="link">Tambah Produk</p>


<div class="container">
	<br>
	<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="admin" value="<?= $admin; ?>"></input>
	<input style="padding: 10px; width: 80%;" type="text" name="namaproduk" placeholder="Nama Produk" autocomplete="off"></input>
	<br><br>
	<input style="padding: 10px; width: 80%;" type="text" name="deskripsiproduk" placeholder="Deskripsi Produk dan #hashtags" autocomplete="off"></input>
	<br><br>
	<input type="file" name="gbrproduk" autocomplete="off"></input>
	<br><br>
	<input style="padding: 10px; width: 80%;" type="text" name="harga" placeholder="Harga" autocomplete="off"></input>
	<br><br>
	<select name="kategori">
		<option value="kecantikan">Kecantikan</option>
		<option value="bukuatm">Buku & Alat Tulis</option>
		<option value="makanan">Makanan</option>
		<option value="fashion">Fashion</option>
		<option value="furniture">Furniture</option>
		<option value="sayurbuah">Sayur & Buah</option>
	</select>
	<br><br>
	<input style="padding: 10px; width: 80%;" type="text" name="stok" placeholder="Stok" autocomplete="off"></input>
	<br><br>
	<input style="padding: 10px; width: 80%;" type="text" name="berat" placeholder="Berat" autocomplete="off"></input>
	<br><br>
	<button type="submit" name="postproduk">Post</button>
	</form>
</div>


<br><br><br><br>

<footer>
	<div>
		2019 &copy; Tumbas | All Rights Reserved
	</div>
</footer>

</body>
</html>