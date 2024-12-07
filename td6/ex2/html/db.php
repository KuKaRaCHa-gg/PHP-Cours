<?php
$host = 'localhost';
$dbname = 'blog_exo_td6'; // Le nom exact de votre base
$username = 'root'; // Par défaut pour XAMPP
$password = ''; // Par défaut vide pour XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
