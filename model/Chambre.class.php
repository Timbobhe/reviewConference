<?php

class Chambre{
	
	
	protected $id;
	protected $idhotel;
	protected $prix;
	protected $etat;
	protected $numChambre;
	
	

	
	public function __construct($donnees)
	{
		$this->hydrate($donnees);
		
	}
	
	public function getNumChambre()
	{
		return $this->numChambre;
	}
	
	public function setNumChambre($numchambre)
	{
		
		$this->numChambre=$numchambre;
	}
	
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getIdhotel()
	{
		return $this->idhotel;
	}
	
	public function getPrix()
	{
		
		return $this->prix;
	}
	
	public function getEtat()
	{
		return $this->etat;
		
	}
	
   public function setId($id)
	{
		$this->id=$id;
	}
	
	public function setIdhotel($idhotel)
	{
		$this->idhotel=$idhotel;
	}
	
	public function setPrix($prix)
	{
		
		$this->prix=$prix;
	}
	
	public function setEtat($etat)
	{
		$this->etat=$etat;
		
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