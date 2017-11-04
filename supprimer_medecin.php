<html>
<head>
	<meta charset="UTF-8">
	<title>Supprimer medecin </title>
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
	echo "Échec de l'insertion" ;
	}
else 
	{
	echo "<h1>Supprimer un Medecin</h1> <br>";
	echo "<h2> Choisissez le medecin: </h2>";
	echo"<FORM method='POST' ACTION ='supprime_medecin.php'>";
	echo "<br> <SELECT NAME='nom' SIZE='5'><br><br>";
	
	while ($row = $ResultSet->fetch(PDO::FETCH_ASSOC)) 
		{
		
		echo "<OPTION VALUE='";
		echo $row['nom_medecin'] ;
		echo "'>";

		echo $row['nom_medecin'] ;
		echo "</OPTION> ";	

		};
	
	echo "</SELECT><br><br>";
	echo " <br><br><INPUT TYPE='SUBMIT' VALUE='Supprimer'>";
	echo"</FORM>";
	}



// Clôture de la connexion
$vConn = null ;

?>

</body>
</html>

