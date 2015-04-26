<?php
	session_start();
	unset($_SESSION["PASS"]);
	unset($_SESSION["PWD"]);
	header("Location: LogIn.php");
?>
<!--Giancarmine Cuofano-->
<!DOCTYPE html>
<!--Qinta Ainf 2013/14-->