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


<div id="wrapper">
 
	<div id="main">

		<div id="content">
			<!-- Filtering -->
			<section id="options" class="clearfix">

				  <ul id="filters" class="option-set clearfix" data-option-key="filter">
					<li><a id="f-all" href="#filter" data-option-value="*" class="selected"><span>All</span></a></li>
					<li><a id="f-one" href="#filter" data-option-value=".one"><span>One</span></a></li>
					<li><a id="f-two" href="#filter" data-option-value=".two"><span>Two</span></a></li> 
					<li><a id="f-three" href="#filter" data-option-value=".three"><span>Three</span></a></li>
				  </ul>

			</section> 

			<section id="iso-content">

			  <!-- Isotope -->
			  <div id="iso-container" class="clickable clearfix">
				 
				<div class="element one">
					 <a href="#">
						 <div class="text-el">
							 <div class="icon one">&raquo;</div>
							 <h1>Brooklyn</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/1.jpg" />
					 </a>	
				</div>

				<div class="element two">
					<a href="#">
						<div class="text-el">
							 <div class="icon two">&raquo;</div>
							 <h1>Ground Zero</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						</div>
						<img src="../photo/2.jpg"/>
					 </a>	
				</div>

				<div class="element three">
					<a href="#">
						 <div class="text-el">
							 <div class="icon three">&raquo;</div>
							 <h1>Times Square</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/3.jpg"/>
					 </a>	
				</div>
				
				<div class="element one">
					 <a href="#">
						 <div class="text-el">
							 <div class="icon one">&raquo;</div>
							 <h1>Times Square</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/4.jpg" />
					 </a>	
				</div>
				
				<div class="element one">
					 <a href="#">
						 <div class="text-el">
							 <div class="icon one">&raquo;</div>
							 <h1>New Badford</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/5.jpg" />
					 </a>	
				</div>
				
				<div class="element three">
					<a href="#">
						 <div class="text-el">
							 <div class="icon three">&raquo;</div>
							 <h1>Moma</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/6.jpg"/>
					 </a>	
				 </div>
				
				 <div class="element two">
				   <a href="#">
						 <div class="text-el">
							 <div class="icon two">&raquo;</div>
							 <h1>Wall Street</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/7.jpg"/>
					 </a>	
				</div>
				
				<div class="element two">
				   <a href="#">
						 <div class="text-el">
							 <div class="icon two">&raquo;</div>
							 <h1>Flatiron Building</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/8.jpg"/>
					 </a>	
				</div>
				
				<div class="element one">
					 <a href="#">
						<div class="text-el">
							 <div class="icon one">&raquo;</div>
							 <h1>Harvard</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/9.jpg" />
					 </a>	
				</div>
				
				<div class="element one">
					 <a href="#">
						 <div class="text-el">
							 <div class="icon one">&raquo;</div>
							 <h1>Boston</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/10.jpg" />
					 </a>	
				</div>
				
				<div class="element three">
					<a href="#">
						<div class="text-el">
							 <div class="icon three">&raquo;</div>
							 <h1>Empire State Building</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/11.jpg"/>
					 </a>	
				</div>
				
				<div class="element two">
				   <a href="#">
						 <div class="text-el">
							 <div class="icon two">&raquo;</div>
							 <h1>Lower East Side</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/12.jpg"/>
					 </a>	
				</div>
				
				<div class="element two">
				   <a href="#">
						 <div class="text-el">
							 <div class="icon two">&raquo;</div>
							 <h1>Souce</h1>
							 <p>Lore et laborumd orfesia ame estula ficus de sta lorent...</p>
						 </div>
						 <img src="../photo/13.jpg"/>
					 </a>	
				</div>

			  </div> <!-- #container -->

			</section> <!-- #iso-content -->

    	</div> <!-- #content -->
    
    	<aside id="sidebar">
    	
    		<p class="intro"> &nbsp; Area Riservata</p>

			<a href="#" class="side-cr">
			
				<img src="../img/shopping-bag.png"/>
			
				<h2>Lista Desideri</h2>
			
			</a>
            
			<a href="#" class="side-cr">
			
				<img src="../img/basket.png"/>
			
				<h2>Carrello</h2>
			
			</a>
			
			<a href="#" class="side-cr">
			
				<img src="../img/box.png"/>
			
				<h2>Ordini</h2>
			
			</a>
			<!--Facebook Stream-->
			<div class="container-like">
				<div class="fb-like-box" data-href="https://www.facebook.com/pages/The-merchant-of-souls-il-mercante-di-anime/157125637667523?ref=hl" data-width="270" data-height="100" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="false"></div>
			</div>
			<!--/Facebook Stream-->
			
			<p class="intro"> Social</p>

			<a href="https://www.facebook.com/giancarmine.cuofano" class="side-el">
			
				<img src="../img/facebook-64.png"/>
			
				<h2>Facebook</h2>
			
				<p>Segui la nostra <strong>Pagina</strong></p>
			
			</a>
               
			<a href="https://twitter.com/ZioGio19" class="side-el">
			
				<img src="../img/twitter-64.png"/>
			
				<h2>Twitter</h2>
			
				<p><strong>#E-Commerce</strong></p>
			
			</a>
			
			<a href="https://www.youtube.com/user/superikiller1990" class="side-el">
			
				<img src="../img/youtube-64.png"/>
			
				<h2>Youtube</h2>
			
				<p>Segui il nostro <strong>Canale</strong></p>
			
			</a>

    	</aside> <!-- #sidebar -->
    
	</div> <!-- #main -->

 	<footer id="footer">
		<a href="../ES/Index.php"><img src="../img/Flag of Spain.png" style="float: right; height: 53px;"/></a>
		<a href="../IT/Index.php"><img src="../img/Flag of Italy.png" style="float: right; height: 53px;"/></a>
		<a href="../EN/Index.php"><img src="../img/Flag of United Kingdom.png" style="float: right; height: 53px;"/></a>
        <p>Copyright &copy; 2014 <a href="Index.php"> Cuofano_E-Commerce</a></p>
		<div class="widget">
		</div>
		
    </footer> <!-- #footer -->
    
    <div class="clear"></div>

</div> <!-- #wrapper -->

<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
   
   <script>
  	$(document).ready(function(){   
			//When btn is clicked
			$(".btn-responsive-menu").click(function() {
			  	$("#mainmenu ul.menu").slideToggle('fast', function() {});
			});

			// When resize
			$(window).resize(function () {
				if ($(window).width() > 767) {
					$("#mainmenu ul.menu").show();
				} else {
					$("#mainmenu ul.menu").hide();
				}
			});
	
	
	   // cache the window object
	   $window = $(window);

	        $('#slides').each(function() {
	            // declare the variable to affect the defined data-type
	            var $scroll = $(this);

	            $(window).scroll(function() {
	                // HTML5 proves useful for helping with creating JS functions!
	                // also, negative value because we're scrolling upwards
	                var yPos = -($window.scrollTop() / 6);

	                // background position
	                var coords = '50% ' + yPos + 'px';

	                // move the background
	                $scroll.css({ backgroundPosition: coords });
	            }); // end window scroll
	        });  // end section function

	}); // close out script
	
   </script>
   
	<script src="../js/jquery-1.6.2.min.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	<script src="../js/my-isotope.js"></script>
   
</body>
</html>


	
