<?php
class ChambreDao{

	public static function changeEtat(Chambre $chambre,$etat)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('UPDATE `callForPaper`.`chambre` SET `etat` =? WHERE `chambre`.`id` =?;');
		$success=$req->execute(array($etat,$chambre->getId()));
		return $success;
	}
	
	public static function getById($id)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT * FROM `chambre` WHERE `id`=?');
		$req->execute(array($id));
		$donnees=$req->fetch(PDO::FETCH_ASSOC);
		if($donnees!=false)
		return new Chambre($donnees);
		else 
		return false;
	}
	
	
	public static function get(Hotel $hotel,$numChambre)
	{
		
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT * FROM `chambre` WHERE `idhotel`=? and `numChambre`=?' );
		$req->execute(array($hotel->getId(),$numChambre));
		$donnees=$req->fetch(PDO::FETCH_ASSOC);
		if($donnees!=false)
		return new Chambre($donnees);
		else 
		return false;
		
	}
	
	public static function listChambre(Hotel $hotel=null,$etat=0)
	{
		$req=null;
		$success=false;
		$bdd=DAO::getPDO();
		if($hotel!=null)
		{
			$req=$bdd->prepare('SELECT * FROM `chambre` WHERE `idhotel`=? and `etat`=?');
			$success=$req->execute(array($hotel->getId(),$etat));			
		}
		else 
		{
			$req=$bdd->prepare('SELECT * FROM `chambre` WHERE `etat`=?');
			$success=$req->execute(array($etat));			
		}
		if($success!=false)
			{
				$chambres=array();
				while($donnees=$req->fetch(PDO::FETCH_ASSOC))
				{
					$chambres[]=new Chambre($donnees);
				}
				return $chambres;
			}
			else 
			return false;
		
	}
	
	
	public static function listChambreByPrice($prix)
	{
       
		$bdd=DAO::getPDO();
	   $req=$bdd->prepare('SELECT * FROM `chambre` WHERE `prix`<=?');
	   $success=$req->execute(array($prix));			
		if($success!=false)
			{
				$chambres=array();
				while($donnees=$req->fetch(PDO::FETCH_ASSOC))
				{
					$chambres[]=new Chambre($donnees);
				}
				return $chambres;
			}
			else 
			return false;
		
	}
	
	
	public static function addChambre(Chambre $chambre)
	{
		$bdd=DAO::getPDO();
		$hotelveri=HotelDao::existe($chambre->getIdhotel());
		if(!$hotelveri)
		return false;
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('INSERT INTO `callForPaper`.`chambre` (`idhotel`, `etat`, `prix`, `numChambre`) VALUES (?,?,?,?);');
		$success=$req->execute(array($chambre->getIdhotel(),$chambre->getEtat(),$chambre->getPrix(),$chambre->getNumChambre()));
		return $success;	
	}
	
	
	
}
?>