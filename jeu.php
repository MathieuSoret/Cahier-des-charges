<?php
session_start();

if (isset($_SESSION['pseudoCompte']))
{
	if(isset($_POST['formdéco']))
	{
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();

		// Suppression des cookies de connexion automatique
		setcookie('login', '');
		setcookie('pass_hache', '');
	}
}


?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>

    <meta charset="utf-8" />
	<link rel="stylesheet" href="petite_resolution.css" />
	<link rel="stylesheet" href="css/css.css" />
</head>

	<body>
		<div id="bloc_page">
				<header>
						
						
							<nav>
								
									<div class="back">	

												<div class="logo">
													<a href="https://www.veretz.com/"><img src="image/logo.png" alt=""></a>
												</div>
												
												<div class="iden">
													<img src="image/iden.png" class="ident" alt="">
												</div
												
												<main>
													<div class="Biblio">		
														<h1>Librairie de Veretz  " <?php echo 'Bonjour ' .$_SESSION['pseudoCompte']; ?>"  </h1>
													</div>
												</main>
												
											  
											 </div>
				</header>

											<div class="iconjeu">
												<a href="jeu.php">
													<img src="image/base2.png" alt="" width="300" height="90"/>
												</a>
											</div>

											<div class="textjeu">
												<label for="site-search"><font size="12">Jeu</font></label> 
											</div>

											<div class="iconlivre">
												<a href="pageacceuil.php">
													<img src="image/base.png" alt="" width="300" height="70"/>
												</a>
											</div>

											<div class="textlivre">
												<label for="site-search"><font size="6">Livres</font></label> 
											</div>

							</nav>

									</div>
		</div>
		
		<center>
			<footer>
				<p>Adresse: rue Moreau Vincent, 37270 Véretz</p>
				<p>Numéro: 02 47 35 70 13</p>
				<div class="butonDéco">
				<a href="Acceuil.php"><input type="submit" name="formdéco" value="Se déconnecter !"/></a>
				</div>			
			</footer>

		</center>

	</body>
</html>
