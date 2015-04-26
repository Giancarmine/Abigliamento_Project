<?php
	session_start();
	if(!isset($_SESSION['PWD']))
	{	
		if ($_SESSION['LNG'] == "IT")
			{
				header("Location: ../IT/LogIn.php");
			}
			else
			{	if ($_SESSION['LNG'] == "ES")
				{
					header("Location: ../ES/LogIn.php");
				}
				else
				{
					header("Location: ../EN/LogIn.php");
				}
			}
	}
?>
<HTML>
<HEAD>
	<TITLE>Poner Descuento in Cuofano_ECommerce</TITLE>
	<!-- Style -->
    <link rel="stylesheet" type="text/css" href="../css/simple.css" media="screen" />
</HEAD>
<BODY>
<p align="center"><a href="index.php"><img class="home" src="../img/Logo.png"></a></p>
<fieldset>

     <legend>Poner Nuevo Descuento</legend>

	<br>
	<?php
		//----------------------------------------------------------------------------
		// Se il DB Server non è attivo, la procedura è interrotta
		$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
			  
		//----------------------------------------------------------------------------
		//  Verifico prima se il DB esiste		
		if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
		{	
			$sql = "INSERT INTO Sconto (NomeSconto) " . 
			       "VALUES ('". $_REQUEST['NomeSconto'] . "') ";
			if ( MySQL_query ($sql) ) 
				print ("<p>Descuento ( ".$_REQUEST['NomeSconto'] .") posto.</p><br>" );
		}
	    else
		{   print ("Data Base 'Cuofano_ECommerce' no existe!<br>");
		}
		MySQL_close ($ServerSQL);
	?>
	
	<br>
	<hr size="2" color="#0066CC">
	<a href="InsertMaterialeForm.php">Poner Otro Descuento</a><br>
	<a href="AdminPanelPro.php">Volver Al AdminPanel</a>
 </fieldset>
</BODY>
</HTML>