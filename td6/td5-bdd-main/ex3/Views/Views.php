<?php if (!$isUpdate): ?>
   
    <form method="post">
        <div>
            <input type="text" name="nom" placeholder="Nom" />
        </div>
        <div>
            <input type="text" name="description" placeholder="Description" />
        </div>
        <div>
            <input type="date" name="echeance" placeholder="Echeance" />
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>
<?php endif; ?>
<?php if ($isUpdate):
    $task = get_task($_GET['id']);
?>
    <link rel="stylesheet" href="stylesheet.css">
    <form method="post">
        <div>
            <input type="text" name="nom" placeholder="Nom" value="<?php echo $task['nom']; ?>" />
        </div>
        <div>
            <input type="text" name="description" placeholder="Description" value="<?php echo $task['description']; ?>" />
        </div>
        <div>
            <input type="date" name="echeance" placeholder="Echeance" value="<?php echo timestamp_to_date($task['echeance']); ?>" />
        </div>
        <div>
            <input type="hidden" name="is_update" value="true" />
            <button type="submit">Modifier</button>
        </div>
    </form>
<?php endif; ?>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Echeance</th>
        <th>Modification</th>
        <th>Supprimer</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td>
                <?php echo $task['nom']; ?>
            </td>
            <td>
                <?php echo $task['description']; ?>
            </td>
            <td>
                <?php echo timestamp_to_date($task['echeance']); ?>
            </td>
            <td>
                <a href="?id=<?php echo $task['id']; ?>&action=update">Modifier</a>
            </td>
            <td>
                <a href="?id=<?php echo $task['id']; ?>&action=delete">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>