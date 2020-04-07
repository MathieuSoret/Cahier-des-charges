<?php
session_start();
?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>

    <meta charset="utf-8" />
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="petite_resolution.css" />
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
							<h1>Librairie de Veretz</h1>
						</div>
					</main>
							  
					</div>
				</div>
				
		</header>


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

				<div style="margin-top: 150px;"><font size="10">
				Résumé du Livre :
				</font></div>

				</div>

				<center>

						<div class="container h-100">
						
							<div class="d-flex justify-content-center h-100">
							
								<div class="livre">
								
									<img src="HP_les_reliques_de_la_mort.jpg" height="300px"  width="200px" />
									
									<div class="d-flex justify-content-center form_container">
										<form>
											
											<div class="input-group mb-3">
													<div class="input-group-append">
														<span class="input-group-text"><i class="fas fa-user"></i></span>
													</div>							
											</div>
											
											<div class="d-flex justify-content-center mt-3 login_container">
												<button type="button" name="button" class="btn login_btn"> <a href="pageacceuil.php">Emprunter</button></a>
											</div>
											
										</form>
									</div>
								</div>
							</div>
						</div>

	</div>
	

	<footer>
        <p>Adresse: rue Moreau Vincent, 37270 Véretz</p>
		<p>Numéro: 02 47 35 70 13</p>
		
    </footer>

</center>


</body>
</html>