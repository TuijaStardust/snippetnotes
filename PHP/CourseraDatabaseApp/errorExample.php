<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=[databasename]', '[dbusername]', '[dbpassword]');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION);
try {
    $statement = $pdo->prepare("SELECT * FROM users WHERE user_id = :xyz");
    $statement->execute(array(":mistake" => $_GET['user_id']));
} catch (Exception $ex) {
    echo ("Internal error, please contact support");
    error_log("errorExample.php, SQL error=".$ex->getMessage());
    return;
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>