 angular.module('my-app', [])
      .controller('UserController', ['$scope', function($scope) {
        $scope.user = {};
 
        $scope.submit = function($event){
      var error = true;
			if($scope.userForm.email.$valid&&$scope.userForm.contrasena.$valid){
			error = false;
			
			}
			
			if(error) $event.preventDefault();
				
        };
 
      }]);