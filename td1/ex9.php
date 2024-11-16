<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    echo "EXERCICE 9<br><br>";

    echo "Durée de jeu pour chaque jeu vidéo :<br>";
    $jeux = array(
        "nom" => array("Apex Legends", "Skyrim", "Warhammer", "Fifa 21", "GTA V"),
        "duree" => array(100, 200, 300, 400, 500)
    );
    echo "<br>";

    $duree_totale = 0;
    for($i = 0; $i < count($jeux["nom"]); $i++){
        echo $jeux["nom"][$i] . " : " . $jeux["duree"][$i] . " heures<br>";
        $duree_totale += $jeux["duree"][$i];
    }

    echo "<br>Durée totale de jeu : " . $duree_totale . " heures<br>";

    echo "<img src='apex.jpg' alt='apex' width='100' height='100'><br>";
    ?>
    
</body>
</html>
