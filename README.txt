
------ Bases de donn�es ------------
1 ) Cr�er la Bases de donn�e : 'technoweb'
2 ) Ensuite technoweb.sql est � importer dans phpMyAdmin

------ Connexion PDO ---------------
1 ) Pour pouvoir se connecter modifier le fichier connect.inc.php
	$connect_str= "mysql:host=localhost;dbname=technoweb"; //valeur par d�faut
    	$connect_user= 'root'; //valeur par d�faut
    	$connect_pass= ''; //valeur par d�faut


------ Le Fichier CSV ----------
1 ) le fichhier .csv se nomme "meteoDonnee.csv"
	Le CSV doit respecter cette forme :
	Horodatage,Temperature,Vent,hygrom�trie
	2015-10-24 11:52:51,18.5,50.5,60
	2015-10-24 12:02:51,15.4,40.3,50

A chaque fois le meteoDonnee.csv sera �cras� par la carte stm32(donc normalement il n'y a que 2 lignes mais ici on traite aussi les cas quand il y a plusieurs lignes)

Autres : 
Si les valeurs sont ab�rantes la requete sur le serveur ne se fera pas
Pour modifier le nom du fichier csv, il faut se rendre sur csv csvToBdd.php et changer "$nameFile = "meteoDonnee.csv";" 

	
