<?php
	session_start();
	$_SESSION['LNG']="IT";
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
<div id="cop" style="background: url(../img/Slider2.png); background-size:100% auto; background-attachment:fixed;">
		
	<div class="caption">
		<p>NUOVA <a href="#">Collezione 2014!</a></b></p>
	    <h2>Felpe Belle</h2>
	    <p class="text">(anche blu)</p>
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
			if ($db)
			{	
				$sql = "SELECT Com.IdCompra , A.NomeArticolo , T.NomeTaglia , A.PrezzoArticolo , A.Immagine , M.NomeMateriale , Col.NomeColore , Cat.NomeCategoria , S.NomeSconto , A.NDisp , Com.NCopie , U.NomeUtente , Car.IdCarrello "
					. "FROM	Articolo A , Sconto S , Colore Col , Categoria Cat , Taglia T , Materiale M , Utente U , Carrello Car , Compra Com "
					. "WHERE	A.IdTaglia	 =	T.IdTaglia AND "
					. " A.IdMateriale	=	M.IdMateriale AND "
					. " A.IdColore		=	Col.IdColore AND "
					. " A.IdCategoria	=	Cat.IdCategoria AND "
					. " Car.IdUtente	=	U.IdUtente AND "
					. " Com.IdCarrello	=	Car.IdCarrello AND "
					. " Car.Stato		=	0 AND "
					. " Com.IdArticolo	=	A.IdArticolo AND "
					. " Car.IdUtente	=	".$IdUtente." AND "
					. " A.IdSconto		=	S.IdSconto ";
				$ris = MySQL_query ($sql);
				if ( $ris )
				{	
					echo "<h2>Lista Desideri</h2><br>";
							 
					$riga = MySQL_fetch_array($ris);
					if ($riga)
					{
						echo	"<TABLE>".
								"<tr><th>Foto</th><th>Articolo</th><th>Quantita`</th><th>Taglia</th><th>Prezzo</th><th>Sconto</th><th>Elimina</th></tr>";
								$IdCarrello = $riga['IdCarrello'];
								echo "<TR><TD ALIGN='center'><a href='Articolo.php?NomeArticolo=".$riga['NomeArticolo']."'><img style='width: 100px;border: 2px dashed;' src='" . $riga['Immagine'] . "'/></a></TD><TD ALIGN='center'>".$riga['NomeArticolo']."</TD><TD ALIGN='center'>".$riga['NCopie']."</TD><TD ALIGN='center'>".$riga['NomeTaglia']."</TD><TD ALIGN='center'>".$riga['PrezzoArticolo']." &#8364 </TD><TD ALIGN='center'>".$riga['NomeSconto']."</TD><TD ALIGN='center'><a href='DelArticolo.php?IdCompra=".$riga['IdCompra']."'>Elimina</a></TD></TR>";
						while ($riga = MySQL_fetch_array($ris))
						{
							echo "<TR><TD ALIGN='center'><a href='Articolo.php?NomeArticolo=".$riga['NomeArticolo']."'><img style='width: 100px;border: 2px dashed;' src='" . $riga['Immagine'] . "'/></a></TD><TD ALIGN='center'>".$riga['NomeArticolo']."</TD><TD ALIGN='center'>".$riga['NCopie']."</TD><TD ALIGN='center'>".$riga['NomeTaglia']."</TD><TD ALIGN='center'>".$riga['PrezzoArticolo']." &#8364 </TD><TD ALIGN='center'>".$riga['NomeSconto']."</TD><TD ALIGN='center'><a href='DelArticolo.php?IdCompra=".$riga['IdCompra']."'>Elimina</a></TD></TR>";
						}
						echo  "<TR><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD ALIGN='center'><a href='ConvCarrello.php'><INPUT TYPE='button' align='right' Id='Bottone' VALUE='Acquista'></a></TD></TR>";
						echo  "</TABLE>";
					}
					else
					echo "<br><br><br><h2 align='center'> La Lista Desideri e`<strong>VUOTA!</strong> </h2>";
				}
				
			}
			?>
    	</div> <!-- #content -->
		
		<?php include 'Footer.php'; ?>
		
</body>
</html>