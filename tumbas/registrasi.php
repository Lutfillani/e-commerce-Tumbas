<?php 
require '../function/functions.php';

if (isset($_POST['submit'])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('Registrasi berhasil')
				</script>";
	} else {
		echo "<script>
				alert('Registrasi gagal')
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
		<li>Tumbas</li>
		<li><a href="index.php">Home</a></li>
		<li><a href="index.html#categori">Kategori</a></li>
		<li><a href="">Akun Saya</a></li>
		<li><a href="login.php">Masuk</a></li>
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

<form action="" method="post">
<div class="registrasiBox">
	<h3>Registrasi</h3>
		<div><label for="username">Username :</label>
			<input type="text" id="username" name="username" autocomplete="off"></input>
		</div>
		
		<div>
		<label for="password">Password :</label>
			<input type="password" name="password" id="password" autocomplete="off"></input>
		</div>

		<div>
		<label for="confirmpassword">Konfirmasi Password   :</label>
			<input type="password" name="confirmpassword" id="confirmpassword" autocomplete="off"></input>
		</div>
		<button style="top: 85%;" type="submit" name="submit">Registrasi</button>

</div>	
</form>
<br><br><br><br>

<footer>
	<div>
		2019 &copy; Tumbas | All Rights Reserved
	</div>
</footer>

</body>
</html>