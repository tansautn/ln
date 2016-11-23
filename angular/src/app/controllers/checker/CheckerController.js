/*
         M""""""""`M            dP                     
         Mmmmmm   .M            88                     
         MMMMP  .MMM  dP    dP  88  .dP   .d8888b.     
         MMP  .MMMMM  88    88  88888"    88'  `88     
         M' .MMMMMMM  88.  .88  88  `8b.  88.  .88     
         M         M  `88888P'  dP   `YP  `88888P'     
         MMMMMMMMMMM    -*-  Created by Zuko  -*-      

         * * * * * * * * * * * * * * * * * * * * *     
         * -    - -     S.Y.M.L.I.E     - -    - *     
         * -  Copyright © 2016 (Z) Programing  - *     
         *    -  -  All Rights Reserved  -  -    *     
         * * * * * * * * * * * * * * * * * * * * *     
*//**
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 * @PROJECT    : X - Project [ Z-Dev ]
 * @AUTHOR     : Zuko
 * @COPYRIGHT  : © 2016 Z-Programing a.k.a Zuko
 * @LINK       : http://www.zuko.pw/
 * @FILE       : CheckerController.js
 * @CREATED    : 08:34 , 20/Nov/2016
 * @DETAIL     :  
* --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
**/
(function(){
    "use strict";
    angular.module('app')
        .controller('CheckerController',['$scope','ApiService',CheckerController] );
    function CheckerController($scope,ApiService){
        var vm = this;
        function onFrmSubmit (event)
        {
          var url = 'account/sainsburys';
          console.log (event);
          console.info (vm.chkFrm);

          var promise = ApiService.post(url,vm.chkFrm).then(function (response)
                                                 {
                                                   console.log (response);
                                                 });
        }

        vm.onFrmSubmit = onFrmSubmit;
        return vm;
    }

})();