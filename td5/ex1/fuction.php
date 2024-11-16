<?php
// function.php

// Fonction pour se connecter à la base de données
function getDatabaseConnection() {
    try {
        $dsn = 'mysql:host=localhost;dbname=td5';
        $username = 'root';  // Remplacez 'root' par votre utilisateur si différent
        $password = '';      // Ajoutez le mot de passe si nécessaire
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// Fonction pour récupérer les départements
function getDepartements() {
    $pdo = getDatabaseConnection();
    $query = $pdo->query("SELECT departement_code, departement_nom FROM departement");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
