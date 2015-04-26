<?php
	session_start();
	$_SESSION['LNG']="EN";
	if(!isset($_SESSION['PWD']) && !isset($_SESSION['PASS']))
	{	
		header("Location: LogIn.php");
	}
	//----------------------------------------------------------------------------
	// Se il DB Server non è attivo, la procedura è interrotta
	$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
		  
	//----------------------------------------------------------------------------
	//  Verifico prima se il DB esiste		
	if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
	{	
		//Recupero il nome utente
		if(isset($_SESSION['PASS']) || isset($_SESSION['PWD']))
		{
			if(isset($_SESSION['PASS']))
			{
				$NomeUtente = $_SESSION['PASS'];
			}
			else
			{
				$NomeUtente = $_SESSION['PWD'];
			}
		}
		$sql =	"SELECT	* ".
				"FROM	Utente ". 
				"WHERE	'".$NomeUtente."' = NomeUtente";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	
			$riga = MySQL_fetch_array($ris);
			if ($riga)
			{	
				$IdUtente = $riga['IdUtente'];
			}
		}
		$IdOrdine = $_REQUEST['IdCarrello'];		
		//Associamo l`ID del Carrello agli articolo della Lista Desideri
		$sql = "UPDATE Carrello SET Stato = 3 WHERE IdCarrello = ". $IdOrdine ." ";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	
			print ("Orders cod.". $IdOrdine ." was SHIPPED.<br>" );
		}
		header("Location: GestisciOrdini.php");
	}
	else
	{   print ("Data Base 'Cuofano_ECommerce' non esiste!<br>");
	}
	MySQL_close ($ServerSQL);
?>
<!--Giancarmine Cuofano-->
<!doctype html>
<!--Quinta Ainf 2013/14-->