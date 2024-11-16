<form action="ex2.php" method="post">
    <label>Votre nom :</label>
    <input name="nom" id="nom" type="text" required />

    <label>Prenom:</label>
    <input name="prenom" id="prenom" type="text" required />

    <label for="email">Votre email :</label>
    <input type="email" id="email" name="email" required><br>

    <label for="motdepasse">Mot de passe :</label>
    <input type="password" id="motdepasse" name="motdepasse" required><br>
          
    <button type="submit">Valider</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mdp = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
    $user = [
        'nom' => htmlspecialchars($_POST['nom'] ?? null, ENT_QUOTES, 'UTF-8'),
        'prenom' => htmlspecialchars($_POST['prenom'] ?? null, ENT_QUOTES, 'UTF-8'),
        'email' => htmlspecialchars($_POST['email'] ?? null, ENT_QUOTES, 'UTF-8'),
        'motdepasse' => $mdp ?? null,
    ];

    $jsonFile = './users.json';
    $users = json_decode(file_get_contents($jsonFile), true) ?? [];
    $users[] = $user;

    file_put_contents($jsonFile, json_encode($users));

    echo "Les données ont été écrites dans le fichier users.json";
  

    // Générer le tableau HTML
echo "<table border='1'>";
echo "<tr>";

// Afficher les en-têtes du tableau (clés du premier élément)
foreach (array_keys($users[0]) as $key) {
    echo "<th>$key</th>";
}
echo "</tr>";

// Afficher les lignes du tableau
foreach ($users as $row) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>" . htmlspecialchars($cell) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

}
?>
