<?php
	session_start();
	if(!isset($_SESSION['PWD']))
	{	
		if ($_SESSION['LNG'] == "IT")
			{
				header("Location: IT/LogIn.php");
			}
			else
			{	if ($_SESSION['LNG'] == "ES")
				{
					header("Location: ES/LogIn.php");
				}
				else
				{
					header("Location: EN/LogIn.php");
				}
			}
	}
?>
<HTML>
<HEAD>
	<TITLE>Cuofano_E-Commerce Creazione Data Base</TITLE>
	<?php 
	//---------------------------------------------------------------------------
	function InserisciCategoria ( $Nome )
	{	$sql = "INSERT INTO Categoria (NomeCategoria) VALUES ('". $Nome . "')"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $Nome . " inserito.<br>");
		else    	print ( $Nome . " NON inserito.<br>");
	}
	//---------------------------------------------------------------------------
	function InserisciColore ( $Nome )
	{	$sql = "INSERT INTO Colore (NomeColore) VALUES ('". $Nome . "')"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $Nome . " inserito.<br>");
		else    	print ( $Nome . " NON inserito.<br>");
	}
	//---------------------------------------------------------------------------
	function InserisciMateriale ( $Nome )
	{	$sql = "INSERT INTO Materiale (NomeMateriale) VALUES ('". $Nome . "')"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $Nome . " inserito.<br>");
		else    	print ( $Nome . " NON inserito.<br>");
	}
	//---------------------------------------------------------------------------
	function InserisciSconto ( $Nome )
	{	$sql = "INSERT INTO Sconto (NomeSconto) VALUES ('". $Nome . "')"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $Nome . " inserito.<br>");
		else    	print ( $Nome . " NON inserito.<br>");
	}
	//---------------------------------------------------------------------------
	function InserisciTaglia ( $Nome )
	{	$sql = "INSERT INTO Taglia (NomeTaglia) VALUES ('". $Nome . "')"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $Nome . " inserito.<br>");
		else    	print ( $Nome . " NON inserito.<br>");
	}
	//---------------------------------------------------------------------------
	function InserisciArticolo ( $Nome, $Tg, $Prz, $NDisp, $Img, $Materiale, $Colore, $Categor, $Sconto )
	{	$sql = "INSERT INTO Articolo (NomeArticolo, IdTaglia, PrezzoArticolo, NDisp, Immagine, IdMateriale, IdColore, IdCategoria, IdSconto) VALUES ('". $Nome . "','". $Tg . "','". $Prz . "','". $NDisp . "','". $Img . "','". $Materiale . "','". $Colore . "','". $Categor . "','". $Sconto ."')"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $Nome . " inserito.<br>");
		else    	print ( $Nome . " NON inserito.<br>");
	}
	?>  	
</HEAD>
<BODY>
	<?php
		//----------------------------------------------------------------------------
		// Se il Web Server non è attivo, la procedura è interrotta
		$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
		
		//----------------------------------------------------------------------------
		//  Verifico prima se il DB esiste		
		if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
		{	print ("Il Data Base 'Cuofano_ECommerce' è già presente.<br>");
		}
		else // se non esiste, lo creo
		{	MySQL_query ("CREATE DATABASE Cuofano_ECommerce");
			MySQL_select_db ("Cuofano_ECommerce", $ServerSQL);
			if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
			{	print ("Il Data Base 'Cuofano_ECommerce' creato.<br>");
			}
			else
			{	print ("Il Data Base 'Cuofano_ECommerce' NON creato.<br>");
			}
	    }
		
		//=============================================================================
		//  Costruzione delle tabelle
		$sql = "CREATE TABLE Categoria
				(	IdCategoria		INT  	 NOT NULL 	AUTO_INCREMENT,  
					NomeCategoria	CHAR(20) NOT NULL,
					PRIMARY KEY (IdCategoria) 		
				)";
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Categoria'.<br>");
		else  		              print ("Tabella 'Categoria' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Colore
				(	IdColore		INT  	 NOT NULL 	AUTO_INCREMENT,  
					NomeColore		CHAR(20) NOT NULL,
					PRIMARY KEY 	(IdColore) 		
				)";
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Colore'.<br>");
		else  		              print ("Tabella 'Colore' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Materiale
				(	IdMateriale		INT  	 NOT NULL 	AUTO_INCREMENT,  
					NomeMateriale	CHAR(20) NOT NULL,
					PRIMARY KEY (IdMateriale) 		
				)";
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Materiale'.<br>");
		else  		              print ("Tabella 'Materiale' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Taglia
				(	IdTaglia		INT  	 NOT NULL 	AUTO_INCREMENT,  
					NomeTaglia		CHAR(20) NOT NULL,
					PRIMARY KEY (IdTaglia) 		
				)";
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Taglia'.<br>");
		else  		              print ("Tabella 'Taglia' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Sconto
				(	IdSconto		INT  	 NOT NULL 	AUTO_INCREMENT,  
					NomeSconto		CHAR(20) NOT NULL,
					PRIMARY KEY (IdSconto) 		
				)";
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Sconto'.<br>");
		else  		              print ("Tabella 'Sconto' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Articolo 
				(	IdArticolo		INT 	  NOT NULL  AUTO_INCREMENT, 
					NomeArticolo 	CHAR(20)  NOT NULL, 
					IdTaglia		INT       NOT NULL,
					PrezzoArticolo  FLOAT	  NOT NULL,
					NDisp			INT       NOT NULL,
					Immagine    	CHAR(50)  NOT NULL,
					IdMateriale		INT       NOT NULL,
					IdColore		INT       NOT NULL,
					IdCategoria		INT       NOT NULL,
					IdSconto		INT       ,
					PRIMARY KEY (IdArticolo),
					FOREIGN KEY (IdTaglia)		REFERENCES Taglia		(IdTaglia),
					FOREIGN KEY (IdMateriale)	REFERENCES Materiale	(IdMateriale),
					FOREIGN KEY (IdColore)		REFERENCES Colore		(IdColore),
					FOREIGN KEY (IdCategoria)	REFERENCES Categoria	(IdCategoria),
					FOREIGN KEY (IdSconto)		REFERENCES Sconto		(IdSconto)
				)";	
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Articolo'.<br>");
		else            		  print ("Tabella 'Articolo' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Utente 
				(	IdUtente		INT 	  NOT NULL  AUTO_INCREMENT, 
					NomeUtente	 	CHAR(20)  NOT NULL, 
					CognomeUtente	CHAR(20)  NOT NULL,
					EMail 			CHAR(50)  NOT NULL,
					Citta			CHAR(50)  NOT NULL,
					Provincia		CHAR(20)  NOT NULL,
					Indirizzo		CHAR(50)  NOT NULL,
					Password		CHAR(20)  NOT NULL,
					Privilegi		INT 	  NOT NULL,
					PRIMARY KEY (IdUtente)
				)";	
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Utente'.<br>");
		else            		  print ("Tabella 'Utente' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Carrello 
				(	IdCarrello		INT 	  NOT NULL  AUTO_INCREMENT, 
					Giorno			INT		  NOT NULL, 
					Mese			INT		  NOT NULL,
					Anno			INT		  NOT NULL,
					NColli			INT		  ,
					Totale			INT		  ,
					Stato			INT 	  NOT NULL,
					IdUtente		INT 	  NOT NULL,
					PRIMARY KEY (IdCarrello),
					FOREIGN KEY (IdUtente)		REFERENCES Utente		(IdUtente)
				)";	
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Carrello'.<br>");
		else            		  print ("Tabella 'Carrello' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Compra 
				(	IdCompra	INT 	  NOT NULL  AUTO_INCREMENT, 
					NCopie		INT 	  NOT NULL, 
					IdCarrello	INT		  NOT NULL,   	
					IdArticolo	INT		  NOT NULL,  
					PRIMARY KEY (IdCompra),
					FOREIGN KEY (IdCarrello)   REFERENCES Carrello	 (IdCarrello),
					FOREIGN KEY (IdArticolo)   REFERENCES Articolo   (IdArticolo)
				)";
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Compra'.<br>");
		else            		  print ("Tabella 'Compra' NON aggiunta.<br>");
		
		//=============================================================================
		// Inserimento record per popolare le tabelle		
        InserisciCategoria ('Pantalone');   // IdCategoria = 1
        InserisciCategoria ('Felpa');       // IdCategoria = 2
        InserisciCategoria ('T-Shirt');     // IdCategoria = 3
        InserisciCategoria ('Jeans');       // IdCategoria = 4
		InserisciCategoria ('Scarpa');      // IdCategoria = 5
		//---------------------------------------------------------------------------
		InserisciColore ('Nero');         // IdColore = 1
        InserisciColore ('Grigio');       // IdColore = 2
        InserisciColore ('Blue');         // IdColore = 3
        InserisciColore ('Jeans');        // IdColore = 4
		InserisciColore ('Verde');        // IdColore = 5
		//----------------------------------------------------------------------------
		InserisciMateriale ('Cotone');        // IdMateriale = 1
        InserisciMateriale ('Acetato');       // IdMateriale = 2
        InserisciMateriale ('Poliestere');    // IdMateriale = 3
		InserisciMateriale ('Jeans');  		  // IdMateriale = 4
		//----------------------------------------------------------------------------
		InserisciTaglia ('S');			// IdTaglia = 1
        InserisciTaglia ('M');			// IdTaglia = 2
        InserisciTaglia ('L');			// IdTaglia = 3
        InserisciTaglia ('52');			// IdTaglia = 4
		InserisciTaglia ('48');			// IdTaglia = 5
		//----------------------------------------------------------------------------
		InserisciSconto ('0%');         // IdSconto = 1
        InserisciSconto ('20%');        // IdSconto = 2
        InserisciSconto ('30%');        // IdSconto = 3
        //----------------------------------------------------------------------------
		InserisciArticolo  ('Moon',  4, 16.50, 20, '../ArtImg/Pantalone1.jpg', 1, 3, 1, 1 );		// IdArticolo = 1		// Pantaloni
		InserisciArticolo  ('Denim', 5, 18.00, 50, '../ArtImg/Jeans1.jpg', 4, 4, 1, 2 );	    	// IdArticolo = 2		// Jeans
		InserisciArticolo  ('Pablo', 2, 15.80, 10, '../ArtImg/Felpa4.jpg', 3, 1, 2, 1 );			// IdArticolo = 3		// Felpe
		InserisciArticolo  ('Javier', 3, 15.00, 0, '../ArtImg/Felpa1.jpg', 2, 3, 2, 1 );			// IdArticolo = 4
		InserisciArticolo  ('Rispox', 3, 17.00, 12, '../ArtImg/Felpa2.jpg', 2, 3, 2, 3 );			// IdArticolo = 5
		InserisciArticolo  ('Jorge', 3, 17.00, 5, '../ArtImg/Felpa3.jpg', 2, 3, 2, 3 );				// IdArticolo = 6
		InserisciArticolo  ('Old School', 1, 10.30, 10, '../ArtImg/T-Shirt1.jpg', 1, 1, 3, 1 );		// IdArticolo = 7		// T-Shirt
		InserisciArticolo  ('Moster Dc', 5, 50.00, 7, '../ArtImg/Dc4.jpg', 3, 1, 5, 1 );			// IdArticolo = 8		// Scarpe
		InserisciArticolo  ('Buster Dc', 5, 30.00, 14, '../ArtImg/Dc1.jpg', 3, 1, 5, 3 );			// IdArticolo = 9		
		InserisciArticolo  ('Kaleb Dc', 5, 20.00, 21, '../ArtImg/Dc3.jpg', 3, 2, 5, 1 );			// IdArticolo = 10	
		//----------------------------------------------------------------------------
		MySQL_query ("INSERT INTO Utente(NomeUtente, CognomeUtente, EMail, Citta, Provincia, Indirizzo, Password, Privilegi) VALUES ('SuperUser', 'Peppe', 'superuser.peppe@gmail.com', 'Olbia', 'Sassari', 'Tonino Carramone 14', 'Master19', 1) ");
		//----------------------------------------------------------------------------
		MySQL_query ("INSERT INTO Utente(NomeUtente, CognomeUtente, EMail, Citta, Provincia, Indirizzo, Password, Privilegi) VALUES ('Alessandro', 'Grimaldi', 'Grimi.Alex@gmail.com', 'Ercolano', 'Napoli', 'Tonino Carramone 15', 'CiroRauso', 2) ");
		//----------------------------------------------------------------------------
		MySQL_close ($ServerSQL);
	?>
	<hr size="2" color="#0066CC">
	<!--Home-->
	<?php
	if ($_SESSION['LNG'] == "IT")
	{
		echo '<a href="IT/AdminPanelPro.php">Home</a>';
	}
	else
	{	if ($_SESSION['LNG'] == "ES")
		{
			echo '<a href="ES/AdminPanelPro.php">Home</a>';
		}
		else
		{
			echo '<a href="EN/AdminPanelPro.php">Home</a>';
		}
	}
	?>
</BODY>
</HTML>