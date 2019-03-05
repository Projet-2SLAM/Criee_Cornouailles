<div id="deconnecte">
<?php

	echo("Au revoir et à bientôt !");
	$accueil = site_url('Welcome');								
	header("refresh:1.5;url=$accueil");		//Redirection vers la vue "v_home" après un délai de 2 secondes

?>
</div>