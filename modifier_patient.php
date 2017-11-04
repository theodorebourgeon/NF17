<html>
<head>
	<link rel="stylesheet" href="site.css" />
</head>

<body>
<?php

// Connexion à la base de données avec données de la base de postgres
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p099', 'nf17p099', 'h1AWr2Lr');

// Écriture, exécution et test de la requête

$n = $_POST["nom"];
$p = $_POST["prenom"];
$d = $_POST["date"];


$Sql = "SELECT * FROM Patient Where Nom_patient='$n' and Prenom='$p' and DateNaiss='$d'";				
$ResultSet = $vConn->prepare($Sql);
$ResultSet->execute();

echo $Sql;
// Traitement du résultat
if (! $ResultSet) 
	{
	echo "Ce client n'est pas dans la base" ;
	}
else 
	{
	echo"
	<h1> Vous souhaitez modifier les donnees suivantes : </h1>
	<FORM method='POST' ACTION ='modification_patient.php'>
	Telephone : <INPUT NAME='tel' SIZE='10' MAXLENGTH='10'> <br><br>
	Adresse : <INPUT NAME='ad' SIZE='50' MAXLENGTH='50'> <br><br>


	<input type='hidden' name='nom' value=$n /> 
	<input type='hidden' name='prenom' value=$p /> 
	<input type='hidden' name='date' value=$d />                    
	<br>
	<INPUT TYPE='SUBMIT' VALUE='Modifier'>
	<br>
	</FORM>";
	}



// Clôture de la connexion

$vConn = null ;

?>

</body>
</html>
