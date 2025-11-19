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
        <div>
        <?php
            //check to see if we should process form data
            if($_SERVER['REQUEST_METHOD'] === "POST"){
                //check to see if we should add a user
                if(!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))){
                    $stmt = $pdo->prepare("INSERT INTO Associates(Name,Password) VALUES (?,?)");
                    $stmt->execute(array($_POST['username'],$_POST['password']));
                }
            }
            /* Display a table of all the employees. */
            $result = $pdo->query("SELECT Name,Password,CommissionTotal,Address FROM Associates");
            //retrieve all the rows from the table.
            echo "<table>";
            echo "<tr><th>Name</th><th>Password</th><th>Comission Total</th><th>Address</th></tr>";
            while(($row = $result->fetch(PDO::FETCH_ASSOC))){
                //print all table elements
                echo "<tr>";
                    echo "<td>{$row['Name']}</td>";
                    echo "<td>{$row['Password']}</td>";
                    echo "<td>${$row['CommissionTotal']}</td>";
                    echo "<td>{$row['Address']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
        </div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <label for="username">Name:</label>
                <input type='textbox' name="username" id="username">
                <label for="password">Password:</label>
                <input type='textbox' name="password" id="password">
                <input type="submit">

            </form>
    </body>
</html>
