<?php 
	require '../function/functions.php';
	session_start();
	if ( !isset($_SESSION['login'])) {
		header('Location: login.php');
	}
$admin = $_SESSION['username'];

	$rows = tampilpesanan("SELECT * FROM beli WHERE pembeli = '$admin' ORDER BY id DESC");

	$tampilpesanan = tampilpesanan("SELECT *FROM beli WHERE penjual = '$admin' ORDER BY id DESC");

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

			$('.unpaid').click(function() {
				$('.tampil').toggleClass('active')
				// $(this).css({'background': 'orange'});
			})

			$('.sent').click(function() {
				$('.tampil2').toggleClass('active')
				// $(this).css({'background': 'orange'});
			})

			$('.done').click(function() {
				$('.tampil3').toggleClass('active')
				// $(this).css({'background': 'orange'});
			})
		})

		
	</script>

	<style>
		table {
			margin: auto;
		}

		.pilihan tr td{
			cursor: pointer;
		}

		.tampil {
			width: 100%;
			display: none;
			transition: 3s;
		}

		.tampil.active {
			transform: translateY(0);
			display: block;
		}

		.tampil2 {
			width: 100%;
			transform: translateY(-1000%);
			display: none;
			transition: 3s;
		}

		.tampil2.active {
			transform: translateY(0);
			display: block;
		}

		.tampil3 {
			width: 100%;
			display: none;
			transition: 3s;
		}

		.tampil3.active {
			transform: translateY(0);
			display: block;
		}

		.bayar {
			background: orange;
			width: 100px;
			text-align: center;
			margin: 20px 50% 30px;

		}

		@media (max-width: 975px) {
			.tampil {
				width: 100%;
			}
			.tablepesanan table {
				width: 50%;
			}
		}
	</style>

</head>
<body>

<div class="menu-bar">
	<ul>
		<li>Tumbas</li>
		<li><a href="index.php">Home</a></li>
		<li><a href="index.php#categori">Kategori</a></li>
		<li><a href="">Akun Saya</a></li>
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
	<img src="../img/header/header0.png">
</div>

<br>

<p class="link">Profil</p>

<div class="container">
<div class="tambah">
	<a href="insertproduct.php">
		<img src="../img/plus.png">
		<p>Tambah Produk</p>
	</a>


</div>

	<br><br><br>


	<div class="profil">
		<label>Username</label>
		<span>
			<?php if ($_SESSION['login'] == true) {

					echo $_SESSION['username'];
				} ?>
		</span>
	</div>
<br><br>

	<table class="pilihan" cellspacing="0" cellpadding="8" border="1px">
		<tr>
			<td class="unpaid" name="unpaid">Belum Dibayar</td>
			<td class="sent">Dikirim</td>
			<td class="done">Selesai</td>
		</tr>
	</table>
<br><br>

	
	<div class="tampil" style="width: 100%; margin: auto;">
	<?php foreach ($rows as $row) : ?>
					<?php if ( $row['pembayaran'] == 0) : ?>
		<form action="bayar.php?id=<?= $row['id']; ?>" method="post">
			<table cellspacing="0" cellpadding="5" border="1px">
				<tr>
					<td>Gambar</td>
					<td>Nama Produk</td>
					<td>Jumlah</td>
					<td>Harga</td>
					<td>Total</td>
					<td>Pengiriman</td>
				</tr>

				<tr>
				
					<td><img style="width: 80px;" src="img/sent/<?= $row['gambar']; ?>"></td>
					<td><?= $row['produk']; ?></td>
					<td><?= $row['banyak']; ?></td>
					<td><?= $row['harga']; ?></td>
					<td><?= ($row['harga'] * $row['banyak']) + (13000 * 0.001) . "K" ; ?></td>
					<td><?= $row['oleh']; ?></td>
					<input type="hidden" name="status" value="lunas"></input>
				</tr>
			</table>
					<a href="bayar.php?id=<?= $row['id']; ?>"><button class="bayar" type="submit" name="bayar">Bayar Sekarang</button></a>
			</form>
					<?php elseif ($row['pembayaran'] == "lunas") : ?>
						<div class="tampil">
							<?= ""; ?>
						</div>
				<?php endif; ?>
	<?php endforeach; ?>
	</div>



	<div class="tampil2" style="width: 100%; margin: auto;">
	<?php foreach ($rows as $row) : ?>
		<?php if ($row['pembayaran'] == 'lunas') : ?>
		<form action="selesai.php?id=<?= $row['id']; ?>" method="post">
					<table cellspacing="0" cellpadding="5" border="1px">
				<tr>
					<td>Gambar</td>
					<td>Nama Produk</td>
					<td>Jumlah</td>
					<td>Harga</td>
					<td>Total</td>
					<td>Pengiriman</td>
				</tr>

				<tr>
				
					<td><img style="width: 80px;" src="img/sent/<?= $row['gambar']; ?>"></td>
					<td><?= $row['produk']; ?></td>
					<td><?= $row['banyak']; ?></td>
					<td><?= $row['harga']; ?></td>
					<td><?= ($row['harga'] * $row['banyak']) + (13000 * 0.001) . "K" ; ?></td>
					<td><?= $row['oleh']; ?></td>
					<input type="hidden" name="status" value="lunas"></input>
				</tr>
			</table>
					<a href="selesai.php?id=<?= $row['id']; ?>"><button class="bayar" type="submit" name="bayar">Diterima</button></a>
			</form>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>

	<div class="tampil3" style="width: 100%; margin: auto;">
	<?php foreach ($rows as $row) : ?>
		<?php if ($row['status'] == 'selesai') : ?>
		<form action="" method="post">
					<table cellspacing="0" cellpadding="5" border="1px">
				<tr>
					<td>Gambar</td>
					<td>Nama Produk</td>
					<td>Jumlah</td>
					<td>Harga</td>
					<td>Total</td>
					<td>Pengiriman</td>
				</tr>

				<tr>
				
					<td><img style="width: 80px;" src="img/sent/<?= $row['gambar']; ?>"></td>
					<td><?= $row['produk']; ?></td>
					<td><?= $row['banyak']; ?></td>
					<td><?= $row['harga']; ?></td>
					<td><?= ($row['harga'] * $row['banyak']) + (13000 * 0.001) . "K" ; ?></td>
					<td><?= $row['oleh']; ?></td>
					<input type="hidden" name="status" value="lunas"></input>
				</tr>
			</table>
			</form>
		<?php endif; ?>
	<?php  endforeach; ?>
		</div>

			<br><br><br>

			<hr>
			<div class="tablepesanan">
	<?php foreach ($tampilpesanan as $row) : ?>
			<h2>Tumbas, <?= $_SESSION['username'] . "!"; ?></h2>
				<table cellpadding="8" cellspacing="0" border="1px">
				<tr>
					<td>Gambar</td>
					<td>Nama Produk</td>
					<td>Jumlah</td>
					<td>Harga</td>
					<td>Pembeli</td>
				</tr>

				<tr>
					<td><img style="width: 80px;" src="img/sent/<?= $row['gambar']; ?>"></td>
					<td><?= $row['produk']; ?></td>
					<td><?= $row['banyak']; ?></td>
					<td><?= $row['harga']; ?></td>
					<td>
						<ul>
							<li><label>Akun: </label><?= $row['pembeli']; ?></li>
							<li><?= $row['nama']; ?></li>
							<li><h4>Pengiriman: </h4><?= $row['oleh']; ?></li>
						</ul>
					</td>
				</tr>
				</table>
			</div>
	<?php endforeach; ?>
	</div>
	
	
</div>
<br><br><br><br>

<footer style="width: 100%;">
	<div>
		2019 &copy; Tumbas | All Rights Reserved
	</div>
</footer>

</body>
</html>