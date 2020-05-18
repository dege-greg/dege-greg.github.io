<?php
session_start();
?>
<?php
require_once(".\jpgraph-4.3.1\src\jpgraph.php");
require_once(".\jpgraph-4.3.1\src\jpgraph_line.php");

$donnees1 = array(0,0,0);
$donnees2 = array(0,0,0);
$temps1 = $_SESSION['temps1'];
$temps2 = $_SESSION['temps2'];
$ecartTotal1 = $_SESSION['ecartTotal1'];
$ecartTotal2 = $_SESSION['ecartTotal2'];

$temps1 = $temps1/3600;
$temps2 = $temps2/3600;
$tempsmax = max($temps1,$temps2)+10;
for ($i = 0; $i <= $tempsmax; $i++) {
	if($temps1>$i) {
    $donnees1[] = $i*$ecartTotal1/$temps1;
	}
	else {
	$donnees1[]	= $ecartTotal1;
	}
	if($temps2>$i) {
    $donnees2[] = $i*$ecartTotal2/$temps2;
	}
	else 
	{
	$donnees2[]	= $ecartTotal2 ;
	}
}

$largeur = 800;
$hauteur = 600;

// Initialisation du graphique
$graphe = new Graph($largeur, $hauteur);
// Echelle lineaire ('lin') en ordonnee et pas de valeur en abscisse ('text')
// Valeurs min et max seront determinees automatiquement
$graphe->setScale("linlin",round(min($ecartTotal2,$ecartTotal1,0))-1,round(max($ecartTotal2,$ecartTotal1,0))+1);

// Creation de la courbe
$courbe1 = new LinePlot($donnees1);
$courbe2 = new LinePlot($donnees2);

// Ajout de la courbe au graphique
$graphe->add($courbe1);
$graphe->add($courbe2);


// Ajout du titre du graphique
$graphe->img->SetMargin(80,40,40,80);
$graphe->title->Set("Decalage temporel en fonction du temps de vol");
$graphe->xaxis->title->Set("Temps de vol en heures");
$graphe->yaxis->title->Set("Decalage en nanosecondes");

$graphe->xaxis->SetPos('min');
$graphe->title->SetFont(FF_FONT1,FS_BOLD);
$graphe->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graphe->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
$courbe1->SetColor("blue");
$courbe1->SetWeight(2);
$courbe2->SetColor("red");
$courbe2->SetWeight(2);
$graphe->yaxis->SetWeight(2);
$graphe->xaxis->SetWeight(2);
$graphe->legend->SetHColMargin(20);

// Affichage du graphique
$graphe->stroke();
?>