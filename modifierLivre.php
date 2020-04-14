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
				<label for="nom">Nom du Livre à Modifier:</label> 
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
				<label for="auteur">Auteur de Livre à Modifier:</label>
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
				<label for="edition">Édition du Livre à modifier:</label>
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
				<label for="genre">Genre du Livre à modifier:</label>
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
				<label for="etat">État du Livre à modifier:</label>
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
		<tr>
			<td align="right">
				<label for="description">Description du Livre à modifier:</label>
			</td>
			<td>
				<input type="text" placeholder="Description du ivre" id="description" name="description"/>
			</td>
	
		</tr>
		
		
		
	</table>

<br>
<input type="submit" name="formmodifier" value="Je modifie ce livre"/>
<a href="admin.php"><input type="submit" name="formretour" value="Retour à la page admin"/></a>

<?php
if(isset($erreur))
{
	echo '<font color="red">'.$erreur."</font>";
}

?>




</body>
</html>