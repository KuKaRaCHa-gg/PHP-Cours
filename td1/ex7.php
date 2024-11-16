<?php   
    echo"EXERCICE 7<br><br>";

    $tableau_multidimensionnel = array(
        "fruits" => array("Pomme", "Banane", "Orange", "Kiwi", "Fraise"),
        "Prix" => array(1, 0.5, 1.2 , 0.8, 2),
        "Quantite" => array(100,150,75,120,50)

    );
    for($i = 0; $i < count($tableau_multidimensionnel["fruits"]); $i++){
        echo $tableau_multidimensionnel["fruits"][$i]." : ".$tableau_multidimensionnel["Prix"][$i]."€ , ".$tableau_multidimensionnel["Quantite"][$i]."<br>";
    }
   
    