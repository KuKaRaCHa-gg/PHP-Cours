<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Tâches</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h2>Liste des Tâches</h2>
    <a href="index.php?action=form">Ajouter une Tâche</a>
    <table border="1" class="task-table">
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Échéance</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= htmlspecialchars($task['nom']) ?></td>
                <td><?= htmlspecialchars($task['description']) ?></td>
                <td><?= htmlspecialchars($task['echeance']) ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $task['id'] ?>">Modifier</a>
                    <a href="index.php?action=delete&id=<?= $task['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette tâche ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
