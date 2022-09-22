<?php
   include_once "connect.php";  
    if(isset($_POST['envoi'])){
        if(!empty($_POST['username']) AND !empty($_POST['mdp']) AND !empty($_POST['email']) AND !empty($_POST['confirm-mdp'])){
            if(($_POST['mdp']) === ($_POST['confirm-mdp'])){
                $email =htmlspecialchars($_POST['email']);
                $username=htmlspecialchars($_POST['username']);
                $mdp = sha1($_POST['mdp']);
                $insertUser = $bdd->prepare('INSERT INTO users(username, mdp, email)VALUES(?, ?, ?)');
                $insertUser->execute(array($username, $mdp, $email));
            }else{
                echo "Mot de passe incorrect";
            }
            
        }else{
            echo "Veuillez compléter tous les champs...";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>formulaire d'inscription</title>
</head>
<body>
    <form method="POST" class="inscription-form">
        <div class="opacité">
            <img src="Assets/hcimage.png" alt="" width="350px" height="350px">
        </div>
        <label for="" class="image-cover">
            <img src="Assets/Bug life.jpg" alt="" width="355px" height="600px">
        </label>
        <div class="compte">
           <div class="account-creation-row">CREER UN COMPTE</div>
            <div class="information">NOM D'UTILISATEUR</div>
            <label>
                <input type="text"  placeholder="riri" class="inscription-input" name="username" id="username ">
            </label>
            <div class="information">E-Mail</div>
            <label>
                <input type="text"  placeholder="riri@gmail.com" class="inscription-input" name="email">
            </label>
            <div  class="information">MOT DE PASSE</div>
            <label>
                <input type="password" class="inscription-input" name="mdp" id="password">
            </label>
            <div  class="information">CONFIRMATION MOT DE PASSE</div>
            <label>
                <input type="password"  class="inscription-input" name="confirm-mdp">
            </label>
            <button class="inscription-btn" type="submit" name="envoi">S'INSCRIRE</button>
      </div>
    </form>
</body>
</html>