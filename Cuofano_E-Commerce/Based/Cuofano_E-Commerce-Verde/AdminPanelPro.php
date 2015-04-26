<?php
	session_start();
	if(!isset($_SESSION['PWD']))
	{	header("Location: LogIn.php");
	}
	
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
<h3 align="right">Ciao <?php echo  $_SESSION['PWD']; ?>! <a href="LogOut.php">LogOut</a></h3>
<p align="center"><a href="index.php"><img class="home" src="img/Logo.png"></a></p>
 <fieldset>
    <legend>Gestione Database Cuofano_Atletica</legend>
	<font face="Comic Sans MS">
	<br>
	<?php
		//----------------------------------------------------------------------------
		// Se il DB Server non è attivo, la procedura è interrotta
		$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
			  
		//----------------------------------------------------------------------------
		//  Verifico prima se il DB esiste		
		if ( MySQL_select_db ("CampionatoAtletica", $ServerSQL) )
		{	
			echo"<INPUT TYPE='button'";
			echo"VALUE='Elimina Data Base'";
			echo"onclick=\"location.href=";
			echo"'EliminaDB.php'";
			echo"\">";
		}
		else // se non esiste, stampo i tasti per crearlo
		{	
			echo"<INPUT TYPE='button'";
			echo"VALUE='Crea Data Base'";
			echo"onclick=\"location.href=";
			echo"'CreaDB.php'";
			echo"\">";
	    }
	?>
	<br>
	<hr size="2" color="#0066CC">
   	<br>
        <INPUT TYPE="button" VALUE="Query"             onclick="location.href='Query.php'"><br>
	<hr size="2" color="#0066CC">
	</font>	
 </fieldset>
</BODY>
</HTML>
