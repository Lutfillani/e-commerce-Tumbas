<?php  

require "function/functions.php";
session_start();


// Order

// if ( isset($_GET['beli'])) {
// 	if ( pesanan($_GET) > 0) {
// 		echo "<script>
// 			alert('Produk berhasil ditambahkan.')
// 					</script>";
// 		} else {
// 			echo "<script>
// 			alert('Produk gagal ditambahkan.')
// 					</script>";
// 		}
// }

$id = $_GET['id'];

$detailproduk = tampilproduk("SELECT * FROM insertproduk WHERE id = $id");



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="ua-compatible ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tumbas</title>
	<link rel="stylesheet" type="text/css" href="code.css">
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">
	<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
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

	<style>
		button {
			background: red; 
			border-radius: 0;
		}
	</style>
</head>
<body>

<div class="menu-bar">
	<ul>
		<li style="position: absolute; left: 70px; line-height: 60px; color: red; font-weight: 900">Tumbas</li>
		<li><a href="tumbas/index.php">Home</a></li>
		<li><a href="tumbas/index.php#categori">Kategori</a></li>
		<li><a href="tumbas/account.php">Akun Saya</a></li>
		<li><a href="tumbas/login.php">Masuk</a></li>
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
	<img src="img/header/header.png">
</div>

<br>
<?php foreach ($detailproduk as $produk) : ?> 
<p class="link">Tumbas / <?php echo $produk['kategori']; ?> / <?php echo $produk['namaproduk']; ?> </p>

<div class="container">
	<div class="detail">
		<ul>
			<li><a href="tumbas/img/sent/<?= $produk['gbrproduk']; ?>"><img src="tumbas/img/sent/<?= $produk['gbrproduk']; ?>"></a></li>
			<li><?= $produk['namaproduk']; ?> <span> | <a href=""><?= $produk['admin']; ?></a></span></li>
			<li><img src="img/rate3.png"><span> | 25 Reviews </span></li>
			<li><sup>Rp</sup><?= $produk['harga']; ?></li><br>
			<li>
			<form action="buy.php" method="GET">
				<table>
					<tr>
						<td>Nama & Alamat</td>
						<td><textarea type="text" name="alamat" placeholder="Tulis alamat di sini" disabled></textarea></td>
						
						</td>
					</tr>
				</table>
			</li><br>

			<li>
				<table>
					<tr>
						<td>Jasa pengiriman</td>
						<td>
							<select name="via" disabled>
								<option>COD</option>
								<option>Tiki</option>
								<option>JNE Reg</option>
								<option>J&T Express</option>
								<option>Go-Send</option>
								<option>Grab-Express</option>
							</select>
						</td>
					</tr>
				</table>
			</li><br>
			<li>
				<table>
					<tr>
						<td>Jumlah</td>
						<td><input style="width: 100%;" type="number" min="0" max="100" name="jumlah" placeholder="Jumlah" disabled></input></td>
						<td>
							<select name="jumlah" disabled>
								<option>Porsi</option>
								<option>Piece</option>
								<option>Kg</option>
								<option>Set</option>
								<option>Sachet</option>
							</select>
						</td>
					</tr>
				</table>
			</li><br>

			<li>
				
					<tr>
						<td><a href=""><button type="button" name="addtocart">Tambah ke Keranjang</button></a></td>
						<td><a href="buy.php"><button type="button" name="beli">Beli Sekarang</button></a></td>
					</tr>
				</table>
				</form>
			</li><br>
						<br><hr><br>
			<li>
				<div class="deskripsi">
					<h3>Deskripsi Produk</h3>
					<p><?= $produk['deskripsiproduk']; ?></p>
				</div>
			</li>

			<br><hr><br>

			<li>
				<div class="pesan">
					<h6>Chat seller</h6>
					<p>Hello, ada yang bisa kami bantu?</p>
					<input type="text" placeholder="Type here"></input><span><a href="">Send</a></span>
				</div>
			</li>
		</ul>
	</div>
</div>
<?php endforeach; ?>

<br><br><br><br>

<footer>
	<div>
		2019 &copy; Tumbas | All Rights Reserved
	</div>
</footer>

</body>
</html>