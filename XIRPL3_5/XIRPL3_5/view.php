<!DOCTYPE html>
<html>
<head>
	<title>register</title>
</head>
<body>
<center>
	<h1>Selamat Datang</h1><br/>
	<table>
<?php
	$email =$_POST['email'];
	$nama = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$pass = str_repeat("*", strlen($password));
	echo "<tr><td>E-mail</td><td>:</td><td>$email</td>";
	echo "<tr><td>Nama Lengkap</td><td>:</td><td>$fullname</td>";
	echo "<tr><td>Username</td><td>:</td><td>$username</td>";
	echo "<tr><td>Password</td><td>:</td><td>$password</td>";
?>
</table>
<a href="index.php">Selanjutnya</a>
</center>
</body>
</html
