<?php

session_start();

require '../function/functions.php';

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {

		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row['password'])) {

			$_SESSION["login"] = true;
			$_SESSION['username'] = $username;

			header("Location: index.php");
			exit;
		}
	}
	$error=true;
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
		<li><a href="account.php">Akun Saya</a></li>
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
<?php if (isset($error)) : ?>
		<p style="font-size: 18px; color: red; text-align: center;"><em>Username / password yang anda masukkan salah</em></p>
	<?php endif; ?>

<form border="1" action="" method="post">
<div class="loginBox">
	<h3>Login</h3>

	<label for="username">Username :</label>
		<input type="text" id="username" name="username" autocomplete="off"></input>
	<label for="password">Password :</label>
		<input type="password" name="password" id="password" autocomplete="off"></input>
	<button style="top: 62%;" type="submit" name="submit">Login</button>
	<p>Belum punya akun? <a href="registrasi.php">Registrasi sekarang</a></p>
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