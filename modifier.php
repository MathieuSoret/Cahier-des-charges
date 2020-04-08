<?php

if(isset($_POST['formmodifier'])) 
{
	$pseudo = $_POST['pseudo'];
	$pass = $_POST['pass'];
	$pseudo2 = $_POST['pseudo2'];
	$pass2 = $_POST['pass2'];
	
    
	$dsn = "mysql:host=localhost;charset=utf8;dbname=veretz";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND !empty($_POST['pseudo2']) AND !empty($_POST['pass2']))
	{
		
		$req = $pdo->prepare('SELECT * FROM compte WHERE pseudoCompte = ?');
		$req->execute(array($_POST['pseudo']));
		$donnees = $req->fetch();
			
		if (!empty($donnees['pseudoCompte']))
		{
			
			$req = $pdo->prepare('SELECT * FROM compte WHERE mpCompte = ?');
			$req->execute(array($_POST['pass']));
			$donnees = $req->fetch();
			
			if (!empty($donnees['mpCompte']))
			{
				$requeteupdate = $pdo->prepare('UPDATE compte SET pseudoCompte = "'. $pseudo2 .'" WHERE pseudoCompte = "'. $pseudo .'" ');
				$requeteupdate->execute(array($_POST['pseudo2'] ) );
			
			
				$requeteupdate = $pdo->prepare('UPDATE compte SET mpCompte = "'. $pass2 .'" WHERE mpCompte =  "'. $pass .'" ');
				$requeteupdate->execute(array($_POST['pass2'] ) );
				
				$erreur = "C'est bon, le compte à bien était modifier !";
			}
			else
			{
				$erreur = "Ce n'est pas le bon mot de passe de base !";
			}	
			
		}
		else
		{
			$erreur = "Ce pseudo n'existe pas !";
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
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="petite_resolution.css" />
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



<br>

<div align="center">
<h2>Page de modification d'un compte</h2>
<br><br>

<form action="modifier.php" method="post">

			<table>
				<tr>
					<td align="right">
						<label for="pseudo">Nom Compte de base:</label>
					</td>
					<td>
						<input type="text" placeholder="Mettez votre pseudo" id="pseudo" name="pseudo" />
					</td>
				</tr>
				
				<tr>
					<td align="right">
						<label for="pseudo2">Nouveau nom Compte :</label>
					</td>
					<td>
						<input type="text" placeholder="Mettez votre nouveau pseudo" id="pseudo2" name="pseudo2" />
					</td>
				</tr>
				
				<tr>
					<td align="right">
						<label for="pass">Mot de passe de base:</label>
					</td>
					<td>
						<input type="password" placeholder="Mot de passe" id="pass" name="pass"/>
					</td>
					
				</tr>
				
				<tr>
					<td align="right">
						<label for="pass2">Nouveau mot de passe :</label>
					</td>
					<td>
						<input type="password" placeholder="Mettez votre nouveau mp" id="pass2" name="pass2"/>
					</td>
			
				</tr>
				
			</table>
			<br>
			<input type="submit" name="formmodifier" value="Je modifie ce compte"/>
	
	
	<a href="admin.php"><input type="button" value="Retour à la page de l'admin"/></a>
	
	
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