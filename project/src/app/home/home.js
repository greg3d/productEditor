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
        .filter('mapTypes', mapTypesFilter);

    function HomeController($scope, $http, $rootScope, Config) {

        var hc = this;
        hc.result = "";
        hc.products = [];

        hc.count = 0;

        var types = [{
                id: 1,
                type: 'эко-грунт'
            },
            {
                id: 2,
                type: 'концентрат'
            },
            {
                id: 3,
                type: 'жидкий'
            },
            {
                id: 4,
                type: 'гумат'
            },
            {
                id: 5,
                type: 'черви'
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

                    editDropdownValueLabel: 'type',
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
                    cellFilter: 'number'
                },
                {
                    name: 'Цена Самара',
                    field: 'price_action',
                    cellFilter: 'number'
                },
                {
                    name: 'Цена Сибирь',
                    field: 'price_dv',
                    cellFilter: 'number'
                },
                {
                    name: 'Объем, л',
                    field: 'inventory',
                    headerCellTemplate: '/home/headers/volume.html',
                    width: 48,
                    cellFilter: 'number'
                },
                {
                    name: 'Вес, кг',
                    field: 'weight',
                    headerCellTemplate: '/home/headers/weight.html',
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
                $scope.$apply();
            });
        };

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

    function HomeConfig() {}



})();