(function () {
	'use strict';

	// Override $http service's default transformRequest
	configManager.$inject = ["$stateProvider", "$urlRouterProvider", "$httpProvider"];
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
		.service('Config', ConfigService);

	function ConfigService() {
		this.connector_url = pe_config.assets_url + 'components/producteditor/connector.php';
	}

	function RenderFieldValueFunction() {

		return function( input ) {

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
(function () {
    'use strict';

    HomeController.$inject = ["$scope", "$http", "$rootScope", "Config"];
    angular
        .module('home', [
            'ui.router',
            'ui.grid',
            'ui.grid.edit'
        ])
        .controller('HomeCtrl', HomeController)
        .config(HomeConfig)
        .filter('mapTypes', mapTypesFilter)
        .filter('numFormat', numFormatFilter);

    function HomeController($scope, $http, $rootScope, Config) {

        var hc = this;
        hc.result = "";
        hc.products = [];

        hc.count = 0;

        var getList = function () {

            var params = {
                HTTP_MODAUTH: pe_config.auth_token,
                action: 'mgr/item/getproductslist',
            };

            //$rootScope.startSpin();

            var request = $http.post(Config.connector_url, params);
            request.then(
                function (response) {
                    hc.count = response.data.total;
                    hc.products = response.data.object;
                    hc.result = response;
                },
                function (response) {
                    hc.result = response;
                });
        };

        var updateProduct = function(id, key, value) {
            var params = {
                HTTP_MODAUTH: pe_config.auth_token,
                action: 'mgr/item/update',
                id: id,
                key: key,
                value: value
            };

            var request = $http.post(Config.connector_url, params);
            request.then(
                function (response) {
                    hc.msg.updateResponse = response;
                },
                function (response) {
                    hc.msg.updateResponse = response;
                });

        }

        var types = [{
                id: 'эко-грунт'
            },
            {
                id: 'концентрат'
            },
            {
                id: 'жидкий'
            },
            {
                id: 'гумат'
            },
            {
                id: 'черви'
            },
        ];

        hc.gridOptions = {
            enableSorting: true,
            columnDefs: [{
                    name: 'id',
                    field: 'id',
                    displayName: '',
                    enableCellEdit: false,
                    width: 48,
                    headerCellTemplate: '/home/headers/id.html',
                },
                {
                    name: 'название',
                    field: 'pagetitle',
                },
                {
                    name: 'аннотация',
                    field: 'introtext'
                },
                {
                    name: 'алиас',
                    field: 'alias'
                },
                {
                    name: 'Тип',
                    field: 'type',
                    editableCellTemplate: 'ui-grid/dropdownEditor',

                    editDropdownValueLabel: 'id',
                    editDropdownOptionsArray: types,
                    //cellFilter: 'mapTypes'
                },
                {
                    name: 'сорт',
                    field: 'sort_order_custom',
                    cellFilter: 'number'
                },
                {
                    name: 'Цена Регионы',
                    field: 'price',
                    cellFilter: 'numFormat'
                },
                {
                    name: 'Цена Самара',
                    field: 'price_action',
                    cellFilter: 'numFormat'
                },
                {
                    name: 'Цена Сибирь',
                    field: 'price_dv',
                    cellFilter: 'numFormat'
                },
                {
                    name: 'Объем, л',
                    field: 'weight',
                    width: 48,
                    cellFilter: 'number'
                },
                {
                    name: 'Вес, кг',
                    field: 'inventory',
                    width: 48,
                    cellFilter: 'number'
                },
            ],
            data: 'hc.products'
        };

        hc.msg = {};

        hc.gridOptions.onRegisterApi = function (gridApi) {
            //set gridApi on scope
            hc.gridApi = gridApi;

            gridApi.edit.on.afterCellEdit($scope, function (rowEntity, colDef, newValue, oldValue) {
                
                hc.msg.lastCellEdited = 'edited row id:' + rowEntity.id + ' Column:' + colDef.name + ' newValue:' + newValue + ' oldValue:' + oldValue;
                updateProduct(rowEntity.id, colDef.field, newValue);
                $scope.$apply();
            });
        };

        

        getList();



    }

    function mapTypesFilter() {

        var genderHash = {
            1: 'эко-грунт',
            2: 'концентрат',
            3: 'жидкий',
            4: 'гумат',
            5: 'черви'
        };

        return function (input) {
            if (!input) {
                return '';
            } else {
                return genderHash[input];
            }
        };

    }

    function numFormatFilter() {
        return function(input) {
            return new Intl.NumberFormat('ru-RU').format(input);
        }
    }

    function HomeConfig() {}



})();