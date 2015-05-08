<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$id=$_GET['id'];


$soum = SoumissionDao::get($id);
if(empty($id) || $soum==false)
{
	$_SESSION['erreur']='oui';
    $_SESSION['message']='Suppression Article';	
}
else{
$idarticle = $soum->getIdArticle();

RevisionDao::delete1($idarticle);

SoumissionDao::updateStatus(1, $idarticle);

$_SESSION['saved']='oui';
}

header('Location:../generalRevision.php');

?>