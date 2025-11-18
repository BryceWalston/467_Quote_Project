<?php
try {
	#this will work for xampp logins.
	$pdo = new PDO('mysql:host=localhost;dbname=csci467', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
	exit("Database connection failed: " . $e->getMessage());
}
?>
