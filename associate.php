<?php
require 'db.php';
require 'connect.php';

// Query all customers
$query = "SELECT * FROM customers ORDER BY id LIMIT 100";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #222;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .footer {
            text-align: center;
            color: #666;
            font-size: 0.9em;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<h2>Customer Directory</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>City</th>
        <th>Street</th>
        <th>Contact</th>
        <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['city']) ?></td>
            <td><?= htmlspecialchars($row['street']) ?></td>
            <td><?= htmlspecialchars($row['contact']) ?></td>
            <td><a href="view_customer.php?id=<?= urlencode($row['id']) ?>">View</a></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
