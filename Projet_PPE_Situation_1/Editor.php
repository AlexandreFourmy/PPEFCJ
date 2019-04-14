	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Editor</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">				
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
			<header id="header">
				<div class="header-top">
					<div class="container">
			  		<div class="row align-items-center">
			  			<div class="col-lg-6 col-sm-6 col-6 header-top-right">
							<div class="header-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>
			  			</div>
			  		</div>			  					
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="index.html">Accueil</a></li>
				          <li><a href="reservation1.php">Réservation</a></li>
				          <li><a href="horaires.html">Horaires</a></li>
				          <li><a href="tarifs.html">Tarifs</a></li>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			  
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Edition				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a href="packages.html"> Edition</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->
			<?php
		
		//Initialisation de la base de donnée dans $db
		
				$db=new PDO('mysql:host=localhost; dbname=marieteam','root','');
		
		//Script ajout de port
		
				if(isset($_REQUEST['port']))
				{					
					$port=$_POST['port'];
					
					$sqlAjoutPort=$db->prepare("	INSERT INTO port(nom) VALUES(?)");
					$sqlAjoutPort->execute([$port]);
					
					echo "<script type='text/javascript'>";
					echo "alert('Le nouveau port à bien été enregistré');";
					echo "</script>";
				}
				
		//Script ajout de liaison
				

			?>
			<div class="form">
				<h1 id="editPort">Edition Port</h1>
				<form id="formPort" action="" method="post" name="postPort">
					<input id="port" class="boxes" type="text" name="port" placeholder="Nom du port" required />
					<input id="submitPort" name="submitPort" type="submit" value="Ajouter" />
				</form>
			</div>
			<div class="form">
				<h1 id="editLiaison">Edition Liaison</h1>
				<form id="formLiason" action="" method="post" name="postPort">
					<label>Port de départ</label>
					<select id="portDepart" name="portDepart">
						<?php
							$sqlPortDepart=$db->query("SELECT * FROM port");
							$rows = $sqlPortDepart->rowCount();
							if ($rows != 0) {
                                for ($i = 1; $i <= $rows; $i++) {
                                    $dataPortDepart = $sqlPortDepart->fetch();
                                    echo '<option value="' . $dataPortDepart['id'] . '">' . $dataPortDepart['nom'] . '</option>';
                                }
                            }
						?>
					</select>
					<label>Port d'arrivé</label>
					<select id="portArrivee" name="portArrivee">
						<?php
							$sqlPortArrivee=$db->query("SELECT * FROM port");
							$rows2 = $sqlPortArrivee->rowCount();
							if ($rows2 != 0) {
								for ($i = 1; $i <= $rows2; $i++)
								{
									$dataPortArrivee = $sqlPortArrivee->fetch();
									echo '<option value="'.$dataPortArrivee['id'].'">'.$dataPortArrivee['nom'].'</option>';
								}
							}	
						?>
					</select>
					<input id="distance" class="boxes" type="text" name="distance" placeholder="Distance de la liaison" required />
					<label>Secteur</label>
					<select id="secteur" name="secteur">
						<?php
							$sqlSecteur=$db->query("SELECT * FROM secteur");
							$rows3 = $sqlSecteur->rowCount();
							if ($rows3 != 0) {
                            while ($dataSecteur = $sqlSecteur->fetch()) {
                                echo '<option value="' . $dataSecteur['id'] . '">' . $dataSecteur['nom'] . '</option>';
                            }
                        }
						?>
					</select>
					<input id="submitLiaison" name="submitLiaison" type="submit" value="Ajouter la liaison"/>
                    <?php
                    if(isset($_POST['portDepart']))
                    {
                    $distance=$_POST['distance'];
                    $secteur=$_POST['secteur'];
                    $portDepart=$_POST['portDepart'];
                    $portArrivee=$_POST['portArrivee'];
                    $sqlAjoutLiaison=$db->prepare("INSERT INTO liaison(distance,id_Secteur,id_Port_Depart,id_Port_Arrivee) VALUES(?,?,?,?)");
                    $sqlAjoutLiaison->execute([$distance,$secteur,$portDepart,$portArrivee]);
                    }
                    ?>
					<table class="tableau">
						<tr>
							<th>ID</th>
							<th>Nom</th>
						</tr>
						<?php
							$sqlTabPort=$db->prepare("SELECT * FROM port");
							$sqlTabPort->execute();
							$rows4 = $sqlTabPort->rowCount();
							if ($rows4 != 0) {
								for ($i = 1; $i <= $rows4; $i++)
								{
									$dataListPort = $sqlTabPort->fetch();
									?>
									<tr>
										<th> <?=$dataListPort['id'] ?> </th>
										<th> <?=$dataListPort['nom'] ?> </th>
									</tr>
									<?php
								}
							}
						?>
					</table>


			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">

					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>A Propos</h6>
								<p>
									Marie Team, entreprise créatrice d'emplois et de valeur.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Liens</h6>
								<div class="row">
									<div class="col">
										<ul>
											<li><a href="#">Accueil</a></li>
											<li><a href="#">Réservation</a></li>
											<li><a href="#">Horaires</a></li>
											<li><a href="#">Tarifs</a></li>
										</ul>
									</div>
									<div class="col">
										<ul>
										</ul>
									</div>										
								</div>							
							</div>
						</div>							
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>
									Pour recevoir les dernières actualités de MarieTeam.						
								</p>								
								<div id="mc_embed_signup">
									<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
										<div class="input-group d-flex flex-row">	
										</div>									
										<div class="mt-10 info"></div>
									</form>
								</div>
							</div>
						</div>			
					</div>
				</div>
			</footer>
			<!-- End footer Area -->	

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>					
			<script src="js/owl.carousel.min.js"></script>							
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>