<aside id="sidebar">
    	
    		<p class="intro"> &nbsp; ZONA RESTRINGIDA</p>

			<a href="ListaDesideri.php" class="side-cr">
			
				<img src="../img/shopping-bag.png"/>
			
				<h2>Lista De Deseos</h2>
			
			</a>
            
			<a href="Carrello.php" class="side-cr">
			
				<img src="../img/basket.png"/>
			
				<h2>Cesta</h2>
			
			</a>
			
			<a href="Ordini.php" class="side-cr">
			
				<img src="../img/box.png"/>
			
				<h2>Pedidos</h2>
			
			</a>
			<!--Facebook Stream-->
			<div class="container-like">
				<div class="fb-like-box" data-href="https://www.facebook.com/pages/Zio-Joe-Abbigliamento/252645384921033" data-width="270" data-height="100" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="false" data-show-border="false"></div>
			</div>
			<!--/Facebook Stream-->
			
			<p class="intro"> Social</p>

			<a href="https://www.facebook.com/giancarmine.cuofano" class="side-el">
			
				<img src="../img/facebook-64.png"/>
			
				<h2>Facebook</h2>
			
				<p>Siga nuestra <strong>Pagina</strong></p>
			
			</a>
               
			<a href="https://twitter.com/ZioGio19" class="side-el">
			
				<img src="../img/twitter-64.png"/>
			
				<h2>Twitter</h2>
			
				<p><strong>#E-Commerce</strong></p>
			
			</a>
			
			<a href="https://www.youtube.com/user/superikiller1990" class="side-el">
			
				<img src="../img/youtube-64.png"/>
			
				<h2>Youtube</h2>
			
				<p>Siga nuestro <strong>Canal</strong></p>
			
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