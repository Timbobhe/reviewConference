<?php
class MembreComite extends Utilisateur {
	

 protected $theme;
 protected  $pswd;
 protected  $numpasseport ;
 protected $participant;	

 	
 public function getNumpasseport(){
 		
 		return  $this->numpasseport;
 	}
 	
 public	function setNumpasseport($numpasseport){
 		
 	  $this->numpasseport = $numpasseport;
 	
 	}
 
 
 public function __construct(array $donnees)
 {
		 	$this->hydrate($donnees);
 }
 
 public function getTheme()
 {
 	return  strtolower($this->theme);
 }	
	
 public function setTheme($theme)
 {
 	$this->theme=$theme;
 }
	
 public function getPswd(){
			
	return $this->pswd;
			
 }
		
 public function setPswd($pswd){
			
			$this->pswd=$pswd;
}

	public function setParticipant($val)
	{
		$this->participant=$val;
	}
	
	public function getParticipant()
	{
		return $this->participant;
	}

 
}
?>