<div id="inscription">

<?php
	echo validation_errors(); 
	echo form_open('form'); 
?>

				   <input type="text" 		name="login" 			placeholder="Login" 					value="<?php echo set_value('login'); 			?>"/>
		</br></br> <input type="password" 	name="password"			placeholder="Mot de passe" 				value="<?php echo set_value('password'); 		?>"/>
		</br></br> <input type="text" 		name="RSEntreprise" 	placeholder="Raison sociale" 			value="<?php echo set_value('RSEntreprise');	?>"/>
		</br></br> <input type="text" 		name="numRueAcheteur" 	placeholder="Numéro de rue" 			value="<?php echo set_value('numRueAcheteur'); 	?>"/>
		</br></br> <input type="text" 		name="rueAcheteur" 		placeholder="Nom de rue" 				value="<?php echo set_value('rueAcheteur'); 	?>"/>
		</br></br> <input type="text" 		name="villeAcheteur" 	placeholder="Ville" 					value="<?php echo set_value('villeAcheteur'); 	?>"/>
		</br></br> <input type="text" 		name="cpAcheteur" 		placeholder="Code Postal" 				value="<?php echo set_value('cpAcheteur'); 		?>"/>
		</br></br> <input type="text" 		name="numHabilitation" 	placeholder="Numéro d'habilitation" 	value="<?php echo set_value('numHabilitation'); ?>"/> </br></br>

        <input type="submit" class="btn btn-info" value="Valider" />
    </form>

</div>
