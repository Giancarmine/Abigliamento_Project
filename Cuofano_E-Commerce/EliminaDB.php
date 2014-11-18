<?php
	session_start();
	if(!isset($_SESSION['PWD']))
	{	header("Location: LogIn.php");
	}
?>
<HTML>
<HEAD>
	<TITLE>Cuofano_E-Commerce Eliminazione Data Base</TITLE>
</HEAD>
<BODY>
	<?php
		//----------------------------------------------------------------------------
		// Se il Web Server non è attivo, la procedura è interrotta
		$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");

			//----------------------------------------------------------------------------
		//  Verifico prima se il DB esiste		
		if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
 		{	print ("Il Data Base 'Cuofano_ECommerce' verrà cancellato.<br>");
			MySQL_query ("DROP DATABASE Cuofano_ECommerce");
		    print ("Data Base 'Cuofano_ECommerce' ELIMINATO!<br>");
	    }
	    else
		{   print ("Data Base 'Cuofano_ECommerce' non esiste!<br>");
		}
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
