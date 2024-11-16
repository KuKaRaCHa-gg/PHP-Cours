<?php
require_once 'function.php';

$pdo = getDatabaseConnection();

// Vérifier si l'ID de la tâche est fourni pour la suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Supprimer la tâche de la base de données
    deleteTask($id);

    // Redirection vers la page d'enregistrement pour voir la liste mise à jour
    header("Location: enregistrer_tache.php");
    exit;
}
?>
