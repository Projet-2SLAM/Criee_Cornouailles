</br>Enchérir sur des produits</br>
<?php
	echo "<div style='width: 50%; margin: auto;'>";

	foreach ($lotsConfirmes as $donnees)
	{

		echo "<div style='display:flex; justify-content: center; padding: 0; margin-bottom: 50px; margin: auto; padding: 0px 30px 0px 30px;  width:500px; height: 220px; border-bottom:3px solid #AAAAAA;'>";

		//Insérer une image de l'espèce de poisson pêché pour que l'utilisateur sache de quoi il s'agisse au premier coup d'oeil
		echo "<div style=' padding: 0; margin:0; margin-top: 10px; float: left; width:200px; height: 200px;'></div>";
		echo "<div style='justify-content: center; vertical-align: middle; width:150px; float:right;'>";
			echo "<p>Pêché par : <b>".$donnees['immatBateau']."</b></p>";
			echo "<p>Poids du lot : ".$donnees['poidsBrutLot']."</p>";
			echo "<p>Prix de départ : ".$donnees['prixDepart']."</p>";
			echo "<p>Prix plafond : ".$donnees['prixPlancher']."</p>";
			 //"<p >Pêché par : ".$donnees['heureDebutEnchere']."</p>";
			echo "<p>Qualité du lot : ".$donnees['intituleQualite']."</p>";
			echo "<p>Taille du lot:  <b>".$donnees['idTaille']." ".$donnees['idTailleIntermediaire']."</b></p>";
		echo "</div>";
		echo "</div></br></br>";
	} 
	
	echo "</div>";

?>