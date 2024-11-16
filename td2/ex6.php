<?php
session_start();

function saisieUtilisateur() {
    echo "<form method='post' action='ex6.php'>";
    echo "<input type='text' name='nombre' placeholder='Entrez un nombre'>";
    echo "<input type='submit' value='Valider'>";
    echo "</form>";
    return $_POST['nombre'] ?? null;
}

function nbAlea() {
    return rand(1, 100); }

function comparaison($nbalea, $nombre) {
    if ($nbalea > $nombre) {
        echo "C'est plus !<br>";
    } elseif ($nbalea < $nombre) {
        echo "C'est moins !<br>";
    } else {
        echo "Bravo ! Vous avez trouvé le bon nombre !<br>";
        $_SESSION['nbalea'] = nbAlea();
        $_SESSION['tentatives'] = 5;
    }
}


if (!isset($_SESSION['tentatives'])) {
    $_SESSION['tentatives'] = 5;
}


if (!isset($_SESSION['nbalea'])) {
    $_SESSION['nbalea'] = nbAlea();
}

echo "EXERCICE 6<br><br>";

if ($_SESSION['tentatives'] > 0) {

    $nombre = saisieUtilisateur();

   
    if ($nombre !== null) {
        $_SESSION['tentatives']--; 
        echo "Nombre de tentatives restantes : " . $_SESSION['tentatives'] . "<br>";

       
        comparaison($_SESSION['nbalea'], $nombre);
    } else {
        echo "Nombre de tentatives restantes : " . $_SESSION['tentatives'] . "<br>";
    }
} else {
    echo "Désolé, vous avez épuisé toutes vos tentatives. Le bon nombre était " . $_SESSION['nbalea'] . ".<br>";
   
    $_SESSION['nbalea'] = nbAlea();
    $_SESSION['tentatives'] = 10;
    echo "Le jeu a été réinitialisé. Vous pouvez réessayer.<br>";
}

?>
