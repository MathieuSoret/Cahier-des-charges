<?php

$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['formsupprimer']))
{	
	
	if (!empty($_POST['id']))
	{
		$req = $pdo->prepare('DELETE FROM compte WHERE idCompte = ?');
		$req->execute(array($_POST['id']));
		
		$erreur = "Le compte à bien était supprimé !";
	}
	else
	{
		$erreur = "Cette ID n'éxiste pas !";
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
						<h1>Librairie de Veretz</h1>
					</div>
				</main>
				
			 
			</div>
	</header>

<div align="center">
<h2>Page de suppression d'un compte</h2>
<br><br>


<center>
<form action="supprimer.php" method="post">

	<table>
		<tr>
			<td align="right">
				<label for="id">ID Compte :</label>
			</td>
			<td>
				<input type="text" placeholder="Mettez l'ID à Supprimer" id="id" name="id" />
			</td>
		</tr>
		
			
		
	</table>
	<br>
	<input type="submit" name="formsupprimer" value="Je supprime"/>
	
	
	<a href="admin.php"><input type="button" value="Retour à la d'admin"/></a>
</form>
</center>

<?php
if(isset($erreur))
{
	echo '<font color="red">'.$erreur."</font>";
}

?>




</body>
</html>