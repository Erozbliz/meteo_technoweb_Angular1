//Actualise juste le graphique (ne met pas a jour la BDD)
app.controller('ChartController', function($scope, $http) {


     $http.get("selectChart.php")
      .success(function (data, status, headers, config) {
        $scope.donnees = data;
        $ladata = data;
        $scope.chart = new CanvasJS.Chart("chartContainerJs", 
         {
            title:{
            text: "Température"
            },
             data: [
            {
              type: "line",
              dataPoints: $ladata
            }
            ]
          });
           $scope.chart.render();
      });

    //$scope.chart.render(); //render the chart for the first time
            
    $scope.changeChartType = function(chartType) {
        $scope.chart.options.data[0].type = chartType;
        $scope.chart.render(); //re-render the chart to display the new layout
    }

    $scope.goRefresh = function() {
      $http.get("selectChart.php")
      .success(function (data, status, headers, config) {
        $scope.donnees = data;
        $ladata = data;
        $scope.chart = new CanvasJS.Chart("chartContainerJs", 
         {
            title:{
            text: "Température"
            },
             data: [
            {
              type: "line",
              dataPoints: $ladata
            }
            ]
          });
           $scope.chart.render();
      });
    };

});

