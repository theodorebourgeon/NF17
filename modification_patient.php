<?php

// Connexion à la base de données avec données de la base de postgres
$vConn = new PDO('pgsql:host=tuxa.sme.utc;port=5432;dbname=dbnf17p099', 'nf17p099', 'h1AWr2Lr');

// Écriture, exécution et test de la requête

$tel = $_POST["tel"];
$ad = $_POST["ad"];
$n = $_POST["nom"];
$p = $_POST["prenom"];
$d = $_POST["date"];

echo "$tel<br>" ;
echo "$ad<br>" ;


$Sql = "UPDATE Patient SET Tel = '$tel', Adresse = '$ad'WHERE Nom_patient='$n' and Prenom='$p' and DateNaiss='$d'";
				
$ResultSet = $vConn->prepare($Sql);
$ResultSet->execute();

// Traitement du résultat
 
if (! $ResultSet) 
	{
	echo "Ce client n'est pas dans la base" ;
	}
else 
	{
	echo"Vous avez bien modifie le patient";
	}

// Clôture de la connexion
$vConn = null ;

?>
