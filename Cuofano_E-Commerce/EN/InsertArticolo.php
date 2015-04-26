<?php
	session_start();
	if(!isset($_SESSION['PWD']))
	{	
		header("Location: LogIn.php");
	}
?>
<HTML>
<HEAD>
	<TITLE>Insert Article in Cuofano_ECommerce</TITLE>
	<!-- Style -->
    <link rel="stylesheet" type="text/css" href="../css/simple.css" media="screen" />
</HEAD>
<BODY>
<p align="center"><a href="index.php"><img class="home" src="../img/Logo.png"></a></p>
<fieldset>

     <legend>Insert of a New Article</legend>

	<br>
	<?php
	// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
	// of $_FILES.

	$uploaddir = '../ArtImg/';//<----This is all I changed
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	echo '<pre>';
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "File is valid, and was successfully uploaded.\n";
	} else {
		echo "Possible file upload attack!\n";
	}

	echo 'Here is some more debugging info:';
	print_r($_FILES);

	print "</pre>";
	
		//----------------------------------------------------------------------------
		// Se il DB Server non è attivo, la procedura è interrotta
		$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
			  
		//----------------------------------------------------------------------------
		//  Verifico prima se il DB esiste		
		if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
		{	
			$sql = "INSERT INTO Articolo (NomeArticolo, IdTaglia, PrezzoArticolo, NDisp, Immagine, IdMateriale, IdColore, IdCategoria, IdSconto) VALUES ('". $_REQUEST['NomeArticolo'] ."', 
			'".$_REQUEST['IdTaglia'] . "',
			'".$_REQUEST['PrezzoArticolo'] ."',
			'".$_REQUEST['NDisp'] . "',
			'".$uploadfile ."',
			'".$_REQUEST['IdMateriale'] . "',
			'".$_REQUEST['IdColore'] ."',
			'".$_REQUEST['IdCategoria'] . "',
			'".$_REQUEST['IdSconto'] . "')" ;
			if ( MySQL_query ($sql) ) 
				print ("Article  (".$_REQUEST['NomeArticolo'].") insert.<br>" );
		}
	    else
		{   print ("Data Base 'Cuofano_ECommerce' not exist!<br>");
		}
		MySQL_close ($ServerSQL);
	?>
	
	<br>
	<hr size="2" color="#0066CC">
	<a href="InsertArticoloForm.php">Insert An Other Article</a><br>
	<a href="AdminPanelPro.php">Back To AdminPanel</a>
 </fieldset>
</BODY>
</HTML>