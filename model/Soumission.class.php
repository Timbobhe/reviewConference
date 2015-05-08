<?php 

class Soumission{
	
// Attributs
	private $id;
	private $idArticle;
	private $idAuteur;
	private $statut;
	private $dateSoumission;

// Méthodes
	public function __construct($donnees) { 
		
		foreach ($donnees as $key => $value)
		    {
		
				$method = 'set'.ucfirst($key);
		        
		        // Si le setter correspondant existe
		        if (method_exists($this, $method))
		        {
		            // On appelle le setter
		            $this->$method($value);
		        }
		        
		    else {
		        	
		        	
		        	echo 'method introuvable'.$method;
		        }
		    }
		
	}


//getter

public function getId()
{
return $this->id;
}
public function getIdArticle()
{
return $this->idArticle;
}
public function getIdAuteur()
{
return $this->idAuteur;
}
public function getStatut()
{
return $this->statut;
}
public function getDateSoumission()
{
return $this->dateSoumission;
}
//setters

public function setId($id)
{
 $this->id=$id;
}
public function setIdArticle($idArticle)
{
 $this->idArticle=$idArticle;
}
public function setIdAuteur($idAuteur)
{
 $this->idAuteur=$idAuteur;
}
public function setStatut($statut)
{
 $this->statut=$statut;
}
public function setDateSoumission($dateSoumission)
{
 $this->dateSoumission=$dateSoumission;
}


}
	
	

?>