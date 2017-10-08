angular.module('tes', []).controller("TestController",function($scope) {
     $scope.textArr = [];
  var count = 1;

  $scope.addElement = function() {
    var ele = {
      model: 'hello ' + count++
    }

    $scope.textArr.push(ele);
  }
   
  });