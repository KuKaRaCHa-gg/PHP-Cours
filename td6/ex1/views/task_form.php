<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrer une Tâche</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h2><?= isset($tache) ? 'Modifier la Tâche' : 'Ajouter une Tâche' ?></h2>
    <form action="<?= isset($tache) ? 'index.php?action=update&id=' . $tache['id'] : 'index.php?action=add' ?>" method="post" class="task-form">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= isset($tache) ? htmlspecialchars($tache['nom']) : '' ?>" required><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required><?= isset($tache) ? htmlspecialchars($tache['description']) : '' ?></textarea><br>

        <label for="echeance">Échéance :</label>
        <input type="date" id="echeance" name="echeance" value="<?= isset($tache) ? htmlspecialchars($tache['echeance']) : '' ?>" required><br>

        <button type="submit"><?= isset($tache) ? 'Enregistrer les modifications' : 'Enregistrer la tâche' ?></button>
    </form>
</body>
</html>
