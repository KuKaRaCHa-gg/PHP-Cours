<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonFile = 'tasks.json';
    
    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        $tasks = json_decode($jsonData, true) ?? [];

        if (isset($_POST['index'])) {
            $index = intval($_POST['index']);
            if (isset($tasks[$index])) {
                // Supprimer la tâche à cet index
                array_splice($tasks, $index, 1);

                // Enregistrer les tâches mises à jour dans le fichier JSON
                file_put_contents($jsonFile, json_encode($tasks, JSON_PRETTY_PRINT));

                // Rediriger vers la page ex3.php
                header('Location: ex3.php');
                exit();
            }
        }
    }
}
?>
