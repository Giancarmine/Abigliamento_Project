<header id="header"> 
	<div id="mainmenu">
    	<ul class="logo">
    		<li> <h1 id="site-title"><a href="index.php">E-Commerce</a></h1></li>
    	</ul>
	 	<ul class="menu">
        	<li><a href="index.php">Home</a></li>
            <li><a href="Catalogo.php">Catálogo</a></li>
            <li><a href="Contatti.php">Contactos</a></li>
        </ul>
		<ul class="menu" style="float: right;">
			<?php
				if(isset($_SESSION['PASS'])||isset($_SESSION['PWD']))
				{
					if(isset($_SESSION['PASS']))
					{
						echo'<li><a href="Utente.php">'.$_SESSION['PASS'].'</a></li>';
						echo'<li><a href="../LogOut.php">LogOut</a></li>';
					}
					else
					{
						echo'<li><a href="AdminPanelPro.php">'. $_SESSION['PWD'] .'</a></li>';
						echo'<li><a href="../LogOut.php">LogOut</a></li>';
					}
				}
				else 
				{
					echo'<li><a href="LogIn.php">LogIn</a></li>';
				}
			?>
        </ul>
        
        <div class="btn-responsive-menu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
		
	</div> <!-- #mainmenu -->

</header> <!-- #header -->