<html>

<head>
		<meta charset="UTF-8">
		<title>Statistique nombre RDV </title>
		<link rel="stylesheet" href="site.css" />
</head>
<body>

<?php
// Connexion à la base de données avec données de la base de postgres

$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p099', 'nf17p099', 'h1AWr2Lr');

// Écriture, exécution et test de la requête

$Sql = "SELECT code_patient,nom_patient,prenom,datenaiss FROM patient" ;	
$ResultSet = $vConn->prepare($Sql);
$ResultSet->execute();



// Traitement du résultat
if(! $ResultSet) 
	{
	echo "Échec de la statistique" ;
	}
else 
	{
	echo "<h1>Statistique: nombre de rendez-vous par patient</h1> <br>";
	echo "<h2> Choisissez le patient: </h2>";
	echo "<FORM method='POST' ACTION ='Statistique_rendezvous.php'>";
	echo "Patient: <SELECT NAME='code_patient' SIZE='5'><br><br>'<br><br>";
	
	while ($row = $ResultSet->fetch(PDO::FETCH_ASSOC)) 
		{
		
		echo "<OPTION VALUE='";
		echo $row['code_patient'] ;
		echo "'>";
		echo $row['nom_patient'];
		echo " - ";
		echo $row['prenom'];
		echo " - ";
		echo $row['datenaiss'] ;
		echo "</OPTION>";	
	

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
