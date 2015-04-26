<?php
	session_start();
	$_SESSION['LNG']="EN";
	if(!isset($_SESSION['PASS']))
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
		if(isset($_SESSION['PASS']))
		{
			$NomeUtente = $_SESSION['PASS'];
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
		if ( $_REQUEST['Citta'] )
		{
			$sql = "UPDATE Utente SET Citta = '".$_REQUEST['Citta'] . "'WHERE IdUtente = ". $IdUtente ." ";
			$ris = MySQL_query ($sql);
			if ( $ris )
			{	
				print ("Your City was UPDATE.<br>" );
			}
		}
		if ( $_REQUEST['Provincia'] )
		{
			$sql = "UPDATE Utente SET Provincia = '".$_REQUEST['Provincia'] . "'WHERE IdUtente = ". $IdUtente ." ";
			$ris = MySQL_query ($sql);
			if ( $ris )
			{	
				print ("Your Province was UPDATE.<br>" );
			}
		}
		if ( $_REQUEST['Password'] )
		{
			$sql = "UPDATE Utente SET Password = '".$_REQUEST['Password'] . "'WHERE IdUtente = ". $IdUtente ." ";
			$ris = MySQL_query ($sql);
			if ( $ris )
			{	
				print ("Your Password was UPDATE.<br>" );
			}
		}
		if ( $_REQUEST['Citta'] )
		{
			$sql = "UPDATE Utente SET Indirizzo = '".$_REQUEST['Indirizzo'] . "' WHERE IdUtente = ". $IdUtente ." ";
			$ris = MySQL_query ($sql);
			if ( $ris )
			{	
				print ("Your Address was UPDATE.<br>" );
			}
		}
	
		echo "<a href='Index.php' >Home</a>";
	}
	else
	{   print ("Data Base 'Cuofano_ECommerce' not exist!<br>");
	}
	MySQL_close ($ServerSQL);
?>
<!--Giancarmine Cuofano-->
<!doctype html>
<!--Quinta Ainf 2013/14-->