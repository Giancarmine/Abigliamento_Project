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
 session_start();
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	switch ($lang)
	{	
		case "es":
			//echo "SPAGNOLO";
			$_SESSION['LNG']="ES";
			header("Location: ES/index.php");
		break;
		
		case "it":
			//echo "ITALIANO";
			$_SESSION['LNG']="IT";
			header("Location: IT/index.php");
		break;
		
		case "en":
			//echo "INGLESE";
			$_SESSION['LNG']="EN";
			header("Location: EN/index.php");
		break;
		
		default:
			//echo "DEFAULT";
			$_SESSION['LNG']="EN";
			header("Location: EN/index.php");
		break;
	}
?>