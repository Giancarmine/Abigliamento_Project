<?php
	session_start();
	if(isset($_SESSION['PASS'])||isset($_SESSION['PWD']))
	header("Location: LogOut.php");
?>
<!--Giancarmine Cuofano-->
<!DOCTYPE html>
<!--Qinta Ainf 2013/14--> 	
<!------------------------------------------------------------------------------------
In occasioni del “Campionato Mondiale di Atletica”, la società organizzatrice desidera 
realizzare un sistema informatico per la gestione delle gare e degli atleti. 
Il DB deve memorizzare le informazioni degli Atleti, delle Specialità (sono esclusi 
sport di squadra) e delle Gare (solo la fase finale); al termine di ogni gara i giudici 
registrano il piazzamento di ogni atleta. 
Il candidato, fatte le opportune ipotesi aggiuntive, realizzi: 

1	Un’analisi della realtà di riferimento, motivando la scelta della soluzione proposta.
2	Uno schema concettuale della base di dati.
3	Uno schema logico della base di dati.
4	La definizione delle relazioni della base di dati in linguaggio SQL.
5	Le seguenti interrogazioni espresse in linguaggio SQL:
	•	stampare l’elenco degli atleti raggruppati per Nazioni per ogni singola Specialità.
	•	indicare la Nazione che ha presentato più atleti.
	•	indicare la Nazione che partecipa a più gare.
	•	stampare la classifica per ciascuna gara, con Atleta e Nazionalità.
	•	dato il nome di un atleta stampare i risultati ottenuti nelle diverse 
	    gare alle quali ha partecipato.
	•	data una specialità, indicare gli atleti vincitori delle tre medaglie.
	•	stampare l’elenco delle Nazioni con il totale delle medaglie vinte.
6	L’interfaccia utente che il candidato intende proporre per interagire con la base 
    di dati e codificare in un linguaggio di programmazione a scelta un segmento 
	significativo del progetto realizzato. 
7	Un sito Internet che presenti al pubblico le classifiche delle diverse gare. 
------------------------------------------------------------------------------------->
<HTML>
<HEAD>
	<TITLE>Campionato di Atletica Leggera</TITLE>
	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="css/simple.css" media="screen" />
</HEAD>

<BODY>
<p align="center"><a href="index.php"><img class="home" src="img/Logo.png"></a></p>
 <fieldset style="width: 200px; margin:auto;">
    <legend>LogIn Cuofano_Atletica</legend>
	
	<FORM NAME="Insert" METHOD="Post" ACTION="Access.php">
		<TABLE>
			<tr><th style="text-align: left;">User</th></tr><tr><td><INPUT TYPE="text" NAME="Usr"></td></tr>
			<tr><th style="text-align: left;">Password</th></tr><tr><td><INPUT TYPE="password" NAME="Pwd"></td></tr>
			<tr><td><a href="NewAccount.php">Registrati</a></td><td><INPUT TYPE="submit" Value="AdminPanel"></td></tr>
		</table>
	</FORM>
	
 </fieldset>

</BODY>
</HTML>
