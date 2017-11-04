<?php

$a = $_POST["code_patient"];
echo $a;

// Connexion à la base de données avec données de la base de postgres
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p099', 'nf17p099', 'h1AWr2Lr');
// Écriture, exécution et test de la requête

$Sql = "
SELECT COUNT(consultation.code_patient)
FROM consultation
WHERE consultation.code_patient='$a'" ;

$resultat = $vConn->query($Sql);

// Traitement du résultat
if(! $resultat) 
	{
	echo "Echec de la Stat" ;
	}
else 
	{
	print_r($resultat->fetch());

	};

// Clôture de la connexion
$vConn = null ;

?>

