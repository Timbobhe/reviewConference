<?php
include_once("../../model/loadClassInstance.php");

$idsoum = $_GET['idSoum'] ;
$idArt = $_GET['idArticle'] ;

ArticleDao::delete(new Article(array('id'=>$idArt))); 
AuteurSecondaireDao::delete1($idsoum);					
SoumissionDao::delete(new Soumission(array('id'=>$idsoum)));	

header("location:../submitArticle.php");

?>