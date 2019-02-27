<link href="<?php echo base_url('style/style.css');?>" rel="stylesheet">
<nav id="mainMenu">
	<ul>
		<li><a class="lienMenu" href="<?php echo site_url();?>"> 									Accueil 	</a></li>
		<li><a class="lienMenu"> 		Produits 	</a>
			<ul class="sousMenu">
				<li><a class="lienMenu" href="<?php echo site_url('Welcome/redirect/produits');?>"> Ajouter un lot 		</a></li>
				<li><a class="lienMenu" href="<?php echo site_url('Welcome/redirect/encherirProduits');?>"> Enchérir sur un lot </a></li>
			</ul>
		</li>
		<li><a class="lienMenu" href="<?php echo site_url('Welcome/redirect/contacts');?>"> 		Contacts 	</a></li>
		<li><a class="lienMenu" href="<?php echo site_url('Welcome/redirect/monCompte');?>"> 		Mon Compte 	</a></li>
	</ul>
</nav>



<?php

	echo "Menu utilisateur connecté";

?>