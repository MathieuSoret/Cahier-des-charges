<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" />
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

<center>
<input type="submit" name="forminscription" value="Ajoutez un livre"/>
<input type="submit" name="forminscription" value="modifier un livre"/>
<br><br><br>
<a href="inscription.php"><input type="submit" name="forminscription" value="Ajouter un membre"/></a>
<a href="supprimer.php"><input type="submit" name="formsupprimer" value="Supprimer un membre"/></a>
<a href="modifier.php"><input type="submit" name="formmodifier" value="Modifier un compte"/></a>
<br><br><br>
<a href="Acceuil.php"><input type="submit" name="formRetour" value="Retourner à la page d'acceuil"/></a>
</center>

</body>
</html>