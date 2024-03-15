<?php
$db_hostname = 'localhost';
$db_database = 'id21348297_sugarrush';
$db_username = 'root';
$db_password = ''; 

try {
    $pdo = new PDO("mysql:host=$db_hostname;dbname=$db_database", $db_username, $db_password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>