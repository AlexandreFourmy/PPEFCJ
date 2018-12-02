<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/styleLogin.css" />
</head>
<body>
<?php
require('marieteam.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['nom'])){
        // removes backslashes
	$nom = stripslashes($_REQUEST['nom']);
        //escapes special characters in a string
	$nom = mysqli_real_escape_string($nom); 
	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($prenom); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($password);
        $query = "INSERT into `utilisateur` (nom, prenom, password, email)
VALUES ('$nom', '".md5($password)."', '$email')";
        $result = mysqli_query($query);
        if($result){
            echo "<div class='form'>
<h3>Vous êtes bien enregistré(e).</h3>
<br/>Cliquez ici pour vous <a href='signin.php'>necter</a></div>";
        }
    }else{
?>
<div class="form">
<h1 id="title">Inscription</h1>
<form id="form" name="registration" action="" method="post">
<input class="boxes" type="text" name="nom" placeholder="nom" required />
<input class="boxes" type="text" name="prenom" placeholder="prenom" required />
<input class="boxes" type="email" name="email" placeholder="email" required />
<input class="boxes" type="password" name="password" placeholder="Password" required />
<input id="submit" type="submit" name="submit" value="Register" />
</form>
<p>Déjà enregistré(e)? <a href='signin.php'>Connectez vous ici</a></p>
<p>Retourner sur le site <a href='index.html'>ici</a></p>
</div>
<?php } ?>
</body>
</html>