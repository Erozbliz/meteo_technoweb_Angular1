<?php



//insertToBDD();



//Envoie dans la BDD
 function insertToBDD(){
 	include "connect.inc.php";
 	$valHorodatage = '2015-10-20 11:11:51';
	$valTemperature = '25';
	$valVent = '60';
	$valHydrometrie = '20';
	//echo $valHorodatage.$valTemperature.$valVent.$valHydrometrie;


	$requete_prepare_del= $dmysql->prepare("DELETE FROM donnee WHERE id IN (SELECT id FROM donnee ORDER BY id DESC LIMIT 5)"); // on prépare notre requête
	//$requete_prepare_del= $dmysql->prepare("DELETE FROM donnee WHERE id=(SELECT id FROM donnee ORDER BY id DESC LIMIT 5)"); // on prépare notre requête
	$requete_prepare_del->execute();


	/*$requete_prepare_insert= $dmysql->prepare("INSERT INTO donnee(horodatage,temperature,vent,hydrometrie) VALUES('$valHorodatage', '$valTemperature', '$valVent', '$valHydrometrie')"); // on prépare notre requête
	$requete_prepare_insert->execute();*/
 }

?>