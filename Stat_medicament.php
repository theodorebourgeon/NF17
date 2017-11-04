<html>
<head>
	<meta charset="UTF-8">
	<title>Statistique Nombre medicament </title>
	<link rel="stylesheet" href="site.css" />
</head>

<body>

<?php
// Connexion à la base de données avec données de la base de postgres

$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p099', 'nf17p099', 'h1AWr2Lr');

// Écriture, exécution et test de la requête

$Sql = "SELECT nom_medecin FROM medecin" ;	
$ResultSet = $vConn->prepare($Sql);
$ResultSet->execute();



// Traitement du résultat
if(! $ResultSet) 
	{
	echo "Échec de la statistique" ;
	}
else 
	{
	echo "<h1>Statistique: Nombre de medicament prescrit par un medecin</h1> <br>";
	echo "<h2> Choisissez le medecin: </h2>";
	echo "<FORM method='POST' ACTION ='Statistique_medicament.php'>";
	echo "Medicament: <SELECT NAME='nom_medecin' SIZE='5'><br><br>'<br><br>";
	
	while ($row = $ResultSet->fetch(PDO::FETCH_ASSOC)) 
		{
		
		echo "<OPTION VALUE='";
		echo $row['nom_medecin'] ;
		echo "'>";

		echo $row['nom_medecin'] ;
		echo "</OPTION> ";	

		};
	
	echo "</SELECT><br><br>";
	echo " <br><br><INPUT TYPE='SUBMIT' VALUE='Stat'>";
	echo"</FORM>";
	}



// Clôture de la connexion
$vConn = null ;

?>
</body>

</html>
