<?php

if(isset($_POST['formajouter']))
{
	$nom = $_POST['nom'];
	$auteur = $_POST['auteur'];
	$edition = $_POST['edition'];
	$genre = $_POST['genre'];
	$etat = $_POST['etat'];
	$Date = $_POST['Date'];
	$description = $_POST['description'];
	
	
	$dsn = "mysql:host=localhost;charset=utf8;dbname=veretz";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
		
		
	if(!empty($_POST['nom']) AND !empty($_POST['auteur']) AND !empty($_POST['edition']) AND !empty($_POST['genre']) AND !empty($_POST['etat']) AND !empty($_POST['Date']) AND !empty($_POST['description']) )
	{

		$req = $pdo->prepare('SELECT * FROM livre WHERE nomLivre = ?');
		$req->execute(array($_POST['nom']));
		$donnees = $req->fetch();
		if (empty($donnees['nomLivre'])) 
		{
			
			$stm = $pdo->prepare("INSERT INTO livre(nomLivre, auteurLivre, editionLivre,genreLivre,etatLivre, datepremiereditionLivre, descriptionLivre ) VALUES(:nom, :auteur, :edition, :genre, :etat, :Date, :description)");
			$stm->execute(array(
			':nom' => $nom, 
			':auteur' => $auteur,
			':edition' => $edition,
			':genre' => $genre,
			':etat' => $etat,
			':Date' => $Date,
			':description' => $description
			));
			$erreur ='Bonjour, le livre " ' . $nom .  ' " à bien était enregistrer !';
			
		}
			
		else
		{
				
			$erreur = "Ce livre est déjà dans la bibliothèque !";
				
		}

	}
	else
	{
		$erreur = "Tous les champs doivent être remplit !";
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
<h2>Ajouter un livre</h2>
<br><br>


<form action="ajouterLivre.php" method="post">
<table>
		<tr>
			<td align="right">
				<label for="nom">Nom Livre :</label> 
			</td>
			<td>
				<input type="text" placeholder="Nom du livre" id="nom" name="nom" />
			</td>
		</tr>
		
		<tr>
			<td align="right">
				<label for="auteur">Auteur Livre :</label>
			</td>
			<td>
				<input type="text" placeholder="Nom de l'auteur" id="auteur" name="auteur"/>
			</td>
	
		</tr>
		
		<tr>
			<td align="right">
				<label for="edition">Édition Livre :</label>
			</td>
			<td>
				<input type="text" placeholder="Edition du livre" id="edition" name="edition"/>
			</td>
	
		</tr>
		
		<tr>
			<td align="right">
				<label for="genre">Genre Livre :</label>
			</td>
			<td>
				<input type="text" placeholder="Genre du livre" id="genre" name="genre"/>
			</td>
	
		</tr>
		
		<tr>
			<td align="right">
				<label for="etat">État Livre :</label>
			</td>
			<td>
				<input type="text" placeholder="État du livre" id="etat" name="etat"/>
			</td>
	
		</tr>
		
		<tr>
			<td align="right">
				<label for="Date">Date Première Édition Livre :</label>
			</td>
			<td>
				<input type="text" placeholder="Date première édition du livre" id="Date" name="Date"/>
			</td>
	
		</tr>
		
		<tr>
			<td align="right">
				<label for="description">Description Livre :</label>
			</td>
			<td>
				<input type="text" placeholder="Description du ivre" id="description" name="description"/>
			</td>
	
		</tr>
		
		
		
	</table>
	
	

<br>
<input type="submit" name="formajouter" value="J'ajoute se livre à la bibliothèque"/>
</form>
<br>
<a href="admin.php"><input type="submit" name="formretour" value="Retour à la page admin"/></a>

<?php
if(isset($erreur))
{
	echo '<font color="red">'.$erreur."</font>";
}

?>
</div>



</body>
</html>