<?php
session_start();

@$lang=$_GET['lang'];

//general
@$texte=$_POST["texte"];

//Sous thèmes
@$texte1=$_POST["texte1"];
@$nom1=$_POST["nom1"];

@$texte2=$_POST["texte2"];
@$nom2=$_POST["nom2"];

@$texte3=$_POST["texte3"];
@$nom3=$_POST["nom3"];


	$file=fopen('../../FrontOffice/files/'.$lang.'LeadingTheme.txt','w');
	fputs($file,$texte);
	fclose($file);
	
	
	$file=fopen('../../FrontOffice/files/'.$lang.'SubTheme1.txt','w');
	fputs($file,$nom1.':::'.$texte1);
	fclose($file);
	
	$file=fopen('../../FrontOffice/files/'.$lang.'SubTheme2.txt','w');
	fputs($file,$nom2.':::'.$texte2);
	fclose($file);
	
	$file=fopen('../../FrontOffice/files/'.$lang.'SubTheme3.txt','w');
	fputs($file,$nom3.':::'.$texte3);
	fclose($file);
	
	
	$_SESSION['saved']='oui';
	header("location:../toThemes.php");


?>