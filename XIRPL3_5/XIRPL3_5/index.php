<?php
	//Memanggil db.php untuk mengkoneksikan atau mengakses ke database
	include 'db.php';
	//Buat prepared statement untuk mengambil semua data di tinstagram
	$query = $db->prepare("SELECT * FROM user");
	//Jalankan perintah SQL
	$query->execute();
	//Ambil semua data dan masukkan ke variable $data
	$data = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftar User</title>
</head>
<body>

<center>
	<h1>Daftar User</h1>
	<a href="create.php"><button type="button" style="margin: 20px;">Tambah Data</button></a>
	<table border="1">
		<tr>
			<th>#ID</th>
			<th>Nama</th>
			<th>E-mail</th>
			<th>Username</th>
			<th>Password</th>
			<th>Setting</th>
		</tr>

		<!--Perulangan untuk menampilkan semua data yang ada di variable $data-->
		<?php foreach ($data as $value): ?>

			<tr>
				<td style="text-align: center;"><?php echo $value['ID']; ?></td>
				<td><?php echo $value['nama']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['username']; ?></td>
				<td><?php
					$lenPass = strlen($value['password']);
					echo str_repeat("*", $lenPass); ?>
				</td>
				<td>
					<a href="edit.php?ID=<?php echo $value['ID']?>">Edit</a>
					<a href="delete.php?ID=<?php echo $value['ID']?>">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</center>

</body>
</html>
