<?php
class WrapperPrix
{
	
	protected $prixMembre;
	protected $prixAuteur;
	protected $prixVisiteur;
	
	public function setPrixMembre($prixmembre)
	{
		$this->prixMembre=$prixmembre;
	}
	
	public function getPrixMembre()
	{
		return $this->prixMembre;
	}
	
	public function setPrixAuteur($prixauteur)
	{
		$this->prixAuteur=$prixauteur;
	}
   
	public function getPrixAuteur()
	{
		return $this->prixAuteur;
	}
	
	
	public function setPrixVisiteur($prixvisiteur)
	{
		$this->prixVisiteur=$prixvisiteur;
	}
	
    
	public function getPrixVisiteur()
	{
		return $this->prixVisiteur;
	}
	
}

