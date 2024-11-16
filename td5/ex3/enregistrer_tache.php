<?php
require_once 'function.php';

$pdo = getDatabaseConnection();

// Vérifier si le formulaire 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $echeance = $_POST['echeance'];

    // Insertion de la nouvelle tâche
    insertTask($nom, $description, $echeance);

    echo "<p class='message'>Tâche enregistrée avec succès !</p>";
}

// Récupérer toutes les tâches pour les afficher dans le tableau
$taches = getAllTasks();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement de Tâche et Liste des Tâches</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <div class="form-container">
        <h2>Enregistrer une Tâche</h2>
        <form action="enregistrer_tache.php" method="post" class="task-form">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br>

            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea><br>

            <label for="echeance">Échéance :</label>
            <input type="date" id="echeance" name="echeance" required><br>

            <button type="submit">Enregistrer la tâche</button>
        </form>
    </div>

    <div class="table-container">
        <h2>Liste des Tâches</h2>
        <table border="1" class="task-table">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Échéance</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($taches as $tache): ?>
                <tr>
                    <td><?= htmlspecialchars($tache['nom']) ?></td>
                    <td><?= htmlspecialchars($tache['description']) ?></td>
                    <td><?= htmlspecialchars($tache['echeance']) ?></td>
                    <td>
                        <!-- modifier -->
                        <form method="post" action="modifier_tache.php" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $tache['id'] ?>">
                            <button type="submit">Modifier</button>
                        </form>
                        <!-- supprimer -->
                        <form method="post" action="supprimer_tache.php" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $tache['id'] ?>">
                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette tâche ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
