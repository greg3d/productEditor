(function () {
	'use scrict';

	angular
		.module('manager.home', [
			'ui.router',
		])
		.config(configHome)
		.controller('HomeCtrl', HomeController)

	function HomeController($scope, $log) {


	}

	function configHome($stateProvider) {
		var mName = 'home';
		$stateProvider.state(mName, {
			url: '/',
			templateUrl: 'app/' + mName + '/index.html',
			controller: 'HomeCtrl',
			controllerAs: 'hc'
		});
	}
})();