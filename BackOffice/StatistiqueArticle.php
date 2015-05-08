<?php
session_start();
include_once('/../statisticsBuilder/src/jpgraph.php');
include_once('/../statisticsBuilder/src/jpgraph_pie.php');


$element=$_SESSION['ArticleStat'];

$donnees=array();
$legende=array();

if(isset($element))
{
foreach ($element as $key=>$value)
{
	$donnees[]=$value;
	$legende[]=$key;
}
}

$diagramme=new PieGraph(350,350);
$diagramme->title->set('Statistiques');
$cercle=new PiePlot($donnees);
$cercle->SetCenter(0.5);
$cercle->SetValueType(PIE_VALUE_PERCENTAGE);
////$cercle->value->SetFormat('%d');
$cercle->SetLegends($legende);
$diagramme->Add($cercle);
$diagramme->Stroke();
?>