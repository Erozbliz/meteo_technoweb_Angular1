
------ Bases de données ------------
1 ) Créer la Bases de donnée : 'technoweb'
2 ) Ensuite technoweb.sql est à importer dans phpMyAdmin

------ Connexion PDO ---------------
1 ) Pour pouvoir se connecter modifier le fichier connect.inc.php
	$connect_str= "mysql:host=localhost;dbname=technoweb"; //valeur par défaut
    	$connect_user= 'root'; //valeur par défaut
    	$connect_pass= ''; //valeur par défaut


------ Le Fichier CSV ----------
1 ) le fichhier .csv se nomme "meteoDonnee.csv"
	Le CSV doit respecter cette forme :
	Horodatage,Temperature,Vent,hygrométrie
	2015-10-24 11:52:51,18.5,50.5,60
	2015-10-24 12:02:51,15.4,40.3,50

A chaque fois le meteoDonnee.csv sera écrasé par la carte stm32(donc normalement il n'y a que 2 lignes mais ici on traite aussi les cas quand il y a plusieurs lignes)

Autres : 
Si les valeurs sont abérantes la requete sur le serveur ne se fera pas
Pour modifier le nom du fichier csv, il faut se rendre sur csv csvToBdd.php et changer "$nameFile = "meteoDonnee.csv";" 

	
