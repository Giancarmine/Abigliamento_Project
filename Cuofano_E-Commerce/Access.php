<?php
	session_start();
	//----------------------------------------------------------------------------
	// Se il Web Server non è attivo, la procedura è interrotta
	$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
		  
	//----------------------------------------------------------------------------
	if ( MySQL_select_db ("Cuofano_ECommerce", $ServerSQL) )
	{
		$EMail = $_REQUEST['Mail'];
		$password = $_REQUEST['Pwd'];
		//----------------------------------------------------------------------------
		//Controllo se il nome utente è presente
		$sql =	"SELECT	* ".
				"FROM	Utente  ". 
				"WHERE	'".$EMail."' = EMail AND '".$password."' = Password ";
		$ris = MySQL_query ($sql);
		if ( $ris )
		{	$riga = MySQL_fetch_array($ris);
			if ($riga['Privilegi'] == 1)
			{	$_SESSION['PWD']= $riga['NomeUtente'];
				if ($_SESSION['LNG'] == "IT")
				{
					header("Location: IT/AdminPanelPro.php");
				}
				else
				{	if ($_SESSION['LNG'] == "ES")
					{
						header("Location: ES/AdminPanelPro.php");
					}
					else
					{
						header("Location: EN/AdminPanelPro.php");
					}
				}
			}
			else 
			{	
				if ($riga['Privilegi'] == 2)
				{	
					$_SESSION['PASS']= $riga['NomeUtente'];
					if ($_SESSION['LNG'] == "IT")
					{
						header("Location: IT/Index.php");
					}
					else
					{	if ($_SESSION['LNG'] == "ES")
						{
							header("Location: ES/Index.php");
						}
						else
						{
							header("Location: EN/Index.php");
						}
					}
				}
				else
					header('Location: LogOut.php');
			}
		}
		else
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
		//----------------------------------------------------------------------------
	}
	else
	{   
		print ("Data Base 'Cuofano_ECommerce' NOT EXIST!<br>");
	}
	MySQL_close ($ServerSQL);
?>
<!--Giancarmine Cuofano-->
<!DOCTYPE html>
<!--Qinta Ainf 2013/14--> 	
