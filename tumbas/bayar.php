<?php 
require '../function/functions.php';

$id = $_GET['id'];

$rows = tampilpesanan("SELECT * FROM beli WHERE id = $id");

foreach ($rows as $row) {
	$id = $row['id'];
	$pembeli = $row['pembeli'];
	$produk = $row['produk'];
	$harga = $row['harga'];
	$identity = $row['nama'];
	$noHape = $row['noHape'];
	$oleh = $row['oleh'];
	$jumlah = $row['banyak'];
	$satuan = $row['satuan'];
	$gambar = $row['gambar'];
	$pembayaran = $row['pembayaran'];
	$status = $row['status'];
}

$edit = "UPDATE beli SET
			pembeli = '$pembeli',
			produk = '$produk',
			harga = '$harga',
			nama = '$identity',
			noHape = '$noHape',
			oleh = '$oleh',
			banyak = '$jumlah',
			satuan = '$satuan',
			gambar = '$gambar',
			pembayaran = 'lunas',
			status = '' WHERE id = $id";

		mysqli_query($conn, $edit);
		header("Location: account.php");
 ?>