<?php
include "connect.inc.php";

try { 
	//Requete pour avoir la derniere donnee
	$requete_prepare = $dmysql->prepare("SELECT id,horodatage,temperature,vent,hydrometrie FROM donnee ORDER BY id DESC LIMIT 1"); // on prépare notre requête
	$requete_prepare->execute();
	$result = $requete_prepare->fetchAll( PDO::FETCH_ASSOC );
} catch (Exception $e) { 
	echo $e->errorMessage();
}

// convert to json
$json = json_encode($result);

// echo the json string
echo $json;


?>