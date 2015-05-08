<?php

	class AuteurSecondaire extends Utilisateur {
				
	private $pswd;
	private $idSoumission;	
	public function __construct(array $donnees){	
	
	$this->hydrate($donnees);
}
	
	
	function getPswd(){
			
			return $this->pswd;
			
		}
		
	function setPswd($pswd){
			
			$this->pswd=$pswd;
			
		}
		
	function getIdSoumission(){
			
			return $this->idSoumission;
			
		}
		
	function setIdSoumission($idSoumission){
			
			$this->idSoumission=$idSoumission;
			
		}
	
}	

?>