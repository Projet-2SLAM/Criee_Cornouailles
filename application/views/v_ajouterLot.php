<?php
	echo "<div style='margin:auto; width:300px;'>";
	echo validation_errors(); 
	echo form_open('form/ajouterProduits'); 
?>

		<input type="hidden" name="codeEtat" value="NC"/>	
		<input type="hidden" name="datePeche" value="<?php echo strftime('%d %m %Y'); ?>"/> </br></br>

		<label for="poidsBrutLot">Poids brut</label>	<input style='float:right;' type="text" name="poidsBrutLot"/>	</br></br>
		<label for="prixDepart">Prix de départ</label>	<input style='float:right;' type="text" name="prixDepart"/>		</br></br>
		<label for="prixPlancher">Prix maximal</label>	<input style='float:right;' type="text" name="prixPlancher"/>	</br></br>
		

		<label for="immatBateau">Bateau de provenance du lot</label>
		<select style='float:right;' name="immatBateau">
<?php
		$i=1;
		foreach ($immatBateau['immatBateau'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['immatBateau']."</option>";
			$i++;
		}
		echo "</select></br></br>";
		$i=0;


		echo '<label for="tailleIntermediaire">Taille du lot</label>';
		echo "<select  style='float:right;' name='tailleIntermediaire'>";
		foreach ($tailleIntermediaire['tailleIntermediaire'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['tailleIntermediaire']."</option>";
			$i++;
		}
		echo "</select>";
		$i=1;


		echo "<select style='float:right;' name='idTaille'>";
		foreach ($taille['taille'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['idTaille']."</option>";
			$i++;
		}
		echo "</select></br></br>";
		$i=1;

				

		echo '<label for="intituleQualite">Qualité associée au lot</label>';
		echo "<select style='float:right;' name='intituleQualite'>";
		foreach ($qualite['qualite'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['intituleQualite']."</option>";
			$i++;

		}
		echo "</select></br></br>";
		$i=1;


		echo '<label for="nomComEspece">Espèce de poisson</label>';
		echo "<select style='float:right;' name='nomComEspece'>";
		foreach ($espece['espece'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['nomComEspece']."</option>";
			$i++;

		}
		echo "</select></br></br>";
		$i=1;


		echo '<label for="intitulePresentation">Présentation</label>';		//METTRE LE CODE POUR LA PRESENTATION (Vidé ou Entier)
		echo "<select style='float:right;' name='intitulePresentation'>";
		foreach ($presentation['presentation'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['intitulePresentation']."</option>";
			$i++;

		}
		echo "</select></br></br>";
		$i=1;


		/*echo '<label for="nomComEspece">Espèce de poisson</label>';		//METTRE LE NOMBRE DE BACS CONTENUS DANS LE LOT 
		echo "<select style='float:right;' name='nomComEspece'>";
		foreach ($espece['espece'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['nomComEspece']."</option>";
			$i++;

		}
		echo "</select></br></br>";
		$i=1;


*/

		echo '<div style="text-align:center;">';
			echo '<input class="btn btn-info" type="submit" value="Ajouter"/>';
		echo "</div>";
	echo '</form>';
	echo '</div>';

/*
		
		while ($donnees=$immatBateau->fetch())
		{
			echo "<option value='$i'>".$donnees['immatBateau']."</option>";
			$i++;
		}
		$i=1;
?>
		</select>



		<label for="tailleBac">Taille des bacs</label>

		<select name="tailleBac">
<?php
		$i=1;
		while ($donnees=$taille->fetch())
		{
			echo "<option value='$i'>".$donnees['taille']."</option>";
			$i++;
		}
		$i=1;
?>
		</select>



		<label for="qualiteLot">Qualité du lot</label>

		<select name="qualiteLot">
<?php
		$i=1;
		while ($donnees=$qualite->fetch())
		{
			echo "<option value='$i'>".$donnees['qualite']."</option>";
			$i++;
		}
		$i=1;
?>
		</select>


	*/