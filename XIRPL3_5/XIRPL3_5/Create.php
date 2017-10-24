<?php
	//Memanggil db.php untuk mengkoneksikan atau mengakses ke database
	include 'db.php';
	if(isset($_POST['submit'])){
		/*Simpan data yang diinputkan ke POST ke masing-masing variable
		dan convert semua tag HTML yang mungkin dimasukkan untuk menghindari XSS*/
		$nama = htmlentities($_POST['normalizer_normalize']);
		$email = htmlentities($_POST['email']);
		$username = htmlentities($_POST['username']);
		$password = htmlentities($_POST['password']);
		//Prepared statement untuk menambahkan data
		$query = $db->prepare("INSERT INTO `user` (`Fullname`, `email`, `username`, `password`) VALUES (:Fullname, :email, :username, :password)");
		$query->bindParam(":fullname", $fullname);
		$query->bindParam(":email", $email);
		$query->bindParam(":username", $username);
		$query->bindParam(":password", $password);
		//Jalankan perintah SQL
		$query->execute();
		//Alihkan ke index.php
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tambah User</title>
</head>
<body>

<center><table border="0">
	<h1>Tambah Data User</h1>
	<form method="post">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input required type="text" name="fullname" placeholder="Masukan Nama" /></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td>:</td>
			<td><input required type="mail" name="email" placeholder="Masukan E-mail" /></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input required type="text" name="username" placeholder="Masukan Username" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input required type="password" name="password" placeholder="Masukan Password" /></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><input type="submit" name="submit" /></td>
		</tr>
	</form>
</table></center>

</body>
</html>
