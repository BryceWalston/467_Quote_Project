<?php 
    require 'connect.php';
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Administrator</title>
    </head>
    <body>
        <?php
            /* first display a table of all the employees. */
            $result = $pdo->query("SELECT Name,Password,CommissionTotal,Address FROM Associates");
            //retrieve all the rows from the table.
            echo "<table>";
            echo "<tr><th>Name</th><th>Password</th><th>Comission Total</th><th>Address</th></tr>";
            while(($row = $result->fetch(PDO::FETCH_ASSOC))){
                //print all table elements
                echo "<tr>";
                    echo "<td>{$row['Name']}</td>";
                    echo "<td>{$row['Password']}</td>";
                    echo "<td>{$row['CommissionTotal']}</td>";
                    echo "<td>{$row['Address']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>
