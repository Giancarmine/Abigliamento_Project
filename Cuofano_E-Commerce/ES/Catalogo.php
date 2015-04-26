<?php
	session_start();
	$_SESSION['LNG']="ES";
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
<div id="cop" style="background: url(../img/Slider1.png); background-size:100% auto; background-attachment:fixed;">
		
	<div class="caption">
		<p>NUEVA <a href="#">Coleccion 2014!</a></b></p>
	    <h2>Sudaderas Hermosas</h2>
	    <p class="text">(tambien azul)</p>
	</div>
                                 
</div>   

<div id="wrapper">
 
	<div id="main">

		<div id="content">
			<section id="iso-content">

			<!-- Isotope -->
			<div id="iso-container" class="clickable clearfix">
			
			<!------------------------------------------------------------------------------------
				<div class="element one">
					<a href="#">
						<div class="text-el">
							<div class="icon one">&raquo;</div>
							<h1>$riga['NomeArticolo']</h1>
							<p>Pezzo: $riga['PrezzoArticolo']</p>
							<p>Sconto: $riga['Sconto']</p>
							<p>Colore: $riga['Colore']</p>
							<p>Taglia: $riga['Taglia']</p>
							<p>Categoria: $riga['Categoria']</p>
							<p>Materiale: $riga['Materiale']</p>
						</div>
						<img src="$riga['Immagine']" />
					</a>	
				</div>
			--------------------------------------------------------------------------------------->
							
				<?php	        
				$ServerSQL = MySQL_connect("127.0.0.1","root","") or die ("Non connesso");
				$db = MySQL_select_db ("Cuofano_ECommerce", $ServerSQL);
				
				if ($db)
				{	
					$sql = "SELECT	A.NomeArticolo , T.NomeTaglia , A.PrezzoArticolo , A.Immagine , M.NomeMateriale , Col.NomeColore , Cat.NomeCategoria , S.NomeSconto "
						. "FROM	Articolo A , Sconto S , Colore Col , Categoria Cat , Taglia T , Materiale M "
						. "WHERE	A.IdTaglia	 =	T.IdTaglia AND "
						. " A.IdMateriale	=	M.IdMateriale AND "
						. " A.IdColore	 =	Col.IdColore AND "
						. " A.IdCategoria	=	Cat.IdCategoria AND "
						. " A.IdSconto	 =	S.IdSconto ";
					$ris = MySQL_query ($sql);
					if ( $ris )
					{
						while ($riga = MySQL_fetch_array($ris))
						{
							echo "<div class= 'element ". $riga['NomeCategoria'] ."'>".
								 "<a href='Articolo.php?NomeArticolo=".$riga['NomeArticolo']."'>".
								 "<div class='text-el'>".
								 "<div class= 'icon ". $riga['NomeCategoria'] ."'>&raquo;</div>".
								 "<h1>" . $riga['NomeArticolo'] .  "</h1>".
								 "<p>Precio: " . $riga['PrezzoArticolo'] . " &#8364 Descuento: " . $riga['NomeSconto'] . " Color: ".$riga['NomeColore']." Tama&ntilde;o: ".$riga['NomeTaglia']." Material: ".$riga['NomeMateriale']."</p>".
								 "</div>".
								 "<img style='width: 230px;' src='" . $riga['Immagine'] . "' />".
								 "</a>".
								 "</div>";
						}
					}
				}
				?>

			  </div> <!-- #container -->

			</section> <!-- #iso-content -->

    	</div> <!-- #content -->
    
    	<?php include 'Footer.php'; ?>
		
</body>
</html>


	
