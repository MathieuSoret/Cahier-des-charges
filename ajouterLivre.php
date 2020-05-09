<?php

// Permet de vérifier si on appuie sur le bouton de nom "formajouter".
if(isset($_POST['formajouter']))
{
	// Ici nous avons toutes nos variables.
	$nom = $_POST['nom'];
	$auteur = $_POST['auteur'];
	$edition = $_POST['edition'];
	$genre = $_POST['genre'];
	$etat = $_POST['etat'];
	$Date = $_POST['Date'];
	$description = $_POST['description'];
	$nombre = $_POST['nombre'];
	
	//Permet d'accéder à notre base de donnée.
	$dsn = "mysql:host=localhost;charset=utf8;dbname=veretz";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	
	//permet de vérifier si tous les champs sont remplis.
	if(!empty($_POST['nom']) AND !empty($_POST['auteur']) AND !empty($_POST['edition']) AND !empty($_POST['genre']) AND !empty($_POST['etat']) AND !empty($_POST['Date']) AND !empty($_POST['description'])AND !empty($_POST['nombre']))
	{
		//ici on vérifie juste si le livre éxiste ou non dans la base de donnée.
		$req = $pdo->prepare('SELECT * FROM livre WHERE nomLivre = ?');
		$req->execute(array($_POST['nom']));
		$donnees = $req->fetch();
		if (empty($donnees['nomLivre'])) 
		{
			//Ici on gére l'ajout du livre grâce à la formule "INSERT" et "VALUES".
			$stm = $pdo->prepare("INSERT INTO livre(nomLivre, auteurLivre, editionLivre,genreLivre,etatLivre, datepremiereditionLivre, descriptionLivre, nbLivre) VALUES(:nom, :auteur, :edition, :genre, :etat, :Date, :description, :nombre)");
			$stm->execute(array(
			':nom' => $nom, 
			':auteur' => $auteur,
			':edition' => $edition,
			':genre' => $genre,
			':etat' => $etat,
			':Date' => $Date,
			':description' => $description,
			':nombre' => $nombre	
			));
			
		
			
			
			$bon ='Bonjour, le livre " ' . $nom .  ' " à bien était enregistrer !';
			
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

<!-- Dans ce form nous avons toute les zones de textes qui vont nous premettre d'ajouter un livre-->
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
				<input type="text" placeholder="Description du livre" id="description" name="description"/>
			</td>
	
		</tr>
		
		<tr>
			<td align="right">
				<label for="description">Nombre de Livre :</label>
			</td>
			<td>
				<input type="text" placeholder="Nombre de livre disponible" id="nombre" name="nombre"/>
			</td>
	
		</tr>
		
		
	</table>
	
	

<br>
<!-- Ici il s'agit des différents boutons qui vont permettre d'enregistrer et de retourner à la page de base de l'admin. -->
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
<?php
		if(isset($bon))
		{
		echo '<font color="green">'.$bon."</font>";
		}
	?>
</div>



</body>
</html>