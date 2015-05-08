<?php
class HotelDao{
	

	public static function add(Hotel $hotel)
	{
		$bdd=DAO::getPDO();
	    $req=$bdd->prepare("INSERT INTO `callForPaper`.`hotel` (`nom`, `adresse`) VALUES (?,?);");
	    $success=$req->execute(array($hotel->getNom(),$hotel->getAdresse()));
	    return $success;
	}
	
	public static function get($nom)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare("SELECT * FROM `hotel` WHERE `nom`=?");
		$req->execute(array($nom));
		$donnees=$req->fetch(PDO::FETCH_ASSOC);
		if($donnees!=null)
		{
			$hotel=new Hotel($donnees);
			return $hotel;
		}
		else 
		return $donnees;
	}
	
  public static function remove($nom)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare("DELETE FROM `callForPaper`.`hotel` WHERE `hotel`.`nom`=?");
		$success=$req->execute(array($nom));
		return $success;
	}
	
	public static function getHotels()
	{

		$bdd=DAO::getPDO();
		$req=$bdd->prepare("SELECT * FROM `hotel`");
		$success=$req->execute();
		$hotels=array();
		while ($donnees=$req->fetch(PDO::FETCH_ASSOC))
		{
			$hotels[]=new Hotel($donnees);
		}
		if(count($hotels)==0)
		return false;
		else 
		return $hotels;
	}
	
	
	public static function getById($id)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare("SELECT * FROM `hotel` WHERE `id`=?");
		$req->execute(array($id));
		$donnees=$req->fetch(PDO::FETCH_ASSOC);
		if($donnees!=null)
		{
			$hotel=new Hotel($donnees);
			return $hotel;
		}
		else 
		return $donnees;
	}
	

	public static function existe($id)
	{
		
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT `nom` FROM `hotel` WHERE `id`=?');
		$success=$req->execute(array($id));
		return $success;
	}
	
	public static function modifier(Hotel $hotel)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('UPDATE `callForPaper`.`hotel` SET `nom` = \''.$hotel->getNom().'\',
        `adresse` = \''.$hotel->getAdresse().'\' WHERE `hotel`.`id` ='.$hotel->getId().';');
		$success=$req->execute(array($hotel->getId()));
		return $success;
	}
	
	
}
?>