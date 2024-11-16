<?php
    echo "EXERCICE 4<br><br>";

    $mot = 'MICHELELLELLLLL';
    echo''. $mot .' = ';

    for ($i = 0; $i < strlen($mot); $i++) {
        $mot[$i] . "<br>";
    }

    $i = strlen($mot) - 1;

    while ($i >= 0) {
        echo $mot[$i] ;
        $i--;
    }
?>
