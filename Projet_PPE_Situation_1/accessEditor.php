﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Access Editor</title>
		<link rel="stylesheet" href="css/styleAdmin.css" />
	</head>
	<body>
		<?php
		if (isset($_REQUEST['username']))
		{
			$db=new PDO('mysql:host=localhost; dbname=marieteam','root','');
			
			$username = $_POST['username'];
			$password=$_POST['password'];
			
			try
			{
				$query = '	SELECT COUNT(id) AS nb
								FROM utilisateur
									WHERE username = :username
										AND password = :password';

				$reponse = $db->prepare($query);
				$reponse->bindValue(':username', $username, PDO::PARAM_STR);
				$reponse->bindValue(':password', $password, PDO::PARAM_STR);
				$reponse->execute();
				$reponse->bindColumn('nb', $nb_ligne, PDO::PARAM_INT);
				$reponse->fetch(PDO::FETCH_BOUND);
				if ($nb_ligne == 0)
				{
					echo "<script type='text/javascript'>";
					echo "alert('Le nom d\'utilisateur ou le mot de passe est incorrect');";
					echo "window.location.href='accessEditor.php';";
					echo "</script>";
					$erreur_post = "1";
				}				
				if ($nb_ligne > 0)
				{
					$query='SELECT statut AS stt
								FROM utilisateur
									WHERE username= :username';
					$reponse=$db->prepare($query);
					$reponse->bindValue(':username',$username,PDO::PARAM_STR);
					$reponse->execute();
					$reponse->bindColumn('stt',$statut,PDO::PARAM_STR);
					$reponse->fetch(PDO::FETCH_BOUND);
					if ($statut=='admin')
					{
						echo "<script type='text/javascript'>";
						echo "alert('Connexion validée, Niveau de permission suffisant');";
						echo "window.location.href='Editor.php';";
						echo "</script>";
					}
					if ($statut=='user')
					{
						echo "<script type='text/javascript'>";
						echo "alert('Niveau de permission insufisant, redirection sur le site');";
						echo "window.location.href='index.html';";
						echo "</script>";
					}
				}
			}
			catch(PDOException $e)
			{
				trigger_error(sprintf('Erreur MySQL %d<br />%s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
			}
		}
		else
		{
			?>
			<div class="form">
				<h1 id="title">Vérification Permissions</h1>
				<form id="form" action="" method="post" name="login">
					<input id="username" class="boxes" type="text" name="username" placeholder="Nom d'utilisateur" required />
					<input id="password" class="boxes" type="password" name="password" placeholder="Mot de passe" required />
					<input id="submit" name="submit" type="submit" value="Connexion" />
				</form>
				<p>Pas encore enregistré(e)? <a href='registration.php'>S'enregistrer ici</a></p>
				<p>Retourner sur le site <a href='index.html'>ici</a></p>
			</div>
			<?php
		} 
		?>
	</body>
</html>