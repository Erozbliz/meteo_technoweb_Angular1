<?php
include "connect.inc.php";

try { 
	//Requete pour connaitre le nb de id
	$requeteNbId = $dmysql->prepare("SELECT COUNT(id) AS total FROM donnee"); // on prépare notre requête
	$requeteNbId->execute();
	$resultNbId = $requeteNbId->fetchAll( PDO::FETCH_ASSOC );
	//echo $resultNbId[0]['total']; // nombre de id dans donnee
	$nbID=$resultNbId[0]['total'];
} catch (Exception $e) { 
	echo $e->errorMessage();
}

if($nbID>11)
	$nbID=10;

try { 
	//Requete pour avoir la date + la temperature 
	//$requete_prepare = $dmysql->prepare("SELECT horodatage,temperature FROM donnee ORDER BY id DESC LIMIT ".$nbID); // on prépare notre requête
	$requete_prepare = $dmysql->prepare("(SELECT horodatage,temperature FROM donnee ORDER BY id LIMIT ".$nbID.")  ORDER BY horodatage ASC"); // on prépare notre requête (dans le bon sens)
	$requete_prepare->execute();
	$result = $requete_prepare->fetchAll( PDO::FETCH_ASSOC );
} catch (Exception $e) { 
	echo $e->errorMessage();
}



//$json = json_encode($result);

//Creation du array pour le json -> utilise pour le graphique
$data_points = array();

//construction du JSON
for($i=0; $i<$nbID; $i++){
	$point = array("label" => $result[$i]['horodatage'] , "y" => $result[$i]['temperature']);
	array_push($data_points, $point);
}



echo json_encode($data_points, JSON_NUMERIC_CHECK);




?>