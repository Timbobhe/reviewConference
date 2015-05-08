<?php

include_once("../../model/loadClassInstance.php");

$donnees = array('id'=>$_POST['idrevision'],'pertinence'=>$_POST['pertinence'],'pertinenceComment'=>$_POST['pertinenceComm'],'clarete'=>$_POST['clarete'],'clareteComment'=>$_POST['clareteComm'],
'importance'=>$_POST['importance'],'importanceComment'=>$_POST['importanceComm'],'originalite'=>$_POST['originalite'],'originaliteComment'=>$_POST['originaliteComm'],
'qualiteScientifique'=>$_POST['qualiteScientifique'],'qualiteScientifiqueComment'=>$_POST['qualiteScientifiqueComm'],'impact'=>$_POST['impact'],'impactComment'=>$_POST['impactComm'],
'suggestions'=>$_POST['suggestions'],'terminee'=>$_POST['terminee']);

$rev = new Revision($donnees);

RevisionDao::update($rev);


$soum = new Soumission(array('statut'=>$_POST['etat'],'idArticle'=>$_POST['idarticle']));

SoumissionDao::update1($soum);
header("location:../revision.php");

?>