(function () {
    'use scrict';

    angular
        .module('home', ['ui.router'])
        .controller('HomeCtrl', HomeController)
        .config(HomeConfig);
    
    function HomeController($scope, $http, $rootScope, Config) {

        $scope.result = " res ";
        $scope.products = [];
        $scope.count = 0;
        $scope.getList = function(){
            


            var params = {
                HTTP_MODAUTH: pe_config.auth_token,
                action: 'mgr/item/getproductslist',
            };

            //$rootScope.startSpin();

            var request = $http.post(Config.connector_url, params);
            request.then(
                function(response){
                    $scope.count = response.data.total;
                    $scope.products = response.data.object;
                    $scope.result = response;
                },
                function(response){
                    $scope.result = response;
                });
        };

    }

    function HomeConfig(){
    }



})();
