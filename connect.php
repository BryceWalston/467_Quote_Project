<?php
try {
	$pdo = new PDO('mysql:host=courses;dbname=z1998722', 'z1998722', '2005Jul17');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	exit("Database connection failed: " . $e->getMessage());
}
?>
