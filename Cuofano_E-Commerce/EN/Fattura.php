<?php
	session_start();
	$_SESSION['LNG']="EN";
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
<div id="cop" style="background: url(../img/Slider8.png); background-size:100% auto; background-attachment:fixed;">
		
	<div class="caption">
		<p>NEW <a href="Catalogo.php">Collection 2014!</a></b></p>
	    <h2>Sweatshirts Beautiful</h2>
	    <p class="text">(also blue)</p>
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
			$IdCarrello = $_REQUEST['IdCarrello'];
			if ($db)
			{	
				$sql = "SELECT * "
					. "FROM	Articolo A , Sconto S , Colore Col , Categoria Cat , Taglia T , Materiale M , Utente U , Carrello Car , Compra Com "
					. "WHERE	A.IdTaglia	 =	T.IdTaglia AND "
					. " A.IdMateriale	=	M.IdMateriale AND "
					. " A.IdColore		=	Col.IdColore AND "
					. " A.IdCategoria	=	Cat.IdCategoria AND "
					. " Car.IdUtente	=	U.IdUtente AND "
					. " Com.IdArticolo	=	A.IdArticolo AND "
					. " Car.IdCarrello	=	".$IdCarrello." AND "
					. " A.IdSconto		=	S.IdSconto ";
				$ris = MySQL_query ($sql);
				if ( $ris )
				{	
					echo "<h2>Invoice</h2><br>";
							 
					$riga = MySQL_fetch_array($ris);
					if ($riga)
					{
						
						$Totale = $riga['Totale'];
						echo	"<TABLE>".
								"<tr><th>Photo</th><th>Article</th><th>Quantity</th><th>Size</th><th>Price</th><th>Sale</th><th>Amount</th></tr>";
								$IdCarrello = $riga['IdCarrello'];
								if ( $riga['NomeSconto'] > 0 )
								{
									$App = 0;
									$App = $riga['PrezzoArticolo'] * $riga['NomeSconto'];
									$App = $App / 100;
									$App = $App * $riga['NCopie'];
								}
								else
								{
									$App = 0;
									$App = $riga['PrezzoArticolo'];
									$App = $App * $riga['NCopie'];
								}
								echo "<TR><TD ALIGN='center'><a href='Articolo.php?NomeArticolo=".$riga['NomeArticolo']."'><img style='width: 100px;border: 2px dashed;' src='" . $riga['Immagine'] . "'/></a></TD><TD ALIGN='center'>".$riga['NomeArticolo']."</TD><TD ALIGN='center'>".$riga['NCopie']."</TD><TD ALIGN='center'>".$riga['NomeTaglia']."</TD><TD ALIGN='center'>".$riga['PrezzoArticolo']." &#8364 </TD><TD ALIGN='center'>".$riga['NomeSconto']."</TD><TD ALIGN='center'>".$App." &#8364 </TD></TR>";
						while ($riga = MySQL_fetch_array($ris))
						{
							if ( $riga['NomeSconto'] > 0 )
							{
								$App = 0;
								$App = $riga['PrezzoArticolo'] * $riga['NomeSconto'];
								$App = $App / 100;
								$App = $App * $riga['NCopie'];
							}
							else
							{
								$App = 0;
								$App = $riga['PrezzoArticolo'];
								$App = $App * $riga['NCopie'];
							}
								echo "<TR><TD ALIGN='center'><a href='Articolo.php?NomeArticolo=".$riga['NomeArticolo']."'><img style='width: 100px;border: 2px dashed;' src='" . $riga['Immagine'] . "'/></a></TD><TD ALIGN='center'>".$riga['NomeArticolo']."</TD><TD ALIGN='center'>".$riga['NCopie']."</TD><TD ALIGN='center'>".$riga['NomeTaglia']."</TD><TD ALIGN='center'>".$riga['PrezzoArticolo']." &#8364 </TD><TD ALIGN='center'>".$riga['NomeSconto']."</TD><TD ALIGN='center'>".$App." &#8364 </TD></TR>";
						}
						echo  "<TR><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD></TR>";
						echo  "<TR><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD>&nbsp</TD><TD ALIGN='center'><strong>TOTAL:</strong></TD><TD ALIGN='center'>". $Totale ." &#8364</TD></TR>";
						echo  "</TABLE>";
					}
					else
					{
						echo "<br><br><br><h2 align='center'>Exactly how did you get here?</h2>";
					}		
				}
				else
				{
					echo "<br><br><br><h2 align='center'>Exactly how did you get here?</h2>";
				}				
			}
			?>
    	</div> <!-- #content -->
		
		<?php include 'Footer.php'; ?>
		
</body>
</html>