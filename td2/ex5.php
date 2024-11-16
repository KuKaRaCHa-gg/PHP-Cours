<?php
    echo "EXERCICE 5<br><br>";

    $mot = 'ANNA';
    echo $mot . ' = ';

    $inverser = '';

    for ($i = strlen($mot) - 1; $i >= 0; $i--) {
        $inverser .= $mot[$i];
    }

    if ($mot != $inverser) {
        echo 'Ce mot n\'est pas un palindrome';
    } else {
        echo 'Ce mot est un palindrome <br>';
    }
?>
