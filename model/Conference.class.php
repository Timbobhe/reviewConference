<?php
class Conference{
	
		private $date,$theme,$lieu,$datelimite,$tel,$fax,$pays,$codepostale,$description;
	
    public function __construct($donnees){
		$this->hydrate($donnees);
	}
	
	
	  public function getDescription()
	  {
	  	return $this->description;
	  }
	  
	  public function setDescription($description)
	  {
	  return $description;	
	  }
	  
      public function getDate(){
	  return $this->date;
      }
      public function setDate($date){
	   $this->date=$date;
      }

      public function getTheme(){
	   return $this->theme;
      }
      
      public function setTheme($theme){
	   $this->theme=$theme;
      }
     
      public function setLieu($lieu)
      {
      	$this->lieu=$lieu;
      }
      
      public  function getLieu()
      {
      	return $this->lieu;
      }
      
      public function getDatelimite()
      {
      	return $this->datelimite;
      }
    
      public function setDatelimite($datelimite)
      {
      	 $this->datelimite=$datelimite;
      }
      
      public function  getTel()
      {
      	return $this->tel;
      }
      
      public function  setTel($tel)
      {
      	$this->tel=$tel;
      }
     
     public function  getFax()
      {
      	return $this->fax;
      }
      
      public function  setFax($fax)
      {
      	$this->fax=$fax;
      }
      
     
     public function  getPays()
      {
      	return $this->pays;
      }
      
      public function  setPays($pays)
      {
      	$this->pays=$pays;
      }
      
 
     public function  getCodepostale()
      {
      	return $this->codepostale;
      }
      
      public function  setCodepostale($code)
      {
      	$this->codepostale=$code;
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