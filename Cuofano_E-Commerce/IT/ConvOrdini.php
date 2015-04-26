<?php
	session_start();
	$_SESSION['LNG']="IT";
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
		
		//Se non esiste già il carrello di $IdUtente, aggiorniamo lo stato della lista desideri
		$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 2";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	
			$riga = MySQL_fetch_array($ris);
			if ( $riga )
			{
				print ("L` Ordine di ". $NomeUtente ." e` gia` PRESENTE<br>" );
				//associo gli articoli all Ordine già esistente eliminando il Carrello
				$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 1";
				$ris = MySQL_query ($sql);
				if ( $ris )
				{
					$riga = MySQL_fetch_array($ris);
					if ( $riga )
					{
						$IdCarrello = $riga['IdCarrello'];
						$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 2";
						$ris = MySQL_query ($sql);
						if ( $ris )
						{
							$riga = MySQL_fetch_array($ris);
							if ( $riga )
							{
								$IdOrdine = $riga['IdCarrello'];
								//Associamo l`ID del Carrello agli articolo della Lista Desideri
								$sql = "UPDATE Compra SET IdCarrello = ". $IdOrdine ." WHERE IdCarrello = ". $IdCarrello ." ";
								$ris = MySQL_query ($sql);
								if ( $ris )
								{	
									print ("Gli Aricoli sono sono stati spostati nell Ordine.<br>" );
									//Associamo l`ID del Carrello agli articolo della Lista Desideri
									$sql = "DELETE FROM Carrello WHERE IdCarrello = ". $IdCarrello ." ";
									$ris = MySQL_query ($sql);
									if ( $ris )
									{	
										print ("Il Carrello cod.". $IdCarrello ." e`stato ELIMINATO.<br>" );
									}
								}
							}
						}
					}
				}
			}
			else
			{
				$sql = "UPDATE Carrello SET Stato = 2 WHERE IdUtente = ". $IdUtente ." AND Stato = 1";
				$ris = MySQL_query ($sql);
				if ( $ris )
				{	
					print ("Il Carrello di ". $NomeUtente ." e`stato convertito in Ordine.<br>" );
				}
			}
		}
		header("Location: Ordini.php");
	}
	else
	{   print ("Data Base 'Cuofano_ECommerce' non esiste!<br>");
	}
	MySQL_close ($ServerSQL);
?>
<!--Giancarmine Cuofano-->
<!doctype html>
<!--Quinta Ainf 2013/14-->