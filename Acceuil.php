<?php

session_start();

$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['formconnexion']))
{	
	$reponse = $pdo->query('SELECT * FROM compte');
	$donnees = $reponse->fetch();
	
	$pseudo = $_POST['pseudo'];
	$pass = $_POST['pass'];
	
	
		
	if(!empty($_POST['pseudo']) AND !empty($_POST['pass']))
	{
		$req = $pdo->prepare('SELECT * FROM compte WHERE pseudoCompte = ?');
		$req->execute(array($_POST['pseudo']));
		$donnees = $req->fetch();
		
		if(!empty($donnees['pseudoCompte'] == 'admin'))
		{
			
			$req = $pdo->prepare('SELECT * FROM compte WHERE mpCompte = ?');
			$req->execute(array($_POST['pass']));
			$donnees = $req->fetch();
			
			
			
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
		
		elseif(!empty($donnees['pseudoCompte']))
		{
			$req = $pdo->prepare('SELECT * FROM compte WHERE mpCompte = ?');
			$req->execute(array($_POST['pass']));
			$donnees = $req->fetch();
			
			if(!empty($donnees['mpCompte']))
			{
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
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="petite_resolution.css" />
    <title>Bibliothéque de Veretz</title>
</head>
admin : $2y$10$V3lb3C8NFxeSoyjOWVzVK.IEjMm2lNmPBnOboAk.VQzlim00DwtbG <br>
mathieu : $2y$10$Kih8Eow1YoR3dBZqPpUnh.pPQJQI1aJu.D.CsbsrrNU9XZCbxvRpe <br>
autre : $2y$10$MCobACWS1YtvWFu2BlgmHezgNFXz9gdbXI09yqJkAkeqWKIvecrAS
<body>

<form action="Acceuil.php" method="post">

<center>
<div class="brand_logo_container">
	<a href="https://www.veretz.com/"><img src="image/logo.png" class="brand_logo" alt="Logo"></a>
</div>


	
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
								
							
								<div class="form-group">
										<div class="custom-control custom-checkbox">
											<label class="custom-control-label" for="customControlInline">Se souvenir de moi :</label>
											<input type="checkbox" class="custom-control-input" id="customControlInline">
										</div>	
								</div>
								
								<input type="submit" name="formconnexion" value="connexion" href="pageacceuil.php"/>
									
							
							
					</form>
				</div>	
			
	
			</div>				
							
							
	</form>

</form>
</body>	
<?php

	if(isset($erreur))
	{
	echo '<font color="red">'.$erreur."</font>";
	}


?>
	
</center>

</html>
