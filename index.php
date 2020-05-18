<html>
	
<head>
	<meta charset="utf-8"> 
	<title>Désynchronisation des horloges parfaites</title>
	<link rel="stylesheet" href="view.css">
</head>


<header> <p> Désynchronisation des horloges parfaites </p>
</header>
<div  id = 'mainBlock'>
<div id = 'leftBlock'>
	<p> En 1971, Hafele et Keating on réalisé deux tours du monde avec des
horloges atomiques pour mesurer la désynchronisation de ces dernières
par rapport aux horloges restées au sol. </p>

<p>Deux effets sont à l’origine de la désynchronisation des horloges : </p>
<p>• Décalage gravitationnelle : Décalage dû à la courbure de l’espacetemps générée par la Terre. Ce décalage est positif quelque soit le sens
de navigation autour de la Terre. </p>
<p>• Décalage cinématique :
• Premier ordre (Sagnac) : Décalage dû au fait que les avions
volent autour de la Terre chacun dans un sens différent. Ce
décalage est positif vers l’ouest et négatif vers l’est.
• Second ordre (Lorentz) : Décalage dû à la vitesse des avions. Ce
décalage est négatif quelque soit le sens de navigation autour de
la Terre. </p>
<p> Dans la simulation suivante vous allez pouvoir choisir les différents
paramètres de l’expérience de Hafele et Keating. Vous aurez alors accès
au décalage temporel total, aux détails de chaque décalage ainsi qu’à un
graphique représentant le décalage. </p>
<p> Les valeurs réelles des paramètres de l’expérience de Hafele et Keating
sont indiqués en rouge. Merci de rentrer des valeurs comprises dans les
intervalles indiqués. Le modèle d’avion correspondant à un paramètre est
indiqué entre parenthèses. </p>
</div>

<form action="action.php" method="post">
 <div class ='ligne'> 
 	<div class='vehicule'>
 	 Rayon de la planète (en km) : <input type="number" name="rayonPlanete" step='any'placeholder='6356'  />
 	Masse de la planète (en masse de Terre) : <input type="number" name="massePlanete" step='any' placeholder= '1'/>
	 Vitesse de rotation (en radiants par secondes) : <input type="number" name="vitessePlanete" step='any' placeholder='0.00007292'  />
	</div>
 <div class='vehicule'>

 	Altitude du véhicule 1 (en mètres) : <input type="number" name="altitude1" step='any' placeholder='10000'/>
	Temps total de vol 1 (en heure) : <input type="number" name="temps1" step='any' placeholder='41'/>
	Nombre d'escale du vol 1 : <input type="number" name="nombreEscale1" step='any' placeholder='12'/>
 	Vitesse moyenne 1 (en mètres par secondes) : <input type="number" name="vitesse1" step='any' placeholder ='254.58'/>
 	Latitude moyenne de vol 1 (radiants) : <input type="number" name="latitude1" step='any' placeholder ='0.575959'/>
 </div>
 <div class='vehicule'>
 	Altitude du véhicule 2 (en mètres) : <input type="number" name="altitude2" step='any' placeholder='10000'/>
	Temps total de vol 2 (en heure) : <input type="number" name="temps2" step='any' placeholder = '49'/>
	Nombre d'escale du vol 2 : <input type="number"name="nombreEscale2" step='any' placeholder='13'/>
 	Vitesse moyenne 2 (en mètres par secondes) : <input type="number" name="vitesse2" step='any'placeholder ='-222.22'/>	
 	Latitude moyenne de vol 2 (radiant) : <input type="number" name="latitude2" step='any'placeholder ='0.575959'/>
 </div>
</div>
<p><input class="clean-gray " type="submit" value="LANCER LA SIMULATION"></p>
</form>
</div>
