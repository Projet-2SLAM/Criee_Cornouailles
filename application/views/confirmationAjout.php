<div id="confirmationAjout">
<?php

	echo("Votre lot a bien été enregistré");
	$accueil = site_url('Welcome');								
	header("refresh:2;url=$accueil");		//Redirection vers la vue "v_home" après un délai de 2 secondes

?>
</div>