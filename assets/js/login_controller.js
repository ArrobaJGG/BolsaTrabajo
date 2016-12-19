 angular.module('my-app', [])
      .controller('UserController', ['$scope', function($scope) {
        $scope.user = {};
 
        $scope.submit = function() {
         $scope.mensaje="error";
        };
 
      }]);