<?php 
require "../function/functions.php";

session_start();

if ( !isset($_SESSION['login']) ) {
	header('Location: login.php');
}

$id = $_GET['id'];

$rows = tampilpesanan("SELECT * FROM beli WHERE id=$id");

$detail = tampilproduk("SELECT * FROM insertproduk");


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
		<li>
			<div class="sosmed">
				<a href=""><img src="img/fb.png"></a>
				<a href=""><img src="img/twit.png"></a>
				<a href=""><img src="img/ig.png"></a>
			</div>
		</li>
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

<div class="box-alamat">
	<div class="logo">
		<img src="../favicon-32x32.png"><span>Tumbas | Checkout</span>
	</div>

	<br>

<?php foreach ($rows as $row) : ?>
	<div class="alamat">

		<ul>
			<li><span><img src="img/loc.png"></span>Alamat Pengiriman</li>
			<li><?= $row['produk']; ?></li>
			<li><?= $row['noHape']; ?></li>
		</ul>

			<p><?= $row['nama']; ?> <span> Utama</span></p>
			<a href="">Ganti</a>
	</div>

	<br>
	<input type="checkbox" name="cb"></input><label>Kirim sebagai dropshipper</label>
</div>

	<div class="pesanan">

		<table>
			<tr>
				<td>Produk</td>
				<td>Julah</td>
				<td>Harga</td>
			</tr>


			<tr>
				<td><?= $row['produk']; ?></td>
				<td><?= $row['banyak']; ?></td>
				<td><sup>Rp</sup><?= $row['harga']; ?></td>
				
			</tr>

			<tr>
				<td><img src="img/sent/<?= $row['gambar']; ?>"></td>
			</tr>
		</table>
		
	</div>


	<div class="payment">
		<table>
			<tr>
				<td>Payment Method</td>
				<td><input type="checkbox" name="metode">Bank Transfer</input></td>
				<td><input type="checkbox" name="metode1">Credit Card</input></td>
				<td><input type="checkbox" name="metode2">Indomaret</input></td>
				<td><input type="checkbox" name="metode3">Alfamaret</input></td>
				<td><input type="checkbox" name="metode4">OVO</input></td>
				<td><input type="checkbox" name="metode5">DANA</input></td>
			</tr>

			<tr>
				<td>Choose Bank</td>
				<td><input type="radio" name="radio1">Bank BRI</input></td>
				<td><input type="radio" name="radio2">Bank Mandiri</input></td>
				<td><input type="radio" name="radio3">Bank BNI</input></td>
				<td><input type="radio" name="radio4">Bank BCA</input></td>
			</tr>
		</table>
	</div>

	<div class="bayar">
		<table>
			<tr>
				<td>Subtotal Product</td>
				<td><sup>Rp</sup><?= ($row['harga'] * $row['banyak']); ?></td>
			</tr>

			<tr>
				<td>Delivery Fee</td>
				<td><sup>Rp</sup>13K</td>
			</tr>

			<tr>
				<td>Total</td>
				<td><sup>Rp</sup><?= ($row['harga']  * $row['banyak']) . " + 13000"; ?></td>
			</tr>


			<tr>
				<td></td>
			<form action="" method="post">
				<td><a href="buy.php"><button type="button" name="sukses">Pesan Sekarang</button></a></td>
			</form>
			</tr>

	<?php endforeach; ?>
			
		</table>
	</div>

<br><br><br><br>

<footer>
	<div>
		2019 &copy; Tumbas | All Rights Reserved
	</div>
</footer>

</body>
</html>