<?php
	session_start();
	$_SESSION['LNG']="ES";
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
		
		//Se non esiste già la lista desideri di $IdUtente, lo creo
		$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 0";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	
			$riga = MySQL_fetch_array($ris);
			if ( $riga )
			{
				print ("La Lista Desideri di ". $NomeUtente ." e` gia` PRESENTE<br>" );
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
						'0',
						'". $IdUtente . "')" ;
				if ( MySQL_query ($sql) ) 
					print ("La Lista Desideri di ". $NomeUtente ." e` stato INSERITA.<br>" );
			}
		}
		
		//Inserisco in Compra l' occorenza del articolo richiesto
		$sql = "SELECT * FROM Carrello WHERE IdUtente = ". $IdUtente ." AND Stato = 0 ";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	
			while ($riga = MySQL_fetch_array($ris))
			{
				$ListaDesideri = $riga['IdCarrello'];
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
								'". $ListaDesideri . "',
								'". $IdArticolo . "')" ;
						if ( MySQL_query ($sql) ) 
							print ("L'Articolo di ". $NomeArticolo ." e` stato INSERITO.<br>" );
					}
				}
			}
		}
		header("Location: ListaDesideri.php");
	}
	else
	{   print ("Data Base 'Cuofano_ECommerce' non esiste!<br>");
	}
	MySQL_close ($ServerSQL);
?>
<!--Giancarmine Cuofano-->
<!doctype html>
<!--Quinta Ainf 2013/14-->