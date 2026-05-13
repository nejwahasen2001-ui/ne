<?php
session_start();
$host = 'sql102.infinityfree.com';       
$dbname = 'if0_41893575_nejwaportfolio'; 
$user = 'if0_41893575';                   
$pass = 'HnLPOkBskvuvA39'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>