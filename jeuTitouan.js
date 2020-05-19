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
