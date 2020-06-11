<?php  

require "../function/functions.php";

session_start();

if ( !isset($_SESSION["login"])) {
	header("Location: ../detail.php");
}

$pembeli = $_SESSION['username'];

// Order



$id = $_GET['id'];

$detailproduk = tampilproduk("SELECT * FROM insertproduk WHERE id = $id");

if (isset($_POST['klik'])) {
	$produk = $_POST['produk'];
	$harga = $_POST['harga'];
	$nama = $_POST['nama'];
	$noHape = $_POST['noHape'];
	$oleh = $_POST['oleh'];
	$banyak = $_POST['banyak'];
	$satuan = $_POST['satuan'];
	$gambar = $_POST['gambar'];
	$pembeli = $_POST['pembeli'];
	$pembayaran = $_POST['pembayaran'];
	$status = $_POST['status'];
	$penjual = $_POST['penjual'];

if(mysqli_query($conn,  "INSERT INTO beli VALUES('', '$pembeli', '$penjual', '$produk', '$harga', '$nama', '$noHape', '$oleh', '$banyak', '$satuan', '$gambar', '$pembayaran', '$status')")) {
	$last_id = mysqli_insert_id($conn);
header('Location: checkout_product.php?id=' .$last_id);
exit;
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
		<li><a href="keranjang.php"><img class="icon" src="img/cart.png"></a></li>
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
<?php foreach ($detailproduk as $produk) : ?> 
<p class="link">Tumbas / <?php echo $produk['kategori']; ?> / <?php echo $produk['namaproduk']; ?> </p>

<div class="container">
	<div class="detail">
		<ul>
			<li><a href="img/sent/<?= $produk['gbrproduk']; ?>"><img src="img/sent/<?= $produk['gbrproduk']; ?>"></a></li>
			<li><?= $produk['namaproduk']; ?> <span> | by <a href=""><?= $produk['admin']; ?></a></span></li>
			<li><img src="img/rate3.png"><span> | 25 Reviews </span></li>
			<li><sup>Rp</sup><?= $produk['harga']; ?></li><br>
			<li>
			<form action="" method="POST">
				<table>
					<tr>
						<td><input type="hidden" name="produk" value="<?= $produk['namaproduk']; ?>"></input></td>
						<td><input type="hidden" name="harga" value="<?= $produk['harga']; ?>"></input></td>
						<td><input type="hidden" name="gambar" value="<?= $produk['gbrproduk']; ?>"></input></td>
						<td><input type="hidden" name="penjual" value="<?= $produk['admin']; ?>"></input></td>
						<td><input type="hidden" name="pembayaran" value=""></input></td>
						<td><input type="hidden" name="status" value=""></input></td>
					</tr>
				</table>
			</li>

			<li>
				<table>
					<tr>
						<td>Nama & Alamat</td>
						<td><textarea type="text" name="nama" placeholder="Tulis nama & alamat" autocomplete="off" required></textarea></td>
					</tr>
				</table>
			</li>

			<li>
				<table>
					<td>No Hp</td>
					<td><input type="text" name="noHape" placeholder="+62" required autocomplete="off"></input></td>
				</table>
			</li>

			<li>
				<table>
					<tr>
					<td>Pengiriman</td>
						<td>
							<select name="oleh" required>
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
			</li>

			<li>
				<table>
					<tr>
						<td>Jumlah</td>
						<td>
							<input type="number" style="width: 100%;" name="banyak" min="1" max="100" placeholder="Jumlah"></input>
						</td>
						<td>
							<select name="satuan">
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
				<table>
					<tr>
						<td><a href=""><button type="button" name="addToCart">Tambah ke Keranjang</button></a></td>
						<td><a href="checkout_product.php?id=<?= $last_id; ?>"><button type="submit" name="klik">Beli Sekarang</button></a></td>
					</tr>
				</table>
			</li>
			
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
<input type="hidden" name="pembeli" value="<?= $pembeli; ?>"></input>
</form>


<br><br><br><br>

<footer>
	<div>
		2019 &copy; Tumbas | All Rights Reserved
	</div>
</footer>

</body>
</html>