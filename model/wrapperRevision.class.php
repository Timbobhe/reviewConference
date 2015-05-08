<?php
class WrapperRevision
{
	protected $titre;
	protected $themePrincipal;
	protected $nommembre;
	protected $prenommembre;
	protected $statut;
	protected $nomauteur;
	protected $auteurprenom;
	protected $id;
	protected $moy;
	
	
	public function __construct($donnees)
	{
		$this->hydrate($donnees);
	}
	
	
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
	$this->id=$id;
	}
	
	public function setNommembre($nom)
	{
		$this->nommembre=$nom;
	}
	
	public function getNommembre()
	{
		return $this->nommembre;
	}

	public function setTitre($titre)
	{
		$this->titre=$titre;
	}
	public function getTitre()
	{
		return $this->titre;
	}
	
   public function setThemePrincipal($theme)
	{
		$this->themePrincipal=$theme;
	}
	public function getThemePrincipal()
	{
		return $this->themePrincipal;
	}
	
	
    public function setPrenommembre($prenom)
	{
		$this->prenommembre=$prenom;
	}
	
	public function getPrenommembre()
	{
		return $this->prenommembre;
	}
	
	public function setStatut($statut)
	{
		$this->statut=$statut;
	}
	
	public function getStatut()
	{
		return $this->statut;
	}
	
	
	public function getNomauteur()
	{
		return $this->nomauteur;
	}
	
	public function setNomauteur($nomauteur)
	{	
		$this->nomauteur=$nomauteur;
	}
	
	public function getAuteurprenom()
	{
		return $this->auteurprenom;
	}
	
   public function setAuteurprenom($prenom)
	{
		$this->auteurprenom=$prenom;
	}
	
	
	public function getMoy()
	{
		return $this->moy;
	}
	
   public function setMoy($moy)
	{
		$this->moy=$moy;
	}
	

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