<?php 
/**
 * Enter description here ...
 * @author Administrateur
 *
 */
class Reservation{
	
	protected  $datearrive;
	protected  $datedepart;
	protected  $type;
	protected  $idparticipant;
	protected  $idhotel;
	
	
	public function  __construct(array $donnees)
	{
	$this->hydrate($donnees);	
	}

	
	public function getDatearrive()
	{
		return $this->datearrive;
	}
	
	public function getDatedepart()
	{
		return $this->datedepart;
	}
	
	public function getType()
	{
		
		return $this->type;
	}
	
	public function getIdparticipant()
	{
		
		return $this->idparticipant;
	}
	
	public  function getIdHotel()
	{
		return $this->idhotel;
		
	}
		
	
	public function setDatearrive($datearrive)
	{
		$this->datearrive=$datearrive;
	}
	
	public function setDatedepart($datedepart)
	{
		$this->datedepart=$datedepart;
	}
	
	public function setType($type)
	{
		
		 $this->type=$type;
	}
	
	public function setIdparticipant($idparticipant)
	{
		
		$this->idparticipant=$idparticipant;
	}
	
	public  function setIdHotel($idhotel)
	{
		$this->idhotel=$idhotel;
		
	}
	
	
// hydradation
public function hydrate(array $donnees)
{
    foreach ($donnees as $key => $value)
    {

		$method = 'set'.ucfirst($key);
        
        // Si le setter correspondant existe
        if (method_exists($this, $method))
        {
            // On appelle le setter
            $this->$method($value);
        }
    }
}
	
} 
?>