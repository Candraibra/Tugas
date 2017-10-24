<?php
	//Memanggil db.php untuk mengkoneksikan atau mengakses ke database
	include 'db.php';
	if(isset($_GET['ID'])){
		//Prepared statement untuk menghapus data yang dipilih
		$query = $db->prepare("DELETE FROM `user` WHERE ID=:ID");
		$query->bindParam(":ID", $_GET["ID"]);
		//Jalankan perintah SQL
		$query->execute();
		//Alihkan ke index.php
		header("location: index.php");
	}
?>
