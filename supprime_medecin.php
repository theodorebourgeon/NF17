<?php

$a = $_POST["nom"];
echo "$a";

// Connexion à la base de données avec données de la base de postgres
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p099', 'nf17p099', 'h1AWr2Lr');
// Écriture, exécution et test de la requête

$Sql = "DELETE FROM medecin WHERE nom_medecin='$a'" ;	
$ResultSet = $vConn->prepare($Sql);
$ResultSet->execute();


// Traitement du résultat
if(! $ResultSet) 
	{
	echo "Echec de la suppression" ;
	}
else 
	{
	echo"<br><br>Supprime !!!!";
	};

// Clôture de la connexion
$vConn = null ;

?>

