<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$nomhotel=$_POST["nomhotel"];
$adressehotel=$_POST["adressehotel"];

if(empty($adressehotel) || empty($nomhotel))
{
	$_SESSION['erreur']='oui';
    $_SESSION['message']='Ajout hotel';
	header('Location:../generalInscription.php');
}
else
{
$hotel=new Hotel(array('nom'=>$nomhotel,'adresse'=>$adressehotel));	
HotelDao::add($hotel);	
$_SESSION['saved']='oui';
header('Location:../generalInscription.php');	
}
?>