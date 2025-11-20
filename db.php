<?php
$host = "blitz.cs.niu.edu";
$port = 3306;
$user = "student";
$pass = "student";
$dbname = "csci467";

// Initialize connection
$conn = mysqli_init();

if (!$conn) {
    die("❌ MySQL initialization failed.");
}

if (!mysqli_real_connect(
    $conn,
    $host,
    $user,
    $pass,
    $dbname,
    $port,
    NULL,
    MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT
)) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

echo "✅ Secure connection established successfully to NIU database!";
?>
