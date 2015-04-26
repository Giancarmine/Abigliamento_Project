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
		
		//Se non esiste già il carrello di $IdUtente, lo creo
		$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 1 AND Stato = 2";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	
			$riga = MySQL_fetch_array($ris);
			if ( $riga )
			{
				print ("Il Carrello di ". $NomeUtente ." e` gia` PRESENTE<br>" );
				// Recupera data
				$oggi = getdate();
				$giorno = $oggi['mday'] ;
				$mese = $oggi['mon'] ;
				$anno = $oggi['year'] ;
				$sql = "UPDATE Carrello SET Giorno = ".$giorno."  Mese = ".$mese."  Anno = ". $anno ." WHERE IdCarrello = ".$riga[IdCarrello]." ";
				if ( MySQL_query ($sql) ) 
					print ("Il Carrello di ". $NomeUtente ." e` stato AGGIORNATO.<br>" );
			}
			else 
			{
				// Recupera data
				$oggi = getdate();
				$giorno = $oggi['mday'] ;
				$mese = $oggi['mon'] ;
				$anno = $oggi['year'] ;
				
				$sql = "INSERT INTO Carrello (Giorno, Mese, Anno, Stato, IdUtente) VALUES ('". $giorno ."',
						'". $mese . "',
						'". $anno ."',
						'1',
						'". $IdUtente . "')" ;
				if ( MySQL_query ($sql) ) 
					print ("Il Carrello di ". $NomeUtente ." e` stato INSERITO.<br>" );
			}
		}
		
		//Inserisco in Compra l' occorenza del articolo richiesto
		$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 1 ";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	
			while ($riga = MySQL_fetch_array($ris))
			{
				$IdCarrello = $riga['IdCarrello'];
				$NomeArticolo = $_REQUEST['NomeArticolo'];
				$sql = "SELECT * FROM Articolo WHERE NomeArticolo = '". $NomeArticolo ."' ";
				$ris = MySQL_query ($sql);
				if ( $ris )
				{	
					$riga = MySQL_fetch_array($ris);
					if ($riga)
					{
						$IdArticolo = $riga['IdArticolo'];
						$NCopie = $_REQUEST['Quantita'];
						echo "<br>".$IdArticolo."<br>";
						$sql = "INSERT INTO Compra (NCopie, IdCarrello, IdArticolo) VALUES ('". $NCopie ."',
								'". $IdCarrello . "',
								'". $IdArticolo . "')" ;
						if ( MySQL_query ($sql) )
						{
							print ("L'Articolo di ". $NomeArticolo ." e` stato INSERITO.<br>" );
						}
					}
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