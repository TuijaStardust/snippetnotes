<?php
require_once "pdo.php";      // includes the PDO-connection

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";  // "Placeholder" values (can be named anything; more clear if its the same as column names) -->
    echo("<pre>".$sql."</pre>");
    $statement = $pdo->prepare($sql);   // preparing statement -->
    $statement->execute(array(          // Sending the actual data to database server (Run the query with given values) -->
        ':name' => $_POST['name'],      // Replaces the $sql (command)string placeholders with actual values -->
        ':email' => $_POST['email'],
        ':password' => $_POST['password']
    ));

if ( isset($_POST['delete']) && isset($_POST['user_id']) ) {
    $sql="DELETE FROM users WHERE user_id = :zip";
    echo "<pre>$sql</pre>";
    $statement = $pdo->prepare($sql);
    $statement ->execute(array(':zip'=>$_POST['user_id]));
}

}
?>

<html>
    <head>
        <title>Form data to database example</title>
    </head>
    <body><table border="1">

        <!-- Print out the table -->
        <?php
        $statement = $pdo->query("SELECT name, email, password, user_id FROM users");
        while ($row = $statement->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo($row['name']);
            echo("</td><td>");
            echo($row['email']);
            echo("</td><td>");
            echo($row['password']);
            echo("</td><td>");
            echo('<form method='post'><input type="hidden" ');
            echo('name="user_id" value="'.$row['user_id'].'">');
            echo('<input type="submit" value="Del" name="delete">');
            echo("</form>");
            echo("</td></tr>");
        }
        ?>
        </table>

        <!-- Add New User form section -->
        <p>Add A New User</p>
        <form method="post">
            <p>Name:<input type="text" name="name" size="40"></p>
            <p>Email:<input type="text" name="email"></p>
            <p>Password:<input type="text" name="password"></p>
            <p><input type="submit" value="Add New" /></p>
        </form>
    </body>
</html>