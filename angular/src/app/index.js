'use strict';

angular.module('angularMaterialAdmin', ['ngAnimate', 'ngCookies',
  'ngSanitize', 'ui.router', 'ngMaterial', 'app'])

  .config(function ($stateProvider, $urlRouterProvider, $mdThemingProvider,
                    $mdIconProvider) {
    $stateProvider
      .state('home', {
        url: '',
        templateUrl: 'app/views/main.html',
        controller: 'MainController',
        controllerAs: 'vm',
        abstract: true
      })
      .state('home.dashboard', {
        url: '/dashboard',
        templateUrl: 'app/views/dashboard.html',
        data: {
          title: 'Dashboard'
        }
      })
      .state('home.checker', {
        url: '/checker',
        templateUrl: 'app/views/checker.html',
        controller: 'CheckerController',
        controllerAs: 'vm',
        data: {
          title: 'Checker'
        },
        abstract : true
      })
      .state('home.checker.sainsburys', {
        url: '/sainsburys',
        controller: 'CheckerController',
        controllerAs: 'vm',
        templateUrl: 'app/views/checker/sainsburys.tpl.html',
        data: {
          title: 'sainsburys'
        }
      });

    $urlRouterProvider.otherwise('/dashboard');
    $mdThemingProvider.definePalette('docs-blue', $mdThemingProvider.extendPalette('blue', {
      50: '#DCEFFF',
      100: '#AAD1F9',
      200: '#7BB8F5',
      300: '#4C9EF1',
      400: '#1C85ED',
      500: '#106CC8',
      600: '#0159A2',
      700: '#025EE9',
      800: '#014AB6',
      900: '#013583',
      contrastDefaultColor: 'light',
      contrastDarkColors: '50 100 200 A100',
      contrastStrongLightColors: '300 400 A200 A400'
    }));
      $mdThemingProvider.definePalette('docs-red', $mdThemingProvider.extendPalette('red', {
        A100: '#DE3641'
      }));
//      $mdThemingProvider.theme('custom', 'default').primaryPalette('green');
      $mdIconProvider.icon('md-toggle-arrow', 'img/icons/toggle-arrow.svg', 48);
      $mdThemingProvider.theme('default').primaryPalette('docs-blue').accentPalette('docs-red');
      $mdThemingProvider.theme('custom').primaryPalette('docs-blue').accentPalette('docs-red');
      $mdThemingProvider.enableBrowserColor();
  });
