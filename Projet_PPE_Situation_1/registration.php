<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<link rel="stylesheet" href="css/styleLogin.css" />
	</head>
	<body>
		<?php
		if (isset($_REQUEST['nom']))
		{
			$db=new PDO('mysql:host=localhost; dbname=marieteam','root','');
			$username=$_POST['username'];
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$statut='user';
		
			$sql=$db->prepare("INSERT INTO utilisateur(username, nom, prenom, email, password, statut) VALUES(?,?,?,?,?,?)");
			$sql->execute([$username, $nom, $prenom, $email, $password, $statut]);
		
			echo "<script type='text/javascript'>";
			echo "alert('Vous avez bien été enregistré(e)');";
			echo "window.location.href='index.html';";
			echo "</script>";
		}
		else
		{
			?>
			<div class="form">
				<h1 id="title">Inscription</h1>
				<form id="form" name="registration" action="" method="post">
					<p>Nom d'utilisateur</p>
					<input id="username" class="boxes" type="text" name="username" placeholder="Nom d'utilisateur" required />
					<p>Nom</p>
					<input id="nom" class="boxes" type="text" name="nom" placeholder="Nom" required />
					<p>Prénom</p>
					<input id="prenom" class="boxes" type="text" name="prenom" placeholder="Prénom" required />
					<p>Adresse mail</p>
					<input id="email" class="boxes" type="email" name="email" placeholder="Adresse mail" required />
					<p>Mot de passe</p>
					<input id="password" class="boxes" type="password" name="password" placeholder="Mot de passe" required />
					<input id="submit" type="submit" name="submit" value="S'enregistrer" />
				</form>
				<p>Déjà enregistré(e)? <a href='signin.php'>Connectez vous ici</a></p>
				<p>Retourner sur le site <a href='index.html'>ici</a></p>
			</div>
			<?php
		}
		?>
	</body>
</html>