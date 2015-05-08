<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$hotel=$_POST["hotel"];
$adressehotel=$_POST["adressehotel"];
$nomhotel=$_POST["nomhotel"];

$existe=HotelDao::getById($hotel);
if(empty($nomhotel)|| empty($adressehotel)||$existe==false)
{
	$_SESSION['erreur']='oui';
	$_SESSION['message']='modification hotel';
	header('Location:../generalInscription.php');
}
else
{
$existe->setNom($nomhotel);
$existe->setAdresse($adressehotel);
HotelDao::modifier($existe);
$_SESSION['saved']='oui';
header('Location:../generalInscription.php');		
}  





