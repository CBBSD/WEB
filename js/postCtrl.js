	    app.config(function($stateProvider, $urlRouterProvider){
    	$urlRouterProvider.otherwise('/head/');
		$stateProvider
			.state('head', {
				url: '/head',
				templateUrl: 'head.html',
        controller: 'testCtrl'     
			});
	});

app.controller('postCtrl', function($scope,$stateParams){
	$scope.containerPromise = null;
	$scope.back = function() {
		$state.go('head');
	}
	
	// $scope.insert = function(){
	// 	console.log('image: ',$scope.image);
	// 	console.log('price: ',$scope.price);
	// 	console.log('text: ',$scope.text);
	// }



	
});