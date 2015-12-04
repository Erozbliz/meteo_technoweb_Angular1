//Met a jour la BDD avec le csv
app.controller('RequestController', function($scope, $http) {
    
    $scope.csvToBdd = function() {
      $http.get("csvToBdd.php")
      .success(function (data, status, headers, config) {
		console.log(data);
		$scope.donnees = data;
  		
      });
    };

});

