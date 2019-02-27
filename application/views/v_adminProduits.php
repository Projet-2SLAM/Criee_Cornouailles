<?php
	echo validation_errors(); 
	echo form_open('form/ajouterProduits'); ?>
		<input type="hidden" name="codeEtat" value="NC"/>
		<input type="hidden" 	name="datePeche" value="<?php echo strftime('%d %m %Y'); ?>"/>
		</br></br><label for="poidsBrutLot">Poids brut</label><input type="text" 	name="poidsBrutLot" value="<?php echo set_value('poidsBrutLot'); ?>"/>
		</br></br><label for="prixPlancher">Prix maximal</label><input type="text" 	name="prixPlancher" value="<?php echo set_value('prixPlancher'); ?>"/>
		</br></br><label for="prixDepart">Prix de départ</label><input type="text" 	name="prixDepart" value="<?php echo set_value('prixDepart'); ?>"/>
		</br></br>
		<label for="immatBateau">Bateau de provenance du lot</label>



		<select name="immatBateau">
<?php
		$i=1;
		foreach ($immatBateau['immatBateau'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['immatBateau']."</option>";
			$i++;
		}
		echo "</select></br></br>";
		$i=1;



		echo '<label for="idTaille">Taille du lot</label>';
		echo "<select name='idTaille'>";
		foreach ($taille['taille'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['idTaille']."</option>";
			$i++;
		}
		echo "</select>";
		$i=0;
		


		echo "<select name='tailleIntermediaire'>";
		foreach ($tailleIntermediaire['tailleIntermediaire'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['tailleIntermediaire']."</option>";
			$i++;
		}
		echo "</select></br></br>";
		$i=1;
				


		echo '<label for="intituleQualite">Qualité associée au lot</label>';
		echo "<select name='intituleQualite'>";
		foreach ($qualite['qualite'] as $donnees) 
		{
			echo "<option value='$i'>".$donnees['intituleQualite']."</option>";
			$i++;

		}
		echo "</select></br></br>";
		$i=1;

		echo '<input type="submit" value="Submit"/>';
	echo '</form>';

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