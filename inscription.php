<?php
	
		
if(isset($_POST['forminscription']))
{
	$pseudo = $_POST['pseudo'];
	$pass = $_POST['pass'];
	
	
	$dsn = "mysql:host=localhost;charset=utf8;dbname=veretz";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
		
		
	if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) )
	{
		
			$req = $pdo->prepare('SELECT * FROM compte WHERE pseudoCompte = ?');
			$req->execute(array($_POST['pseudo']));
			$donnees = $req->fetch();
			if (empty($donnees['pseudoCompte'])) 
			{
				
				$stm = $pdo->prepare("INSERT INTO compte(pseudoCompte, mpCompte) VALUES(:pseudo, :pass)");
				$pass = password_hash($pass, PASSWORD_DEFAULT);
				$stm->execute(array(
				':pseudo' => $pseudo, 
				':pass' => $pass
				));
				echo 'Bonjour " ' . $pseudo .  ' " et ton mdp crypté est " ' . $pass .' " et ATTENTION gardez une copie de votre mot de passe crypté car vous devrez vous en servir pour vous connecter!';
			
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
        <meta charset="utf-8" >
        <title>Bibliothéque de Veretz</title>
    </head>
<body>

<div align="center">
<h2>Page d'inscription</h2>
<br><br>

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
	<input type="submit" name="forminscription" value="Retour à la page d'acceuil"/>
	
</form>
	
<?php

if(isset($erreur))
{
	echo '<font color="red">'.$erreur."</font>";
}


?>

</div>	


</body>
</html>
