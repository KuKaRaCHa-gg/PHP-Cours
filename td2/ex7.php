<?php 
    function sommeDesCarres($n){
        $somme =0; 
        for ($i=1; $i<=$n; $i++){
            $somme += $i*$i;
        }
        return $somme;
    }
    function saisieUtilisateur7(): string{
        return '<form action="ex7.php" method="post">
        <label for="nombre">Entrez un nombre : </label>
        <input type="number" name="nombre" id="nombre">
        <input type="submit" value="Envoyer">
        </form>';
       
     }

    echo "EXERCICE 7<br><br>";
    echo saisieUtilisateur7();
    echo "La somme des carrés  : " . sommeDesCarres($_POST['nombre']);

    
    ?>