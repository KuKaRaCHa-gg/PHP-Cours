<?php
    echo "EXERCICE 1<br><br>";

    function formulaireDeContact(){
        return '<form action="ex1.php" method="post">
            <br>
            <label for="nom">Nom : </label>
            <br>
            <input type="text" name="nom" id="nom" required>
            <br>
            <label for="prenom">Prénom : </label>
            <br>
            <input type="text" name="prenom" id="prenom" required>
            <br>
            <label for="email">Email : </label>
            <br>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="message">Message : </label>
            <br>
            <textarea name="message" id="message" required></textarea>
            <br>
            <input type="submit" value="Envoyer">
        </form>';
    }

    echo formulaireDeContact();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        echo "<br><br>Informations reçues :<br>";
        echo "Nom : " . $nom . "<br>";
        echo "Prénom : " . $prenom . "<br>";
        echo "Email : " . $email . "<br>";
        echo "Message : " . $message . "<br>";
    }
?>
