<?php
session_start();
$host = 'sql102.infinityfree.com';        // from your screenshot
$dbname = 'if0_41893575_nejwaportfolio';   // from your screenshot (the database you created)
$user = 'if0_41893575';                   // from your screenshot
$pass = 'PASTE_YOUR_MYSQL_PASSWORD_HERE'; // the password you set when creating the database

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
