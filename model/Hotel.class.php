<?php

class Hotel
{
	
	protected $_id;
	protected $_nom;
	protected $_adresse;
	
	
	
	public function __construct($donnees)
	{
	$this->hydrate($donnees);	
	}

	public function getId()
	{
	return $this->_id;	
	}
	
	public function getNom()
	{
		return $this->_nom;
	}
	 
	
	public function getAdresse()
	{
		return $this->_adresse;
	}
	
	public function setId($id)
	{
	$this->_id=$id;	
	}
	
	public function setNom($nom)
	{
		$this->_nom=$nom;
	}
	 
	
	public function setAdresse($adresse)
	{
		$this->_adresse=$adresse;
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