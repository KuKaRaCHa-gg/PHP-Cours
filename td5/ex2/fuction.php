<?php
// function.php

function getDatabaseConnection() {
    try {
        $dsn = 'mysql:host=localhost;dbname=ex2_td5';
        $username = 'root';  
        $password = '';      
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

function getUser() {
    $pdo = getDatabaseConnection();
    $query = $pdo->query("SELECT id, nom, prenom FROM User");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
