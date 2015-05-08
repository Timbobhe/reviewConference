<?php
class ReservationDao{
	
	
	public static function reserver(Reservation $reservation)
	{
	  $bdd=DAO::getPDO();
	  $req=$bdd->prepare("INSERT INTO `reservation` (`idHotel`,`type`,`idparticipant`,`datearrive`, `datedepart`) VALUES (:idhotel,:type,:idparticipant,:datearrive,:datedepart);");
	  $success=$req->execute(array('idhotel'=>$reservation->getIdHotel(),'type'=>$reservation->getType(),'idparticipant'=>$reservation->getIdparticipant(),'datearrive'=>$reservation->getDatearrive(),'datedepart'=>$reservation->getDatedepart()));
	  return $success;
	}
	
	
    public static function annuler($reservationId)
    {
    $bdd=DAO::getPDO();
    $req=$bdd->prepare("DELETE FROM `reservation` WHERE `reservation`.`id` =?;");
	$success=$req->execute(array($reservationId));
	return $success;	
    }
	
	public static function getReservation(Participant $participant)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare("SELECT * FROM `reservation` WHERE `idparticipant`=?");
	    $result=$req->execute(array($participant->getId()));
		$donnees=$req->fetch(PDO::FETCH_ASSOC);
		if($donnees!=false)
		{
			$resrvation=new Reservation($donnees);
			return $resrvation;
		}
		else 
		return $donnees;
	    
	}
	
	public static function getList()
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare("SELECT * FROM `reservation` where `reserve`=0;");
		$req->execute();
		$reservations=array();
		while($donnees=$req->fetch())
		{
	      $reservations[]=new Reservation($donnees);		
		}
		return $reservations;
	}
	
}
?>