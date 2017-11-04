<?php

$a = $_POST["nom"];
echo "$a";

// Connexion à la base de données avec données de la base de postgres
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p099', 'nf17p099', 'h1AWr2Lr');
// Écriture, exécution et test de la requête

$Sql = "SELECT  AVG(DISTINCT AGE (CURRENT_DATE, patient.datenaiss))
	FROM patient, consultation, ordonnance, prescrit
	WHERE prescrit.reference='$a'
	AND prescrit.code_ordo=ordonnance.code_ordo
	AND ordonnance.code_ordo=consultation.code_consult
	AND consultation.code_patient=patient.code_patient" ;

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

