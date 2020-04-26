<?php
	
	
if(isset($_POST['forminscription']))
{
	$pseudo = $_POST['pseudo'];
	$pass = $_POST['pass'];
	
	//Pemet de se connecter à la base de donnée.
	$dsn = "mysql:host=localhost;charset=utf8;dbname=veretz";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
		
	// Vérifie si tous les champs ont été remplit.
	if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) )
	{
			//Vérifie si le pseudo éxiste déjà ou pas.
			$req = $pdo->prepare('SELECT * FROM compte WHERE pseudoCompte = ?');
			$req->execute(array($_POST['pseudo']));
			$donnees = $req->fetch();
			if (empty($donnees['pseudoCompte'])) 
			{
				//Ajoute les identifiants grâce aux "INSERT INTO" et "VALUES".
				$stm = $pdo->prepare("INSERT INTO compte(pseudoCompte, mpCompte) VALUES(:pseudo, :pass)");
				$pass = password_hash($pass, PASSWORD_DEFAULT);
				$stm->execute(array(
				':pseudo' => $pseudo, 
				':pass' => $pass
				));
				$erreur ='Bonjour " ' . $pseudo .  ' " et ton mdp crypté est " ' . $pass .' " et ATTENTION gardez une copie de votre mot de passe crypté car vous devrez vous en servir pour vous connecter!';
			
			}
			
			else
			{
				
				$erreur = "Ce pseudo existe déjà !";
				
			}
		
		
	}
	else
	{
		
	
	$erreur = "Tous les champs doivent être remplit !";
        
		
	}
	
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
	<link rel="stylesheet" href="petite_resolution.css" />
	<link rel="stylesheet" href="css/css.css" />
    <title>Bibliothéque de Veretz</title>
	</head>
	
<body>
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
						<h1>Bibliothéque de Veretz</h1>
					</div>
				</main>

			</div>
		</header>

<body>

<br>

<div align="center">
<h2>Page d'inscription</h2>
<br><br>

<!-- Il s'agit du formulaire d'inscription -->
<form action="inscription.php" method="post">

	<table>
		<tr>
			<td align="right">
				<label for="pseudo">Nom Compte :</label>
			</td>
			<td>
				<input type="text" placeholder="Mettez votre nom et prénom" id="pseudo" name="pseudo" />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<label for="pass">Mot de passe :</label>
			</td>
			<td>
				<input type="password" placeholder="Mot de passe" id="pass" name="pass"/>
			</td>
	
		</tr>
		
	</table>
	
	<br>
	
	<input type="submit" name="forminscription" value="Je m'inscris"/>
	
	
	<a href="admin.php"><input type="button" value="Retour à la page de l'admin"/></a>
	
	
</form>

<!-- Permet de disegner les messages  -->

<?php

if(isset($erreur))
{
	echo '<font color="red">'.$erreur."</font>";
}


?>

</div>	


</body>
</html>