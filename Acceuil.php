<?php

session_start();

// Permet de se connecter à la base de données.
$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//permet de savoir si on appuye sur le bouton qui s'appelle "formconnection".
if(isset($_POST['formconnexion']))
{	
	//Cherche les informations de la table compte.
	$reponse = $pdo->query('SELECT * FROM compte');
	$donnees = $reponse->fetch();
	//Je défini mes variables.
	$pseudo = $_POST['pseudo'];
	$pass = $_POST['pass'];
	
	
	//Permet de vérifier si tous les champs sont remplis.
	if(!empty($_POST['pseudo']) AND !empty($_POST['pass']))
	{
		//Si c'est le cas, il recherche si le pseudo existe et si il existe il passe au "if" suivant.
		$req = $pdo->prepare('SELECT * FROM compte WHERE pseudoCompte = ?');
		$req->execute(array($_POST['pseudo']));
		$donnees = $req->fetch();
		
		//ici on gère le compte de l'admin car il a un nom de compte spécifique.
		if(!empty($donnees['pseudoCompte'] == 'admin'))
		{
			//Il cherche si le mot de passe
			$req = $pdo->prepare('SELECT * FROM compte WHERE mpCompte = ?');
			$req->execute(array($_POST['pass']));
			$donnees = $req->fetch();
			
			
			//et si le mot de passe et le même que celui donné et bien il peut accéder à ca page.
			if (!empty($donnees['mpCompte']== '$2y$10$V3lb3C8NFxeSoyjOWVzVK.IEjMm2lNmPBnOboAk.VQzlim00DwtbG'))
			{
				
				header('Location: admin.php');
				exit;
			}
			
			
			else
			{
				$erreur = "le mot de passe n'est pas bon !";
			}
		}
		
		//Il s'agit de faire maintenant la même chose sans les conditions de l'admin.
		elseif(!empty($donnees['pseudoCompte']))
		{
			$req = $pdo->prepare('SELECT * FROM compte WHERE mpCompte = ?');
			$req->execute(array($_POST['pass']));
			$donnees = $req->fetch();
			
			if(!empty($donnees['mpCompte']))
			{
				//ici nous avons la session qui va démarrer et le nom de la session correspond au pseudo de la personne connecté
				session_start();
				$_SESSION['pseudoCompte'] = $donnees['pseudoCompte'];
				
				header('Location: pageacceuil.php');
				exit;
				
			}
			else
			{
				$erreur = "le mot de passe n'est pas bon !";
			}
			
			
		}
		
		else 
		{
			$erreur = "Ce compte n'existe pas !";
		}
	}

	else
	{
		$erreur = "Tous les champs doivent être renplit !";
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!-- Ici on va pouvoir accéder à nos fichier css -->
	<link rel="stylesheet" href="petite_resolution.css" />
	<link rel="stylesheet" href="css/css.css" />
    <title>Bibliothéque de Veretz</title>
</head>
admin : $2y$10$V3lb3C8NFxeSoyjOWVzVK.IEjMm2lNmPBnOboAk.VQzlim00DwtbG <br>
mathieu : 123 <br>
Pierre-Nicolas : $2y$10$7H4867hO6ugbdEEbJyDSqekaws.8FGvbm6ObgX6kVJxQnmWVfxce2<br>

<body>

<form action="Acceuil.php" method="post">

<center>
<div class="brand_logo_container">
	<a href="https://www.veretz.com/"><img src="image/logo.png" class="brand_logo" alt="Logo"></a>
</div>

<!-- 
	Il s'agit de notre design pour la page de connection.
-->
	
	<form method="POST" action="">	
		
		
		
			<div class="user_card">
			

				<div class="d-flex justify-content-center form_container">
					<form>
					
					
						<div class="input-group mb-3">
								<label for="site-search">Page de connexion:</label>	
						</div>


	
						<center>
							<table>
								<tr>
									<td>
										<input type="text" placeholder="Mettez votre nom et prénom" id="pseudo" name="pseudo" />
									</td>
								</tr>
		
								<tr>
									<td>
										<input type="password" placeholder="Mot de passe" id="pass" name="pass"/>
									</td>
								</tr>
										
							</table>
									
						</center>		
								
							
								<br><br>
								
								<input type="submit" name="formconnexion" value="connexion" href="pageacceuil.php"/>
									
							
							
					</form>
				</div>	
			
	
			</div>				
							
							
	</form>

</form>
</body>	
<?php
	// Ici il s'agit de l'endroit ou on design nos messages lorsque l'on fait quelque chose.
	if(isset($erreur))
	{
	echo '<font color="red">'.$erreur."</font>";
	}


?>
	
</center>

</html>
