<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
		<link rel="stylesheet" href="css/styleLogin.css" />
	</head>
	<body>
		<?php
		/*	Test #1 connection
		$sql=$db->prepare("SELECT * FROM utilisateur WHERE username='?'");
		$sql->execute($_POST['username']);
		*/
	
	
		/*	Test #2 connection
		$username=$_POST['username'];
		$password=md5($_POST['password']);
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
		$sth = null;
		$dbh = null;
		*/
		try
		{
			$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
			$connexion = new PDO(sprintf('mysql:host=%s; dbname=%s','localhost','marieteam'),'root','', $options);
		}
		catch(PDOException $e)
		{
			trigger_error(sprintf('Erreur MySQL %d<br />%s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST') // alternative du isset($_POST['submit'])
		{
			$username = $_POST['username'];
				// $username vaut false si pas bon ou vide, et vaut l'username audrement
			$password = empty($_POST['password']) ? '' : md5($_POST['password']);
				// $password vaut '' si inexistant ou chaîne vide, et le md5 sinon
			if ($username and !empty($password))
			{
				try
				{
					$query = '	SELECT COUNT(id) AS nb
									FROM utilisateur
										WHERE username = :username
											AND password = :password';
					$reponse = $connexion->prepare($query);
					$reponse->bindValue(':username', $username, PDO::PARAM_STR);
					$reponse->bindValue(':password', $password, PDO::PARAM_STR);
					$reponse->execute();
					$reponse->bindColumn('nb', $nb_ligne, PDO::PARAM_INT);
					$reponse->fetch(PDO::FETCH_BOUND);
					if ($nb_ligne > 0)
					{
						echo "<script type='text/javascript'>";
						echo "alert('Vous êtes bien connecté(e)');";
						echo "window.location.href='index.html';";
						echo "</script>";
					}
					else
					{
						$erreur_post = "1";
					}
				}
				catch(PDOException $e)
				{
					trigger_error(sprintf('Erreur MySQL %d<br />%s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
				}
			}
		}
		else
		{
			?>
			<div class="form">
				<h1 id="title">Se connecter</h1>
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