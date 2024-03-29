(function () {
	'use strict';

	// Override $http service's default transformRequest
	var ng_transformRequest = [function (data) {
		/**
		 * The workhorse; converts an object to x-www-form-urlencoded serialization.
		 * @param {Object} obj
		 * @return {String}
		 */
		var param = function (obj) {
			var query = '';
			var name, value, fullSubName, subName, subValue, innerObj, i;

			for (name in obj) {
				value = obj[name];

				if (value instanceof Array) {
					for (i = 0; i < value.length; ++i) {
						subValue = value[i];
						fullSubName = name + '[' + i + ']';
						innerObj = {};
						innerObj[fullSubName] = subValue;
						query += param(innerObj) + '&';
					}
				}
				else if (value instanceof Object) {
					for (subName in value) {
						subValue = value[subName];
						fullSubName = name + '[' + subName + ']';
						innerObj = {};
						innerObj[fullSubName] = subValue;
						query += param(innerObj) + '&';
					}
				}
				else if (value !== undefined && value !== null) {
					query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
				}
			}

			return query.length ? query.substr(0, query.length - 1) : query;
		};

		return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
	}];

	angular
		.module('manager', [
			'ui.router',
			'home',
			'templates'
		])
		.config(configManager)
		.run(runManager)
		.controller('MainCtrl', MainController)
		.filter('renderFieldValue', RenderFieldValueFunction)
		.service('Config', ConfigService)
		.service('Server', ServerService)

	function ServerService(Config) {
		
		var ss = this;
		
		//ss.result = {};
		//ss.response = {};

		ss.Request = function(action, data) {
			
			var params = {
				HTTP_MODAUTH: pe_config.auth_token,
				action: action
			};

			if (data !== null) {
				params.data = data;
			}

			return $http.post(Config.connector_url, params);

		}
	}

	function ConfigService() {
		this.connector_url = pe_config.assets_url + 'components/producteditor/connector.php';
	}

	function RenderFieldValueFunction() {

		return function (input) {

			//console.log( app );

			return input;

		};
	}


	function MainController() {




	}

	function configManager($stateProvider, $urlRouterProvider, $httpProvider) {
		var homeState = {
			name: 'home',
			url: '/',
			templateUrl: '/home/index.html',
			controller: 'HomeCtrl',
			controllerAs: 'hc'
		};

		var aboutState = {
			name: 'about',
			url: '/about',
			template: '<h3>about</h3>'
		};

		$stateProvider.state(homeState);
		$stateProvider.state(aboutState);

		$urlRouterProvider.otherwise('/');

		$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
		$httpProvider.defaults.transformRequest = ng_transformRequest;

	}

	function runManager() {

	}

})();