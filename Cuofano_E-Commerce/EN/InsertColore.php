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
	<TITLE>Insert Color in Cuofano_ECommerce</TITLE>
	<!-- Style -->
    <link rel="stylesheet" type="text/css" href="../css/simple.css" media="screen" />
</HEAD>
<BODY>
<p align="center"><a href="index.php"><img class="home" src="../img/Logo.png"></a></p>
<fieldset>

     <legend>Insert A New Color</legend>

	<br>
	<?php
		//----------------------------------------------------------------------------
		// Se il DB Server non è attivo, la procedura è interrotta
		$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
			  
		//----------------------------------------------------------------------------
		//  Verifico prima se il DB esiste		
		if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
		{	
			$sql = "INSERT INTO Colore (NomeColore) " . 
			       "VALUES ('". $_REQUEST['NomeColore'] . "') ";
			if ( MySQL_query ($sql) ) 
				print ("<p>Color ( ".$_REQUEST['NomeColore'] .") insert.</p><br>" );
		}
	    else
		{   print ("Data Base 'Cuofano_ECommerce' not exist!<br>");
		}
		MySQL_close ($ServerSQL);
	?>
	
	<br>
	<hr size="2" color="#0066CC">
	<a href="InsertCategoriaForm.php">Insert An Other Color</a><br>
	<a href="AdminPanelPro.php">Back To AdminPanel</a>
 </fieldset>
</BODY>
</HTML>