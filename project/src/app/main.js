(function () {
	'use scrict';

	angular
		.module('manager', [
			'ui.router',
			'manager.home',
		])
		.config(configManager)
		.run(runManager)
		.controller('MainCtrl', MainController)

	/** 
	 * Главный контроллер
	 */
	function MainController($scope, $interval) {



	}

	/**
	 * Конфиг приложения 
	 */
	function configManager($urlRouterProvider) {

		$urlRouterProvider.otherwise('/');

		/*
		NotificationProvider.setOptions({
			delay: 5000,
			startTop: 20,
			startRight: 20,
			verticalSpacing: 20,
			horizontalSpacing: 20,
			positionX: 'center',
			positionY: 'bottom',
			maxCount: 2,
		});*/
	}

	/**
	 * Инициализация
	 */
	function runManager($locale) {

		$locale.NUMBER_FORMATS.GROUP_SEP = ' ';

	}

})();