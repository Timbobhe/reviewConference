﻿<?php
session_start();

@$lang=$_GET['lang'];

//general
@$texte=$_POST["texte"];

	$file=fopen('../../FrontOffice/files/'.$lang.'SubmissionDetails.txt','w');
	fputs($file,$texte);
	fclose($file);
	$_SESSION['saved']='oui';

	header("location:../toSubmission.php");


?>