var app = angular.module(
    'Test',   ['ui.router','cgBusy'])
    .config(function($httpProvider) {
        $httpProvider.defaults.withCredentials = true;

    });

    app.config(function($stateProvider, $urlRouterProvider){
    	$urlRouterProvider.otherwise('/home/'); 
		$stateProvider
			.state('home', {
				url: '/head/',
				templateUrl: 'head.html',
        controller: 'testCtrl'
			})
			.state('homes', {
				url: '/homes/',
				templateUrl: 'post.php',
        controller: 'postCtrl',
	    params: {
	       // obj: 45
	    }
		})
	});

app.controller('testCtrl',
    function($scope,$http, $state){

    $scope.containerPromise = null;
	
	$scope.goAdminPage = function() {
		console.log('goAdminPage');
	}
	
	$scope.getDate = function(element) {
			$scope.containerPromise = $http(
		{
			url :  "data.php",
			method : 'GET',
			headers : {
				'Content-Type' : 'application/json; charset=UTF-8'
			},
			params : {
				//butName: element
			}
		}).then(function(response) {
		console.log("response: ", response);
		var object = JSON.stringify(response.data);
		$scope.list = JSON.parse(object);
		}, function(e) {
			console.log('error %o', e);
		});
	}
	$scope.getDate();	

});
