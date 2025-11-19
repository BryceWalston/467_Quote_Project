<?php
try {
	#this will work for xampp logins.
	$pdo = new PDO('mysql:host=localhost;dbname=csci467', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
	exit("Database connection failed: " . $e->getMessage());
}
?>

<style>
	table,th,td{
		border: 1px solid black;
	}
	th,td{
		padding: 10px;
	}
	table{
		width: 70%;
		border-collapse: collapse;
		margin-left: auto;
		margin-right: auto;
	}
	th{
		background-color: #82EEFD;
	}
	td{
		background-color: #f9f9f9;
	}
	form{
		width: 70%;
		margin-left: auto;
		margin-right: auto;
	}
</style>