<?php
// function.php

//  se connecter à la base de données
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

//  récupérer les utilisateurs
function getUser() {
    $pdo = getDatabaseConnection();
    $query = $pdo->query("SELECT id, nom, prenom FROM User");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// récupérer toutes les tâches
function getAllTasks() {
    $pdo = getDatabaseConnection();
    $query = $pdo->query("SELECT * FROM Tache");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//  insérer une nouvelle tâche
function insertTask($nom, $description, $echeance) {
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("INSERT INTO Tache (nom, description, echeance) VALUES (:nom, :description, :echeance)");
    $stmt->execute([':nom' => $nom, ':description' => $description, ':echeance' => $echeance]);
}

// récupérer une tâche par son ID
function getTaskById($id) {
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("SELECT * FROM Tache WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// mettre à jour une tâche
function updateTask($id, $nom, $description, $echeance) {
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("UPDATE Tache SET nom = :nom, description = :description, echeance = :echeance WHERE id = :id");
    $stmt->execute([':nom' => $nom, ':description' => $description, ':echeance' => $echeance, ':id' => $id]);
}

//  supprimer une tâche
function deleteTask($id) {
    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("DELETE FROM Tache WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
?>
