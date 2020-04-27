<?php

$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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

<html>
<head>

    <meta charset="utf-8" />
	<link rel="stylesheet" href="petite_resolution.css" />
	<link rel="stylesheet" href="css/css.css" />
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




				
			<form method="GET" action="recherche.php">
			
				<div class="recherche" >

					<label for="site-search">Nom du livre à rechercher:</label>
					<input type="search" name="q" placeholder="Nom livre ..."/>
					<input type="submit" value="Valider" name="recherche"/>
										
				</div>
				
			</form>


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
			Information trouvé grâce au mot  : " <?php if ($donnees = $_GET['q']){echo $donnees;} else	{$erreur = "Ce livre n'éxiste pas dans la bibliothèque !";}?> "
			</font></div>

		</div>

		<center>
		
		
		
		
<?php 
if (isset($_GET['recherche']))
{
?>
		
	 <?php if(!empty($_GET['q'])) 
		{
		//cherche les livres qui éxistes dans la base de donnée
		$stmt = $pdo->prepare('SELECT * FROM livre WHERE nomLivre LIKE ? ORDER BY idLivre ASC');
		$stmt->execute(['%' . $_GET['q'] . '%']);
		if ($livre = $stmt->fetch())
		{	
	
			do 
			{ //Cela me permet d'afficher plusieurs livre selon le livre recherché
				
				?>
					
				<div class="container h-100">
					
							<div class="d-flex justify-content-center h-100">
							
								<div class="cadre1">
									
									<div class="d-flex justify-content-center form_container">
									
										<form>
										
											<div class="input-group mb-3">
											
												<label for="site-search">Nom du Livre: <?php echo htmlspecialchars($livre['nomLivre']); //Affiche le livre recherché?>
												
													<div class="d-flex justify-content-center mt-3 login_container"> 
													<br>
														<form action="resulivre.php" method="GET">
														
															<a href="resulivre.php"><button type="button" name="button" class="btn login_btn"> Voir plus de détail sur le livre en question</button></a>
															
															<?php //Pour afficher la description du livre recherché
															
															
															
															?>
															<br><br>
															
															<?php  //Gérer les emprunts
																
																if (isset($_POST['buttonE']))
																{
																	$emp = $pdo -> prepare ('SELECT * FROM livre WHERE nbLivre ?');
																	$emp->execute(array($_POST['buttonE']));
																	$empL = $emp->fetch();
																	
																	
																	if($empL > 0)
																	{
																		$empL--;
																		$erreur = "Ce livre à bien était emprunté !";
																	}
																	else
																	{
																		$erreur = "Nous n'avons plus se livre en stock !";
																	}
																}
																
															?>
																
															<form action="resulivre.php">
																<button type="button" name="buttonE"  class="btn login_btn">Emprunter</button>													
															</form>	
															
														</form>
														
														
													</div>
													
												</label>
												
											</div>		
											
										</form>
										
									</div>	
									
								</div>
								
							</div>
						
						</div>																						
																										
				<?php
			} 
				while ($livre = $stmt->fetch());
				
			
		} 
	else 
	{ //M'affiche un message d'erreur lorsque le livre n'est pas dans la base de donnée.
		
	?>
	
	<div class="container h-100">
					
							<div class="d-flex justify-content-center h-100">
							
								<div class="cadre1">
									
									<div class="d-flex justify-content-center form_container">
									
										<form>
										
											<div class="input-group mb-3">
											
												<label for="site-search">Nom du Livre: 
												
													<div class="d-flex justify-content-center mt-3 login_container"> 
													
														<?php $erreur = "Ce livre n'éxiste pas !"; ?>
														
													</div>
													
												</label>
												
											</div>		
											
										</form>
										
									</div>	
									
								</div>
								
							</div>
						
						</div>
	
	<?php
		
	}
}
?> 
																					
	<?php
	if(isset($erreur))
	{
	echo '<font color="red">'.$erreur."</font>";
	}
	?>
																	
									
			
<?php
			
}
?>
		
			
			
			
			
			
<br><br><br>
			
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
