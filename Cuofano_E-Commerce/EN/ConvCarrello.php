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
		
		//Se non esiste già il carrello di $IdUtente, aggiorniamo lo stato della lista desideri
		$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 1";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	
			$riga = MySQL_fetch_array($ris);
			if ( $riga )
			{
				print ("Il Carrello di ". $NomeUtente ." e` gia` PRESENTE<br>" );
				//associo gli articoli al carrello già esistente eliminando la Lista Desideri
				$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 0";
				$ris = MySQL_query ($sql);
				if ( $ris )
				{
					$riga = MySQL_fetch_array($ris);
					if ( $riga )
					{
						$IdLista = $riga['IdCarrello'];
						$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 1";
						$ris = MySQL_query ($sql);
						if ( $ris )
						{
							$riga = MySQL_fetch_array($ris);
							if ( $riga )
							{
								$IdCarrello = $riga['IdCarrello'];
								//Associamo l`ID del Carrello agli articolo della Lista Desideri
								$sql = "UPDATE Compra SET IdCarrello = ". $IdCarrello ." WHERE IdCarrello = ". $IdLista ." ";
								$ris = MySQL_query ($sql);
								if ( $ris )
								{	
									print ("Gli Aricoli sono sono stati spostati nel Carrello.<br>" );
									//Associamo l`ID del Carrello agli articolo della Lista Desideri
									$sql = "DELETE FROM Carrello WHERE IdCarrello = ". $IdLista ." ";
									$ris = MySQL_query ($sql);
									if ( $ris )
									{	
										print ("La Lista Desideri cod.". $IdLista ." e` stata ELIMINATA.<br>" );
									}
								}
							}
						}
					}
				}
			}
			else
			{
				$sql = "UPDATE Carrello SET Stato = 1 WHERE IdUtente = ". $IdUtente ." AND Stato = 0";
				$ris = MySQL_query ($sql);
				if ( $ris )
				{	
					print ("La Lista Desideri di ". $NomeUtente ." e` stata convertita in carrello.<br>" );
				}
			}
		}
		header("Location: Carrello.php");
	}
	else
	{   print ("Data Base 'Cuofano_ECommerce' non esiste!<br>");
	}
	MySQL_close ($ServerSQL);
?>
<!--Giancarmine Cuofano-->
<!doctype html>
<!--Quinta Ainf 2013/14-->