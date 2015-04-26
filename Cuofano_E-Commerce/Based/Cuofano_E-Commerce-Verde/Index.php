<!--Giancarmine Cuofano-->
<!--Qinta Ainf 2013/14--> 	
<!------------------------------------------------------------------------------------
Questa pagina invierà una richiesta tramite il server per sapere la lingua del browser,
in base alla risposta:
-Se Italiano:	IT/index.php
-Se Spagnolo:	ES/Index.php
-Se Inglese:	EN/Index.php

	*In qualunque altro caso si verrà rindirizzati alla versione del sito in inglese 
	 contenuto in EN/Index.php
	 
					##NON VERRA' VISUALIZZATO NULLA LATO CLIENT##
------------------------------------------------------------------------------------->
<?php
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	switch ($lang)
	{	
		case "es":
			//echo "SPAGNOLO";
			header("Location: ES/index.php");
		break;
		
		case "it":
			//echo "ITALIANO";
			header("Location: IT/index.php");
		break;
		
		case "en":
			//echo "INGLESE";
			header("Location: EN/index.php");
		break;
		
		default:
			//echo "DEFAULT";
			header("Location: EN/index.php");
		break;
	}
?>