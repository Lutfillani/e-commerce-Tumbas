<?php  
require 'function/functions.php';


$dataOfEachPage = 12;
$jumlahData = count(tampilproduk("SELECT * FROM insertproduk"));
$jumlahpage = ceil($jumlahData / $dataOfEachPage);
$halamanAktif = ( isset($_GET["hal"]) ) ? $_GET["hal"] : 1;

$dataAwal = ( $dataOfEachPage * $halamanAktif) - $dataOfEachPage;

$kategori = $_GET['kategori'];

$query = tampilproduk("SELECT * FROM insertproduk WHERE kategori = '$kategori' LIMIT $dataAwal, $dataOfEachPage");

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
	<script src="slide.html"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.menu').click(function(){
			$('.menu').toggleClass('active')
			$('.menu-bar').toggleClass('active')
			})
		})
	</script>

	<style>
		.content {
			width: 33.33%;
			float: left;
		}

		@media (max-width: 975px) {
			.content {
				width: 100%;
			}
		}
		.menu1, .menu-bar, .menu, footer {
			background: orange;
		}

		/*.menu1 ul li a {
			position: absolute;
			text-decoration: none;
			color: black;
			font-size: 1.5em;
			font-family: tahoma;
			top: 60%;
		}

		.menu1 ul li a:hover {
			color: white;
			background: black;
		}*/
	</style>
</head>
<body>

<div class="menu-bar">
	<ul>
		<li style="position: absolute; left: 70px; line-height: 60px; color: red; font-weight: 900">Tumbas</li>
		<li><a href="homepage.php">Home</a></li>
		<li><a href="homepage.php#categori">Kategori</a></li>
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
	<img name="slide" src="img/header/header.png">
</div>

<h1 id="categori">Kategori</h1>

<div class="kotak">
	<div class="kolom1">
		<ul>
			<li><a href="homepage_kategori.php?kategori=makanan#terbaru"><img src="img/kategori/makanan1.png"></a></li>
			<li><a href="homepage_kategori.php?kategori=makanan#terbaru">Makanan</a></li>
		</ul>
	</div>

	<div class="kolom2">
		<ul>
			<li><a href="homepage_kategori.php?kategori=fashion#terbaru"><img src="img/kategori/fashion.png"></a></li>
			<li><a href="homepage_kategori.php?kategori=fashion#terbaru">Fashion</a></li>
		</ul>
	</div>

	<div class="kolom3">
		<ul>
			<li><a href="homepage_kategori.php?kategori=sayurbuah#terbaru"><img src="img/kategori/sayurbuahh.png"></a></li>
			<li><a href="homepage_kategori.php?kategori=sayurbuah#terbaru">Sayur & Buah</a></li>
		</ul>
	</div>
</div>

<div class="kotak">
	<div class="kolom1">
		<ul>
			<li><a href="homepage_kategori.php?kategori=furniture#terbaru"><img src="img/kategori/furniture.png"></a></li>
			<li><a href="homepage_kategori.php?kategori=furniture#terbaru">Furniture</a></li>
		</ul>
	</div>

	<div class="kolom2">
		<ul>
			<li><a href="homepage_kategori.php?kategori=kecantikan#terbaru"><img src="img/kategori/kecantikan.png"></a></li>
			<li><a href="homepage_kategori.php?kategori=kecantikan#terbaru">Kecantikan</a></li>
		</ul>
	</div>

	<div class="kolom3">
		<ul>
			<li><a href="homepage_kategori.php?lategori=bukuatm#terbaru"><img src="img/kategori/books.png"></a></li>
			<li><a href="homepage_kategori.php?kategori=bukuatm#terbaru">Buku & Alat Tulis</a></li>
		</ul>
	</div>

</div>

<br>
<hr>
<br>

<h2 id="terbaru">Terbaru</h2>

<?php foreach ($query as $produk) : ?>

<div class="content" >
	<attr class="menu1">
			<a href="detail.php?id=<?= $produk['id']; ?>"><img src="tumbas/img/sent/<?= $produk['gbrproduk']; ?>"></a>
			<ul>
				<li><a href="detail.php?id=<?= $produk['id']; ?>"><?= $produk['namaproduk']; ?></a></li>
				<li><label><sup>Rp</sup><b style="color: black"><?= $produk['harga']; ?><b></label></li>
			</ul>
	</attr>
</div>
<?php endforeach; ?>



<br><br><br><br>

<footer style="clear: both;">
	<div>
		2019 &copy; Tumbas | All Rights Reserved
	</div>
</footer>


</body>
</html>