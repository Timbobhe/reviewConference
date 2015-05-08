<?php
$file = dirname (__FILE__).'/../loadClassInstance.php';
include_once($file);
class AdminStatistique{

	
	public static function getArticleStatistiques()
	{
		
	   $bdd=DAO::getPDO();
       $query=$bdd->query('SELECT count(*) AS nombre, `statut` FROM soumission  GROUP BY `statut` ORDER BY `statut`');
    	$element=array();
        //Parcourir le resultat de la requete et le mettre dans un tableau
        while($row=$query->fetch())
        {
        switch ($row['statut']) {
        	case 1:
        	$element['soumis']=$row['nombre'];
        	break;
        	case 2:
        	$element['revision']=$row['nombre'];
        	break;
        	case 3:
        	$element['accepte']=$row['nombre'];
        	break;
        	case 4:
        	$element['rejete']=$row['nombre'];	
        	;
        	break;
        }
        }
		return $element;
		
	}
	
	
	public static function getEtatParticipation()
	{
		
		$val1=self::nbrParticipant();
		$val2=AuteurPrincipalDao::count()+AuteurSecondaireDao::count()+MembreComiteDao::count()+SimpleParticipantDao::count();
		$val3=$val2-$val1;
		$donnees=array();
		$donnees['Participant']=$val1;
		$donnees['Sans Participation']=$val3;
		return $donnees;
	}
	
	

	
	
	public static function tauxAcceptation()
	{
		$bdd=DAO::getPDO();
		$sum=$bdd->query('select count(*) as total from soumission');
		$nbracc=$bdd->query('select count(*) as nombre from soumission where `statut`=3');
		$donnee=$sum->fetch();
		$total=$donnee['total'];
		$donnee=$nbracc->fetch();
		$acce=$donnee['nombre'];
		return round($acce/$total,2)*100;
	}
	
	public static function articleSoumis()
	{
		//$article=new ArticleDao();
		return ArticleDao::Count();
	}
	
	public static function articleAccepte()
	{
		
		$bdd=DAO::getPDO();
		$req=$bdd->query('select count(*) as nombre from soumission where `statut`=3');
        $res=$req->fetch();
        return $res['nombre'];  
	}
	
	public static function articlerefuse()
	{
        $bdd=DAO::getPDO();
		$req=$bdd->query('select count(*) as nombre from soumission where `statut`=4');
        $res=$req->fetch();
        return $res['nombre'];  
	}
	
	
	
	public static function nbrParticipant()
	{
		$val1=SimpleParticipantDao::count();
		$val2=MembreComiteDao::getnbrParticipant();
		$val3=AuteurParticipantDao::getNombreParticipant();
		return $val1+$val2+$val3; 
	}

	
	public static function tauxParticipation()
	{
		$nbr=self::nbrParticipant();
		$val1=AuteurPrincipalDao::count()+AuteurSecondaireDao::count()+MembreComiteDao::count()+SimpleParticipantDao::count();
		return round($nbr/$val1,2)*100;
	}
	
	
}
?>
