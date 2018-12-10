<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Connexion</title>
<link rel="stylesheet" href="css/styleLogin.css" />
</head>
<body>
<?php
if (isset($_POST['username'])){
    /*
	$sql=$db->prepare("SELECT * FROM utilisateur WHERE username='?'");
	$sql->execute($_POST['username']);
	*/
	$username=$_POST['username'];
	$password=$_POST['password'];
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=marieteam','root','');
		foreach($dbh->query('SELECT * from utilisateur') as $row) {
        print_r($row);
		}
		$dbh = null;
	}
	catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
}else
{
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
	<?php
} 
?>
</body>
</html>