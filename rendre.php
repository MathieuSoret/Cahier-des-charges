<?php

$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (isset($_POST['rendre']))
	{
	
	$livre = $_POST['nomL'];
	
		
	// Ici nous cherchons les informations avec le nom du livre.
	$rendreL = $pdo -> prepare('SELECT nbLivre FROM livre WHERE nomLivre = "' . $livre . '" ');
	$rendreL->execute();
	$res = $rendreL->fetch();
	
	if($res[0]>0)
	{
	// Ici on désincrémente la variable res
	$rendreL = $res[0]+1;
	// Ici nous modifions les valeurs en fonction des valeurs utilisée
	$emprunt=$pdo->prepare('UPDATE livre SET nbLivre ="'.$rendreL.'" WHERE nomLivre = "' . $livre . '"');
	$emprunt->execute();
		
	$bon = "Ce livre à bien était rendu !";
	}
	else
	{
		$erreur = "Nous n'avons plus se livre en stock !";
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
<form action="rendre.php" method="post">

	<table>
		<tr>
			<td align="right">
				<label for="idL">Nom du livre :</label>
			</td>
			<td>
				<input type="text" placeholder="Mettez le nom du livre à rendre" id="nomL" name="nomL" />
			</td>
		</tr>
		
			
		
	</table>
	<br>
	
		<form method="POST" >
			<input type="submit" name="rendre"  value="Je rend se livre"></input>													
		</form>
	
	
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