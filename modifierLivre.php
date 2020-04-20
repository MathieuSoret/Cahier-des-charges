<?php

if(isset($_POST['formmodifierL']))
{
	$nom = $_POST['nom'];
	$nom2 = $_POST['nom2'];
	
	$auteur = $_POST['auteur'];
	$auteur2 = $_POST['auteur2'];
	
	$edition = $_POST['edition'];
	$edition2 = $_POST['edition2'];
	
	$genre = $_POST['genre'];
	$genre2 = $_POST['genre2'];
	
	$etat = $_POST['etat'];
	$etat2 = $_POST['etat2'];
	
	$Date = $_POST['Date'];
	$Date2 = $_POST['Date2'];
	
	$description = $_POST['description'];
	$description2 = $_POST['description2'];
	
	
    
	$dsn = "mysql:host=localhost;charset=utf8;dbname=veretz";
	$user = "root";
	$passwd = "";

	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(!empty($_POST['nom']) AND !empty($_POST['auteur']) AND !empty($_POST['edition']) AND !empty($_POST['genre']) AND !empty($_POST['etat']) AND !empty($_POST['Date']) AND !empty($_POST['description'])            AND !empty($_POST['nom2']) AND !empty($_POST['auteur2']) AND !empty($_POST['edition2']) AND !empty($_POST['genre2']) AND !empty($_POST['etat2']) AND !empty($_POST['Date2']) AND !empty($_POST['description2']) )
	{
		
		$req = $pdo->prepare('SELECT * FROM livre WHERE nomLivre = ?');
		$req->execute(array($_POST['nom']));
		$donnees = $req->fetch();
			
		if (!empty($donnees['nomLivre']))
		{
			
			$req = $pdo->prepare('SELECT * FROM livre WHERE auteurLivre = ?');
			$req->execute(array($_POST['auteur']));
			$donnees = $req->fetch();
			
			if (!empty($donnees['auteurLivre']))
			{
			
				$req = $pdo->prepare('SELECT * FROM livre WHERE editionLivreLivre = ?');
				$req->execute(array($_POST['edition']));
				$donnees = $req->fetch();
				
				if (!empty($donnees['editionLivre']))
				{
				
					$req = $pdo->prepare('SELECT * FROM livre WHERE genreLivre = ?');
					$req->execute(array($_POST['genre']));
					$donnees = $req->fetch();
					
					if (!empty($donnees['genreLivre']))
					{
				
						$req = $pdo->prepare('SELECT * FROM livre WHERE etatLivre = ?');
						$req->execute(array($_POST['etat']));
						$donnees = $req->fetch();
						
						if (!empty($donnees['etatLivre']))
						{
					
							$req = $pdo->prepare('SELECT * FROM livre WHERE datepremiereditionLivre = ?');
							$req->execute(array($_POST['Date']));
							$donnees = $req->fetch();
							
							if (!empty($donnees['datepremiereditionLivre']))
							{
						
								$req = $pdo->prepare('SELECT * FROM livre WHERE descriptionLivre = ?');
								$req->execute(array($_POST['description']));
								$donnees = $req->fetch();
			
				
									if (!empty($donnees['descriptionLivre']))
									{
										
										$requeteupdate = $pdo->prepare('UPDATE livre SET nomLivre = "'. $nom2 .'" WHERE nomLivre = "'. $nom .'" ');
										$requeteupdate->execute(array($_POST['nom2'] ) );
									
									
										$requeteupdate = $pdo->prepare('UPDATE livre SET auteurLivre = "'. $auteur2 .'" WHERE auteurLivre =  "'. $auteur .'" ');
										$requeteupdate->execute(array($_POST['auteur2'] ) );
										
										
										$requeteupdate = $pdo->prepare('UPDATE livre SET editionLivre = "'. $edition2 .'" WHERE editionLivre =  "'. $edition .'" ');
										$requeteupdate->execute(array($_POST['edition2'] ) );
										
										
										$requeteupdate = $pdo->prepare('UPDATE livre SET genreLivre = "'. $genre2 .'" WHERE genreLivre =  "'. $genre .'" ');
										$requeteupdate->execute(array($_POST['genre2'] ) );
										
										
										$requeteupdate = $pdo->prepare('UPDATE livre SET etatLivre = "'. $etat2 .'" WHERE etatLivre =  "'. $etat .'" ');
										$requeteupdate->execute(array($_POST['etat2'] ) );
										
										
										$requeteupdate = $pdo->prepare('UPDATE livre SET datepremiereditionLivre = "'. $Date2 .'" WHERE datepremiereditionLivre =  "'. $Date .'" ');
										$requeteupdate->execute(array($_POST['Date2'] ) );
										
										
										$requeteupdate = $pdo->prepare('UPDATE livre SET descriptionLivre = "'. $description2 .'" WHERE descriptionLivre =  "'. $description .'" ');
										$requeteupdate->execute(array($_POST['description2'] ) );
										
										
										$erreur = "C'est bon, le compte à bien était modifier !";
									}
									else
									{
										$erreur = "Ce n'est pas la bonne description !";
									}
									
							}
							else
							{
								$erreur = "Cette description n'existe pas !";
							}
							
						}
						else
						{
							$erreur = "Cette date de première édition n'existe pas !";
						}
							
					}
					else
					{
						$erreur = "Ce genre n'existe pas !";
					}
					
					
				}
				else
				{
					$erreur = "Cette édition n'existe pas !";
				}
				
			
			}
			else
			{
				$erreur = "Cette auteur n'existe pas !";
			}
			
		}
		else
		{
			$erreur = "Ce nom de livre n'existe pas !";
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
<h2>Modifier un livre</h2>
<br><br>


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
				<label for="nom2">Nouveau Nom du Livre:</label> 
			</td>
			<td>
				<input type="text" placeholder="Nom du livre" id="nom2" name="nom2" />
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
				<label for="auteur2">Nouveau Auteur de Livre:</label>
			</td>
			<td>
				<input type="text" placeholder="Nom de l'auteur" id="auteur2" name="auteur2"/>
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
				<label for="edition2">Nouveau Édition du Livre:</label>
			</td>
			<td>
				<input type="text" placeholder="Edition du livre" id="edition2" name="edition2"/>
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
				<label for="genre2">Nouveau Genre du Livre:</label>
			</td>
			<td>
				<input type="text" placeholder="Genre du livre" id="genre2" name="genre2"/>
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
				<label for="etat2">Nouveau État du Livre:</label>
			</td>
			<td>
				<input type="text" placeholder="État du livre" id="etat2" name="etat2"/>
			</td>
	
		</tr>
		
		
		
		<tr>
			<td align="right">
				<label for="Date">Date Première Édition Livre:</label>
			</td>
			<td>
				<input type="text" placeholder="Date première édition du livre" id="Date" name="Date"/>
			</td>
	
		</tr>
		<tr>
			<td align="right">
				<label for="Date2">Nouveau Date Première Édition Livre:</label>
			</td>
			<td>
				<input type="text" placeholder="Date première édition du livre" id="Date2" name="Date2"/>
			</td>
	
		</tr>
		
		
		
		<tr>
			<td align="right">
				<label for="description">Description Livre:</label>
			</td>
			<td>
				<input type="text" placeholder="Description du ivre" id="description" name="description"/>
			</td>
	
		</tr>
		<tr>
			<td align="right">
				<label for="description2">Nouveau Description du Livre:</label>
			</td>
			<td>
				<input type="text" placeholder="Description du ivre" id="description2" name="description2"/>
			</td>
	
		</tr>
		
		
		
	</table>

<br>
<input type="submit" name="formmodifierL" value="Modifier le livre"/>
<a href="admin.php"><input type="submit" name="formretour" value="Retour à la page admin"/></a>

<?php
if(isset($erreur))
{
	echo '<font color="red">'.$erreur."</font>";
}

?>




</body>
</html>