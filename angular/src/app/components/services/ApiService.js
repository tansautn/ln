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
*/
/**
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 * @PROJECT    : X - Project [ Z-Dev ]
 * @AUTHOR     : Zuko
 * @COPYRIGHT  : © 2016 Z-Programing a.k.a Zuko
 * @LINK       : http://www.zuko.pw/
 * @FILE       : ApiService.js
 * @CREATED    : 09:48 , 20/Nov/2016
 * @DETAIL     :
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 **/
(function ()
{
  "use strict";
  angular.module ('app')
         .service ('ApiService', [ '$http', '$q', ApiService ]);

  function ApiService ($http, $q)
  {
    var serviceObject = {};
    serviceObject.apiUrlPrefix = 'http://lumenlocal/';
    serviceObject.prependPrefix = true;
    function buildUrlByParam (url, params, prependPrefix)
    {
      if (params)
      {
        var urlsurfix = '?';
        angular.forEach (params, function (value, index)
        {
          if (urlsurfix !== '?') urlsurfix += '&';
          urlsurfix += index + '=' + value;
        });
        url += urlsurfix;
      }
      if (prependPrefix)
      {
        url = serviceObject.apiUrlPrefix + url;
      }
      return url;
    }

    function handleError (response)
    {
      if (!angular.isObject (response.data) || !response.data.message)
      {
        return ( $q.reject ("An unknown error occurred.") );
      }
      return ( $q.reject (response.data.message) );
    }

    function handleSuccess (response)
    {
      return ( response.data );
    }

    function httpGet (url, data)
    {
      var requestUrl = buildUrlByParam (url, data, serviceObject.prependPrefix);
      var promise = $http (
        {
          method : "GET",
          url    : requestUrl
        }
      );
      return ( promise.then (handleSuccess, handleError) );
    }

    function httpPost (url, data)
    {
      if (angular.isObject (url) && url.params)
      {
        var requestUrl = buildUrlByParam (url.url, url.params, serviceObject.prependPrefix);
      }
      else
      {
        requestUrl = buildUrlByParam (url, undefined, serviceObject.prependPrefix);
      }
      var promise = $http ({
                             method : "POST",
                             url    : requestUrl,
                             data   : data
                           });
      return ( promise.then (handleSuccess, handleError) );
    }

    function httpPut (url, data)
    {
      if (angular.isObject (url) && url.params)
      {
        var requestUrl = buildUrlByParam (url.url, url.params, serviceObject.prependPrefix);
      }
      else
      {
        requestUrl = buildUrlByParam (url, undefined, serviceObject.prependPrefix);
      }
      var promise = $http ({
                             method : "PUT",
                             url    : requestUrl,
                             data   : data
                           });
      return ( promise.then (handleSuccess, handleError) );
    }

    function httpDelete (url, data)
    {
      if (angular.isObject (url) && url.params)
      {
        var requestUrl = buildUrlByParam (url.url, url.params, serviceObject.prependPrefix);
      }
      else
      {
        requestUrl = buildUrlByParam (url, undefined, serviceObject.prependPrefix);
      }
      var promise = $http ({
                             method  : "DELETE",
                             url     : requestUrl,
                             data    : data,
                             headers : {
                               "Content-Type" : "application/json"
                             }
                           });
      return ( promise.then (handleSuccess, handleError) );
    }

    serviceObject.get = httpGet;
    serviceObject.post = httpPost;
    serviceObject.put = httpPut;
    serviceObject.delete = httpDelete;
    return serviceObject;
  }

}) ();