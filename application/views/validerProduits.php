<link href="<?php echo base_url('style/style.css');?>" rel="stylesheet">

<?php 

	if (isset($message))
	{
		echo "<h1 style='text-align:center'>".$message."</h1>";
	}

	else
	{
		echo '<h1 style="text-align:center;"> Produits en attente d\'approbation</h1>';

		echo "<table>
	     	<tr>

				<th>idLot</th>
		        <th>Immatriculation bateau</th>
		        <th>Date de pêche</th>
		        <th>Poids brut</th>
		        <th>Prix plancher</th>
		        <th>Prix de départ</th>
		        <th>prixEnchereMax</th>
		        <th>dateEnchere</th>
		        <th>codeEtat</th>
		        <th>idPresentation</th>
		        <th>Acheteur</th>
		        <th>Qualité</th>
		        <th>Taille</th>
		        <th>Taille intermédiaire</th>
		        <th>Valider ou refuser</th>

		   </tr>";
	  											//RAJOUTER UN CHAMP PERMETTANT A L'ADMINISTRATEUR DE FIXER UNE HEURE DE DEBUT DE L'ENCHERE
		foreach ($produitsAValider as $req)
	     {
	     	if ($req['codeEtat']=="NC")		//NC = Non Confirmé, l'administrateur n'a pas confirmé le lot, donc les utilisateurs ne le verront pas apparaître pour enchérir dessus
			{
		     	echo '<tr>';
		     	for($i=0;$i<=14;$i++)
		     	{
		     		if ($i<14)
		     		{
					  	echo '<td>';
							echo $req[$i];
					  	echo '</td>';
		     		}

		     		else if ($i==14)
		     		{
		     			echo validation_errors(); 
						echo form_open('form/validerProduits');
						echo '<td>';
?>						<select name="<?php echo $req['idLot'];?>">
							<option value="1">-</option>
							<option value="2">Valider</option>
							<option value="3">Refuser</option>
						</select>
<?php 					echo '</td>';
		     		}
		     	}
		     	echo "</tr>";		//mettre en place un système, comme un submit ICI, pour que ça apparaîsse à côté de chaque ligne générée avec le while, qui va valider le lot, faire un update du champ "codeEtat" sur la ligne de ce lot (passer son état de "NC" à "C" pour confirmé)
			}
	     }

		echo "</table>";

		echo '<input type="submit" value="Valider la sélection"/>
	</form>';

	}
?>