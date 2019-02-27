<?php

	date_default_timezone_set('Europe/Paris');	//ajuster le format de date en français
	setlocale(LC_TIME, 'fr_FR.utf8','fra');

	echo validation_errors(); 
	echo form_open('form/organiserPeche');
	$dateJour['dateJour']=strftime('%d %m %Y');

	echo "Bateaux participants à la pêche d'aujourd'hui : ".utf8_encode(strftime("%A %d %B %Y")."</br></br>");	//affiche la date du jour en français

		$i=1;
		while ($donnees=$immatBateau->fetch())	//récupère les id des bateaux existants dans la base de données
		{
?>			<input type="checkbox" checked name="bateauxParticipants[]" value="<?php echo $i; ?>"/> <!--***value="<?php //***echo set_value('$i')?>"/>-->
<?php		echo $donnees['immatBateau']; ?>
			<input type="hidden" name="datePeche[]" value="<?php echo $dateJour['dateJour']; ?>"/>
<?php					

			echo "</br></br>";
			$i++;
		}
?>		<input type="hidden" name="index" value="<?php echo $i;?>"/>
<?php	$i=1;
		//FAIRE EN SORTE QUE LE BOUTON SUBMIT SOIT DESACTIVE SI IL N'Y A PAS AU MINIMUM UNE CASE DE COCHEE, de sorte à ce qu'une pêche ne soit pas organisée sans bateau, et pour ne pas faire planter le programme dans le contrôleur Welcome au niveau du switch->case 'produits', si aucun bateau n'est séléctionné, la variable $count sera à 0 et empêchera l'ajout d'un lot alors qu'une pêche est censée être organisée (mais sans bateau, ce qui n'a pas de sens et qu'on ne veut pas);
?>
		<input type="submit" value="Submit" />
	</form>
