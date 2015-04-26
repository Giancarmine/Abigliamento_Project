<?php
	session_start();
	$_SESSION['LNG']="ES";
	if( !isset($_SESSION['PWD'])&& !isset($_SESSION['PASS']) )
	{	
		header("Location: LogIn.php");
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
<div id="cop" style="background: url(../img/Slider5.png); background-size:100% auto; background-attachment:fixed;">
		
	<div class="caption">
		<p>NUEVA <a href="#">Coleccion 2014!</a></b></p>
	    <h2>Sudaderas Hermosas</h2>
	    <p class="text">(tambien azul)</p>
	</div>
                                 
</div>   

<div id="wrapper">
 
	<div id="main">

		<div id="content">
			
			<?php	
			$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
			$db = MySQL_select_db ("Cuofano_ECommerce", $ServerSQL);
			//Recupero il nome utente
			if(isset($_SESSION['PASS']) || isset($_SESSION['PWD']))
			{
				if(isset($_SESSION['PASS']))
				{
					$NomeUtente = $_SESSION['PASS'];
				}
				else
				{
					$NomeUtente = $_SESSION['PWD'];
				}
			}
			$sql =	"SELECT	* ".
					"FROM	Utente ". 
					"WHERE	'".$NomeUtente."' = NomeUtente";
			$ris = MySQL_query ($sql);
			if ( $ris )
			{	
				$riga = MySQL_fetch_array($ris);
				if ($riga)
				{	
					$IdUtente = $riga['IdUtente'];
				}
			}
			$sql =	"SELECT	* ".
					"FROM	Carrello ". 
					"WHERE	'".$IdUtente."' = IdUtente AND ".
							"Stato = 1";
			$ris = MySQL_query ($sql);
			if ( $ris )
			{	
				echo "<h2>Cesta</h2><br>";
				$riga = MySQL_fetch_array($ris);
				if ($riga)
				{	
					$IdCarrello = $riga['IdCarrello'];
					$sql =  "SELECT * ".
							"FROM Carrello Car , Compra Com , Articolo Art , Taglia T , Sconto S ".
							"WHERE Car.IdCarrello = ".$IdCarrello." AND ".
							"Art.IdArticolo = Com.IdArticolo AND ".
							"Art.IdTaglia = T.IdTaglia AND ".
							"Art.IdSconto = S.IdSconto AND ".
							"Com.IdCarrello = Car.IdCarrello ";
					$ris = MySQL_query ($sql);
					if ( $ris )
					{	
						$NColli = 0;
						$Totale = 0;
						$riga = MySQL_fetch_array($ris);
						if ($riga)
						{
							echo	"<TABLE>".
									"<tr><th>Foto</th><th>Articulo</th><th>Cantidad</th><th>Tama&ntilde;o</th><th>Precio</th><th>Descuento</th><th>Borrar</th></tr>";
									echo "<TR><TD ALIGN='center'><a href='Articolo.php?NomeArticolo=".$riga['NomeArticolo']."'><img style='width: 100px;border: 2px dashed;' src='" . $riga['Immagine'] . "'/></a></TD><TD ALIGN='center'>".$riga['NomeArticolo']."</TD><TD ALIGN='center'>".$riga['NCopie']."</TD><TD ALIGN='center'>".$riga['NomeTaglia']."</TD><TD ALIGN='center'>".$riga['PrezzoArticolo']." &#8364 </TD><TD ALIGN='center'>".$riga['NomeSconto']."</TD><TD ALIGN='center'><a href='DelArticolo.php?Comp=1&IdCompra=".$riga['IdCompra']."'>Borrar</a></TD></TR>";
							if ( $riga['NomeSconto'] > 0 )
							{
								$App = $riga['PrezzoArticolo'] * $riga['NomeSconto'];
								$App = $App / 100;
								$Totale = $App;
								$Totale = $Totale * $riga['NCopie'];
							}
							else
							{
								$App = $riga['PrezzoArticolo'];
								$Totale = $App;
								$Totale = $Totale * $riga['NCopie'];
							}
							$NColli = $NColli + 1;
							while ($riga = MySQL_fetch_array($ris))
							{
								echo "<TR><TD ALIGN='center'><a href='Articolo.php?NomeArticolo=".$riga['NomeArticolo']."'><img style='width: 100px;border: 2px dashed;' src='" . $riga['Immagine'] . "'/></a></TD><TD ALIGN='center'>".$riga['NomeArticolo']."</TD><TD ALIGN='center'>".$riga['NCopie']."</TD><TD ALIGN='center'>".$riga['NomeTaglia']."</TD><TD ALIGN='center'>".$riga['PrezzoArticolo']." &#8364 </TD><TD ALIGN='center'>".$riga['NomeSconto']."</TD><TD ALIGN='center'><a href='DelArticolo.php?Comp=1&IdCompra=".$riga['IdCompra']."'>Borrar</a></TD></TR>";
								if ( $riga['NomeSconto'] > 0 )
								{
									$NColli = $NColli + 1;
									$App = $riga['PrezzoArticolo'] * $riga['NomeSconto'];
									$App = $App / 100;
									$PreTot = $Totale;
									$Totale = $PreTot + $App;
									$Totale = $Totale * $riga['NCopie'];
								}
								else
								{
									$NColli = $NColli + 1;
									$App = $riga['PrezzoArticolo'];
									$PreTot = $Totale;
									$Totale = $PreTot + $App;
									$Totale = $Totale * $riga['NCopie'];
								}
							}
							echo  "<TR><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD></TR>";
							echo  "<TR><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD><strong>TOTAL:</strong></TD><TD ALIGN='center'>". $Totale ." &#8364</TD></TR>";
							echo  "<TR><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD ALIGN='center'><a href='ConvOrdini.php'><INPUT TYPE='button' align='right' Id='Bottone' VALUE='Comprar'></a></TD></TR>";
							echo  "</TABLE>";
							echo  "<h2>//##PRECAUCI&Ograve;N##\\\ <br> NO existe un m&egrave;todo conjunto de pago, por lo que la solicitud de compra s&ograve;lo se actualizar&agrave; el estado de la cesta.</h2>";
							$sql = "UPDATE Carrello SET NColli = ". $NColli ." WHERE IdCarrello = ". $IdCarrello ." ";
							$ris = MySQL_query ($sql);
							$sql = "UPDATE Carrello SET Totale = ". $Totale ." WHERE IdCarrello = ". $IdCarrello ." ";
							$ris = MySQL_query ($sql);
						}
					}
				}
				else
				{
					echo "<br><br><br><h2 align='center'> Su cesta est&agrave;<strong> VAC&Igrave;A!</strong> </h2>";
				}
			}
			?>
    	</div> <!-- #content -->
		
		<?php include 'Footer.php'; ?>
		
</body>
</html>