<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <link rel="stylesheet" href="stylesheet.css"> 
</head>
<body>
    <h2>Inscription</h2>
    <form action="inscription.php" method="post" class="task-form">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required><br>

        <button type="submit">S'inscrire</button>

        <?php
        // Inclure le fichier contenant les fonctions
        require_once 'function.php';

        // Appel de la fonction pour obtenir les utilisateurs
        $users = getUser();

        // Affichage des utilisateurs dans une liste déroulante
        echo '<label for="user">Liste des utilisateurs :</label>';
        echo '<select name="user" id="user">';
        foreach ($users as $user) {
            echo '<option value="' . $user['id'] . '">' . $user['nom'] . ' ' . $user['prenom'] . '</option>';
        }
        echo '</select>';
        ?>
    </form>
</body>
</html>
