<link href="<?php echo base_url('style/style.css');?>" rel="stylesheet">
<?php 
	
	if ($message != "")
	{
		echo "<h1 style='text-align:center'>".$message."</h1>";
	}

	else
	{
		echo "<table>
	     	<tr>

				<th>idLot</th>
		        <th>idBateau</th>
		        <th>datePeche</th>
		        <th>poidsBrutLot</th>
		        <th>prixPlancher</th>
		        <th>prixDepart</th>
		        <th>prixEnchereMax</th>
		        <th>dateEnchere</th>
		        <th>heureDebutEnchere</th>
		        <th>codeEtat</th>
		        <th>idPresentation</th>
		        <th>idAcheteur</th>
		        <th>idQualite</th>
		        <th>idTaille</th>
		        <th>idTailleIntermediaire</th>

		   </tr>";
	 		
		while ($req=$produits->fetch())
	     {
	     	if ($req['codeEtat']=="NC")		//NC = Non Confirmé, l'administrateur n'a pas confirmé le lot, donc les utilisateurs ne le verront pas apparaître pour enchérir dessus
			{

			}

			else 							//Affiche tous les lots dont le codeEtat n'est pas "NC", à modifier en else if codeEtat == "C" pour confirmer, car plus tard un lot pourra 									avoir un codeEtat "V" pour Vendu et ne sera donc plus jamais affiché car, vendu OU "R" pour refusé.
			{
		     	echo '<tr>';
		     	for($i=0;$i<15;$i++)
		     	{
					  	echo '<td>';
							echo $req[$i];
					  	echo '</td>';
		     	}
		    }
		     	echo "</tr>";		
	     }

	   echo "</table>";
	}
?>