</br>Enchérir sur des produits</br>
<?php
	foreach ($lotsConfirmes as $donnees)
	{
		echo "<div style='padding: 5px 5px 5px 5px;width:300px; height: 300px; border:1px solid black;'>";
		echo "<p style='text-align:center;'>Pêché par : <b>".$donnees['immatBateau']."</b></p>";
		echo "<p style='text-align:center;'>Poids du lot : ".$donnees['poidsBrutLot']."</p>";
		echo "<p style='text-align:center;'>Prix de départ : ".$donnees['prixDepart']."</p>";
		echo "<p style='text-align:center;'>Prix plafond : ".$donnees['prixPlancher']."</p>";
		 //"<p style='text-align:center;'>Pêché par : ".$donnees['heureDebutEnchere']."</p>";
		echo "<p style='text-align:center;'>Qualité du lot : ".$donnees['intituleQualite']."</p>";
		echo "<p style='text-align:center;'>Taille du lot:  <b>".$donnees['idTaille']." ".$donnees['idTailleIntermediaire']."</b></p>";

		echo "</div>";
	} 
?>