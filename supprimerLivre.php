<?php

$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST['formsupprimerL']))
{	
	//Vérifie si l'ID du livre éxiste 
	if (!empty($_POST['idL']))
	{
		//Supprime le livre grâce à l'ID et à "DELETE".
		$req2 = $pdo->prepare('DELETE FROM livre WHERE idLivre = ?');
		$req2->execute(array($_POST['idL']));
		
		$bon = "Le compte à bien était supprimé !";
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
						<h1>Librairie de Veretz</h1>
					</div>
				</main>
				
			 
			</div>
	</header>

<div align="center">
<h2>Page de suppression d'un livre</h2>
<br><br>


<!-- il s'agit du formulaire pour supprimer le livre. -->
<center>
<form action="supprimerLivre.php" method="post">

	<table>
		<tr>
			<td align="right">
				<label for="idL">ID Compte :</label>
			</td>
			<td>
				<input type="text" placeholder="Mettez l'ID du livre à Supprimer" id="idL" name="idL" />
			</td>
		</tr>
		
			
		
	</table>
	<br>
	<input type="submit" name="formsupprimerL" value="Je supprime"/>
	
	
	<a href="admin.php"><input type="button" value="Retour à la page d'admin"/></a>
</form>
</center>

<?php
if(isset($erreur))
{
	echo '<font color="red">'.$erreur."</font>";
}

?>

<?php
		if(isset($bon))
		{
		echo '<font color="green">'.$bon."</font>";
		}
	?>


</body>
</html>