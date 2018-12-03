<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Connexion</title>
<link rel="stylesheet" href="css/styleLogin.css" />
</head>
<body>
<?php
require('marieteam.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['nom'])){
        // removes backslashes
	$nom = stripslashes($_REQUEST['nom']);
        //escapes special characters in a string
	$nom = mysqli_real_escape_string($con,$nom);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE nom='$nom'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['nom'] = $nom;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>nom/password is incorrect.</h3>
<br/>Click here to <a href='signin.php'>Sign in</a></div>";
	}
    }else{
?>
<div class="form">
<h1 id="title">Se connecter</h1>
<form action="" method="post" name="login">
<input class="boxes" type="text" name="nom" placeholder="nom" required />
<input class="boxes" type="password" name="password" placeholder="Password" required />
<input id="submit" name="submit" type="submit" value="Login" />
</form>
<p>Pas encore enregisté? <a href='registration.php'>S'enregistrer ici</a></p>
<p>Retourner sur le site <a href='index.html'>ici</a></p>
</div>
<?php } ?>
</body>
</html>