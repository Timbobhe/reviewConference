<?php

class wrapperSoumission
{
	protected $idArticle;
	protected $themePrincipal;

	
	public function __construct($donnees)
	{
		$this->hydrate($donnees);
	} 
	
	public function getIdArticle()
	{
		return $this->idArticle;
	}
	
	public function setIdArticle($id)
	{
		$this->idArticle=$id;
	}
	
	public function getThemePrincipal()
	{
		return $this->themePrincipal;
	}
	
	public function setThemePrincipal($theme)
	{
		$this->themePrincipal=$theme;
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