<?php
    echo "EXERCICE 6<br><br>";
    $fruits = array("pomme", "poire", "banane", "fraise", "cerise", "orange", "citron");
    
    for($i = 0; $i < count($fruits); $i++){
        echo $fruits[$i] . "<br>";
    }
    echo "<br>";
    $assos = array(
        "nom" => array("Jdoe", "Smith", "Doe", "Smith", "Doe", "Smith", "Doe"),
        "prenom" => array("John", "Jane", "John", "Jane", "John", "Jane", "John"),
        "adresse" => array("1 rue de Paris", "2 rue de Paris", "3 rue de Paris", "4 rue de Paris", "5 rue de Paris", "6 rue de Paris", "7 rue de Paris"),
    );
    for($i = 0; $i < count($assos["nom"]); $i++){
        echo $assos["nom"][$i] . "<br>";
        echo $assos["prenom"][$i] . "<br>";
        echo $assos["adresse"][$i] ." <br>";
        echo "<br>";
    };
    
    
