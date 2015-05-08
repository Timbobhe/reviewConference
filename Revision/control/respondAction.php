<?php

include_once("../../model/loadClassInstance.php");

$donnees = array('id'=>$_POST['idrevision'],'terminee'=>$_POST['accepte']);

$rev = new Revision($donnees);

RevisionDao::update($rev);

if($_POST['accepte']==0){

$soum = new Soumission(array('statut'=>1,'idArticle'=>$_POST['idarticle']));

SoumissionDao::update1($soum);
}

header("location:../revision.php");

?>