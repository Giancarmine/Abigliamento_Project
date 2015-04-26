<?php
	session_start();
	if(!isset($_SESSION['PWD']))
	{	header("Location: Index.php");
	}
?>
<HTML>
<HEAD>
	<TITLE>Cuofano_Atletica Creazione Data Base</TITLE>
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
	function InserisciAtleta ( $Nome, $Naz )
	{	$sql = "INSERT INTO Atleti (NomeAtleta, IdNazione) VALUES ('". $Nome . "','".$Naz."')"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $Nome . " inserito.<br>");
		else    	print ( $Nome . " NON inserito.<br>");
	}
	//---------------------------------------------------------------------------
	function InserisciGara ( $Nome )
	{	$sql = "INSERT INTO Gare (Sport) VALUES ('". $Nome ."')"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $Nome . " inserito.<br>");
		else    	print ( $Nome . " NON inserito.<br>");
	}
	//---------------------------------------------------------------------------
	function InserisciPartecipa ( $A, $G, $P )
	{	$sql = "INSERT INTO Partecipa (IdAtleta, IdGara, Posto) 
					   VALUES (". $A . ", " . $G . ", " . $P . ")"; 
		$ris = MySQL_query($sql);
		if ($ris )	print ( $A . $G . $P . " inserito.<br>");
		else    	print ( $A . $G . $P . " NON inserito.<br>");
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
		if ( MySQL_select_db ("Cuofano_E-Commerce", $ServerSQL) )
		{	print ("Il Data Base 'Cuofano_E-Commerce' è già presente.<br>");
		}
		else // se non esiste, lo creo
		{	MySQL_query ("CREATE DATABASE Cuofano_E-Commerce");
			MySQL_select_db ("Cuofano_E-Commerce", $ServerSQL);
		    print ("Data Base 'Cuofano_E-Commerce' creato.<br>");
	    }
		
		//=============================================================================
		//  Costruzione delle tabelle
		$sql = "CREATE TABLE Categoria
				(	IdCategoria	INT  	 NOT NULL 	AUTO_INCREMENT,  
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
		$sql = "CREATE TABLE Atleti 
				(	IdAtleta	INT 	  NOT NULL  AUTO_INCREMENT, 
					NomeAtleta 	CHAR(20)  NOT NULL, 
					IdNazione   INT       NOT NULL,
					PRIMARY KEY (IdAtleta),
					FOREIGN KEY (IdNazione) REFERENCES Nazioni (IdNazione)
				)";	
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Atleti'.<br>");
		else            		  print ("Tabella 'Atleti' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Gare 
				(	IdGara 		INT       NOT NULL  AUTO_INCREMENT, 
					Sport 		CHAR(20)  NOT NULL, 
					PRIMARY KEY (IdGara) 
				)";
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Gare'.<br>");
		else            		  print ("Tabella 'Gare' NON aggiunta.<br>");
		//----------------------------------------------------------------------------
		$sql = "CREATE TABLE Partecipa 
				(	IdPartecipa	INT 	  NOT NULL  AUTO_INCREMENT, 
					IdAtleta	INT 	  NOT NULL, 
					IdGara		INT 	  NOT NULL,
					Posto		INT,   	   
					PRIMARY KEY (IdPartecipa),
					FOREIGN KEY (IdAtleta) REFERENCES Atleti (IdAtleta),
					FOREIGN KEY (IdGara)   REFERENCES Gare   (IdGara)
				)";
		if ( MySQL_query ($sql) ) print ("Aggiunta la tabella 'Partecipa'.<br>");
		else            		  print ("Tabella 'Partecipa' NON aggiunta.<br>");
		
		//=============================================================================
		// Inserimento record per popolare le tabelle		
        InserisciCategoria ('Pantaloni');   // IdCategoria = 1
        InserisciCategoria ('Felpe');       // IdCategoria = 2
        InserisciCategoria ('T-Shirt');     // IdCategoria = 3
        InserisciCategoria ('Jeans');       // IdCategoria = 4
		InserisciCategoria ('Giubbini');    // IdCategoria = 5
		//----------------------------------------------------------------------------
		InserisciColore ('Verde');        // IdColore = 1
        InserisciColore ('Rosso');        // IdColore = 2
        InserisciColore ('Blue');         // IdColore = 3
        InserisciColore ('Giallo');       // IdColore = 4
		InserisciColore ('Arancione');    // IdColore = 5
		//----------------------------------------------------------------------------
		InserisciMateriale ('Cotone');        // IdColore = 1
        InserisciMateriale ('Acetato');       // IdColore = 2
        InserisciMateriale ('Poliestere');    // IdColore = 3
		//----------------------------------------------------------------------------
		InserisciColore ('Verde');        // IdColore = 1
        InserisciColore ('Rosso');        // IdColore = 2
        InserisciColore ('Blue');         // IdColore = 3
        InserisciColore ('Giallo');       // IdColore = 4
		InserisciColore ('Arancione');    // IdColore = 5
		//----------------------------------------------------------------------------
		InserisciAtleta  ('Antonio', 1 ); // IdAtleta = 1
		InserisciAtleta  ('Giorgio', 1 ); // IdAtleta = 2
		InserisciAtleta  ('Pablo',   2 ); // IdAtleta = 3
		InserisciAtleta  ('Javier',  2 ); // IdAtleta = 4
		InserisciAtleta  ('Jorge',   3 ); // IdAtleta = 5
		InserisciAtleta  ('Adriano', 3 ); // IdAtleta = 6
		InserisciAtleta  ('Socrate', 4 ); // IdAtleta = 7
		InserisciAtleta  ('Ulisse',  4 ); // IdAtleta = 8
		InserisciAtleta  ('Achille', 4 ); // IdAtleta = 9
		InserisciAtleta  ('Enrico',  1 ); // IdAtleta = 10
		InserisciAtleta  ('Kaleb',   5 ); // IdAtleta = 11
		
		//----------------------------------------------------------------------------
        InserisciGara    ('Salto');       // IdGara = 1
        InserisciGara    ('Corsa');       // IdGara = 2
        InserisciGara    ('Lancio');      // IdGara = 3
		//----------------------------------------------------------------------------
		InserisciPartecipa (1, 1, 1);  // Salto
		InserisciPartecipa (2, 1, 2);
		InserisciPartecipa (4, 1, 3);
		InserisciPartecipa (8, 1, 4);
		InserisciPartecipa (7, 1, 5);
		InserisciPartecipa (9, 1, 6);
		InserisciPartecipa (9, 2, 1);  // Corsa
		InserisciPartecipa (3, 2, 2); 
		InserisciPartecipa (5, 2, 3); 
		InserisciPartecipa (6, 2, 4); 
		InserisciPartecipa (7, 2, 5); 
		InserisciPartecipa (2, 2, 6); 
		InserisciPartecipa (1, 3, 1);  // Lancio
		InserisciPartecipa (2, 3, 2);  
		InserisciPartecipa (3, 3, 3);  
		InserisciPartecipa (4, 3, 4);  
		InserisciPartecipa (5, 3, 5);  
		InserisciPartecipa (6, 3, 6);  
		//----------------------------------------------------------------------------
		MySQL_close ($ServerSQL);
	?>
	<hr size="2" color="#0066CC">
	<a href="AdminPanel.php"><img border="0" src="images\Home.gif"></a>
</BODY>
</HTML>