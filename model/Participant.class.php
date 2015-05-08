<?php

	 abstract class  Participant extends Utilisateur {
 	
 	protected  $idParticipant;
	protected  $email;
	protected  $numpasseport ;
	
 	function getIdParticipant(){
 		
 		return  $this->idParticipant;
 	}
 	
 	function setIdParticipant($idParticipant){
 		
 	  $this->idParticipant = $idParticipant;
 	
 	}
	
	function getEmail(){
 		
 		return  $this->idParticipant;
 	}
 	
 	function setEmail($email){
 		
 	  $this->email = $email;
 	
 	}
	
	function getNumpasseport(){
 		
 		return  $this->numpasseport;
 	}
 	
 	function setNumpasseport($numpasseport){
 		
 	  $this->numpasseport = $numpasseport;
 	
 	}
 	
 	
 	
 }

?>