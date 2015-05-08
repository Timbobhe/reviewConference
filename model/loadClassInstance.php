

<?php
    function loadClassInstance ($classe)
    {
        require $classe . '.class.php'; // On inclue la classe correspondante au paramètre passé
    }
	
	spl_autoload_register ('loadClassInstance');
	
?>

