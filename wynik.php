<?php
$wyszukiwanie = $_GET["szukaj"];
?>
<html>
<head>
 <meta charset="utf-8">
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 </head>
 <body>
 <div ng-app="myApp" ng-controller="customersCtrl" class="list-group">
      <div class="list-group-item" ng-repeat="osoba in nazwiska track by $index">
            <h4 class="list-group-item-heading">{{osoba.imie}}</h4>
              <p class="list-group-item-text">{{osoba.nazwisko}}</p>
      <div>
  </div>
 <script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
                $http.get("http://localhost/wyszukaj/json_select.php?szukaj=<?php echo $wyszukiwanie ?>")
                .success(
                  function(data, status, headers, config){
                        $scope.nazwiska=data;
                });
        });
  </script>
 </body>
</html>