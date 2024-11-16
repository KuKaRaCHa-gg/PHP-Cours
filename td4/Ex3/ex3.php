<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tâches</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <form action="ex3.php" method="post" class="task-form">
        <label for="nom">Nom :</label>
        <input name="nom" id="nom" type="text" required /><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description" required></textarea><br>

        <label for="echeance">Échéance (date) :</label>
        <input type="date" id="echeance" name="echeance" required><br>

        <button type="submit">Valider</button>
        <button type="button" onclick="document.getElementById('delete_all_form').submit();">Supprimer toutes les tâches</button>
    </form>

    <form id="delete_all_form" action="ex3.php" method="post" style="display:none;">
        <input type="hidden" name="delete_all" value="true">
    </form>

    <?php
    $jsonFile = 'tasks.json';
    $tasks = [];

    // Charger les tâches à partir du fichier JSON s'il existe
    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        $tasks = json_decode($jsonData, true) ?? [];
    }

    // Gérer la soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete_all']) && $_POST['delete_all'] === 'true') {
            // Supprimer toutes les tâches
            $tasks = [];
            file_put_contents($jsonFile, json_encode($tasks, JSON_PRETTY_PRINT));
            echo "<p class='message'>Toutes les tâches ont été supprimées !</p>";
        } else {
            // Ajouter une nouvelle tâche
            $task = [
                'nom' => $_POST['nom'] ?? null,
                'description' => $_POST['description'] ?? null,
                'echeance' => $_POST['echeance'] ?? null,
            ];

            // Ajouter la tâche à la liste des tâches
            $tasks[] = $task;

            // Sauvegarder la liste mise à jour dans le fichier JSON
            file_put_contents($jsonFile, json_encode($tasks, JSON_PRETTY_PRINT));

            echo "<p class='message'>Tâche enregistrée avec succès !</p>";
        }
    }

    // Affichage du tableau des tâches
    echo "<table border='1' class='task-table'>";
    echo "<tr>";
    echo "<th>Nom</th><th>Description</th><th>Échéance</th><th>Action</th>";
    echo "</tr>";

    // Afficher les lignes du tableau ou un message si aucune tâche n'existe
    if (!empty($tasks)) {
        foreach ($tasks as $index => $task) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($task['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($task['description']) . "</td>";
            echo "<td>" . htmlspecialchars($task['echeance']) . "</td>";
            echo "<td>
                    <form method='post' action='supprimer.php' style='display:inline-block;'>
                        <input type='hidden' name='index' value='$index'>
                        <button type='submit'>Supprimer</button>
                    </form>
                    <form method='post' action='modifier.php' style='display:inline-block;'>
                        <input type='hidden' name='index' value='$index'>
                        <button type='submit'>Modifier</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Aucune tâche disponible</td></tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
