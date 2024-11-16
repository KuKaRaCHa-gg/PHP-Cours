<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Départements</title>
    <link rel="stylesheet" href="stylesheet.css"> 
</head>
<body>
    <h2>Liste des départements</h2>

    <?php
    // Inclure le fichier contenant les fonctions
    require_once 'fuction.php';

    // Appel de la fonction pour obtenir les départements
    $departements = getDepartements();

    // Affichage du tableau HTML
    echo "<table border='1' class='task-table'>";
    echo "<tr><th>Code</th><th>Nom</th></tr>";
    if (!empty($departements)) {
        foreach ($departements as $dep) {
            echo "<tr><td>" . htmlspecialchars($dep['departement_code']) . "</td><td>" . htmlspecialchars($dep['departement_nom']) . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>Aucun département trouvé</td></tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
