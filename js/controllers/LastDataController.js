//Actualise juste le tableau (ne met pas a jour la BDD)
app.controller('LastDataController', function($scope, $http) {
    $http.get("selectLast.php")
    .success(function (data, status, headers, config) {
      $scope.donnees = data;
    });
    $scope.goRefresh = function() {
      $http.get("selectLast.php")
      .success(function (data, status, headers, config) {
        $scope.donnees = data;
      });
    };

});

