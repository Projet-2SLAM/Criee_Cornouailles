<div id="connecte">
<?php

	echo("Bonjour et merci de votre fidélité !");
	$accueil = site_url('Welcome');								
	header("refresh:2;url=$accueil");		//Redirection vers la vue "v_home" après un délai de 2 secondes

?>
</div>