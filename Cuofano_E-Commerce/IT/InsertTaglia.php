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
	<TITLE>Inserimento Taglia in Cuofano_ECommerce</TITLE>
	<!-- Style -->
    <link rel="stylesheet" type="text/css" href="../css/simple.css" media="screen" />
</HEAD>
<BODY>
<p align="center"><a href="index.php"><img class="home" src="../img/Logo.png"></a></p>
<fieldset>

     <legend>Inserimento Di Una Nuova Taglia</legend>

	<br>
	<?php
		//----------------------------------------------------------------------------
		// Se il DB Server non � attivo, la procedura � interrotta
		$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
			  
		//----------------------------------------------------------------------------
		//  Verifico prima se il DB esiste		
		if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
		{	
			$sql = "INSERT INTO Taglia (NomeTaglia) " . 
			       "VALUES ('". $_REQUEST['NomeTaglia'] . "') ";
			if ( MySQL_query ($sql) ) 
				print ("<p>Taglia ( ".$_REQUEST['NomeTaglia'] .") inserito.</p><br>" );
		}
	    else
		{   print ("Data Base 'Cuofano_ECommerce' non esiste!<br>");
		}
		MySQL_close ($ServerSQL);
	?>
	
	<br>
	<hr size="2" color="#0066CC">
	<a href="InsertMaterialeForm.php">Inserisci Un Altra Taglia</a><br>
	<a href="AdminPanelPro.php">Torna Al AdminPanel</a>
 </fieldset>
</BODY>
</HTML>