<?php
	//Memanggil db.php untuk mengkoneksikan atau mengakses ke database
	include 'db.php';
	if(!isset($_GET['ID'])){
		die("Error: ID tidak ditemukan");
	}
	//Ambil data
	$query = $db->prepare("SELECT * FROM `tinstagram` WHERE ID = :ID");
	$query->bindParam(":ID", $_GET['ID']);
	//Jalankan perintah SQL
	$query->execute();
	if($query->rowCount() == 0){
		//TIDak ada hasil yang ditemukan
		die("Error: ID tidak ditemukan.");
	}else{
		//ID ditemukan, maka kita ambil data yang telah ditemukan
		$data = $query->fetch();
	}
	if(isset($_POST['submit'])){
		/*Simpan data yang diinputkan dan masukan ke masing-masing variable
		serta convert semua tag HTML yang mungkin dimasukan untuk menghindari XSS*/
		$nama = htmlentities($_POST['nama']);
		$email = htmlentities($_POST['email']);
		$username = htmlentities($_POST['username']);
		$password = htmlentities($_POST['password']);
		/*Prepared statement untuk mengubah data yang dipilih
		sesuai dengan inputan yang baru*/
		$query = $db->prepare("UPDATE `tinstagram` SET `nama`=:nama, `email`=:email, `username`=:username, `password`=:password WHERE ID=:ID");
		$query->bindParam(":nama", $nama);
		$query->bindParam(":email", $email);
		$query->bindParam(":username", $username);
		$query->bindParam(":password", $password);
		$query->bindParam(":ID", $_GET['ID']);
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
	<title>Edit User</title>
</head>
<body>

<center><table border="0">
	<h1>Tambah Data User</h1>
	<form method="post">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input required type="text" name="fullname" placeholder="Masukan Nama" value="<?php echo $data['nama']; ?>" /></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td>:</td>
			<td><input required type="mail" name="email" placeholder="Masukan E-mail" value="<?php echo $data['email']; ?>" /></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input required type="text" name="username" placeholder="Masukan Username" value="<?php echo $data['username']; ?>" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input required type="password" name="password" placeholder="Masukan Password" value="<?php echo $data['password']; ?>" /></td>
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
