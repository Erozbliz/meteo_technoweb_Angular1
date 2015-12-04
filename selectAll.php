<?php
include "connect.inc.php";
	
	try { 
		$requete_prepare = $dmysql->prepare("SELECT id,horodatage,temperature,vent,hydrometrie FROM donnee ORDER BY id DESC LIMIT 5"); // on prépare notre req
		//$requete_prepare = $dmysql->prepare("SELECT id,horodatage,temperature,vent,hydrometrie FROM donnee LIMIT 5"); // on prépare notre requête
		$requete_prepare->execute();
		$result = $requete_prepare->fetchAll( PDO::FETCH_ASSOC );
		// convert to json
		$json = json_encode($result);
	} catch (Exception $e) { 
  		echo $e->errorMessage();
	}

// echo the json string
echo $json;





?>