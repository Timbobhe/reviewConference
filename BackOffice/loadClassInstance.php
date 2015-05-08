

<?php
    function loadClassInstance ($classe)
    {
    	if (file_exists ($file = dirname (__FILE__).'/../model/'.$classe. '.class.php'))
            require $file;
            else 
            echo dirname(__FILE__);
       
    }
	
	spl_autoload_register ('loadClassInstance');
	
?>
