(function(){
  'use strict';

  angular.module('app')
          .service('navService', [
          '$q',
          navService
  ]);

  function navService($q){
    var menuItems = [
      {
        name: 'Checkers',
        icon: 'dashboard',
        sref: '.checker'
      },
      {
        name: 'Sainsburys',
        icon: 'dashboard',
        sref: '.checker.sainsburys'
      }
    ];

    return {
      loadAllItems : function() {
        return $q.when(menuItems);
      }
    };
  }

})();
