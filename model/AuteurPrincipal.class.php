<?php


class AuteurPrincipal extends Utilisateur {
	
	
	
	private $pswd;
		
	public function __construct(array $donnees){	
	
    $this->hydrate($donnees);
	
}
	
	
	function getPswd(){
			
			return $this->pswd;
			
		}
		
	function setPswd($pswd){
			
			$this->pswd=$pswd;
			
		}
	
	
}

?>