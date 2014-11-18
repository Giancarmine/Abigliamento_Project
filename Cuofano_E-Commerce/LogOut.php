<?php
	session_start();
	unset($_SESSION["PASS"]);
	unset($_SESSION["PWD"]);
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
?>
<!--Giancarmine Cuofano-->
<!DOCTYPE html>
<!--Qinta Ainf 2013/14-->
