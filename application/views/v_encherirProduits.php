</br>Enchérir sur des produits</br>
<?php
	echo "<div style='width: 50%; margin: auto;'>";

	foreach ($lotsConfirmes as $donnees)
	{

		echo "<div style='position:relative;display:flex; justify-content: center; padding: 0; margin-bottom: 50px; margin: auto; padding: 0px 30px 0px 30px;  width:600px; height: 260px; border-bottom:3px solid #AAAAAA;'>";

		echo "<div style='margin: 0 auto; position:absolute; width:450px; height: 20px;'>
			<p class='btn-danger'style='text-align: center; font-size: 20px; '>L'enchère commence dans : </p>
		</div>";

		//Insérer une image de l'espèce de poisson pêché pour que l'utilisateur sache de quoi il s'agisse au premier coup d'oeil
		echo "<div style=' padding: 0; margin:0; margin-top: 50px; margin-right:70px; float: left; width:200px; height: 200px;'>";
?>			<img style="margin-left: 0; border-radius: 10px;" width="230px" height="170px" src='<?php echo $donnees["urlImage"]?>'/>
<?php 		echo "<h3 style='width: 230px; font-weight: bold; margin:5; text-align: center;'>".$donnees['nomComEspece']."</h3>";

		echo "</div>";
		echo "<div style='margin-top: 50px; justify-content: center; vertical-align: middle; width:150px; float:right; margin-left:20px;'>";
			echo "<p>Pêché par : <b>".$donnees['immatBateau']."</b></p>";
			echo "<p>Poids du lot : <b>".$donnees['poidsBrutLot']."</b></p>";
			echo "<p>Prix de départ : <b> ".$donnees['prixDepart']."</b></p>";
			echo "<p>Prix plafond : <b> ".$donnees['prixPlancher']."</b></p>";
			 //"<p >Pêché par : ".$donnees['heureDebutEnchere']."</p>";
			echo "<p>Qualité du lot : <b> ".$donnees['intituleQualite']."</b></p>";
			echo "<p>Taille du lot:  <b>".$donnees['idTaille']." ".$donnees['idTailleIntermediaire']."</b></p>";
		echo "</div>";
		echo "</div></br></br>";
	} 
	
	echo "</div>";
?>