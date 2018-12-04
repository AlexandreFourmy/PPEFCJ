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
if (isset($_POST['username'])){
    $sql=$db->prepare("SELECT * FROM utilisateur WHERE username='?'");
	$sql->execute($_POST['username']);
	
		/*TEST COOL
		// removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$nom = mysqli_real_escape_string($conn,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>username ou mot de passe incorrect.</h3>
<br/>Cliquez ici pour <a href='signin.php'>vous enregistrer</a></div>";
	}*/
    }else{
?>
<div class="form">
<h1 id="title">Se connecter</h1>
<form action="" method="post" name="login">
<input id="username" class="boxes" type="text" name="username" placeholder="username" required />
<input id="password" class="boxes" type="password" name="password" placeholder="password" required />
<input id="submit" name="submit" type="submit" value="Login" />
</form>
<p>Pas encore enregisté? <a href='registration.php'>S'enregistrer ici</a></p>
<p>Retourner sur le site <a href='index.html'>ici</a></p>
</div>
<?php } ?>
</body>
</html>