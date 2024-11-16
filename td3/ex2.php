<?php 
session_start();

function authentification(){
    if(isset($_POST['password'])){
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    return '<form action="ex2.php" method="post">
    <label for="login">Login : </label>
    <input type="text" name="login" id="login">
    <label for="password">Password : </label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Envoyer">
    </form>';
}
function verification($login, $password){
    if($login == "admin" && $password == "admin"){
        echo "Bienvenue admin";
        echo '<img src="R.jfif" alt="Cat Image">';
    }else{
        echo "Erreur d'authentification";
    }
}

echo "EXERCICE 2<br><br>";
echo authentification();
verification($_POST['login'], $_POST['password']);

?>