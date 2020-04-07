<?php

$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


session_start();
if (isset($_SESSION['pseudoCompte']))
{
	
}

if(isset($_POST['formdéco']))
{
	// Suppression des variables de session et de la session
	$_SESSION = array();
	session_destroy();

	// Suppression des cookies de connexion automatique
	setcookie('login', '');
	setcookie('pass_hache', '');
}

?>

<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8" />
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="petite_resolution.css" />
    <title>Bibliothéque de Veretz </title>
	
</head>
	<body>
	<div id="bloc_page">
	
			<nav>

				<header>
					<div class="back">	

					<div class="logo">
						<a href="https://www.veretz.com/"><img src="image/logo.png" alt=""></a>
					</div>
				
				
					<div class="iden">
						<img src="image/iden.png" class="ident" alt="">
					</div>
				
				
					<main>
						<div class="Biblio">		
							<h1>Librairie de Veretz  " <?php echo 'Bonjour ' .$_SESSION['pseudoCompte']; ?>"  </h1>
						</div>
					</main>
				
			  
					</div>
				</header>




			

			<div class="recherche">

				<div class="cher">
					<font size="6"><input type="search" id="site-search" name="q" placeholder="Nom du livre recherché:" ></font>
				</div>
				
				
				<div class="bouton">
					<button><img src="image/loupe.png" alt="" width="17" height="17"/></button>
				</div>

			</div>


			<div class="iconjeu">
				<a href="jeu.php">
					<img src="image/base.png" alt="" width="300" height="70"/>
				</a>
			</div>


			<div class="textjeu">
				<label for="site-search"><font size="6">Jeu</font></label> 
			</div>


			<div class="iconlivre">
				<a href="pageacceuil.php">
					<img src="image/base2.png" alt="" width="300" height="90"/>
				</a>
			</div>


			<div class="textlivre">
				<label for="site-search"><font size="12">Livres</font></label> 
			</div>

			

		</nav>





		<div class="texteclassement">

			<div style="margin-top: 200px;"><font size="12">
			Les plus recherchés :
			</font></div>

		</div>

		<center>

			<div class="container h-100">
				<div class="d-flex justify-content-center h-100">
					<div class="cadre1">

						<div class="d-flex justify-content-center form_container">
							<form>
								<div class="input-group mb-3">
									<label for="site-search">Nom du Livre:</label>							
								</div>
								
							<div class="d-flex justify-content-center mt-3 login_container">
								<button type="button" name="button" class="btn login_btn"> <a href="resulivre.php">Voir plus de détail sur le livre en question</button></a>
						   </div>
							</form>
						</div>
				
				
						
						
					</div>
				</div>
			</div>
			
			
			<div class="container h-100">
				<div class="d-flex justify-content-center h-100">
					<div class="cadre2">

						<div class="d-flex justify-content-center form_container">
							<form>
								<div class="input-group mb-3">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									<label for="site-search">Nom du Livre:</label>
								</div>
								
							<div class="d-flex justify-content-center mt-3 login_container">
								<button type="button" name="button" class="btn login_btn"> <a href="resulivre.php">Voir plus de détail sur le livre en question</button></a>
						   </div>
							</form>
						</div>
				
				
						
						
					</div>
				</div>
			</div>
			
			
			<div class="container h-100">
				<div class="d-flex justify-content-center h-100">
					<div class="cadre3">

						<div class="d-flex justify-content-center form_container">
							<form>
								<div class="input-group mb-3">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									<label for="site-search">Nom du Livre:</label>							
								</div>
								
								
							<div class="d-flex justify-content-center mt-3 login_container">
								<button type="button" name="button" class="btn login_btn"> <a href="resulivre.php">Voir plus de détail sur le livre en question</button></a>
						   </div>
							</form>
						</div>
				
				
						
						
					</div>
				</div>
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
	
</html>







