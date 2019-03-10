var myApp = angular.module("myApp", [])
    .config(['$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    }]);

myApp.controller('MyController', function Mycontroller($scope) {
    $scope.basicInfo = {
        "title":"Registration Form"
    }

    $scope.cars = {
        car01 : {brand : "Ford", model : "Mustang", color : "red"},
        car02 : {brand : "Fiat", model : "500", color : "white"},
        car03 : {brand : "Volvo", model : "XC90", color : "black"}
    };

    // Event
    $scope.clickMe = function () {
        console.log('test is here');
    }

    onCarSelect = function () {
        console.log("car select event");
    }


});