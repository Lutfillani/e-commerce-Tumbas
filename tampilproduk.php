<?php  
require 'function/functions.php';

$keyword = $_GET['keyword'];


$query = "SELECT * FROM insertproduk WHERE 
			namaproduk LIKE '%$keyword%' OR
			kategori LIKE '%$keyword%'";

$pencarian = tampilproduk($query);

?>

<h2 style="border-bottom: 1px solid red;">Pencarian Cepat</h2>

<?php foreach ($pencarian as $produk) : ?>

<div style="clear: both; width: 100%; margin-left: 80px; display: block;">
	<table cellspacing="0" cellpadding="8" border="1px" style="width: 100%;">
		<tr>
			<td >Gambar</td>
			<td >Produk</td>
			
			<td >Harga</td>
		</tr>

		<tr>
			<td style="width: 200px">
				<a href="detail.php?id=<?= $produk['id']; ?>"><img style="width: 80px;" src="tumbas/img/sent/<?= $produk['gbrproduk']; ?>">
				</a>
			</td>
			<td style="width: 200px">
				<a style="text-decoration: none; color: black; font-weight: 900;" href="detail.php?id=<?= $produk['id']; ?>"><?= $produk['namaproduk']; ?></a>
			</td>
			<td style="width: 200px">
				<?= $produk['harga']; ?>
			</td>
		</tr>
	</table>
</div>
<br>

<!-- <div class="content" id="content" style="width: 33.33%; float: left; margin: auto;">
<div class="menu1">
	<a href="detail.php?id=<?= $produk['id']; ?>"><img src="../tumbas/img/sent/<?= $produk['gbrproduk']; ?>"></a>
		<ul>
			<li><a style="font-weight: 900;" href="detail.php?id=<?= $produk['id']; ?>"><?= $produk['namaproduk']; ?></a></li>
			<li><label><sup>Rp</sup><b style="color: black"><?= $produk['harga']; ?><b></label></li>
		</ul>
</div>
</div> -->

<?php endforeach; ?>