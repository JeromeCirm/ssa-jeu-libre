<?php
session_start();
if (!isset($_SESSION["login"])) {
	header('Location:login.php');
	die();
}?>

<?php   
require "private/fonctions.php";
// Traitement du formulaire après envoi
$tentativeModification=false;
$modificationCorrecte=false; //utilisé en cas de tentative de modification uniquement
$typeErreur=""; // inutile : jamais utilisé sans être redéfini. Juste au cas où
if (isset($_POST["password"]) && isset($_POST["newpassword"]) && isset($_POST["newpasswordbis"])){
	$tentativeModification=true;
    if (ouvre_bdd()) {
        if (!verifie_compte($_SESSION["login"],$_POST["password"])) {
            $typeErreur="mot de passe incorrect";
        } elseif ($_POST["newpassword"]!=$_POST["newpasswordbis"]) {
            $typeErreur="entrez deux fois le novueau mot de passe";
        } elseif (securise_login($_POST["newpassword"])!=$_POST["newpassword"]) {
            $typeErreur="nouveau mot de passe incorrect";
        } else {
            $modificationCorrecte=maj_compte($_SESSION["login"],$_POST["newpassword"]);
            $typeErreur="impossible de modifier le mot de passe";
        }
        ferme_bdd();
    } else {
        $typeErreur="base de données inaccessible";
    }
}?>

<!doctype html>
<html>
<head>
<meta http-equiv=content-type content="text/html;charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page de gestion</title>
<style type="text/css">
.login_box {
	width: 400px;
	margin: auto;
}
label {
	display: block;
	width: 170px;
	float: left;
} 
</style>
</head>

<body>
Pour la page d'index c'est <a href="index.php"> ici </a> <BR>
     <div class="login_box">
     	<form action="" method="post">
     		<fieldset>
     			<legend>Modification du mot de passe</legend>
     			<?php if ($tentativeModification) {
				if ($modificationCorrecte) {
					echo "<p style=\"color:red; \"> le mot de passe a été correctement modifié </p>";
				} else {
					echo "<p style=\"color:red; \"> le mot de passe n'a pas été correctement modifié </p>";
					echo "<p style=\"color:red; \">".$typeErreur."</p>";
				}
     			      } ?>
     			<label for="password">Ancien mot de passe :</label>
     			<input type="password" name="password" id="password" placeholder="Entrez votre ancien mot de passe" required>
     			<label for="newpassword">Nouveau mot de passe :</label>
     			<input type="password" name="newpassword" id="newpassword" placeholder="Entrez votre nouveau mot de passe" required>
     			<label for="newpasswordbis">Nouveau mot de passe bis:</label>
     			<input type="password" name="newpasswordbis" id="newpasswordbis" placeholder="Entrez votre nouveau mot de passe" required>
     			<input type="submit" value="Envoyer"/>
     		</fieldset>
     	</form>
     </div>
</body>
</html>
