
<?php
include "connect.inc.php";  /// Connection bdd

$nameFile = "meteoDonnee.csv"; //Fichier CSV
$erreur = true;
$msgError = "Erreur =";


//Si le fichier .csv n'existe pas
set_error_handler(
    create_function(
        '$severity, $message, $file, $line',
        'throw new ErrorException($message, $severity, $severity, $file, $line);'
    )
);

//Try catch (Si le fichier .csv n'existe pas)
try {
    file_get_contents($nameFile);
    $data=parseCSC($nameFile); //Parse
    if(verifValueCSV($data, $erreur)==true) //verification des valeurs du CSV
		insertCSVtoBDD2($data); //Envoie dans la BDD
	else
		echo "<br> <b>pb dans le csv requete non envoyee</b> <br>";
}
catch (Exception $e) {
    echo $e->getMessage();
}
restore_error_handler();
?>



<?php
//-------------------- FONCTION ---------------

//Parse
function parseCSC($nameFile){
	$fileName = $nameFile;
	$csvData = file_get_contents($fileName);
	$lines = explode(PHP_EOL, $csvData);
	//echo "taille = ".count($lines)."<br>";
	$array = array();
	foreach ($lines as $line) {
		$array[] = str_getcsv($line);
	}
	return $array;
 }

//Envoie dans la BDD juste la 2 eme ligne
 function insertCSVtoBDD(array $data){
 	include "connect.inc.php";
 	$valHorodatage = $data[1][0];
	$valTemperature = $data[1][1];
	$valVent = $data[1][2];
	$valHydrometrie = $data[1][3];
	echo "<br>Valeur du csv =".$valHorodatage.",".$valTemperature.",".$valVent.",".$valHydrometrie;
	try { 
		$requete_prepare= $dmysql->prepare("INSERT INTO donnee(horodatage,temperature,vent,hydrometrie) VALUES('$valHorodatage', '$valTemperature', '$valVent', '$valHydrometrie')"); // on prépare notre requête
		$requete_prepare->execute();
	} catch (Exception $e) { 
  		echo $e->errorMessage();
	}
 }

 //Envoie dans la BDD juste plusieur ligne
 function insertCSVtoBDD2(array $data){
 	include "connect.inc.php";
 	/*$valHorodatage = $data[1][0];
	$valTemperature = $data[1][1];
	$valVent = $data[1][2];
	$valHydrometrie = $data[1][3];*/
	$nbArray = count($data);

	for ($x = 1; $x < $nbArray; $x++) {
	    echo "<br>Ligne ".$x." du csv =".$data[$x][0].",".$data[$x][1].",".$data[$x][2].",".$data[$x][3];
		try { 
			$valHorodatage = $data[$x][0];
			$valTemperature = $data[$x][1];
			$valVent = $data[$x][2];
			$valHydrometrie = $data[$x][3];
			$requete_prepare= $dmysql->prepare("INSERT INTO donnee(horodatage,temperature,vent,hydrometrie) VALUES('$valHorodatage', '$valTemperature', '$valVent', '$valHydrometrie')"); // on prépare notre requête
			$requete_prepare->execute();
		} catch (Exception $e) { 
	  		echo $e->errorMessage();
		}
	} 
	
 }


//Verification des données
function verifValueCSV(array $data, $erreur){

	$nbArray = count($data);
	for ($ligne = 1; $ligne < $nbArray; $ligne++) 
	{
		//date time valide
		if( isValidDateTime($data[$ligne][0])==false){
			echo "erreur ".$data[$ligne][0]."(format = Y-m-d h:i:sa)<br>";
			$erreur = false;
		}else{
			echo "    ok ".$data[$ligne][0]."<br>";
		}

		//temperature
		if(($data[$ligne][1]<(-70.0) || $data[$ligne][1]>60.0) || is_numeric($data[$ligne][1])==false){
			echo "erreur ".$data[$ligne][1]." (temp entre -70 et 60)<br>";
			$erreur = false;
		}else{
			echo "    ok ".$data[$ligne][1]."<br>";
		}

		//vent
		if(($data[$ligne][2]<0.0 || $data[$ligne][2]>200.0)|| is_numeric($data[$ligne][2])==false){
			echo "erreur ".$data[$ligne][2]." (vent un peu rapide)<br>";
			$erreur = false;
		}else{
			echo "    ok ".$data[$ligne][2]."<br>";
		}

		//Hydrometrie
		if(($data[$ligne][3]<=0.0 || $data[$ligne][3]>=100.0)|| is_numeric($data[$ligne][3])==false){
			echo "erreur ".$data[$ligne][3]." ( en %)<br>";
			$erreur = false;
		}else{
			echo "    ok ".$data[$ligne][3]."<br>";
		}
	}

	if($erreur===false){
		echo "Attention aussi au retour chariot<br>";
	}

	return $erreur;
 }

function isValidDateTime($dateTime)
{
    if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $dateTime, $matches)) {
        if (checkdate($matches[2], $matches[3], $matches[1])) {
            return true;
        }
    }

    return false;
}



//FONCTION SELECT
//http://www.phpro.org/tutorials/Consume-Json-Results-From-PHP-MySQL-API-With-Angularjs-And-PDO.html





//Save
/*function verifValueCSV(array $data, $erreur){

	//date time valide
	//if(var_dump(validateDate($data[1][0]))){
	if( isValidDateTime($data[1][0])==false){
		echo "erreur ".$data[1][0]."(format = Y-m-d h:i:sa)<br>";
		$erreur = false;
	}else{
		echo "    ok ".$data[1][0]."<br>";
	}

	//temperature
	if(($data[1][1]<(-70.0) || $data[1][1]>60.0) || is_numeric($data[1][1])==false){
		echo "erreur ".$data[1][1]." (temp entre -70 et 60)<br>";
		$erreur = false;
	}else{
		echo "    ok ".$data[1][1]."<br>";
	}

	//vent
	if(($data[1][2]<0.0 || $data[1][2]>200.0)|| is_numeric($data[1][2])==false){
		echo "erreur ".$data[1][2]." (vent un peu rapide)<br>";
		$erreur = false;
	}else{
		echo "    ok ".$data[1][2]."<br>";
	}

	//Hydrometrie
	if(($data[1][3]<=0.0 || $data[1][3]>=100.0)|| is_numeric($data[1][3])==false){
		echo "erreur ".$data[1][3]." ( en %)<br>";
		$erreur = false;
	}else{
		echo "    ok ".$data[1][3]."<br>";
	}

	return $erreur;
 }*/




?>