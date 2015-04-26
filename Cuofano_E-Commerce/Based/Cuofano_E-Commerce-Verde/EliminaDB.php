<?php
	session_start();
	if(!isset($_SESSION['PWD']))
	{	header("Location: LogIn.php");
	}
?>
<HTML>
<HEAD>
	<TITLE>Cuofano_Atletica Eliminazione Data Base</TITLE>
</HEAD>
<BODY>
	<?php
		//----------------------------------------------------------------------------
		// Se il Web Server non è attivo, la procedura è interrotta
		$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");

			//----------------------------------------------------------------------------
		//  Verifico prima se il DB esiste		
		if ( MySQL_select_db ("CampionatoAtletica", $ServerSQL) )
 		{	print ("Il Data Base 'CampionatoAtletica' verrà cancellato.<br>");
			MySQL_query ("DROP DATABASE CampionatoAtletica");
		    print ("Data Base 'CampionatoAtletica' ELIMINATO!<br>");
	    }
	    else
		{   print ("Data Base 'CampionatoAtletica' non esiste!<br>");
		}
		MySQL_close ($ServerSQL);
	?>
	
	<hr size="2" color="#0066CC">
	<a href="AdminPanel.php"><img border="0" src="images\Home.gif"></a>
</BODY>
</HTML>