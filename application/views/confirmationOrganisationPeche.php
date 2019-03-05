<html>
	<head>
	</head>
	<body>
		<h1 style="text-align:center;"> La pêche d'aujourd'hui est organisée et les bateaux y participant sont les suivants ! </h1></br>
		<div style="margin: auto; text-align: center; font-size: 30px; font-weight: bold;">
<?php	
			while($donnees=$bateauxParticipants->fetch())
			{
				echo $donnees['immatBateau']."</br>";
			}
?>        	
		</div>
		</br>
		<div>
			<button style="display:block; margin:auto;" class="btn btn-info" onclick="location.href='<?php echo site_url();?>'">Retour à la page d'accueil</button>
		</div>
	</body>
</html>