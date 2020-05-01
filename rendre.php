<?php

$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=veretz', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (isset($_GET['formrendre']))
{
	if(!empty($_GET['nomL'])) {
		$stmt = $pdo->prepare('SELECT * FROM livre WHERE nomLivre LIKE ? ORDER BY idLivre DESC');
		$stmt->execute(['%' . addcslashes($_GET['nomL'], '%_') . '%']);
		if ($livre = $stmt->fetch()) {
			
			$emp = $pdo -> prepare('SELECT nbLivre FROM livre WHERE nomLivre = "' . $livre['nomLivre'] . '" ');
			$emp->execute(array($_POST['buttonE']));
			$res = $emp->fetch();
																			
			echo $res[0];
			
			do {
				
				$res[0]++;
				$emprunt=$pdo->prepare('UPDATE livre SET nbLivre ="'.$res[0].'" AND nomLivre = "' . $livre['nomLivre'] . '"');
				$emprunt->execute(array($res[0]));
				
				echo 'Le livre ';
				echo htmlspecialchars($livre['nomLivre']);
				echo ' a bien été rendu';
				
			} while ($livre = $stmt->fetch());
		} else {
			echo "Le livre n'existe pas ";
		}
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
	<input type="submit" name="formrendre" value="Je rend ce livre"/>
	
	
	<a href="admin.php"><input type="button" value="Retour à la page d'admin"/></a>
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