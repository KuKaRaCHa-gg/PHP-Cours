<?php
// Charger la tâche à modifier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = intval($_POST['index']);
    $jsonFile = 'tasks.json';

    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        $tasks = json_decode($jsonData, true) ?? [];

        if (isset($tasks[$index])) {
            $task = $tasks[$index];
        } else {
            echo "Tâche non trouvée";
            exit();
        }
    }
}

// Sauvegarder les modifications
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $index = intval($_POST['index']);
    $jsonFile = 'tasks.json';

    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        $tasks = json_decode($jsonData, true) ?? [];

        if (isset($tasks[$index])) {
            // Mettre à jour les informations de la tâche
            $tasks[$index]['nom'] = $_POST['nom'];
            $tasks[$index]['description'] = $_POST['description'];
            $tasks[$index]['echeance'] = $_POST['echeance'];

            // Sauvegarder dans le fichier JSON
            file_put_contents($jsonFile, json_encode($tasks, JSON_PRETTY_PRINT));

            // Redirection après modification
            header('Location: ex3.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Tâche</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h2>Modifier la Tâche</h2>
    <form action="modifier.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($task['nom']); ?>" required><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description" required><?php echo htmlspecialchars($task['description']); ?></textarea><br>

        <label for="echeance">Échéance :</label>
        <input type="date" name="echeance" id="echeance" value="<?php echo htmlspecialchars($task['echeance']); ?>" required><br>

        <!-- Champ caché pour passer l'index -->
        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <input type="hidden" name="save" value="true">

        <button type="submit">Enregistrer les modifications</button>
    </form>
</body>
</html>
