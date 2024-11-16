<?php
    function get_tasks_in_json(){
        $path = 'tasks.json';
        $tasks = [];
        if (file_exists($path)) {
            $jsonData = file_get_contents($path);
            $tasks = json_decode($jsonData, true) ?? [];
        }
        return $tasks;
    }

    function save_tasks_in_json($tasks){
        $json = json_encode($tasks, JSON_PRETTY_PRINT);
        file_put_contents('tasks.json', $json);
    }

    function create_task($name, $texte, $date){
        $tasks = get_tasks_in_json();
        $task = [
            'nom' => $name,
            'description' => $texte,
            'echeance' => $date,
        ];
        $tasks[] = $task;
        save_tasks_in_json($tasks);
    }

    function get_tasks(){
       return get_tasks_in_json();
    }

    function update_task($key, $name, $texte, $date){
        $tasks = get_tasks_in_json();
        if (isset($tasks[$key])) {
            $tasks[$key] = [
                'nom' => $name,
                'description' => $texte,
                'echeance' => $date,
            ];
            save_tasks_in_json($tasks);
        }
    }

    function delete_task($key){
        $tasks = get_tasks_in_json();
        if (isset($tasks[$key])) {
            array_splice($tasks, $key, 1);
            save_tasks_in_json($tasks);
        }
    }

    // Example usage
    // update_task(0, 'tache1', 'faire les courses', '2021-10-10');
    // delete_task(0);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tâches</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <h2>Modifier la Tâche</h2>
    <?php
        $task = ['nom' => '', 'description' => '', 'echeance' => ''];
        if (isset($_POST['index'])) {
            $tasks = get_tasks();
            $index = (int)$_POST['index'];
            if (isset($tasks[$index])) {
                $task = $tasks[$index];
            }
        }
    ?>
    <form action="modifier.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($task['nom']); ?>" required><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description" required><?php echo htmlspecialchars($task['description']); ?></textarea><br>

        <label for="echeance">Échéance :</label>
        <input type="date" name="echeance" id="echeance" value="<?php echo htmlspecialchars($task['echeance']); ?>" required><br>
        <button type="submit">Modifier</button>
    </form>

    <h2>Liste des Tâches</h2>
    <table>
        <?php foreach(get_tasks() as $key => $task){ ?>
            <tr>
                <td><?php echo htmlspecialchars($task['nom']); ?></td>
                <td><?php echo htmlspecialchars($task['description']); ?></td>
                <td><?php echo htmlspecialchars($task['echeance']); ?></td>
                <td>
                    <form action="supprimer.php" method="post">
                        <input type="hidden" name="index" value="<?php echo $key; ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
                <td>
                    <form action="modifier.php" method="post">
                        <input type="hidden" name="index" value="<?php echo $key; ?>">
                        <button type="submit">Modifier</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>