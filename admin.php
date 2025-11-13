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
        <p>admin page works.</p>
        <?php
            echo "yes it does";
            $result = $pdo->query("SELECT * FROM Associates");
            $rows = $result->fetch(PDO::FETCH_NUM);
            echo "<br>";
            foreach($rows as $cell){
                printf('%s ',$cell);
            }
        ?>
    </body>
</html>
