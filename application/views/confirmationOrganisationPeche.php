<html>
	<head>
	</head>
	<body>
		<h1 style="text-align:center;"> La pêche d'aujourd'hui est organisée et les bateaux y participant sont les suivants ! </h1>
		<ul style="text-align: center; list-style-type: none; font-size: 30px; font-weight: bold;">
<?php	
			while($donnees=$bateauxParticipants->fetch())
			{
				echo "<li>";
				echo $donnees['immatBateau'];
				echo "</li>";
			}
?>        	
		</ul>
		<div >
			
			<button style="display:block; margin:auto;"onclick="location.href='<?php echo site_url();?>'">Retour à la page d'accueil</button>
		</div>
	</body>
</html>