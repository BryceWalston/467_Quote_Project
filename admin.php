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
                if(isset($_POST['username'],$_POST['password']) && !empty(trim($_POST['username'])) && !empty(trim($_POST['password']))){
                    $stmt = $pdo->prepare("INSERT INTO Associates(Name,Password) VALUES (?,?)");
                    $stmt->execute(array($_POST['username'],$_POST['password']));
                }
                //check to see if we need to update the name.
                if(isset($_POST['Name']) &&  !empty(trim($_POST['Name']))){
                    $stmt = $pdo->prepare("UPDATE Associates SET Name = ? WHERE EmpID = ?");
                    $stmt->execute(array($_POST['Name'],$_POST['EmpID']));
                }
                //check to see if we need to update the password.
                if(isset($_POST['Password']) &&  !empty(trim($_POST['Password']))){
                    $stmt = $pdo->prepare("UPDATE Associates SET Password = ? WHERE EmpID = ?");
                    $stmt->execute(array($_POST['Password'],$_POST['EmpID']));
                }
                //check to see if we need to update the commission total.
                if(isset($_POST['CommissionTotal']) &&  !empty(trim($_POST['CommissionTotal']))){
                    //we need to trim the dollarsign off.
                    $_POST['CommissionTotal'] = str_replace('$','',$_POST['CommissionTotal']);
                    $stmt = $pdo->prepare("UPDATE Associates SET CommissionTotal = ? WHERE EmpID = ?");
                    $stmt->execute(array($_POST['CommissionTotal'],$_POST['EmpID']));
                }
                //check to see if we need to update the address.
                if(isset($_POST['Address']) &&  !empty(trim($_POST['Address']))){
                    $stmt = $pdo->prepare("UPDATE Associates SET Address = ? WHERE EmpID = ?");
                    $stmt->execute(array($_POST['Address'],$_POST['EmpID']));
                }
            }
            /* Display a table of all the employees. */
            $result = $pdo->query("SELECT * FROM Associates");
            //retrieve all the rows from the table.
            echo "<table>";
            echo "<tr><th>Name</th><th>Password</th><th>Commission Total</th><th>Address</th></tr>";
            while(($row = $result->fetch(PDO::FETCH_ASSOC))){
                //print all table elements
                //TODO: MAKE THIS A FORM WHERE NAME PASSWORD COMISSION TOTAL AND ADDRESS ARE INPUT FIELDS,
                //AND ID IS A HIDDEN FORM VALUE USED TO FIND WHAT WHICH ELEMENTS TO CHANGE
                echo "<tr>";
                    //name.
                    echo "<td><form method=post onchange=this.submit()>
                    <input type=hidden name=EmpID value='{$row['EmpID']}'/>
                    <input type=textbox name=Name value='{$row['Name']}'/>
                    </form></td>";

                    //password.
                    echo "<td><form method=post onchange=this.submit()>
                    <input type=hidden name=EmpID value='{$row['EmpID']}'/>
                    <input type=textbox name=Password value='{$row['Password']}'/>
                    </form></td>";

                    //commission total.
                    echo "<td><form method=post onchange=this.submit()>
                    <input type=hidden name=EmpID value='{$row['EmpID']}'/>
                    <input type=textbox name=CommissionTotal value='\${$row['CommissionTotal']}'/>
                    </form></td>";

                    //address.
                    echo "<td><form method=post onchange=this.submit()>
                    <input type=hidden name=EmpID value='{$row['EmpID']}'/>
                    <input type=textbox name=Address value='{$row['Address']}'/>
                    </form></td>";
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
