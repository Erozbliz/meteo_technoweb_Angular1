<?php
//include "connect.inc.php";  /// Connection bdd
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico"/>
    <meta name="description" content="Météo STM32 angularjs">
    <meta name="author" content="Colombies Olivier">
	<meta name="keywords" content="Colombies Olivier, Météo STM32, angularjs">

    <title>Météo STM32</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/mycss.css" rel="stylesheet">
    <!-- Animate CSS https://github.com/daneden/animate.css-->
    <!-- tuto onclick http://www.telegraphicsinc.com/2013/07/how-to-use-animate-css/ -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body ng-app="myApp">

	  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand animated bounceInLeft" href="#">Météo TechnoWeb</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active  animated bounceInLeft"><a href="">Accueil</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
    	<div class="page-header">
    		<div ng-controller="LastDataController">
                <button type="button" id="btnCurrent" class="btn btn-primary " ng-click="goRefresh()">Actualiser dernière donnée</button>
    			<table class="table table-hover  animated zoomIn">
					<thead><tr><th>Horodatage</th><th>Température</th><th>Vent</th><th>Hydrometrie</th></tr></thead>
					<tbody>
						<tr><td>{{donnees[0].horodatage | date:'medium'}}</td><td>{{  donnees[0].temperature }} °C</td><td>{{donnees[0].vent}} km/h</td><td>{{donnees[0].hydrometrie}} %</td></tr>
					</tbody>
					</tfoot></tfoot>
				</table>
    		</div>


    		<div ng-controller="MainController">
    			<button type="button" id="btnTab" class="btn btn-primary " ng-click="goRefresh()">Actualiser Tableau</button>
    			 <!--<p> {{greeting}} </p>-->
				<table class="table table-striped animated zoomIn">
					<thead><tr><th>id</th><th>Horodatage</th><th>Température</th><th>Vent</th><th>Hydrometrie</th></tr></thead>
					<tbody>
						<tr ng-repeat="x in donnees"><td><i>{{x.id}}</i></td><td>{{x.horodatage}}</td><td>{{ x.temperature }} °C</td><td>{{x.vent}} km/h</td><td>{{x.hydrometrie}} %</td></tr>
					</tbody>
					</tfoot></tfoot>
				</table>
    		</div>
    	</div>
    </div>

	<div class="container" ng-controller="ChartController" >
		<button type="button" id="btnChart" class="btn btn-primary" ng-click="goRefresh()">Actualiser Graphique</button>
		  <!--<p> {{ rand}} </p>-->
		<div class="row" >
			<div class="col-xs-12">
				<!-- Div affichage graphique -->
				<div id="chartContainerJs" style="height: 300px; width: 100%;"></div>
			</div>
		</div>
	</div>

     <div class="container" ng-controller="RequestController">
        <button type="button" id="btnCsv" class="btn btn-warning" ng-click="csvToBdd()">Envoyer le CSV en BDD</button>
        <!-- <p>{{donnees}}</p> -->
        <!-- <button type="button" id="btnRand" class="btn btn-danger" ng-click="randToBdd()">Générer valeur aléatoire</button> -->
     </div>

     <br> <br>
    <footer class="footer">
      <div class="container">
      	<br>
        <p> 
            <a href="http://colombies.com/MeteoTechnoWeb/index.php" target="_blank" class="animated pulse"><b>TP sur Colombies.com &copy; 2015</b></a>  
            &nbsp;&nbsp; Utilisation : AngularJS, PHP, JS, CanvasJS, JQuery, Bootstrap, CSS, animate.css, HTML, SQL, FontAwesome &nbsp;&nbsp; 
            <br>Problème avec le CSV voir : <a href="csvToBdd.php" target="_blank" class="infinite animated pulse">csvToBdd.php</a>  
        </p>
      </div>
    </footer>
	


    <!-- Jquery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
	<!-- AngularJS -->
    <script src="js/angular.min.js"></script>
    <!-- Animate daneden-->
    <script src="js/animate.js"></script>
	<!-- Modules -->
	<script src="js/app.js"></script>
	<!-- canvasjs chart -->
	<script type="text/javascript" src="canvasjs/canvasjs.min.js"></script>
	<!-- Controllers -->
	<script src="js/controllers/ChartController.js"></script>
	<script src="js/controllers/MainController.js"></script>
	<script src="js/controllers/LastDataController.js"></script>
    <script src="js/controllers/RequestController.js"></script>
</body>
</html>