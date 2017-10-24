<?php
	//Konfigurasi database

	$host = "localhost";
	$dbname = "develop";
	$username = "root";
	$password = "";
	try{
		//Buat object PDO baru dan simpan ke variable $db
		$db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
		//Mengatur error mode di PDO untuk segera menampilkan exception ketika ada kesalahan
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $exception){
		die("Connection error: ".$exception->getMessage());
	}
?>
