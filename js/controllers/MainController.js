//Actualise juste le tableau (ne met pas a jour la BDD)
app.controller('MainController', function($scope, $http) {
    $http.get("selectAll.php")
    .success(function (data, status, headers, config) {
      $scope.donnees = data;
    });
    $scope.titre = "title";
    $scope.goRefresh = function() {
      $scope.greeting = 'goRefresh ' + $scope.titre + '!';
      $http.get("selectAll.php")
      .success(function (data, status, headers, config) {
        $scope.donnees = data;
      });
    };

});

