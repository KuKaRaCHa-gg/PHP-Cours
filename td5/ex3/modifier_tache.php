<?php
require_once 'function.php';

$pdo = getDatabaseConnection();

// Charger les informations de la tâche à modifier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $tache = getTaskById($id);
}

// Mettre à jour la tâche dans la base de données après la soumission du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $echeance = $_POST['echeance'];

    updateTask($id, $nom, $description, $echeance);

    // Redirection vers la page d'enregistrement pour voir la liste mise à jour
    header("Location: enregistrer_tache.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Tâche</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h2>Modifier la Tâche</h2>
    <form action="modifier_tache.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($tache['nom']) ?>" required><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description" required><?= htmlspecialchars($tache['description']) ?></textarea><br>

        <label for="echeance">Échéance :</label>
        <input type="date" name="echeance" id="echeance" value="<?= htmlspecialchars($tache['echeance']) ?>" required><br>

        <input type="hidden" name="id" value="<?= $tache['id'] ?>">
        <input type="hidden" name="update" value="true">
        <button type="submit">Enregistrer les modifications</button>
    </form>
</body>
</html>
