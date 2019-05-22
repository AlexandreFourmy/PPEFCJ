<?php

	try{
        $db=new PDO('mysql:host=localhost; dbname=marieteam','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
		echo $e->getMessage();
	}
	


?>

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
		<title>Réservation</title>
		<!--

!>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			
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
								Réservation				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Réservation</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->

            <div class="form">
                <h2 id="title">Choisissez un secteur</h2>
                <form id="formSecteur" action="" method="post" name="postSecteur">
                    <select id="secteur" name="secteur">
                        <?php
                        	$sqlSecteur=$db->query("SELECT * FROM secteur");
                        	$rows = $sqlSecteur->rowCount();
                        	if ($rows != 0) {
                            	for ($i = 1; $i <= $rows; $i++) {
                                	$dataSecteur = $sqlSecteur->fetch();
                                	echo '<option value="' . $dataSecteur['id'] . '">' . $dataSecteur['nom'] . '</option>';
                            	}
                        	}
                        ?>
                    </select>
                    <input id="submitSecteur" name="submitSecteur" type="submit" value="Valider le secteur"/>
                </form>
            </div>
            <div class="divCommun">
                <h2>Secteur : <?php echo $_POST['secteur'];$idSecteur=$_POST['secteur'] ?></h2>
            	<table class="tableau">
                	<tr>
                    	<th>Id_Port_Depart</th>
                    	<th>Id_Port_Arrivee</th>
                    	<th>Distance en miles</th>
                	</tr>
                	<?php
                		$sqlLiaison=$db->query("SELECT * FROM liaison WHERE id_Secteur = $idSecteur ");
                		$rows1 = $sqlLiaison->rowCount();
                		if ($rows1 != 0) {
                    		for ($i = 1; $i <= $rows1; $i++)
                    		{
                        		$dataLiaison = $sqlLiaison->fetch();
                        		?>
                        		<tr>
                            		<th> <?=$dataLiaison['id_Port_Depart'] ?> </th>
                            		<th> <?=$dataLiaison['id_Port_Arrivee'] ?> </th>
                            		<th> <?=$dataLiaison['distance'] ?> </th>
                        		</tr>
                        		<?php
                    		}
                		}
                	?>
            	</table>
				<h2>Selectionner liaison</h2>
				<form id="formLaison" action="" method="post" name="postLiaison">
					<select id="liaison" name="liaison">
						<?php
							$sqlLiaisonSelect=$db->query("SELECT * FROM  liaison WHERE id_Secteur = $idSecteur");
							$rows2 = $sqlLiaisonSelect->rowCount();
							if($rows2 != 0){
								for($i  =1; $i <= $rows2; $i++){
									$dataLiaisonSelect=$sqlLiaisonSelect->fetch();
									echo '<option value="' . $dataLiaisonSelect['code'] . '">' . $dataLiaisonSelect['id_Port_Depart'] . $dataLiaisonSelect['id_Port_Arrivee'] . '</option>';
								}
							}
						?>
					</select>
					<input id="submitLiaison" name="submitLiaison" type="submit" value="Valider la liaison"/>
				</form>
			</div>
			<div class="divCommun">
				<h2> Tarifs pour la liaison selectionnée</h2>
			</div>
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
											<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
											<button class="btn bb-btn"><span class="lnr lnr-location"></span></button>		
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