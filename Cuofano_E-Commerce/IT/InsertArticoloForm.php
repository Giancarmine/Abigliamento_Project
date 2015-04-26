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
<!--Giancarmine Cuofano-->
<!doctype html>
<!--Quinta Ainf 2013/14-->
<!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />

    
    <title>Cuofano_E-Commerce</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- JavaScript -->
    <script src="../js/modernizr-1.7.min.js"></script>

    <!-- Style -->
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/responsive.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,200,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/stile.css" />
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!-- Slider Style -->
	<link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/slider.css" type="text/css" media="screen" />
		<!-- jQuery -->
	  <script src="../js/jquery-1.8.0.min.js"></script>
	  <script>window.jQuery || document.write('<script src="../js/jquery-1.8.0.min.js">\x3C/script>')</script>
	  
	  <!-- FlexSlider -->
	  <script defer src="../js/jquery.flexslider.js"></script>
  
	  <script type="text/javascript">
	    
	    $(window).load(function(){
	      $('.flexslider').flexslider({
	        animation: "fade",
	       
	        start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
			before: function(){captionMoveOut();},           //Callback: function(slider) - Fires asynchronously with each slider animation
			after: function(){captionMoveIn();},            //Callback: function(slider) - Fires after each slider animation completes
			end: function(){},              //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
			added: function(){},            //{NEW} Callback: function(slider) - Fires after a slide is added
			removed: function(){} 
	      });
	      
	      $('.flex-caption').hide();
	      
	       $('.flex-caption').fadeIn(2000);
	    });
	    
	    function captionMoveIn() {
			$('.flex-caption')
			.animate({top: "35%"},0)
			.fadeIn(2000)
		;};
		
		
		function captionMoveOut() {
			$('.flex-caption')
			.animate({top: "-40%"},700)
			.fadeOut("normal")
			
		;};
	    
	  </script>
    
</head>
<body>

<!-- Prompt IE 6 and 7 users to install Chrome Frame:chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 8]>
    <p class="chromeframe alert alert-warning">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
<![endif]-->

<!--Facebook Stream-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&appId=649858568419670&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--/Facebook Stream-->


<!--Menù-SliderParallax--> 	
<?php include 'Menu.php'; ?>
<div id="cop" style="background: url(../img/darkGreyBackground.jpg); background-size:100% auto; background-attachment:fixed;">
		
	<div class="caption">
	    <h2>ADMIN PANEL</h2>
	    <p class="text">(Area Riservata)</p>
	</div>
                                 
</div>   

<div id="wrapper">
 
	<div id="main">

		<div id="content">
			<?php	        
				$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
				$db = MySQL_select_db ("Cuofano_ECommerce", $ServerSQL);
			?>
			<h2>Inserisci Un Nuovo Articolo</h2>
			 <!--                 METHOD="get"                              -->
			 <!-- Tipo di codifica dei dati, DEVE essere specificato come segue -->
			<form enctype="multipart/form-data" action="InsertArticolo.php" method="POST">
			<TABLE style="margin: 15%;">
			<TR><TD>Articolo</TD><TD><INPUT TYPE="text"   NAME ="NomeArticolo"></TD></TR>
			<TR><TD>Taglia   </TD><TD><SELECT NAME="IdTaglia">
					<OPTION VALUE=' '> </OPTION>
					<?php
					if ($db)
					{	$sql = "SELECT IdTaglia, NomeTaglia FROM Taglia ";
						$ris = MySQL_query ($sql);
						if ( $ris )
							while ($riga = MySQL_fetch_array($ris))
								echo "<OPTION VALUE='", $riga['IdTaglia'] ,
									 "'>", $riga['NomeTaglia'], "</OPTION>";
					}
					?>
					</SELECT></TD></TR>
			<TR><TD>Prezzo</TD><TD><INPUT TYPE="text"   NAME ="PrezzoArticolo"></TD></TR>
			<TR><TD>Disponibilita`</TD><TD><INPUT TYPE="number"NAME ="NDisp"></TD></TR>
			
			
			<!-- MAX_FILE_SIZE deve precedere campo di input del nome FILE -->
			<!-- Il nome dell'elemento di input determina il nome nell'array $_FILES -->
			<TR><TD><input type="hidden" name="MAX_FILE_SIZE" value="3000000" />Immagine*</TD><TD><input name="userfile" type="file" /></TD></TR>
			
			
			<TR><TD>Materiale   </TD><TD><SELECT NAME="IdMateriale">
					<OPTION VALUE=' '> </OPTION>
					<?php
					if ($db)
					{	$sql = "SELECT IdMateriale, NomeMateriale FROM Materiale ";
						$ris = MySQL_query ($sql);
						if ( $ris )
							while ($riga = MySQL_fetch_array($ris))
								echo "<OPTION VALUE='", $riga['IdMateriale'] ,
									 "'>", $riga['NomeMateriale'], "</OPTION>";
					}
					?>
					</SELECT></TD></TR>
			<TR><TD>Colore   </TD><TD><SELECT NAME="IdColore">
					<OPTION VALUE=' '> </OPTION>
					<?php
					if ($db)
					{	$sql = "SELECT IdColore, NomeColore FROM Colore ";
						$ris = MySQL_query ($sql);
						if ( $ris )
							while ($riga = MySQL_fetch_array($ris))
								echo "<OPTION VALUE='", $riga['IdColore'] ,
									 "'>", $riga['NomeColore'], "</OPTION>";
					}
					?>
					</SELECT></TD></TR>
			<TR><TD>Categoria   </TD><TD><SELECT NAME="IdCategoria">
					<OPTION VALUE=' '> </OPTION>
					<?php
					if ($db)
					{	$sql = "SELECT IdCategoria, NomeCategoria FROM Categoria ";
						$ris = MySQL_query ($sql);
						if ( $ris )
							while ($riga = MySQL_fetch_array($ris))
								echo "<OPTION VALUE='", $riga['IdCategoria'] ,
									 "'>", $riga['NomeCategoria'], "</OPTION>";
					}
					?>
					</SELECT></TD></TR>
			<TR><TD>Sconto   </TD><TD><SELECT NAME="IdSconto">
					<OPTION VALUE=' '> </OPTION>
					<?php
					if ($db)
					{	$sql = "SELECT IdSconto, NomeSconto FROM Sconto ";
						$ris = MySQL_query ($sql);
						if ( $ris )
							while ($riga = MySQL_fetch_array($ris))
								echo "<OPTION VALUE='", $riga['IdSconto'] ,
									 "'>", $riga['NomeSconto'], "</OPTION>";
					}
					?>
					</SELECT></TD></TR>
			<TR><TD>       </TD><TD><input type="reset"  Id="Bottone"  value="Reset"></TD></TR>
			<TR><TD>       </TD><TD><INPUT TYPE="submit"  Id="Bottone" VALUE="Inserisci"></TD></TR>
			</TABLE>
			</FORM>
    	</div> <!-- #content -->
    
    	<?php include 'Footer.php'; ?>
   
</body>
</html>


	
