<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/styleLogin.css" />
</head>
<body>
<?php
if (isset($_REQUEST['nom'])){
    $db=new PDO('mysql:host=localhost; dbname=marieteam','root','');
		$username=$_POST['username'];
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$sql=$db->prepare("INSERT INTO utilisateur(username, nom, prenom, email, password) VALUES(?,?,?,?,?)");
		$sql->execute([$username, $nom, $prenom, $email, $password]);
		
		echo "<script type='text/javascript'>";
		echo "alert('Vous avez bien été enregistré(e)');";
		echo "window.location.href='index.html';";
		echo "</script>";
}
	else{
?>
<div class="form">
<h1 id="title">Inscription</h1>
<form id="form" name="registration" action="" method="post">
<input id="username" class="boxes" type="text" name="username" placeholder="username" required/>
<input id="nom" class="boxes" type="text" name="nom" placeholder="nom" required />
<input id="prenom" class="boxes" type="text" name="prenom" placeholder="prenom" required />
<input id="email" class="boxes" type="email" name="email" placeholder="email" required />
<input id="password" class="boxes" type="password" name="password" placeholder="password" required />
<input id="submit" type="submit" name="submit" value="S'enregistrer" />
</form>
<p>Déjà enregistré(e)? <a href='signin.php'>Connectez vous ici</a></p>
<p>Retourner sur le site <a href='index.html'>ici</a></p>
</div>
<?php }?>
</body>
</html>