<?php
session_start();
?>
<html>

	
<head>
	<meta charset="utf-8"> 
	<title>Désynchronisation des horloges parfaites</title>
	<link rel="stylesheet" href="view.css">
</head>

<header> <p> Désynchronisation des horloges parfaites </p> </header>

<?php

if(is_numeric($_POST['rayonPlanete']))
{
    $rayonPlanete1 = $_POST['rayonPlanete'];
}
else
{
    $rayonPlanete1 = 6356;
}
if(is_numeric($_POST['massePlanete']))
{
    $massePlanete1 = $_POST['massePlanete'];
}
else
{
    $massePlanete1 =1;
}
$rayonPlanete1 = $rayonPlanete1*1000;
$massePlanete1 = $massePlanete1 *5972000000000000000000000;
if(is_numeric($_POST['vitessePlanete']))
{
    $vitessePlanete1 = $_POST['vitessePlanete'];
}
else
{
    $vitessePlanete1 = 0.00007292;
}
if (is_numeric($_POST['altitude1']))
{
    $altitude1 = $_POST['altitude1'];
}
else
{
    $altitude1 = 10000;
}
if(is_numeric($_POST['temps1']))
{
    $temps1 = $_POST['temps1'];
}
else
{
    $temps1 = 41;
}
if(is_numeric($_POST['nombreEscale1']))
{
    $nombreEscale1 = $_POST['nombreEscale1'];
}
else
{
    $nombreEscale1 = 12;
}
if(is_numeric($_POST['temps2']))
{
    $temps2 = $_POST['temps2'];
}
else
{
    $temps2 = 49;
}
if (is_numeric($_POST['vitesse1'])){
    $vitesse1 = $_POST['vitesse1'];

}
else
{
    $vitesse1 =254.58;
}
if (is_numeric($_POST['vitesse2'])){
    $vitesse2 = $_POST['vitesse2'];

}
else
{
    $vitesse2 = -222.22;
}
if (is_numeric($_POST['altitude2']))
{
    $altitude2 = $_POST['altitude2'];
}
else
{
    $altitude2 = 10000;
}
if(is_numeric($_POST['nombreEscale2']))
{
    $nombreEscale2 = $_POST['nombreEscale2'];
}
else
{
    $nombreEscale2 = 13;
}

if(is_numeric($_POST['latitude1']))
{
    $latitude1 = $_POST['latitude1'];
}
else{

    $latitude1 = 0.575959;
}
if(is_numeric($_POST['latitude2']))
{
    $latitude2 = $_POST['latitude2'];
}
else{

    $latitude2 = 0.575959;
}
$dureeEscale1 = $altitude1/($vitesse1*0.0261);
$dureeEscale2 = $altitude2/(-$vitesse2*0.0261);

$temps1 = $temps1*3600- ($nombreEscale1*$dureeEscale1);
$temps2 = $temps2*3600 - ($nombreEscale2*$dureeEscale2);

$c = 299792458;
$g1 = (0.000000000066742*$massePlanete1)/($rayonPlanete1*$rayonPlanete1);
$g2 = (0.000000000066742*$massePlanete1)/($rayonPlanete1*$rayonPlanete1);
$decalageGravitationnelAvion1 = $temps1*($g1 * $altitude1)/($c*$c)*1000000000; 
$decalageGravitationnelAvion2 = $temps2*($g2 * $altitude2)/($c*$c)*1000000000; 
$decalageLorentz1 = - ($vitesse1*$vitesse1)/(2*$c*$c) * $temps1*1000000000;
$decalageLorentz2 = - ($vitesse2*$vitesse2)/(2*$c*$c) * $temps2*1000000000;
$decalageSagnac1 = - $temps1 * ($vitesse1*$rayonPlanete1 *$vitessePlanete1 * cos($latitude1))/($c*$c)*1000000000;
$decalageSagnac2 = - $temps2 * ($vitesse2*$rayonPlanete1 *$vitessePlanete1 * cos($latitude2))/($c*$c)*1000000000;
$ecartTotal1 = $decalageGravitationnelAvion1 + $decalageLorentz1 + $decalageSagnac1;
$ecartTotal2 = $decalageGravitationnelAvion2 + $decalageLorentz2 + $decalageSagnac2;
$decalageGravitationnelAvion1Aff = round($decalageGravitationnelAvion1,3);
$decalageGravitationnelAvion2Aff = round($decalageGravitationnelAvion2,3);
$decalageLorentz1Aff = round($decalageLorentz1,3);
$decalageLorentz2Aff = round($decalageLorentz2,3);
$decalageSagnac1Aff = round($decalageSagnac1,3);
$decalageSagnac2Aff = round($decalageSagnac2,3);
$ecartTotal1Aff = round($ecartTotal1,3);
$ecartTotal2Aff = round($ecartTotal2,3);


echo "
<div id='resultat'>
<table>
   <tr>
       <th>Effet relativiste</th>
       <th>Véhicule1</th>
       <th>Véhicule2</th>
   </tr>

   <tr>
       <td>Désynchronisation gravitationnelle (en ns)</td>
       <td>$decalageGravitationnelAvion1Aff</td>
       <td>$decalageGravitationnelAvion1Aff</td>
   </tr>
   <tr>
       <td>Désynchronisation cinématique du
second ordre (Lorentz) (en ns)</td>
       <td>$decalageLorentz1Aff</td>
       <td>$decalageLorentz2Aff</td>
   </tr>
    <tr>
       <td>Désynchronisation cinématique du
premier ordre (Sagnac) (en ns) </td>
       <td>$decalageSagnac1Aff</td>
       <td>$decalageSagnac2Aff</td>
   </tr>
    <tr>
       <td>Ecart total (en ns)</td>
       <td>$ecartTotal1Aff</td>
       <td>$ecartTotal2Aff</td>
   </tr>
</table>";

?>	
<?php 
$_SESSION['ecartTotal1'] = $ecartTotal1;
$_SESSION['ecartTotal2'] = $ecartTotal2;
$_SESSION['temps1'] = $temps1;
$_SESSION['temps2'] = $temps2;

?>
<img src="graphique.php" />
</div>