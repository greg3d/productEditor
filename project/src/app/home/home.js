(function () {
    'use strict';

    angular
        .module('home', [
            'ui.router',
            'ui.grid',
            'ui.grid.edit'
        ])
        .controller('HomeCtrl', HomeController)
        .config(HomeConfig)
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

        var updateProduct = function (id, key, value) {
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
                    width: 40,
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
                    name: 'Цена Самара',
                    field: 'price_action',
                    cellFilter: 'numFormat'
                },
                {
                    name: 'Цена Регионы',
                    field: 'price',
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
                    width: 64,
                    cellFilter: 'numFormat'
                },
                {
                    name: 'Вес, кг',
                    field: 'inventory',
                    width: 64,
                    cellFilter: 'numFormat'
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

    function numFormatFilter() {
        return function (input) {
            return new Intl.NumberFormat('ru-RU').format(input);
        }
    }

    function HomeConfig() {}

})();