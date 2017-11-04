<?php
// Connexion à la base de données avec données de la base de postgres
$a = $_POST["ref"];
$b = $_POST["nom"];
$c = $_POST["caracteristique"];

$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p099', 'nf17p099', 'h1AWr2Lr');

echo "$a<br><br>";
echo "$b<br><br>";
echo "$c<br><br>";

// Écriture, exécution et test de la requête
$vSql = "INSERT INTO medicament VALUES ('$a','$b','$c')" ; 
$vResult=$vConn->query($vSql);

if (! $vResult) 
	{
	echo "Echec de l'insertion" ;
	}
else 
	{
	}

// Clôture de la connexion
$vConn = null ;

?>

