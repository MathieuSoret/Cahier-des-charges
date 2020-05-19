<?php

session_start();

if (isset($_SESSION['pseudoCompte']))
{
	if(isset($_POST['formdéco']))
	{
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();

		// Suppression des cookies de connexion automatique
		setcookie('login', '');
		setcookie('pass_hache', '');
	}
}


?>

<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>

<head>

    <meta charset="utf-8" />
	<link rel="stylesheet" href="petite_resolution.css" />
	<link rel="stylesheet" href="css/css.css" />
	<script type="text/javascript" ></script>
</head>

	<body>
		<div id="bloc_page">
				<header>
						
						
							<nav>
								
									<div class="back">	

												<div class="logo">
													<a href="https://www.veretz.com/"><img src="image/logo.png" alt=""></a>
												</div>
												
												<div class="iden">
													<img src="image/iden.png" class="ident" alt="">
												</div
												
												<main>
													<div class="Biblio">		
														<h1>Librairie de Veretz  " <?php echo 'Bonjour ' .$_SESSION['pseudoCompte']; ?>"  </h1>
													</div>
												</main>
												
											  
											 </div>
				</header>

											<div class="iconjeu">
												<a href="jeu.php">
													<img src="image/base2.png" alt="" width="300" height="90"/>
												</a>
											</div>

											<div class="textjeu">
												<label for="site-search"><font size="12">Jeu</font></label> 
											</div>

											<div class="iconlivre">
												<a href="pageacceuil.php">
													<img src="image/base.png" alt="" width="300" height="70"/>
												</a>
											</div>

											<div class="textlivre">
												<label for="site-search"><font size="6">Livres</font></label> 
											</div>

							</nav>

									</div>
		</div>
		
<center>		
		
		<div class="conteneur">
    <img src="images/dedans.jpg" width="700" height="500" id="image">
            <p id="texte">
            Votre objectif est d'aller visiter le château de Véretz puis aller chercher un livre à la bibliothèque, pour au final vous rendre chez votre ami Titouan, que voulez vous faire ?
            </p>
			<div class="btnjeu">
				<button id="bouton1">Retourner se coucher</button>
				<button id="bouton2">Sortir</button>
				<button id="bouton3"></button>
				<button id="bouton4"></button>
			</div>
        
<script >
var _fond = document.getElementById("image");
var _bouton1 = document.getElementById("bouton1");
var _bouton2 = document.getElementById("bouton2");
var _bouton3 = document.getElementById("bouton3");
var _bouton4 = document.getElementById("bouton4");
var _texte = document.getElementById("texte");
    function setter(texte,bouton1,bouton2,bouton3,bouton4){
        _texte.innerHTML = texte;
        _bouton1.innerHTML = bouton1;
        _bouton2.innerHTML = bouton2;
        _bouton3.innerHTML = bouton3;
        _bouton4.innerHTML = bouton4;
    }


_bouton1.onclick = function() {
    switch(_bouton1.innerHTML){
    case "Retourner se coucher":
        _fond.setAttribute('src', 'images/lit.jpg');
            setter("Vous êtes dans votre lit que voulez vous faire ?","Se lever","","","");
    break;
        case "Aller vers le pont":
            _fond.setAttribute('src', 'images/pont.jpg');
            setter("Que voulez vous faire ?","Sauter","Aller voir le Cher","S'envoler dans le ciel pour repérer les environs","Retourner sur ses pas");
    break;
    case "Sauter":
            _fond.setAttribute('src', 'images/pompiers.jpg');
        setter("c'était une mauvaise idée, vous êtes mort.","Ressusciter","","","");
    break;
    case "Se lever":
            _fond.setAttribute('src', 'images/dedans.jpg');
        setter("Votre objectif est d'aller visiter le château de Véretz puis aller chercher un livre à la bibliothèque, pour au final vous rendre chez votre ami Titouan, que voulez vous faire ?","Retourner se coucher","Sortir","","");
    break;
    case "Ressusciter":
            _fond.setAttribute('src', 'images/eglise2.jpg');
        setter("Vous êtes revenu à la vie, que voulez vous faire ?","Sortir de l'église","","","");
    break;
    case "Sortir de l'église":
            _fond.setAttribute('src', 'images/eglise1.jpg');
        setter("Que voulez vous faire ?","Rentrer dans l'église","Aller vers le centre ville","","");
    break;
    case "Aller à la boulangerie":
            _fond.setAttribute('src', 'images/boulangerie.jpg');
        setter("Que voulez vous faire ?","Entrer dans la boulangerie","Retourner au centre-ville","","");
    break;
    case "Entrer dans la boulangerie":
            _fond.setAttribute('src', 'images/boulangerie2.jpg');
        setter("Que voulez vous faire ?","Acheter une baguette","Discussion","Voler une baguette","Sortir de la boulangerie");
    break;
    case "Rentrer dans l'église":
            _fond.setAttribute('src', 'images/eglise2.jpg');
        setter("Que voulez vous faire ?","Sortir de l'église","","","");
    break;
    case "Recommencer":
            _fond.setAttribute('src', 'images/dedans.jpg');
        setter("Votre objectif est d'aller visiter le château de Véretz puis aller chercher un livre à la bibliothèque, pour au final vous rendre chez votre ami Titouan, que voulez vous faire ?","Retourner se coucher","Sortir","","");
    break;
    case "Retourner au centre-ville":
            _fond.setAttribute('src', 'images/route.jpg');
        setter("Que voulez vous faire ?","Aller à la boulangerie","Aller à la bibliothèque","Aller à l'église","Aller au château");
    break;
    case "Entrer dans la bibliothèque":
            _fond.setAttribute('src', 'images/bibliotheque2.jpg');
        setter("Que voulez vous faire ?","Prendre un livre","Sortir de la bibliothèque","","");
    break;
    case "Prendre un livre":
        alert("c'était un super livre");
    break;
    case"Aller chez Titouan":
            _fond.setAttribute('src', 'images/maisontitouan.jpg');
        alert(Vous avez gagné, félicitations);
        setter("","Recommencer","","", "");
    break;
    }        
}
_bouton2.onclick = function() {
    switch(_bouton2.innerHTML){
    case "Sortir":
            _fond.setAttribute('src', 'images/dehors.jpg');
        setter("Que voulez vous faire ?","Aller vers le pont","Aller vers le centre ville","","");
    break;
    case "Aller vers le centre ville":
            _fond.setAttribute('src', 'images/route.jpg');
        setter("Que voulez vous faire ?","Aller à la boulangerie","Aller à la bibliothèque","Aller à l'église","Aller au château");
    break;
    case "Aller voir le Cher":
            _fond.setAttribute('src', 'images/cher.jpg');
        setter("Que voulez vous faire ?","Sauter","Retourner sur ses pas","","");
    break;
    case "Retourner sur ses pas":
            _fond.setAttribute('src', 'images/pont.jpg');
        setter("Que voulez vous faire ?","Sauter","Aller voir le Cher","S'envoler dans le ciel pour repérer les environs","Retourner sur ses pas");
    break;
    case "Retourner au centre-ville":
            _fond.setAttribute('src', 'images/route.jpg');
        setter("Que voulez vous faire ?","Aller à la boulangerie","Aller à la bibliothèque","Aller à l'église","Aller au château");
    break;
    case "Visiter le château":
            _fond.setAttribute('src', 'images/chateau.jpg');
        alert("c'était une super visite");
        setter("Que voulez vous faire ?","Retourner au centre-ville","Visiter le château","Aller à la bibliothèque","");
    break;
    case "Aller à la bibliothèque":
            _fond.setAttribute('src', 'images/bibliotheque.jpg');
        alert("c'était une super visite");
        setter("Que voulez vous faire ?","Entrer dans la bibliothèque","Retourner au centre-ville","","");
    break;
    case "Entrer dans la bibliothèque":
            _fond.setAttribute('src', 'images/bibliotheque2.jpg');
        setter("Que voulez vous faire ?","Sortir de la bibliothèque","Prendre un livre","","");
    break;
    case "Prendre un livre":
        alert("C'était un super livre")
        setter("Que voulez vous faire ?","Sortir de la bibliothèque","Prendre un livre","Emprunter le livre et sortir de la bibliothèque","");
    break;
    }
}
_bouton3.onclick = function() {
    switch(_bouton3.innerHTML){
    case "Aller à l'église":
            _fond.setAttribute('src', 'images/eglise1.jpg');
        setter("Que voulez vous faire ?","Rentrer dans l'église","Aller vers le centre ville","","");
    break;
    case "Voler une baguette":
            _fond.setAttribute('src', 'images/police.jpg');
        setter("C'était une mauvaise idée, vous vous êtes fait arrêter par la police","Recommencer","","","");
    break;
    case "S'envoler dans le ciel pour repérer les environs":
        alert("C'est impossible");
    break;
    case "Aller à la bibliothèque":
            _fond.setAttribute('src', 'images/bibliotheque.jpg');
        setter("Que voulez vous faire ?","Retourner au château","Entrer dans la bibliothèque","","");
    break;
    case "Emprunter le livre et sortir de la bibliothèque":
            _fond.setAttribute('src', 'images/bibliotheque.jpg');
        setter("Que voulez vous faire ?","Aller chez Titouan","Entrer dans la bibliothèque","","");
    break;
    }
}
_bouton4.onclick = function() {
    switch(_bouton4.innerHTML){
    case "Retourner sur ses pas":
            _fond.setAttribute('src', 'images/dehors.jpg');
        setter("Que voulez vous faire ?","Aller vers le pont","Aller vers le centre ville","","");
    break;
    case "Sortir de la boulangerie":
            _fond.setAttribute('src', 'images/boulangerie.jpg');
        setter("Que voulez vous faire ?","Entrer dans la boulangerie","Retourner au centre-ville","","");
    break;
case "Aller au château":
            _fond.setAttribute('src', 'images/chateau.jpg');
        setter("Que voulez vous faire ?","Retourner au centre-ville","Visiter le château","","");
    break;
    }
}
</script>
        
</center>        

    </div>
		
		<br>
		<br>
		
		<center>
			<footer>
				<p>Adresse: rue Moreau Vincent, 37270 Véretz</p>
				<p>Numéro: 02 47 35 70 13</p>
				<div class="butonDéco">
				<a href="Acceuil.php"><input type="submit" name="formdéco" value="Se déconnecter !"/></a>
				</div>			
			</footer>

		</center>

	</body>
</html>
