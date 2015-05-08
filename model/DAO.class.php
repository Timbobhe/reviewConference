<?php
//@session_start();
	 
class DAO {
		
		private static  $_pdo; 
		protected  $pdo ;
		
		
		
	 	 public	function __construct(){
	 		
	 try
			{
				$donnees = file_get_contents(dirname (__FILE__)."/../BackOffice/config/init.txt");
				$tab = explode("|", $donnees); 
			    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$this->pdo = new PDO('mysql:host='.$tab[0].';dbname='.$tab[3],$tab[1],$tab[2], $pdo_options);
				
			}
			
			
			catch(Exception $e)
			{
			    die('Erreur : '.$e->getMessage());
			}
				 		
		}
		
		public static function getPDO(){
			
			try {
			//	if(!isset($_SESSION['pdoAizo Groupe']) && empty($_SESSION['pdoAizo Groupe'])){
				
				$file = fopen(dirname (__FILE__)."/../BackOffice/config/init.txt", 'r');
				$donnees = fgets($file);
				fclose($file);
				$tab = explode("|", $donnees);
				
			    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
				
				$_pdo = new PDO('mysql:host='.$tab[0].';dbname='.$tab[3],$tab[1],$tab[2], $pdo_options);
			//	$_SESSION['pdoAizo Groupe']= $_pdo;
			//	$_pdo = new PDO('mysql:host=localhost;dbname=callForPaper','root','', $pdo_options);
			
			   return $_pdo ;
			
				}
				
	//			else return $_SESSION['pdoAizo Groupe'];
	//		}
			catch (Exception $e)
			{
				die('error'.$e->getMessage());
				return null;
			}
			
		}
		
	}

?>